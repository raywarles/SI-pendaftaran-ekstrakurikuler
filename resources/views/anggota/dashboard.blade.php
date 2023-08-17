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
                     <div class="normal-table-list ">
                        <div class="basic-tb-hd">
                            <button style="float: right;" class="btn btn-teal teal-icon-notika btn-reco-mg btn-button-mg" data-toggle="modal" data-target="#myModalone"><i class="fa fa-plus"></i> Mendaftar Ekskul</button>
                            <h2>Ekstrakurikuler Saya</h2>

                            <p>Hubungi Pembina Untuk Pindah Ekstrakurikuler</p>

                        </div>
                        <div class="bsc-tbl-hvr">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ekstrakurikuler</th>
                                        <th>Periode</th>
                                        <th>Nilai</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0; ?>
                                    @foreach($riwayat as $ri)
                                        <?php 
                                            $sem = App\Models\Semester::find($ri->semester_id);
                                            $eks = App\Models\Ekstrakurikuler::find($ri->ekstrakurikuler_id);
                                            $cek2 = App\Models\Jawaban::where('riwayat_id',$ri->id)->first();
                                        ?>
                                    <tr>
                                        <td>{{$no+=1}}</td>
                                        <td>{{$eks->nama_ekskul}}</td>
                                        <td>{{$sem->semester}} {{$sem->tahun}}</td>
                                        <td>
                                            @if($cek2)
                                                <a style="float: left;" href="/show-nilai/{{$ri->id}}" class="btn btn-success notika-btn-success waves-effect"><i class="fa fa-eye"></i> Lihat Nilai</a>
                                            @else
                                                Belum Ada Nilai
                                            @endif
                                        </td>
                                        <td>{{$ri->status_pendaftaran}}</td>
                                        <td>
                                            @if($ri->status_pendaftaran == 'Diverifikasi')
                                            <a href="/informasi-ekskul/{{$sem->id}}/{{$eks->id}}" class="btn btn-lightblue lightblue-icon-notika btn-reco-mg btn-button-mg waves-effect"><i class="notika-icon notika-next"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 accordion-wn-wp">
                    <div class="widget-tabs-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="blog-img">
                        	@if(isset($data->avatar))
                            <img src="{{asset($data->avatar)}}" alt="" />
                            @else
                            <img src="assetnya/images/User-Profile-PNG-Image.png" alt="" />
                            @endif
                        </div>
                        <div class="blog-ctn">
                            <div class="blog-hd-sw">
								<h2 align="center"> Hi! <font color="#28608F">{{$data->nama}}</font></h2>
                            <hr>
							</div>
                        </div>
                    </div>
                    <div class="accordion-stn">
                        <div class="panel-group" data-collapse-color="nk-green" id="accordionGreen" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-collapse notika-accrodion-cus">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-one" aria-expanded="true">
												Edit Profil Siswa
											</a>
                                    </h4>
                                </div>
                                <div id="accordionGreen-one" class="collapse in" role="tabpanel">
                                    <div class="panel-body">
                                       <form action="{{route('anggota.gantiProfil')}}" method="POST" enctype="multipart/form-data">
                                       	@csrf
                                       	<input type="hidden" name="anggota_id" value="{{$data->id}}">
                                       	<div class="cmp-tb-hd bsc-smp-sm">
		                                    <label>Nama Siswa : </label>
		                                </div>
		                                <div class="form-group">
		                                    <div class="nk-int-st">
		                                        <input  type="text" name="old_name" class="form-control input-md" value="{{$data->nama}}" placeholder="Nama">
		                                        @if ($errors->has('old_pass'))
		                                          <li><p style="color: red">{{ $errors->first('old_pass') }}</p></li>
		                                       @endif
		                                    </div>
		                                </div>
                                        <div class="cmp-tb-hd bsc-smp-sm">
                                            <label>NIS :</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                 <input  type="text" name="old_nis" class="form-control input-md" value="{{$data->nis}}" placeholder="NIS">
                                                @if ($errors->has('new_pass'))
                                                  <li><p style="color: red">{{ $errors->first('new_pass') }}</p></li>
                                               @endif
                                            </div>
                                        </div>
		                                <div class="cmp-tb-hd bsc-smp-sm">
		                                    <label>Email :</label>
		                                </div>
		                                <div class="form-group">
		                                    <div class="nk-int-st">
		                                         <input  type="email" name="old_email" class="form-control input-md" value="{{$data->email}}" placeholder="email">
		                                        @if ($errors->has('new_pass'))
		                                          <li><p style="color: red">{{ $errors->first('new_pass') }}</p></li>
		                                       @endif
		                                    </div>
		                                </div>
                                        <div class="cmp-tb-hd bsc-smp-sm">
                                            <label>Jenis Kelamin :</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <select name="old_jk" class="form-control">
                                                    <option>{{$data->jk}}</option>
                                                    <option>Laki-laKi</option>
                                                    <option>Perempuan</option>
                                                </select>
                                                @if ($errors->has('new_pass'))
                                                  <li><p style="color: red">{{ $errors->first('new_pass') }}</p></li>
                                               @endif
                                            </div>
                                        </div>
		                                <button style="float: right;" type="submit" class="btn btn-warning" >Update Profil</button>
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
                        <div class="panel-group" data-collapse-color="nk-green" id="accordionGreen2" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-collapse notika-accrodion-cus">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordionGreen2" href="#accordionGreen-two" aria-expanded="true">
                                                Ganti Password dan Foto
                                            </a>
                                    </h4>
                                </div>
                                <div id="accordionGreen-two" class="collapse in" role="tabpanel">
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

    <div class="modal fade" id="myModalone" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <hr>
                    <h2 align="center">Daftar Ulang Ekstrakurikuler</h2>
                    <hr>
                    <form action="{{route('daftar.ulang')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="anggota_id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Pilihan Ekstrakurikuler :</label>
                                </div>
                                <div class="form-group">
                                    <div class="bootstrap-select nk-int-st">
                                        <select name="ekstrakurikuler_id" id="add_fields_placeholder" class="input-md selectpicker">
                                            <option value="">-- Pilih Ekstrakurikuler --</option>
                                            @foreach($ekskuls as $eks)
                                            <option value="{{$eks->id}}">{{$eks->nama_ekskul}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Alasan Memilih EKstrakurikuler Tersebut :</label>
                                </div>
                                <div class="form-group">
                                    
                                     <div class="nk-int-st">
                                        <textarea required name="alasan" class="html-editor"></textarea>
                                        @if ($errors->has('alasan'))
                                          <li><p style="color: red">{{ $errors->first('alasan') }}</p></li>
                                       @endif
                                    </div>
                                    
                                </div>
                            </div>                                  
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" >Daftar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Contact Info area-->
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