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
<section class="headernya">
    <div class="container" style="padding-top: 5%">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-3">
                        <h2 style="margin-left: -20px">mbojo.id</h2>
                    </div>
                </div>

                <hr>

                <img src="{{asset('assets/img/header-acara-01.png')}}" class="img-fluid" alt="...">
                <br>
                <h1 class="text-center">Wedding Digital Invitation</h1>
                <center>
                <a class="btn btn-primary btn-block" href="/masuk-dapur" role="button">Login</a>
                </center>
            </div>
        </div>
    </div>
</section>
{{-- Header Section End --}}

@endsection

@section('js')

@endsection
