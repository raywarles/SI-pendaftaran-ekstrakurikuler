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
										<h2>Data Anggota : {{$eks->nama_ekskul}} <br> Tahun Ajaran : {{$sem->semester}} {{$sem->tahun}}</h2>
										<p>Sistem Informasi <span class="bread-ntd">Manajemen Ekstrakurikuler</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
                                    <form action="{{route('export.anggota')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="semester_id" value="{{$sem->id}}">
                                             <input type="hidden" name="ekstrakurikuler_id" value="{{$eks->id}}">
                                        <button type="submit" style="float: right;"  class="btn btn-success"><i class="notika-icon notika-sent"></i> Data Anggota</button>
                                    </form>
                                    <form action="{{route('export.nilai')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="semester_id" value="{{$sem->id}}">
                                             <input type="hidden" name="ekstrakurikuler_id" value="{{$eks->id}}">
                                        <button type="submit" style="float: right;" class="btn btn-success"><i class="notika-icon notika-sent"></i> Form Penilaian</button>
                                    </form>
                                    <form action="{{route('export.absen')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="semester_id" value="{{$sem->id}}">
                                             <input type="hidden" name="ekstrakurikuler_id" value="{{$eks->id}}">
                                        <button type="submit" style="float: right;" class="btn btn-success"><i class="notika-icon notika-sent"></i> Form Absensi</button>
                                    </form>
                                    

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
                    @elseif(Session::has('errors'))
                 <div class="alert alert-danger" role="alert">{{Session::get('errors')}}</div>
                @endif
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Kelas</th>
                                        <th>Status</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($anggota as $ang)
                                    <tr>
                                        <?php $profil = App\Models\Anggota::find($ang->anggota_id); ?>
                                        <tr>
                                            <td>{{$profil->id}}</td>
                                            <td>{{$profil->nama}}</td>
                                            <td>{{$profil->email}}</td>
                                            <td>{{$profil->kelas}} {{$profil->jurusan}}</td>
                                            <td>
                                                <span class="badge badge-danger">{{$ang->status_pendaftaran}}</span>         
                                            </td>
                                            <td>
                                                <?php 
                                                    $cek = App\Models\Riwayat::where('anggota_id',$profil->id)->where('ekstrakurikuler_id',$eks->id)->where('status_pendaftaran','Diverifikasi')->where('semester_id',$sem->id)->first();
                                                    $cek2 = App\Models\Jawaban::where('riwayat_id',$cek->id)->first();

                                                ?>
                                                @if($cek2)
                                                    <a style="float: left;" href="/show-nilai/{{$cek->id}}" class="btn btn-success notika-btn-success waves-effect"><i class="fa fa-eye"></i> Lihat Nilai</a>
                                                @else
                                                    <a style="float: left;" href="/anggota-nilai/{{$profil->id}}/{{$sem->id}}" class="btn btn-warning notika-btn-warning waves-effect"><i class="fa fa-edit"></i> Input Nilai</a>
                                                @endif
                                                
                                            </td>
                                            <td>
                                                </form>
                                                <a style="float: left;" href="{{route('verifikasi.delete',$ang->id)}}" class="btn btn-danger notika-btn-danger waves-effect"><i class="fa fa-trash"></i> Hapus</a>
                                                
                                            </td>
                                    </tr>
                                   	@endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Kelas</th>
                                        <th>Status</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
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