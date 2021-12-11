<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class IndexController extends Controller
{


    public function index()
    {
        return view('Admin.index');
    }

    public function login()
    {
        return view('Admin.login');
    }

    public function authCheck(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'email' => 'bail|required',
            'password' => 'bail|required'
        ], [
            'email.required' => 'Kullanıcı adı girmek zorunludur.',
            'password.required' => 'Lütfen şifrenizi giriniz.'
        ]);
        if ($validate->fails()) {
            return redirect(route('admin.login'))->withErrors($validate);
        }
        $rememberMe = $request->has('remember_me') ? true : false;
       $userData =$request->only('email','password');

       if (Auth::attempt($userData,$rememberMe)){
           return  redirect(route('admin.index'));
       }else{
        return   redirect(route('admin.login'))->with('error','Hatalı kullanıcı');
       }
    }
}
