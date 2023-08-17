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
										<h2>Data Semester</h2>
										<p>Sistem Informasi <span class="bread-ntd">Manajemen Ekstrakurikuler</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<a href="{{route('semester.create')}}"><button  class="btn"><i class="notika-icon notika-sent"></i> Buat Semester</button></a>
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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            
                        </div>
                        @if(Session::has('simpan'))
             <div class="alert alert-success" role="alert">{{Session::get('simpan')}}</div>
             @elseif(Session::has('edit'))
             <div class="alert alert-warning" role="alert">{{Session::get('edit')}}</div>
             @elseif(Session::has('hapus'))
             <div class="alert alert-danger" role="alert">{{Session::get('hapus')}}</div>
                @elseif(Session::has('errors'))
             <div class="alert alert-danger" role="alert">{{Session::get('errors')}}</div>
            @endif
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Semester</th>
                                        <th>Tahun</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($semester as $user)
                                    <tr>
                                        <td>{{$user->semester}}</td>
                                        <td>{{$user->tahun}}</td>
                                        <td>
                                            @if($user->status == '1')
                                                Aktif
                                            @else
                                                Non Aktif
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->status == '0')
                                            <a style="float: right;margin-left: 2px;width: 95px" href="{{route('semester.aktif',$user->id)}}" class="btn btn-success notika-btn-success waves-effect"><i class="fa fa-check"></i> Aktif</a>
                                            @else
                                            <a style="float: right;margin-left: 2px" href="{{route('semester.nonaktif',$user->id)}}" class="btn btn-warning notika-btn-warning waves-effect"><i class="fa fa-close"></i> Non Aktif</a>
                                            @endif
                                            @if($user->status=='0')
                                            <a style="float: right;" href="{{route('semester.delete',$user->id)}}" class="btn btn-danger notika-btn-danger waves-effect"><i class="fa fa-trash"></i> Hapus</a>
                                            @endif  
                                        </td>
                                    </tr>
                                   	@endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
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
    <!-- sparkline JS
		============================================ -->
    <script src="{{asset('assetnya/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assetnya/js/sparkline/sparkline-active.js')}}"></script>
    <!-- flot JS
		============================================ -->
    <script src="{{asset('assetnya/js/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assetnya/js/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assetnya/js/flot/flot-active.js')}}"></script>
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
	<!-- tawk chat JS
		============================================ -->
    <script src="{{asset('assetnya/js/tawk-chat.js')}}"></script>
@endsection