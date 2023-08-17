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
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Prestasi {{$eks->nama_ekskul}}</h2>
										<p>Sistem Informasi <span class="bread-ntd">Manajemen Ekstrakurikuler</span></p>
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
    <!-- Data Table area Start-->

    <div class="data-table-area">

        <div class="container">
            @if(Session::has('simpan'))
             <div class="alert alert-success" role="alert">{{Session::get('simpan')}}</div>
             @elseif(Session::has('edit'))
             <div class="alert alert-warning" role="alert">{{Session::get('edit')}}</div>
             @elseif(Session::has('hapus'))
             <div class="alert alert-danger" role="alert">{{Session::get('hapus')}}</div>
            @endif
                            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Table Prestasi {{$eks->nama_ekskul}}</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Prestasi</th>
                                        <th>Tahun</th>
                                        <th>keterangan</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($prestasi as $keg)
                                    <tr>
                                        
                                        <td>{{$keg->nama_prestasi}}</td>
                                            <td>{{$keg->tahun}}</td>
                                        <td>{!!substr($keg->keterangan, 0, 400)!!}</td>
                                        
                                       
                                    </tr>
                                     @endforeach
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Prestasi</th>
                                        <th>Jadwal</th>
                                        <th>keterangan</th>
                                       
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

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
    <!-- sparkline JS
		============================================ -->
    <script src="{{asset('assetnya/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assetnya/js/sparkline/sparkline-active.js')}}"></script>
    <!-- flot JS
		============================================ -->
    <script src="{{asset('assetnya/js/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assetnya/js/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assetnya/js/flot/flot-active.js')}}"></script>
    <!-- Input Mask JS
        ============================================ -->
    <script src="{{asset('assetnya/js/jasny-bootstrap.min.js')}}"></script>
    <!-- icheck JS
        ============================================ -->
    <script src="{{asset('assetnya/js/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('assetnya/js/icheck/icheck-active.js')}}"></script>
    <!-- rangle-slider JS
        ============================================ -->
    <script src="{{asset('assetnya/js/rangle-slider/jquery-ui-1.10.4.custom.min.js')}}"></script>
    <script src="{{asset('assetnya/js/rangle-slider/jquery-ui-touch-punch.min.js')}}"></script>
    <script src="{{asset('assetnya/js/rangle-slider/rangle-active.js')}}"></script>
    <!-- datapicker JS
        ============================================ -->
    <script src="{{asset('assetnya/js/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assetnya/js/datapicker/datepicker-active.js')}}"></script>
    <!-- bootstrap select JS
        ============================================ -->
    <script src="{{asset('assetnya/js/bootstrap-select/bootstrap-select.js')}}"></script>
    <!--  color-picker JS
        ============================================ -->
    <script src="{{asset('assetnya/js/color-picker/farbtastic.min.js')}}"></script>
    <script src="{{asset('assetnya/js/color-picker/color-picker.js')}}"></script>
    <!--  notification JS
        ============================================ -->
    <script src="{{asset('assetnya/js/notification/bootstrap-growl.min.js')}}"></script>
    <script src="{{asset('assetnya/js/notification/notification-active.js')}}"></script>
    <!--  summernote JS
        ============================================ -->
    <script src="{{asset('assetnya/js/summernote/summernote-updated.min.js')}}"></script>
    <script src="{{asset('assetnya/js/summernote/summernote-active.js')}}"></script>
    <!-- dropzone JS
        ============================================ -->
    <script src="{{asset('assetnya/js/dropzone/dropzone.js')}}"></script>
        <!--  chosen JS
        ============================================ -->
    <script src="{{asset('assetnya/js/chosen/chosen.jquery.js')}}"></script>
    <!-- knob JS
		============================================ -->
    <script src="{{asset('assetnya/js/knob/jquery.knob.js')}}"></script>
    <script src="{{asset('assetnya/js/knob/jquery.appear.js')}}"></script>
    <script src="{{asset('assetnya/js/knob/knob-active.js')}}"></script>
    <!--  Chat JS
		============================================ -->
    <script src="{{asset('assetnya/js/chat/jquery.chat.js')}}"></script>
    <!--  todo JS
		============================================ -->
    <script src="{{asset('assetnya/js/todo/jquery.todo.js')}}"></script>
	<!--  wave JS
		============================================ -->
    <script src="{{asset('assetnya/js/wave/waves.min.js')}}"></script>
    <script src="{{asset('assetnya/js/wave/wave-active.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('assetnya/js/plugins.js')}}"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="{{asset('assetnya/js/data-table/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assetnya/js/data-table/data-table-act.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('assetnya/js/main.js')}}"></script>
	
@endsection