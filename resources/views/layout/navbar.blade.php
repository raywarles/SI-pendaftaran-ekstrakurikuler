<div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li class="" ><a style="color: #19ADC4;"  href="/home"><i class="notika-icon notika-house"></i> Home</a>
                                </li>
                                <li ><a style="color: #19ADC4;"  href="/home#ekskul"><i class="notika-icon notika-mail"></i> Ekstrakurikuler</a>
                                </li>
                                <li ><a style="color: #19ADC4;"  href="/home#prestasi"><i class="notika-icon notika-edit"></i> Prestasi</a>
                                </li>
                                <li ><a style="color: #19ADC4;"  href="/home#galeri"><i class="notika-icon notika-picture"></i> Galeri</a>
                                </li>
                                @if(Session::get('login') == false)
                                <li class="" style="float: right;"><a style="color: #19ADC4;" href="{{route('login')}}"><i class="notika-icon notika-next"></i> Masuk / Daftar</a>
                                </li>
                                @endif
                                @if(Session::get('login') == true)
                                    @if(Session::get('level') == 'Operator')
                                    <li class="{{ request()->segment(2) == 'list-ekskul' ? 'active': ''}}"><a style="color: #19ADC4;" data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Panel Operator</a>
                                        <ul id="Home" class="collapse dropdown-header-top">
                                            <li><a href="{{route('users')}}">User </a>
                                            </li>
                                            <li><a href="{{route('ekskul')}}">Ekstrakurikuler</a>
                                            </li>
                                            <li><a href="{{route('semester')}}">Semester</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @elseif(Session::get('level') == 'Pembina')
                                    <li><a style="color: #19ADC4;" data-toggle="tab" href="#mailbox"><i class="notika-icon notika-mail"></i> Panel Pembina</a>
                                        <ul id="mailbox" class="collapse dropdown-header-top">
                                            <li><a href="{{route('verifikasi.index')}}">Anggota</a>
                                            </li>
                                            <li><a href="{{route('kegiatan')}}">Kegiatan</a>
                                            </li>
                                            <li><a href="{{route('prestasi')}}">Prestasi</a>
                                            </li>
                                            <li><a href="{{route('galeri')}}">Galeri</a>
                                            </li>
                                            <li><a href="{{route('sunting.ekskul')}}">Ekstrakurikuler</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @elseif(Session::get('level') == 'Anggota')
                                    <li><a style="color: #19ADC4;" data-toggle="tab" href="#Interface"><i class="notika-icon notika-edit"></i> Panel Anggota</a>
                                        <ul id="Interface" class="collapse dropdown-header-top">
                                            <li><a href="{{route('dash.siswa')}}">Dashboard Siswa</a>
                                            </li>

                                            
                                            
                                        </ul>
                                    </li>
                                    @elseif(Session::get('level') == 'Kepala Sekolah')
                                    <li><a style="color: #19ADC4;" data-toggle="tab" href="#Interface2"><i class="notika-icon notika-edit"></i> Panel Kepala Sekolah</a>
                                        <ul id="Interface2" class="collapse dropdown-header-top">
                                            <li><a href="{{route('laporan')}}">Laporan</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @endif
                                    <li class="" style="float: right;"><a style="color: #19ADC4;" href="{{route('logout')}}"><i class="notika-icon notika-next"></i> Logout</a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
</div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container" style="background-color: #10334F;">
            <div class="row">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li  class="{{ request()->is('home') ? 'active': ''}}"><a style="color: #19ADC4;" href="/home"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li {{ request()->segment(2) == '#ekskul' ? 'active': ''}}><a style="color: #19ADC4;"  href="/home#ekskul"><i class="notika-icon notika-mail"></i> Ekstrakurikuler</a>
                        </li>
                        <li {{ request()->segment(2) == '#prestasi' ? 'active': ''}}><a style="color: #19ADC4;"  href="/home#prestasi"><i class="notika-icon notika-edit"></i> Prestasi</a>
                        </li>
                        <li {{ request()->segment(2) == '#galeri' ? 'active': ''}}><a style="color: #19ADC4;"  href="/home#galeri"><i class="notika-icon notika-picture"></i> Galeri</a>
                        </li>
                        @if(Session::get('login') == false)
                        <li class="" style="float: right;"><a style="color: #19ADC4;" href="{{route('login')}}"><i class="notika-icon notika-next"></i>  Masuk / Daftar</a>
                        </li>
                        @endif
                        @if(Session::get('login') == true)
                            @if(Session::get('level') == 'Operator')
                            <li class="{{ request()->segment(2) == 'list-ekskul' ? 'active': ''}}"><a style="color: #19ADC4;" data-toggle="tab" href="#Home1"><i class="notika-icon notika-house"></i> Panel Operator</a>
                            </li>
                            @elseif(Session::get('level') == 'Pembina')
                             <li><a style="color: #19ADC4;" data-toggle="tab" href="#mailbox2"><i class="notika-icon notika-mail"></i> Panel Pembina</a>
                            </li>
                            @elseif(Session::get('level') == 'Anggota')
                            <li><a style="color: #19ADC4;" data-toggle="tab" href="#Interface3"><i class="notika-icon notika-edit"></i> Panel Anggota</a>
                            </li>
                            @elseif(Session::get('level') == 'Kepala Sekolah')
                            <li><a style="color: #19ADC4;" data-toggle="tab" href="#Interface4"><i class="notika-icon notika-edit"></i> Panel Kepala Sekolah</a>
                            </li>
                            @endif
                            <li class="" style="float: right;"><a style="color: #19ADC4;" href="{{route('logout')}}"><i class="notika-icon notika-next"></i> Logout</a>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home1" class="tab-pane notika-tab-menu-bg animated flipInX {{(request()->is('list-ekskul') || request()->is('list-semester') || request()->is('list-user')) ? 'in active' : '' }}">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{route('users')}}">User </a>
                                </li>
                                <li><a href="{{route('ekskul')}}">Ekstrakurikuler</a>
                                </li>
                                <li><a href="{{route('semester')}}">Semester</a>
                                </li>
                                
                                
                            </ul>
                        </div>
                        <div id="mailbox2" class="tab-pane notika-tab-menu-bg animated flipInX ">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{route('verifikasi.index')}}">Anggota</a>
                                </li>
                                <li><a href="{{route('kegiatan')}}">Kegiatan</a>
                                </li>
                                <li><a href="{{route('prestasi')}}">Prestasi</a>
                                </li>
                                <li><a href="{{route('galeri')}}">Galeri</a>
                                </li>
                                <li><a href="{{route('sunting.ekskul')}}">Ekstrakurikuler</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Interface3" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{route('dash.siswa')}}">Dashboard Siswa</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Interface4" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{route('laporan')}}">Laporan</a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->