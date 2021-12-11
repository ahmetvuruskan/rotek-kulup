<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locations;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ProductController extends Controller
{

    public function index()
    {

        $data['products'] = Products::all();
        $data['locations'] = Locations::all();
        foreach ($data['products'] as $product) {
            foreach ($data['locations'] as $location) {
                if ($product->product_location == $location->id) {
                    $product->product_location = $location->location_name;
                }
            }
        }

        return view('Admin.Products.index')->with('data', $data);
    }

    public function addNew()
    {
        $data['locations'] = Locations::all();
        return view('Admin.Products.addnew')->with('data', $data);
    }

    public function insert(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'product_name' => 'bail|required',
            'product_code' => 'bail|required',
            'product_quantity' => '|min:1|required|numeric',
            'product_location' => 'bail|required'
        ], [
            'product_name.required' => 'Ürün adı kısmı gereklidir.Lütfen Doldurunuz.',
            'product_code.required' => 'Ürün kodu kısmı gereklidir. Lütfen Doldurunuz.',
            'product_quantity.required' => 'Ürün adet kısmı gereklidir.Lütfen Doldurnuz',
            'product_quantity.min' => 'Ürün stok durumu en az bir olmalıdır.',
            'product_quantity.numeric' => 'Ürün stok durumu geçerili bir sayı olmalıdır.',
            'product_location.required' => 'Ürün konumu kısmı gereklidir.Lütfen Doldurunuz.'
        ]);

        if ($validate->fails()) {
            $request->flash(); // Gelen requesti flasha alıp herhangi bir hata durumunda eski değerlerin kaybolmasını engelliyoruz..
            // Validate kısmında herhangi bir hata olunca blade dosyasında hata mesajlarımızı  bastırıyoruz..
            return redirect(route('admin.products.add'))->withErrors($validate);
        }

        $insert = Products::insert([
            'product_id' => $request->product_code,
            'product_name' => $request->product_name,
            'product_quantity' => $request->product_quantity,
            'product_location' => $request->product_location,
            'product_slug' => Str::slug($request->product_name)
        ]);
        if ($insert) {
            return redirect(route('admin.products'))->with('success', 'İşlem Başarılı');
        } else {
            return redirect(route('admin.products'))->with('error', 'İşlem Başarısız.');
        }

    }

    public function edit($slug)
    {
        $data['product'] = Products::where('product_slug', $slug)->get();
        $data['locations'] = Locations::all();
        return view('Admin.Products.edit')->with('data', $data);
    }

    public function update(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'product_name' => 'bail|required',
            'product_code' => 'bail|required',
            'product_quantity' => '|min:1|required|numeric',
            'product_location' => 'bail|required'
        ], [
            'product_name.required' => 'Ürün adı kısmı gereklidir.Lütfen Doldurunuz.',
            'product_code.required' => 'Ürün kodu kısmı gereklidir. Lütfen Doldurunuz.',
            'product_quantity.required' => 'Ürün adet kısmı gereklidir.Lütfen Doldurnuz',
            'product_quantity.min' => 'Ürün stok durumu en az bir olmalıdır.',
            'product_quantity.numeric' => 'Ürün stok durumu geçerili bir sayı olmalıdır.',
            'product_location.required' => 'Ürün konumu kısmı gereklidir.Lütfen Doldurunuz.'
        ]);

        if ($validate->fails()) {
            $request->flash(); // Gelen requesti flasha alıp herhangi bir hata durumunda eski değerlerin kaybolmasını engelliyoruz..
            // Validate kısmında herhangi bir hata olunca blade dosyasında hata mesajlarımızı  bastırıyoruz..
            return back()->withErrors($validate);
        }

        $insert = Products::where('id', $request->id)->update([
            'product_id' => $request->product_code,
            'product_name' => $request->product_name,
            'product_quantity' => $request->product_quantity,
            'product_location' => $request->product_location,
            'product_slug' => Str::slug($request->product_name)
        ]);
        if ($insert) {
            return redirect(route('admin.products'))->with('success', 'İşlem Başarılı');
        } else {
            return redirect(route('admin.products'))->with('error', 'İşlem Başarısız.');
        }
    }
}
