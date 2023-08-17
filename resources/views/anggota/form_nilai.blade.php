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
										<h2>Penilaian Anggota : {{$siswa->nama}} <br> Tahun Ajaran : </h2>
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
                    @elseif(Session::has('errors'))
                 <div class="alert alert-danger" role="alert">{{Session::get('errors')}}</div>
                @endif
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            
                        </div>
                        <form action="{{route('nilai.simpan')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="riwayat_id" value="{{$riwayat->id}}">
                        <div class="table-responsive">
                            <p>A. Aktivitas Kegiatan Ekstrakurikuler</p>
                            <table id="" class="table table-striped table-responsive">
                                <thead>
                                    <tr style="background-color: #10334F;">
                                        <td style="color: white;">Pertanyaan</td>
                                        <td style="color: white;">S</td>
                                        <td style="color: white;">SR</td>
                                        <td style="color: white;">KD</td>
                                        <td style="color: white;">TP</td>
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr>
                                        <td style="font-weight: bold;">Kehadiran Siswa</td>   
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @foreach($soals as $soal)
                                    
                                    @if($soal->kategori == 'A' && $soal->kriteria == '1')
                                    <tr>
                                        <td>{{$soal->soal}}</td>
                                        <td><input required type="radio" value="S" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="SR" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="KD" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="TP" name="jawaban[{{$soal->id}}]"></td>
                                    </tr>
                                    @endif
                                @endforeach
                                    <tr>
                                        <td style="font-weight: bold;">Aktivitas Religius Siswa</td>   
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @foreach($soals as $soal)
                                    
                                    @if($soal->kategori == 'A' && $soal->kriteria == '2')
                                    <tr>
                                        <td>{{$soal->soal}}</td>
                                        <td><input required type="radio" value="S" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="SR" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="KD" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="TP" name="jawaban[{{$soal->id}}]"></td>
                                    </tr>
                                    @endif
                                @endforeach
                                    <tr>
                                        <td style="font-weight: bold;">Aktivitas Sosial dan emosional dalam berbagai kegiatan   </td>   
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @foreach($soals as $soal)
                                    
                                    @if($soal->kategori == 'A' && $soal->kriteria == '3')
                                    <tr>
                                        <td>{{$soal->soal}}</td>
                                        <td><input required type="radio" value="S" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="SR" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="KD" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="TP" name="jawaban[{{$soal->id}}]"></td>
                                    </tr>
                                    @endif
                                @endforeach
                                    <tr>
                                        <td style="font-weight: bold;">Pembiasaan dan Keteladanan Karakter Siswa   </td>   
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @foreach($soals as $soal)
                                    
                                    @if($soal->kategori == 'A' && $soal->kriteria == '4')
                                    <tr>
                                        <td>{{$soal->soal}}</td>
                                        <td><input required type="radio" value="S" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="SR" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="KD" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="TP" name="jawaban[{{$soal->id}}]"></td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                                
                            </table>
                            <hr>
                            <p>B. Sikap Disiplin</p>
                            <table id="" class="table table-striped table-responsive">
                                <thead>
                                    <tr style="background-color: #10334F;">
                                        <td style="color: white;">Pertanyaan</td>
                                        <td style="color: white;">S</td>
                                        <td style="color: white;">SR</td>
                                        <td style="color: white;">KD</td>
                                        <td style="color: white;">TP</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-weight: bold;">Disiplin Positif</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @foreach($soals as $soal)
                                    
                                    @if($soal->kategori == 'B' && $soal->kriteria == '5')
                                    <tr>
                                        <td>{{$soal->soal}}</td>
                                        <td><input required type="radio" value="S" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="SR" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="KD" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="TP" name="jawaban[{{$soal->id}}]"></td>
                                    </tr>
                                    @endif
                                @endforeach
                                    <tr>
                                        <td style="font-weight: bold;">Disiplin Negatif</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @foreach($soals as $soal)
                                    
                                    @if($soal->kategori == 'B' && $soal->kriteria == '6')
                                    <tr>
                                        <td>{{$soal->soal}}</td>
                                        <td><input required type="radio" value="S" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="SR" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="KD" name="jawaban[{{$soal->id}}]"></td>
                                        <td><input required type="radio" value="TP" name="jawaban[{{$soal->id}}]"></td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                               
                                
                            </table>
                            <button type="reset" class="btn btn-danger" style="float: right;"><i class="fa fa-refresh"></i> Reset</button>
                            <button type="submit" class="btn btn-success" style="float: right;"><i class="fa fa-save"></i> Simpan</button>
                            </form>
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