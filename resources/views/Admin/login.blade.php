<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>ROTEK - Panel Giriş</title>
    <meta content="ROBOT TEKNOLOJİLERİ VE KULLANIMI KLÜBÜ " name="description"/>
    <meta content="Ahmet Vuruskan- Rotek" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">

</head>
<body>


<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-body">

            <div class="text-center">
                <a href="" class="logo logo-admin"><img src="/assets/images/e-logo.png" height="20" alt="logo"></a>
            </div>

            <div class="px-3 pb-3">
                <form class="form-horizontal m-t-20" method="post" action="{{route('admin.usercheck')}}">
                    @csrf
                    @if(session()->has('error'))
                        <ul>
                            <li class="alert alert-danger">{{session('error')}}</li>
                        </ul>
                    @endif
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <ul>
                                <li class="alert alert-danger">{{$error}}</li>
                            </ul>
                        @endforeach
                    @endif
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="text" name="email"
                                   placeholder="Kullanıcı Adınız">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" name="password" type="password"  placeholder="Şifre">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember_me" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Beni Hatırla</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Giriş Yap
                            </button>
                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-sm-7 m-t-20">
                            <a href="#" class="text-muted"><i class="mdi mdi-lock"></i> <small>Şifremi
                                    Unuttum</small></a>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- jQuery  -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/modernizr.min.js"></script>
<script src="/assets/js/detect.js"></script>
<script src="/assets/js/fastclick.js"></script>
<script src="/assets/js/jquery.blockUI.js"></script>
<script src="/assets/js/waves.js"></script>
<script src="/assets/js/jquery.nicescroll.js"></script>

<!-- App js -->
<script src="/assets/js/app.js"></script>

</body>
</html>
