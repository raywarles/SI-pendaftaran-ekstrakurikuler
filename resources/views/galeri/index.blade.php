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
										<h2>Galeri {{$ekskul->nama_ekskul}}</h2>
										<p>Sistem Informasi <span class="bread-ntd">Manajemen Ekstrakurikuler</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalone">Tambah Galeri</button>
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
                            <h2>Table Galeri {{$ekskul->nama_ekskul}}</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Galeri</th>
                                        <th>Thumbnail</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($galeri as $keg)
                                    <tr>
                                        
                                        <td>{{$keg->nama_galeri}}</td>
                                            <td><img style="width: 100px" src="{{asset($keg->thumbnail)}}" alt=""/></td>
                                        <td>
                                            <button style="float: left;margin-right: 5px;" type="button" class="btn btn-success notika-btn-success waves-effect" data-toggle="modal" data-target="#addFoto{{$keg->id}}"><i class="fa fa-edit"></i> Tambah Foto</button>

                                            <button style="float: left;margin-right: 5px;" type="button" class="btn btn-primary notika-btn-primary waves-effect" data-toggle="modal" data-target="#seeFoto{{$keg->id}}"><i class="fa fa-eye"></i> Lihat Foto</button>

                                            <button style="float: left;margin-right: 5px;" type="button" class="btn btn-warning notika-btn-warning waves-effect" data-toggle="modal" data-target="#editModal{{$keg->id}}"><i class="fa fa-edit"></i> Edit</button>

                                            <a style="float: left;" href="{{route('galeri.delete',$keg->id)}}" class="btn btn-danger notika-btn-danger waves-effect"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                       
                                    </tr>
                                     @endforeach
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                       <th>Nama Galeri</th>
                                        <th>Thumbnail</th>
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
<!-- Modal Tambah Galeri-->
    <div class="modal fade" id="myModalone" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2>Input Galeri</h2>
                    <form action="{{route('galeri.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="ekstrakurikuler_id" value="{{$ekskul->id}}">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Nama Galeri :</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="text" name="nama_galeri" class="form-control input-md" placeholder="Nama Galeri">
                                        @if ($errors->has('nama_galeri'))
                                          <li><p style="color: red">{{ $errors->first('nama_galeri') }}</p></li>
                                       @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Gambar Tampilan :</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="file" name="thumbnail" class="form-control input-md" placeholder="thumbnail">
                                        @if ($errors->has('thumbnail'))
                                          <li><p style="color: red">{{ $errors->first('thumbnail') }}</p></li>
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
<!-- Modal Edit Galeri-->
    @foreach($galeri as $keg)
    <div class="modal fade" id="editModal{{$keg->id}}" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2>Input Galeri</h2>
                    <form action="{{route('galeri.update',$keg->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="ekstrakurikuler_id" value="{{$ekskul->id}}">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Nama Galeri :</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="text" name="nama_galeri" value="{{$keg->nama_galeri}}" class="form-control input-md" placeholder="Nama Galeri">
                                        @if ($errors->has('nama_galeri'))
                                          <li><p style="color: red">{{ $errors->first('nama_galeri') }}</p></li>
                                       @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Gambar Tampilan :</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="file" name="thumbnail" value="{{$keg->thumbnail}}" class="form-control input-md" placeholder="thumbnail">
                                        @if ($errors->has('thumbnail'))
                                          <li><p style="color: red">{{ $errors->first('thumbnail') }}</p></li>
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
<!-- Modal Tambah Foto-->
    @foreach($galeri as $keg)
    <div class="modal fade" id="addFoto{{$keg->id}}" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2>Input Foto Ke Galeri : {{$keg->nama_galeri}}</h2>
                    <form action="{{route('foto.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="galeri_id" value="{{$keg->id}}">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Keterangan :</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="text" name="keterangan"  class="form-control input-md" placeholder="Keterangan Foto">
                                        @if ($errors->has('keterangan'))
                                          <li><p style="color: red">{{ $errors->first('keterangan') }}</p></li>
                                       @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Upload Foto :</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="file" name="foto" class="form-control input-md" placeholder="foto">
                                        @if ($errors->has('foto'))
                                          <li><p style="color: red">{{ $errors->first('foto') }}</p></li>
                                       @endif
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" >Tambahkan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
<!-- Modal Lihat Foto-->
    @foreach($galeri as $keg)
    <div class="modal fade" id="seeFoto{{$keg->id}}" role="dialog">
        <div class="modal-dialog modal-large">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2>Daftar Foto Galeri : {{$keg->nama_galeri}}</h2>
                    <div class="data-table-list">

                        <div class="table-responsive">
                            <table id="data-table-basic2" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>File Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $fotos = App\Models\Foto::where('galeri_id',$keg->id)->get();
                                        $no = 0;
                                     ?>
                                    @foreach($fotos as $fot)
                                    <tr>
                                        <td>{{$no+=1}}</td>
                                        <td>{{$fot->keterangan}}</td>
                                        <td><a target="_blank" href="{{asset($fot->foto)}}">{{$fot->foto}}</a></td>
                                        <td>
                                            <a  style="float: left;" href="{{route('foto.delete',$fot->id)}}" class="btn btn-danger notika-btn-danger waves-effect"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                       
                                    </tr>
                                     @endforeach
                                    
                                </tbody>
                               
                            </table>
                        </div>
                    </div>
                        
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
                
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