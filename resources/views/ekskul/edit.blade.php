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
                                        <h2>Formulir Edit Ekstrakurikuler</h2>
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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>Edit Data Ekstrakurikuler : {{$data->nama_ekskul}}</h2>
                        </div>
                        <form action="{{route('ekskul.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Nama Ekstrakurikuler</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input required type="text" name="nama_ekskul" class="form-control input-md" value="{{$data->nama_ekskul}}" placeholder="Nama Ekstrakurikuler">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Keterangan Ekstrakurikuler</label>
                                </div>
                                <div class="form-group">
                                    
                                     <div class="nk-int-st">
                                        <textarea required name="deskripsi" class="html-editor">{!!$data->deskripsi!!}</textarea>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cmp-tb-hd bsc-smp-sm">
                                    <label>Thumbnail</label>
                                </div>
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input  type="file" name="gambar" class="form-control input-md" placeholder="Nama Ekstrakurikuler">
                                        @if ($errors->has('gambar'))
                                          <li><p style="color: red">{{ $errors->first('gambar') }}</p></li>
                                       @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" style="float: right;margin-left: 4px;" class="btn btn-success notika-btn-success waves-effect">Update</button>
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