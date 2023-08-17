@extends('layout.master')

@section('konten')
	<!-- Start Status area -->
   
    <div class="tooltips-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="tooltips-inner">
                      
                            <img src="{{asset('assetnya/img/gbanner2.jpg')}}">
                
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- Breadcomb area Start-->
    <div class="breadcomb-area" id="ekskul">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list" style="background-color: #10334f;">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-windows"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2 style="color: white;">Daftar Ekskul</h2>
                                        <p style="color: white;">Pilih<span class="bread-ntd"> Ekstrakurikuler yang diinginkan</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->
    <div class="notika-email-post-area" >
        <div class="container">
            <div class="row">
                @foreach($ekskul as $eks)
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="blog-img">
                            <img style="height: 200px" src="{{asset($eks->gambar)}}" alt="" />
                        </div>
                        <div class="blog-ctn">
                            <div class="blog-hd-sw">
                                <h2> {{$eks->nama_ekskul}}</h2>
                                <a class="bg-au" href="#"></a>
                            </div>
                           {!!substr($eks->deskripsi, 0, 100)!!}....<a href="{{route('ekskul.read',$eks->slug)}}">Lihat lebih lanjut</a>
                   
                             <a style="display: block;
  margin-left: auto;
  margin-right: auto;" class="btn btn-success" href="{{route('ekskul.read',$eks->slug)}}">DETAIL EKSKUL</a>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </div>

    <br>
    <!-- Breadcomb area Start-->
    <div class="breadcomb-area" id="prestasi">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list" style="background-color: #10334f;">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-flag"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2 style="color: white;">Prestasi Ekstrakurikuler</h2>
                                        <p style="color: white;">Pilih<span class="bread-ntd"> Salah Satu Ekstrakurikuler Untuk Melihat Prestasi</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcomb area End-->
    <div class="notika-email-post-area" >
        <div class="container">
            <div class="row">
                @foreach($ekskul as $eks)
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="blog-img">
                            <img style="display: block;
                              margin-left: auto;
                              margin-right: auto;
                              width: 40%;" src="{{asset('assetnya/images/imgbin_trophy-gold-medal-png.png')}}" alt="" />
                        </div>
                        <div class="blog-ctn">
                            <div class="blog-hd-sw">
                                <h2 align="center"> {{$eks->nama_ekskul}}</h2>
                                <a class="bg-au" href="#"></a>
                            </div>
                           <a style="display: block;
                              margin-left: auto;
                              margin-right: auto;" class="btn btn-success" href="{{route('prestasi.read',$eks->id)}}">LIHAT PRESTASI</a>                           
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </div>

    <br>
    <!-- Breadcomb area Start-->
    <div class="breadcomb-area" id="galeri">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list" style="background-color: #10334f;">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-picture"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2 style="color: white;">Galeri Ekstrakurikuler</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcomb area End-->
    <div class="notika-email-post-area" >
        <div class="container">
            <div class="row">
                @foreach($galeri as $eks)
                <a href="{{route('galeri.read',$eks->id)}}">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="blog-img">
                            <img style="height: 200px" src="{{asset($eks->thumbnail)}}" alt="" />
                        </div>
                        <div class="blog-ctn">
                            <div class="blog-hd-sw">
                                <h2> {{$eks->nama_galeri}}</h2>
                                <a class="bg-au" href="#"></a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                </a>
               @endforeach
            </div>
        </div>
    </div>
@endsection
@section('javascript')
<!-- jquery
		============================================ -->
    <script src="{{asset('assetnya/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('assetnya/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{asset('assetnya/js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{asset('assetnya/js/jquery-price-slider.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{asset('assetnya/js/owl.carousel.min.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('assetnya/js/jquery.scrollUp.min.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('assetnya/js/meanmenu/jquery.meanmenu.js')}}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{asset('assetnya/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assetnya/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('assetnya/js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('assetnya/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="{{asset('assetnya/js/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assetnya/js/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('assetnya/js/jvectormap/jvectormap-active.js')}}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{asset('assetnya/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assetnya/js/sparkline/sparkline-active.js')}}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{asset('assetnya/js/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assetnya/js/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assetnya/js/flot/curvedLines.js')}}"></script>
    <script src="{{asset('assetnya/js/flot/flot-active.js')}}"></script>
    <!-- knob JS
		============================================ -->
    <script src="{{asset('assetnya/js/knob/jquery.knob.js')}}"></script>
    <script src="{{asset('assetnya/js/knob/jquery.appear.js')}}"></script>
    <script src="{{asset('assetnya/js/knob/knob-active.js')}}"></script>
    <!--  wave JS
		============================================ -->
    <script src="{{asset('assetnya/js/wave/waves.min.js')}}"></script>
    <script src="{{asset('assetnya/js/wave/wave-active.js')}}"></script>
    <!--  todo JS
		============================================ -->
    <script src="{{asset('assetnya/js/todo/jquery.todo.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('assetnya/js/plugins.js')}}"></script>
	<!--  Chat JS
		============================================ -->
    <script src="{{asset('assetnya/js/chat/moment.min.js')}}"></script>
    <script src="{{asset('assetnya/js/chat/jquery.chat.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('assetnya/js/main.js')}}"></script>

@endsection