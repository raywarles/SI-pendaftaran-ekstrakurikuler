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
                                        <i class="notika-icon notika-form"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Formulir Registrasi Anggota</h2>
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
    <!-- Form Element area Start-->
        <div class="form-element-area">
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
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>Input Data Diri</h2>
                        </div>
                        <form action="{{route('anggota.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>NIS :</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="text" name="nis" class="form-control input-md" placeholder="NIS Siswa">
                                        @if ($errors->has('nis'))
                                          <li><p style="color: red">{{ $errors->first('nis') }}</p></li>
                                       @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Nama Siswa :</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="text" name="nama" class="form-control input-md" placeholder="Nama Siswa">
                                        @if ($errors->has('nama'))
                                          <li><p style="color: red">{{ $errors->first('nama') }}</p></li>
                                       @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Email :</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="email" name="email" class="form-control input-md" placeholder="Email">
                                        @if ($errors->has('Email'))
                                          <li><p style="color: red">{{ $errors->first('Email') }}</p></li>
                                       @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Password :</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="password" name="password" class="form-control input-md" placeholder="password">
                                        @if ($errors->has('password'))
                                          <li><p style="color: red">{{ $errors->first('password') }}</p></li>
                                       @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Pilihan Ekstrakurikuler :</label>
                                </div>
                                <div class="form-group">
                                    <div class="bootstrap-select nk-int-st">
                                        <select multiple name="ekstrakurikuler_id[]" id="add_fields_placeholder" class="input-md selectpicker">
                                            <option value="">-- Pilih Ekstrakurikuler --</option>
                                            @foreach($ekskul as $eks)
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
                                    <label>Kelas :</label>
                                </div>
                                <div class="form-group">
                                    <div class="bootstrap-select nk-int-st">
                                        <select name="kelas" id="add_fields_placeholder" class="input-md selectpicker">
                                            <option>-- Pilih Kelas --</option>
                                            <option>X</option>
                                            <option>XI</option>
                                            <option>XII</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Jenis Kelamin :</label>
                                </div>
                                <div class="form-group">
                                    <div class="bootstrap-select nk-int-st">
                                        <select name="jk" id="add_fields_placeholder" class="input-md selectpicker">
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Jurusan :</label>
                                </div>
                                <div class="form-group">
                                    <div class="bootstrap-select nk-int-st">
                                        <select name="jurusan" id="add_fields_placeholder" class="input-md selectpicker">
                                            <option>-- Pilih Jurusan --</option>
                                            <option>IPA 1</option>
                                            <option>IPA 2</option>
                                            <option>IPA 3</option>
                                            <option>IPA 4</option>
                                            <option>IPA 5</option>
                                            <option>IPS 1</option>
                                            <option>IPS 2</option>
                                            <option>IPS 3</option>
                                            <option>IPS 4</option>
                                            <option>IPS 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Alasan Memilih Ekstrakurikuler Tersebut :</label>
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
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" style="float: right;margin-left: 4px;" class="btn btn-success notika-btn-success waves-effect">Simpan</button>
                                 <a style="float: right;" href="{{route('ekskul')}}" class="btn btn-danger notika-btn-danger waves-effect">Batal</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="summernote-area">
        <div class="container">
            <div class="row">
                
            </div>
        </div>
    </div>
            </div>
 
        </div>
    </div>
    <!-- Form Element area End-->
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