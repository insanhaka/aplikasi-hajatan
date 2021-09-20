@extends('Frontend.Layout.app')

@section('css')
    {{-- Custome CSS Landing --}}
    <link rel="stylesheet" href="{{asset('assets/css/frontend/home.css')}}">
    <style>
        .card-horizontal {
            display: flex;
            /* flex: 1 1 auto; */
        }
    </style>
@endsection

@section('content')

{{-- Header Section start --}}
<section class="headernya" style="margin-top: 2%">
    <div class="container">
        <div class="row justify-content-around">
              <div class="col-md-5" id="greating">
                  <h1>Digital Wedding Invitation.</h1>
                  <p>Solusi untuk menghemat, lebih praktis dan modern dalam menyelenggarakan acara pernikahan anda.</p>
                  <a class="btn" href="/layanan" role="button">Buat Undangan Sekarang</a>
              </div>
              <div class="col-md-6" id="greating-img">
                  <img src="{{asset('assets/img/header-acara-01.png')}}" class="img-fluid" alt="...">
              </div>
        </div>
    </div>
</section>
{{-- Header Section End --}}

{{-- Bennefit Start --}}
<h1 class="text-center mt-6">Mengapa Menggunakan Layanan Hajatan?</h1>
<br>

<section class="why">
    <div class="container">
        <div class="row justify-content-center mt-7">
            <div class="col-md-4">
                <center>
                <img src="{{asset('assets/img/sending-01.png')}}" class="img-fluid" width="320" alt="...">
                </center>
            </div>
            <div class="col-md-6" style="padding-top: 7%">
                <h2>Memberikan kabar baik ke saudara dan teman menjadi mudah dan efisien.</h2>
                <p>Dengan menggunakan undangan digital, pengiriman menjadi sangat mudah dan tepat serta menghemat penggunaan kertas.</p>
            </div>
        </div>
        <div class="row justify-content-center mt-7">
            <div class="col-md-6" style="padding-top: 7%">
                <h2>Data tamu undangan dapat dilihat dengan mudah </h2>
                <p>Tamu undangan yang berkenan hadir atau memiliki halangan untuk hadir dapat diketahui dengan mudah menggunakan visualisasi data</p>
            </div>
            <div class="col-md-4">
                <img src="{{asset('assets/img/data-tamu-01.png')}}" class="img-fluid" width="350" alt="...">
            </div>
        </div>
    </div>
</section>
{{-- Bennefit End --}}

{{-- Service Start --}}
{{-- <section class="service">
    <div class="container">
        <h1 id="service-title" class="text-center">Layanan Kami</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card" id="card-service">
                    <div class="card-body text-center">
                        <img src="{{asset('assets/img/icons/wedding-invitation.png')}}" class="img-fluid" width="80" alt="...">
                        <h4>Undangan Digital</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" id="card-service">
                    <div class="card-body text-center">
                        <img src="{{asset('assets/img/icons/buffet.png')}}" class="img-fluid" width="80" alt="...">
                        <h4>Makanan Atau Snack</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" id="card-service">
                    <div class="card-body text-center">
                        <img src="{{asset('assets/img/icons/flags.png')}}" class="img-fluid" width="80" alt="...">
                        <h4>Dekorasi</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- Service End --}}

{{-- Product Section start --}}
{{-- <section class="produk">
    <div class="container">
        <h1 id="produk-title">Produk Terbaru</h1>
        <div id="splide" class="splide">

            <div class="splide__track">
                <ul class="splide__list">

                    <li class="splide__slide">
                        <div class="card flex-fill" id="card-product">
                            <img src="{{asset('assets/img/sample.jpeg')}}" class="img-fluid" alt="...">
                            <div class="card-body">
                                <h3>Lorem Ipsum</h3>
                                <small>Kategori : SmartHome</small>
                            </div>
                            <div class="card-footer text-muted">
                                <a href="#" class="btn" id="detail-button">Detail</a>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="card flex-fill" id="card-product">
                            <img src="{{asset('assets/img/sample.jpeg')}}" class="img-fluid" alt="...">
                            <div class="card-body">
                                <h3>Lorem Ipsum</h3>
                                <small>Kategori : SmartHome</small>
                            </div>
                            <div class="card-footer text-muted">
                                <a href="#" class="btn" id="detail-button">Detail</a>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="card flex-fill" id="card-product">
                            <img src="{{asset('assets/img/sample.jpeg')}}" class="img-fluid" alt="...">
                            <div class="card-body">
                                <h3>Lorem Ipsum</h3>
                                <small>Kategori : SmartHome</small>
                            </div>
                            <div class="card-footer text-muted">
                                <a href="#" class="btn" id="detail-button">Detail</a>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="card flex-fill" id="card-product">
                            <img src="{{asset('assets/img/sample.jpeg')}}" class="img-fluid" alt="...">
                            <div class="card-body">
                                <h3>Lorem Ipsum</h3>
                                <small>Kategori : SmartHome</small>
                            </div>
                            <div class="card-footer text-muted">
                                <a href="#" class="btn" id="detail-button">Detail</a>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="card flex-fill" id="card-product">
                            <img src="{{asset('assets/img/sample.jpeg')}}" class="img-fluid" alt="...">
                            <div class="card-body">
                                <h3>Lorem Ipsum</h3>
                                <small>Kategori : SmartHome</small>
                            </div>
                            <div class="card-footer text-muted">
                                <a href="#" class="btn" id="detail-button">Detail</a>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</section> --}}
{{-- Product Section end --}}

{{-- About Section start --}}
{{-- <section class="aboutku">
<div class="container">
  <h1 class="text-center" id="about-title">Tentang Kami</h1>
  <div class="row justify-content-between">
    <div class="col-md-5">
      <img src="{{asset('assets/img/team.png')}}" class="img-fluid" alt="...">
    </div>
    <div class="col-md-6" style="padding-top: 10%">
      <p>Autolife selalu berupaya untuk memecahkan permasalahan disekitar kita. Didirikan pada tahun 2020, Autolife berkomitmen untuk berkontribusi dalam upaya memajukan Teknologi dan Digitalisasi di Indonesia.</p>
      <a class="btn" href="/tentang-kami" role="button">Selengkapnya</a>
    </div>
  </div>
</div>
</section> --}}
{{-- About Section end --}}

{{-- Services Section Start --}}
{{-- <section class="services" style="margin-top: 10%">
    <div class="container">
        <h1 id="produk-title">Layanan</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="card" style="margin-bottom: 2%; border-radius: 30px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2); -webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2); -moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);">
                    <div class="card-body">
                        <center>
                        <img src="{{asset('menus_icon/'.$kategori_info->icon)}}" class="img-fluid" width="50" alt="...">
                        <br><br>
                        <h6>Pelatihan</h6>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- Services Section End --}}


{{-- Fitur Section start --}}
{{-- <section class="blog">
    <div class="container">
        <h1 class="text-center" id="blog-title">Blog</h1>
        <div class="row">

            <div class="col-md-6">
                <a href="#">
                    <div class="card bg-dark text-white" sty3e="border-width: 0; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
                    -webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
                    -moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <img src="{{asset('assets/img/sample.jpeg')}}" class="card-img-top img-fluid" alt="..." style="width: 100%; height: 500px; object-fit: cover;">
                        <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, 0.31); padding-top: 70%; padding-bottom: 10%; padding-right: 7%; padding-left: 7%">
                            <h1 style="color: #fff">Lorem Ipsum</h1>
                            <small style="color: #ced6e0; font-size: 12px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt....</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="#" style="color: #000; text-decoration: none">
                    <div class="card" style="margin-bottom: 4%; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
                    -webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
                    -moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img src="{{asset('assets/img/sample.jpeg')}}" class="card-img-top img-fluid" alt="..." style="width: 170px; height: 110px; object-fit: cover;">
                            </div>
                            <div class="card-body" style="margin-top: -2%">
                                <h5>Lorem Ipsum</h5>
                                <small style="color: #ced6e0; font-size: 10px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt....</small>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#" style="color: #000; text-decoration: none">
                    <div class="card" style="margin-bottom: 4%; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
                    -webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
                    -moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img src="{{asset('assets/img/sample.jpeg')}}" class="card-img-top img-fluid" alt="..." style="width: 170px; height: 110px; object-fit: cover;">
                            </div>
                            <div class="card-body" style="margin-top: -2%">
                                <h5>Lorem Ipsum</h5>
                                <small style="color: #ced6e0; font-size: 10px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt....</small>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#" style="color: #000; text-decoration: none">
                    <div class="card" style="margin-bottom: 4%; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
                    -webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
                    -moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img src="{{asset('assets/img/sample.jpeg')}}" class="card-img-top img-fluid" alt="..." style="width: 170px; height: 110px; object-fit: cover;">
                            </div>
                            <div class="card-body" style="margin-top: -2%">
                                <h5>Lorem Ipsum</h5>
                                <small style="color: #ced6e0; font-size: 10px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt....</small>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#" style="color: #000; text-decoration: none">
                    <div class="card" style="margin-bottom: 4%; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
                    -webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
                    -moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img src="{{asset('assets/img/sample.jpeg')}}" class="card-img-top img-fluid" alt="..." style="width: 170px; height: 110px; object-fit: cover;">
                            </div>
                            <div class="card-body" style="margin-top: -2%">
                                <h5>Lorem Ipsum</h5>
                                <small style="color: #ced6e0; font-size: 10px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt....</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section> --}}
{{-- Fitur Section end --}}


@endsection

@section('js')

<script>
        new Splide( '#splide', {
            type   : 'loop',
            fixedWidth: '20rem',
            perPage: 4,
	        perMove: 1,
            arrows: false,
        } ).mount();
</script>

@endsection
