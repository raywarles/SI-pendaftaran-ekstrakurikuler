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
										<h2>Laporan</h2>
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
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Tahun</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td>Laporan Anggota Per Ekstrakurikuler</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaltwo">Unduh Laporan</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Laporan Jumlah Anggota </td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaltwo2">Unduh Laporan</button>
                                        </td>
                                    </tr>
                                    <!--
                                    <tr>
                                        <td>3</td>
                                        <td>Laporan Kegiatan Ekstrakurikuler</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaltwo3">Unduh Laporan</button>
                                        </td>
                                    </tr>
                                   	-->
                                    <tr>
                                        <td>3</td>
                                        <td>Laporan Prestasi Ekstrakurikuler</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaltwo4">Unduh Laporan</button>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModaltwo" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2 align="center">Detail Laporan</h2>
                    <hr>
                    <form method="POST" target="_blank" action="{{route('laporan.anggota')}}">
                        @csrf
                        <div class="cmp-tb-hd bsc-smp-sm">
                            <label>Pilihan Ekstrakurikuler :</label>
                        </div>
                        <div class="form-group">
                            <div class="bootstrap-select nk-int-st">
                                <select name="ekstrakurikuler_id" id="add_fields_placeholder" class="input-md selectpicker">
                                    <option value="">-- Pilih Ekstrakurikuler --</option>
                                    @foreach($ekskul as $eks)
                                    <option value="{{$eks->id}}">{{$eks->nama_ekskul}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                 
                        <div class="cmp-tb-hd bsc-smp-sm">
                            <label>Periode Ekstrakurikuler :</label>
                        </div>
                        <div class="form-group">
                            <div class="bootstrap-select nk-int-st">
                                <select name="semester_id" id="add_fields_placeholder" class="input-md selectpicker">
                                    <option value="">-- Pilih Periode --</option>
                                    @foreach($semester as $sem)
                                    <option value="{{$sem->id}}">{{$sem->semester}} - {{$sem->tahun}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                          
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Unduh</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModaltwo2" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2 align="center">Detail Laporan</h2>
                    <hr>
                    <form method="POST" target="_blank" action="{{route('laporan.jumlah')}}">
                        @csrf
                        <div class="cmp-tb-hd bsc-smp-sm">
                            <label>Periode Ekstrakurikuler :</label>
                        </div>
                        <div class="form-group">
                            <div class="bootstrap-select nk-int-st">
                                <select name="semester_id" id="add_fields_placeholder" class="input-md selectpicker">
                                    <option value="0">-- Pilih Periode --</option>
                                    @foreach($semester as $sem)
                                    <option value="{{$sem->id}}">{{$sem->semester}} - {{$sem->tahun}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" >Unduh</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModaltwo3" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2 align="center">Detail Laporan</h2>
                    <hr>
                    <form method="POST" target="_blank" action="{{route('laporan.kegiatan')}}">
                        @csrf
                        <div class="cmp-tb-hd bsc-smp-sm">
                            <label>Pilihan Ekstrakurikuler :</label>
                        </div>
                        <div class="form-group">
                            <div class="bootstrap-select nk-int-st">
                                <select name="ekstrakurikuler_id" id="add_fields_placeholder" class="input-md selectpicker">
                                    <option value="">-- Pilih Ekstrakurikuler --</option>
                                    @foreach($ekskul as $eks)
                                    <option value="{{$eks->id}}">{{$eks->nama_ekskul}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                 
                        <div class="cmp-tb-hd bsc-smp-sm">
                            <label>Periode Ekstrakurikuler :</label>
                        </div>
                        <div class="form-group">
                            <div class="bootstrap-select nk-int-st">
                                <select name="semester_id" id="add_fields_placeholder" class="input-md selectpicker">
                                    <option value="">-- Pilih Periode --</option>
                                    @foreach($semester as $sem)
                                    <option value="{{$sem->id}}">{{$sem->semester}} - {{$sem->tahun}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                          
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Unduh</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModaltwo4" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2 align="center">Detail Laporan</h2>
                    <hr>
                    <form method="POST" target="_blank" action="{{route('laporan.prestasi')}}">
                        @csrf
                        <div class="cmp-tb-hd bsc-smp-sm">
                            <label>Periode Ekstrakurikuler :</label>
                        </div>
                        <div class="form-group">
                            <div class="bootstrap-select nk-int-st">
                                <select name="semester_id" id="add_fields_placeholder" class="input-md selectpicker">
                                    <option value="semua">-- Pilih Periode --</option>
                                    @foreach($semester as $sem)
                                    <option value="{{$sem->id}}">{{$sem->semester}} - {{$sem->tahun}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" >Unduh</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
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
    <!--  wave JS
        ============================================ -->
    <script src="{{asset('assetnya/js/wave/waves.min.js')}}"></script>
    <script src="{{asset('assetnya/js/wave/wave-active.js')}}"></script>
    <!--  chosen JS
        ============================================ -->
    <script src="{{asset('assetnya/js/chosen/chosen.jquery.js')}}"></script>
    <!--  Chat JS
        ============================================ -->
    <script src="{{asset('assetnya/js/chat/jquery.chat.js')}}"></script>
    <!--  todo JS
        ============================================ -->
    <script src="{{asset('assetnya/js/todo/jquery.todo.js')}}"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="{{asset('assetnya/js/plugins.js')}}"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{asset('assetnya/js/main.js')}}"></script>
    <!-- tawk chat JS
        ============================================ -->
    <script src="{{asset('assetnya/js/tawk-chat.js')}}"></script>

        <script type="text/javascript">
        $(document).ready(function()
                  {
                  $("#add_fields_placeholder").change(function()
        {
            if($(this).val() == "Pembina")
        {
            $("#add_fields_placeholderValue").show();
        }
        else
        {
            $("#add_fields_placeholderValue").hide();
        }
            });
                      $("#add_fields_placeholderValue").hide();
        });

    </script>
@endsection