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
										<h2>Prestasi {{$ekskul->nama_ekskul}}</h2>
										<p>Sistem Informasi <span class="bread-ntd">Manajemen Ekstrakurikuler</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalone">Tambah Prestasi</button>
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
                            <h2>Table Prestasi {{$ekskul->nama_ekskul}}</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Prestasi</th>
                                        <th>Tahun</th>
                                        <th>keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($prestasi as $keg)
                                    <tr>
                                        
                                        <td>{{$keg->nama_prestasi}}</td>
                                            <td>{{$keg->tahun}}</td>
                                        <td>{!!substr($keg->keterangan, 0, 400)!!}</td>
                                        <td>
                                             <button style="float: left;margin-right: 5px;" type="button" class="btn btn-warning notika-btn-warning waves-effect" data-toggle="modal" data-target="#editModal{{$keg->id}}"><i class="fa fa-edit"></i> Edit</button>
                                          
                                            <a style="float: left;" href="{{route('prestasi.delete',$keg->id)}}" class="btn btn-danger notika-btn-danger waves-effect"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                       
                                    </tr>
                                     @endforeach
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Prestasi</th>
                                        <th>Jadwal</th>
                                        <th>keterangan</th>
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
    <!-- Data Table area End-->
<!-- Modal Tambah Prestasi-->
    <div class="modal fade" id="myModalone" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2>Input Prestasi</h2>
                    <form action="{{route('prestasi.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="ekstrakurikuler_id" value="{{$ekskul->id}}">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Nama Prestasi :</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="text" name="nama_prestasi" class="form-control input-md" placeholder="Nama Prestasi">
                                        @if ($errors->has('nama_prestasi'))
                                          <li><p style="color: red">{{ $errors->first('nama_prestasi') }}</p></li>
                                       @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Tahun :</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="text" name="tahun" class="form-control input-md" placeholder="Tahun">
                                        @if ($errors->has('tahun'))
                                          <li><p style="color: red">{{ $errors->first('tahun') }}</p></li>
                                       @endif
                                    </div>
                                </div>
                            </div>
                            
                           
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Deskripsi Prestasi :</label>
                                </div>
                                <div class="form-group">
                                    
                                     <div class="nk-int-st">
                                        <textarea required name="keterangan" class="html-editor"></textarea>
                                        @if ($errors->has('keterangan'))
                                          <li><p style="color: red">{{ $errors->first('keterangan') }}</p></li>
                                       @endif
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" >Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal Edit Prestasi-->
    @foreach($prestasi as $keg)
    <div class="modal fade" id="editModal{{$keg->id}}" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2>Input Prestasi</h2>
                    <form action="{{route('prestasi.update',$keg->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="ekstrakurikuler_id" value="{{$ekskul->id}}">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Nama Prestasi :</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="text" name="nama_prestasi" value="{{$keg->nama_prestasi}}" class="form-control input-md" placeholder="Nama Prestasi">
                                        @if ($errors->has('nama_prestasi'))
                                          <li><p style="color: red">{{ $errors->first('nama_prestasi') }}</p></li>
                                       @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Tahun :</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="text" name="tahun" value="{{$keg->tahun}}" class="form-control input-md" placeholder="Tahun">
                                        @if ($errors->has('tahun'))
                                          <li><p style="color: red">{{ $errors->first('tahun') }}</p></li>
                                       @endif
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Deskripsi Prestasi :</label>
                                </div>
                                <div class="form-group">
                                    
                                     <div class="nk-int-st">
                                        <textarea required name="keterangan" class="html-editor">{{$keg->keterangan}}</textarea>
                                        @if ($errors->has('keterangan'))
                                          <li><p style="color: red">{{ $errors->first('keterangan') }}</p></li>
                                       @endif
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" >Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
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