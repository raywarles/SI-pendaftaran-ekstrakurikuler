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
										<i class="notika-icon notika-support"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Detail Ekstrakurikuler</h2>
										<p>Sistem Informasi <span class="bread-ntd">Manajemen Ekstrakurikuler</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<a href="{{route('registrasi')}}"><button  class="btn"><i class="notika-icon notika-sent"></i> Registrasi Ekstrakurikuler</button></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Typography area start-->
    <div class="typography-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="typography-list typography-mgn">
                        <h2>{{$ambil->nama_ekskul}}</h2>
                        <div class="typography-bd">
                            <img style="display: block;margin-left: auto;margin-right: auto;width: 100%;" src="{{asset($ambil->gambar)}}" alt="" />
                            	<br>
                            {!!$ambil->deskripsi!!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="typography-list typography-mgn">
                        <h4>Ekstrakurikuler Lainnya</h4>
                        <hr>
                        <div class="typography-bd">
                            @foreach($lain as $la)
                            	<img src="{{asset($la->gambar)}}">
                            	<a href="{{route('ekskul.read',$la->slug)}}">{{$la->nama_ekskul}}</a>
                            	<hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Typography area End-->
@endsection
@section('javascript')

@endsection