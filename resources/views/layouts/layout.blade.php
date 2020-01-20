<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Bintang j Tobing" />
    <meta name="description"
        content="BTSA Logistics adalah Expedisi, EMKL, EMKU & Custom Clearance di Indonesia. Berada di Jakarta, Medan, Surabaya, Semarang, Palembang, Pekan Baru, Bali,  Makasar dan Lombok.">
    <link rel="shortcut icon"
        href="https://res.cloudinary.com/btsa-co-id/image/upload/v1541503574/jscsstxtfiledll/icon/starlogo.ico">
    <meta name="keywords"
        content="PPJK, EMKL, Expedisi, Export-Import, Custom Clearance, BTSA, BTSA LOGISTICS, Ekspedisi, Jasa Ekspedisi">
    <title>@yield('title') | BTSA LOGISTICS</title>

    <link href="{!!asset('css/new/css/plugins.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/new/css/themify-icons.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/new/css/style.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/new/css/all.css')!!}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="{!!url('https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.20/datatables.min.css')!!}">
</head>

<body>

    <div class="body-inner">

        <header id="header" data-transparent="true" data-fullwidth="true" class="header-always-fixed">
            <div class="header-inner">
                <div class="container">

                    <div id="logo">
                        <a href="/">
                            <img src="{!!asset('storage/img/brandlogo.png')!!}" alt="">
                            {{-- <span class="logo-dark">{{asset('storage/img/brandbtsa.png')}}</span> --}}
                        </a>
                    </div>
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>

                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li class="dropdown-submenu"><a href="#">Tentang kami</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="https://btsa.co.id/#aboutus">SIAPA KAMI?</a></li>
                                            <li><a href="https://btsa.co.id/#visimisi">VISI & MISI</a></li>
                                            <li><a href="https://btsa.co.id/#values">NILAI KAMI</a></li>
                                            <li><a href="https://btsa.co.id/#ourservices">JASA KAMI</a></li>
                                            <li><a href="https://btsa.co.id/#why">MENGAPA KAMI?</a></li>
                                            <li><a href="https://btsa.co.id/#contact">KANTOR KAMI</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="https://btsa.co.id/gallery.html">GALERI</a></li>
                                    <li><a href="https://btsa.co.id/candidate">APPLY JOB</a></li>
                                    @if(Auth::check())
                                    <li class="dropdown-submenu">
                                        <a href="#">{{auth()->user()->nama_depan}} {{auth()->user()->nama_belakang}}
                                            <i class="fas fa-user-circle"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/member/{{auth()->user()->id}}/edit">Account settings</a></li>
                                            <li><a href="/logout">Logout</a></li>
                                        </ul>
                                    </li>
                                    @else
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <section id="page-title" data-bg-parallax="{!!asset('storage/img/bg.jpg')!!}">
            <div class="container">
                <div class="page-title">
                    <h1>@yield('title')</h1>
                    {{-- <div class="breadcrumb">
                        <ul>
                            <li><a href="https://btsa.co.id">Home</a>
                            </li>
                            <li><a href="/dashboard">Customer dashboard</a>
                            </li>
                            <li class="active"><a href="/">@yield('title')</a>
                            </li>
                        </ul>
                    </div><br> --}}
                </div>
            </div>
        </section>
        @if(Auth::check())
        <div class="page-menu menu-creative">
            <div class="container">
                <nav>
                    <ul>
                        <li class="@yield('statusdashboard')"><a href="/dashboard">Home</a></li>
                        <li class="@yield('statususer')"><a href="/member">User management</a></li>
                        <li class="@yield('statuspacking')"><a
                                href="/packing-list/{{auth()->user()->CustomerID}}">Packing list</a></li>
                        <li><a href="/logout"><span class="ti-power-off"></span> Logout</a></li>
                    </ul>
                </nav>
                <div id="pageMenu-trigger">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </div>
        @else
        @endif
        @yield('content')

        <footer id="footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="widget">
                                <div class="widget-title">KANTOR KAMI</div>
                                <h4>PT. BERLIAN TANGGUH SEJAHTERA</h4>
                                <p>Williem Iskandar Komp. MMTC B 84-85<br>
                                    Medan Estate, Deli Serdang Medan 20371<br>
                                    <a href="tel:06180032999">(061) 8003 2999</a> | Fax. (061) 8003 2996<br>
                                    <span class="ti-email"></span> <a
                                        href="mailto:market@btsa.co.id">market@btsa.co.id</a><br>
                                    <span class="ti-email"></span> <a
                                        href="mailto:sales_ap@btsa.co.id">sales_ap@btsa.co.id</a>
                                </p>
                                <h4>PT. SUMBER TRANSTAR ABADI</h4>
                                <p>Jalan Veteran No.173C Kec.Ilir Timur I,<br>
                                    Kel. Kepandean Baru - Palembang 31025<br>
                                    <a href="tel:0711354811">(0711) 354811</a> | Fax. (0711) 358880<br>
                                    <span class="ti-email"></span> <a
                                        href="mailto:welly@stalogistics.co.id">welly@stalogistics.co.id</a><br>
                                    <span class="ti-email"></span> <a
                                        href="mailto:wel_gun8@yahoo.com">wel_gun8@yahoo.com</a>
                                </p>
                                <h4>PT. PANCA LESTARI PESTINDO</h4>
                                <p>Jalan Williem Iskandar Komp. MMTC C 93-94<br>
                                    Medan Estate, Deli Serdang Medan 20371<br>
                                    <a href="tel:0711354811">(061) 8003 3461</a> | <a href="tel:081262142299">(+62) 812
                                        6214 2299</a><br>
                                    <span class="ti-email"></span> <a
                                        href="mailto:market@plpestindo.co.id">market@plpestindo.co.id</a><br>
                                    <span class="ti-email"></span> <a
                                        href="mailto:plpestindo@gmail.com">plpestindo@gmail.com</a>
                                </p>
                                <h4>HUBUNGI KAMI</h4>
                                <p>Kamu dapat mengirim pesan lewat email kami untuk mendapatkan penawaran yang terbaik.
                                </p>
                                <div class="social-icons social-icons-colored social-icons-rounded float-left">
                                    <ul>
                                        <li class="social-facebook"><a href="https://www.facebook.com/BTSALogistics/"><i
                                                    class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="social-instagram"><a
                                                href="https://www.instagram.com/btsalogistics"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li class="social-youtube"><a
                                                href="https://www.youtube.com/channel/UCxwory52I5zlEF5I5zv9STQ"><i
                                                    class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 m-t-20">
                            <div class="widget"
                                style="background-image: url('{!!asset('storage/img/world-map-dark.png')!!}'); background-position: 50% 20px; background-repeat: no-repeat">
                                <div class="widget-title"></div>
                                <h4>PT BERLIAN TRANSTAR ABADI</h4>
                                <p><strong>Medan</strong><br>
                                    Jalan Williem Iskandar Komp. MMTC C 93-94<br>
                                    Medan Estate, Deli Serdang Medan 20371<br>
                                    <a href="tel:06180033461">(061) 8003 3461</a> | Fax. (061) 8003 2996<br>
                                    <span class="ti-email"></span> <a
                                        href="mailto:market@btsa.co.id">market@btsa.co.id</a></p>
                                <p><strong>Jakarta</strong><br>
                                    Ruko Gading Bukit Indah Blok SB No.25<br>
                                    Jl. Raya Gading Kirana, RT.18/RW.8<br>
                                    Kelapa Gading Barat, Jakarta Utara 14240<br>
                                    <a href="tel:02145854261">(021) 4585 4261</a> | Fax. (061) 8003 2996<br>
                                    <span class="ti-email"></span> <a
                                        href="mailto:market@btsa.co.id">market@btsa.co.id</a></p>
                                <p><strong>Surabaya</strong><br>
                                    Jl. Kalimas Baru Blok A-8 No.29, Perak Utara, Kec. Pabean Cantian<br>
                                    Kota SBY, Jawa Timur 60165<br>
                                    <a href="tel:02145854261">(021) 4585 4261</a> | Fax. (061) 8003 2996<br>
                                    <span class="ti-email"></span> <a
                                        href="mailto:market@btsa.co.id">market@btsa.co.id</a></p>
                                <p><strong>Makassar</strong><br>
                                    Jalan gunung latimojong<br>
                                    Ruko latimojong indah blok A - 28<br>
                                    <a href="tel:04113633366">(0411) 363 3366</a> | Fax. (061) 8003
                                    2996<br>
                                    <span class="ti-email"></span> <a
                                        href="mailto:market@btsa.co.id">market@btsa.co.id</a></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="widget">
                                <div class="widget-title">Lokasi kami</div>
                                <div class="map" data-latitude="3.603072" data-longitude="98.709327" data-style="light">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">&copy; 2019 BTSA LOGISTICS.
                        All Rights Reserved.<a href="//www.infinitysolutions.co.id" target="_blank"> Infinity
                            Solutions</a> </div>
                </div>
            </div>
        </footer>

    </div>

    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

    <script src="{!!asset('js/jquery.js')!!}"></script>
    <script src="{!!asset('js/plugins.js')!!}"></script>
    <script src="{!!asset('js/functions.js')!!}"></script>
    <script type="text/javascript" src="{!!asset('js/gmap3.min.js')!!}"></script>
    <script type="text/javascript" src="{!!asset('js/map-styles.js')!!}"></script>
    <script>
        $(document).ready(function () {
            $('#tableDashboard').DataTable();
        });

    </script>
    <script>
        $(document).ready(function () {
            $('#memberTables').DataTable();
        });

    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript"
        src="{!!url('https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.20/datatables.min.js')!!}">
    </script>
    <script type='text/javascript'
        src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAZIus-_huNW25Jl7RPmHgoGZjD5udgBMI'></script>

</body>

</html>
