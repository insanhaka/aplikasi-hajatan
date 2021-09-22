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
