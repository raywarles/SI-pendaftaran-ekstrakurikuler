@extends('layout.master')

@section('konten')
	<!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-house"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Panel Siswa</h2>
										<p>Sistem Informasi <span class="bread-ntd">Manajemen EKstrakurikuler</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
	    <!-- Start Contact Info area-->
    <div class="contact-info-area mg-t-30">
        <div class="container">
        	@if(Session::has('simpan'))
             <div class="alert alert-success" role="alert">{{Session::get('simpan')}}</div>
             @elseif(Session::has('edit'))
             <div class="alert alert-warning" role="alert">{{Session::get('edit')}}</div>
             @elseif(Session::has('hapus'))
             <div class="alert alert-danger" role="alert">{{Session::get('hapus')}}</div>
            @endif
            <div class="row">
               	
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="widget-tabs-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="contact-hd tm-activity">
                            <h2>Ekskul Saya : {{$ekskul->nama_ekskul}}</h2>
                            
                        </div>
                        <div class="widget-tabs-list">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Informasi Harian</a></li>
                                <li><a data-toggle="tab" href="#menu1">Profile Ekskul</a></li>
                                <li><a data-toggle="tab" href="#menu2">Daftar Kegiatan</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                   
                                    <div class="tab-ctn">
                                    	<table class="table table-striped">
                                    		<tr>
                                    			<td>Hari :</td>
                                    			<td>
                                                    @if(isset($jadwal->hari))
                                                    {{$jadwal->hari}}
                                                    @endif 
                                                </td>
                                    		</tr>
                                    		<tr>
                                    			<td>Jam :</td>
                                    			<td>
                                                    @if(isset($jadwal->jam))
                                                    {{$jadwal->jam}} WIB
                                                    @endif 
                                                </td>
                                    		</tr>
                                    		<tr>
                                    			<td>Pengumuman :</td>
                                    			<td>
                                                    @if(isset($jadwal->jam))
                                                    {!!$jadwal->pengumuman!!}
                                                    @endif  
                                                </td>
                                    		</tr>
                                    		<tr>
                                    			<td>Berkas :</td>
                                    			<td>
                                                    @if(isset($jadwal->jam))
                                                    {!!$jadwal->berkas!!}
                                                    @endif 
                                                </td>
                                    		</tr>
                                    	</table>
                                        
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <div class="tab-wd-img">
                                        <img src="{{asset($ekskul->gambar)}}" alt="" />
                                    </div>
                                    <div class="tab-ctn">
                                        <h4>{{$ekskul->nama_ekskul}}</h4>
                                        	<hr>
                                        {!!$ekskul->deskripsi!!}
                                    </div>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    
                                    <div class="tab-ctn bsc-tbl">
                                        <h4>Daftar Kegiatan</h4>
                                        <table class="table table-sc-ex">
                                        	<tr>
                                        		<td>Kegiatan</td>
                                        		<td>Deskripsi</td>
                                        		<td>Tanggal</td>
                                        		<td>Jam</td>
                                        	</tr>
                                        	@foreach($kegiatan as $keg)
                                    		<tr>
                                    			<td>{{$keg->nama_kegiatan}}</td>
                                    			<td>{!!$keg->keterangan!!} </td>
                                    				<td>{{$keg->tanggal->isoFormat('D MMMM Y')}} </td>
                                    					<td>{{$keg->jam->format('H:i')}} WIB </td>
                                    		</tr>
                                    		@endforeach
                                    		
                                    	</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 accordion-wn-wp">
                    <div class="widget-tabs-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="blog-img">
                        	@if(isset($data->avatar))
                            <img src="{{asset($data->avatar)}}" alt="" />
                            @else
                            <img src="{{asset('assetnya/images/User-Profile-PNG-Image.png')}}" alt="" />
                            @endif
                        </div>
                        <div class="blog-ctn">
                            <div class="blog-hd-sw">
								<h2 align="center"> {{$data->nama}}</h2>
                                    <hr>
                                <table class="table table-striped">
                                    <tr>
                                        <td>Email : </td>
                                        <td>{{$data->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>NIS :</td>
                                        <td>{{$data->nis}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin :</td>
                                        <td>{{$data->jk}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelas :</td>
                                        <td>{{$data->kelas}} - {{$data->jurusan}}</td>
                                    </tr>
                                </table>
							</div>
                            {!!$data->alasan!!}
                            
                        </div>
                    </div>
                    <div class="accordion-stn">
                                    <div class="panel-group" data-collapse-color="nk-green" id="accordionGreen" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-one" aria-expanded="true">
															Ganti Password dan Foto
														</a>
                                                </h4>
                                            </div>
                                            <div id="accordionGreen-one" class="collapse in" role="tabpanel">
                                                <div class="panel-body">
                                                   <form action="{{route('anggota.gantipass')}}" method="POST" enctype="multipart/form-data">
                                                   	@csrf
                                                   	<input type="hidden" name="anggota_id" value="{{$data->id}}">
                                                   	<div class="cmp-tb-hd bsc-smp-sm">
					                                    <label>Password Lama :</label>
					                                </div>
					                                <div class="form-group">
					                                    <div class="nk-int-st">
					                                        <input  type="password" name="old_pass" class="form-control input-md" placeholder="Password Lama">
					                                        @if ($errors->has('old_pass'))
					                                          <li><p style="color: red">{{ $errors->first('old_pass') }}</p></li>
					                                       @endif
					                                    </div>
					                                </div>
					                                <div class="cmp-tb-hd bsc-smp-sm">
					                                    <label>Password Baru :</label>
					                                </div>
					                                <div class="form-group">
					                                    <div class="nk-int-st">
					                                        <input  type="password" name="new_pass" class="form-control input-md" placeholder="Password Lama">
					                                        @if ($errors->has('new_pass'))
					                                          <li><p style="color: red">{{ $errors->first('new_pass') }}</p></li>
					                                       @endif
					                                    </div>
					                                </div>
					                                <div class="cmp-tb-hd bsc-smp-sm">
					                                    <label>Avatar</label>
					                                </div>
					                                <div class="form-group">
					                                    <div class="nk-int-st">
					                                        <input required type="file" name="avatar" class="form-control input-md" placeholder="Nama Ekstrakurikuler">
					                                        @if ($errors->has('avatar'))
					                                          <li><p style="color: red">{{ $errors->first('avatar') }}</p></li>
					                                       @endif
					                                    </div>
					                                </div>
					                                <button style="float: right;" type="submit" class="btn btn-warning" >Ganti Password</button>
                                                   </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-two" aria-expanded="false">
															Edit Profile
														</a>
                                                </h4>
                                            </div>
                                            <div id="accordionGreen-two" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        -->
                                    </div>
                                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Info area-->
@endsection
@section('javascript')
	<!-- End Footer area-->
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
    <!-- sparkline JS
		============================================ -->
    <script src="{{asset('assetnya/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assetnya/js/sparkline/sparkline-active.js')}}"></script>
    <!-- knob JS
		============================================ -->
    <script src="{{asset('assetnya/js/knob/jquery.knob.js')}}"></script>
    <script src="{{asset('assetnya/js/knob/jquery.appear.js')}}"></script>
    <script src="{{asset('assetnya/js/knob/knob-active.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('assetnya/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- flot JS
		============================================ -->
    <script src="{{asset('assetnya/js/flot/flot-widget-anatic-active.js')}}"></script>
    <script src="{{asset('assetnya/js/flot/chart-tooltips.js')}}"></script>
    <script src="{{asset('assetnya/js/flot/flot-active.js')}}"></script>
    <!--  wave JS
		============================================ -->
    <script src="{{asset('assetnya/js/wave/waves.min.js')}}"></script>
    <script src="{{asset('assetnya/js/wave/wave-active.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('assetnya/js/plugins.js')}}"></script>
    <!-- Google map JS
		============================================ -->
    <script src="{{asset('assetnya/js/google.maps/google.maps-active.js')}}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVOIQ3qXUCmKVVV7DVexPzlgBcj5mQJmQ&callback=initMap"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('assetnya/js/main.js')}}"></script>
	<!-- tawk chat JS
		============================================ -->
    <script src="{{asset('assetnya/js/tawk-chat.js')}}"></script>
@endsection