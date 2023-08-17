<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$title}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assetnya/img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assetnya/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('assetnya/css/owl.transitions.css')}}">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/meanmenu/meanmenu.min.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/animate.css')}}">
    <!-- summernote CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/summernote/summernote.css')}}">
    <!-- Range Slider CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/themesaller-forms.css')}}">
    <!-- bootstrap select CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/bootstrap-select/bootstrap-select.css')}}">
    <!-- datapicker CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/datapicker/datepicker3.css')}}">
    <!-- Color Picker CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/color-picker/farbtastic.css')}}">
    <!-- dropzone CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/dropzone/dropzone.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/normalize.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
        <!-- Data Table JS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/jquery.dataTables.min.css')}}">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/jvectormap/jquery-jvectormap-2.0.3.css')}}">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/notika-custom-icon.css')}}">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/wave/waves.min.css')}}">
    <link rel="stylesheet" href="{{asset('assetnya/css/wave/button.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/main.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assetnya/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('assetnya/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
<div class="header-top-area" style="background-color: #19adc4  !important;">
        <div class="container" style="background-color: #10334f !important;">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        

                    </div>
                    

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img style="display: block;margin-left: auto;margin-right: auto;width: 10%;" src="{{asset('assetnya/images/23.png')}}" alt="" /></a><br>
                        <p align="center"><font color="white" style="font-size: 12pt;font-family: Arial;font-style: bold;"> SISTEM INFORMASI MANAJEMEN EKSTRAKURIKULER</font></p>
                            <p align="center"><font color="white" style="font-size: 12pt;font-family: Arial;font-style: bold;"> SMA NEGERI 1 SOLOK</font></p>

                    </div>
                    

                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        
                        <ul class="nav navbar-nav notika-top-nav">
                            
                        </ul>
               
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    @include('layout.navbar')
    @yield('konten')
    <!-- Start Footer area-->
<div class="footer-copyright-area" style="background-color: #19adc4 ;">
        <div class="container" style="background-color: #10334f;">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>© 2021 
. SISTEM INFORMASI MANAJEMEN EKSTRAKURIKULER <a target="_blank" href="http://www.sman1solok.sch.id/">SMA NEGERI 1 SOLOK</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    @yield('javascript')
</body>

</html>
