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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="{{asset('assets/img/header-acara-01.png')}}" class="img-fluid" alt="...">
                <br>
                <h1 class="text-center">Wedding Digital Invitation</h1>
                <center>
                <a class="btn btn-primary" href="/masuk-dapur" role="button">Login</a>
                </center>
            </div>
        </div>
    </div>
</section>
{{-- Header Section End --}}

@endsection

@section('js')

@endsection
