<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - Sistem Informasi Manajemen Ekstrakurikuler</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{asset('login_asset/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_asset/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_asset/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_asset/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset('login_asset/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_asset/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_asset/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset('login_asset/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_asset/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login_asset/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                 <div class="login100-form-title" style=" background-color: #10334F;"><!-- Ganti Background disini -->
                    <span class="login100-form-title-1">
                        Masuk
                    </span>
                    <img style="display: block;margin-left: auto;margin-right: auto;width: 10%;" src="{{asset('assetnya/images/23.png')}}" alt="" /><br>
                    <span  style="color: #ffff;font-size: 16pt;text-align: center;" class="">
                        SISTEM INFORMASI MANAJEMEN EKSTRAKURIKULER <br>
                        SMAN 1 KOTA SOLOK
                    </span>
                </div>
                @if(Session::has('alert'))
                                <div class="alert alert-danger">
                                    <div><p>{{Session::get('alert')}}</p></div>
                                </div>
                @endif
                @if(Session::has('simpan'))
                 <div class="alert alert-success" role="alert">{{Session::get('simpan')}}</div>
                 @elseif(Session::has('edit'))
                 <div class="alert alert-warning" role="alert">{{Session::get('edit')}}</div>
                 @elseif(Session::has('hapus'))
                 <div class="alert alert-danger" role="alert">{{Session::get('hapus')}}</div>
                    @elseif(Session::has('errors'))
                 <div class="alert alert-danger" role="alert">{{Session::get('errors')}}</div>
                @endif
                <form class="login100-form validate-form" action="{{route('login.store')}}" method="POST">
                   @csrf
                    <div class="wrap-input100 validate-input m-b-26" >
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Masukan Alamat Email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" >
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Masukan password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        

                        <div>
                            <a href="#" class="txt1">
                                Lupa Password?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button style="background-color: #10334F;" class="login100-form-btn">
                            Masuk
                        </button>
                        </form>
                        <a href="{{route('registrasi-pembina')}}" style="background-color: green;" class="login100-form-btn">
                            Registrasi Pembina
                        </a>
                    </div>
                
            </div>
        </div>
    </div>
    
<!--===============================================================================================-->
    <script src="{{asset('login_asset/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('login_asset/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('login_asset/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('login_asset/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('login_asset/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('login_asset/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('login_asset/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('login_asset/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('login_asset/js/main.js')}}"></script>

</body>
</html>