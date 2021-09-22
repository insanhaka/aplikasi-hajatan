<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <!-- Favicon -->
  <link rel="icon" href="{{asset('assets/img/brand/Logo-autolife2.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">

  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/iziToast.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/iziToast.min.css') }}">

  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/splide.min.css') }}"> --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

  <style type="text/css">
	.autohide{
		position: fixed;
	    top: 0;
	    right: 0;
	    left: 0;
	    width: 100%;
	    z-index: 1030;
	}
	.scrolled-down{
		transform:translateY(-100%); transition: all 0.3s ease-in-out;
	}
	.scrolled-up{
		transform:translateY(0); transition: all 0.3s ease-in-out;
	}

    .head-footer {
        margin-top: 15%;
        background-color: #e8ecfc;
    }
    .head-footer .col-md-4 {
        padding-top: 20%
    }

    #btn-subscribe {
        margin-top: 2%;
        background-color: #546de5;
        color: #fff;
        width: 50%;
        border-radius: 5px;
    }
    .btn:hover {
        color: #fff;
    }

    /* Large devices (desktops, 992px and up) */
    @media (min-width: 992px) {

        .head-footer {
            margin-top: 10%;
            background-color: #e8ecfc;
        }
        .head-footer .col-md-4 {
            padding-top: 5%
        }

    }

</style>


    @yield('css')

    <title>Home - Hajatan</title>
  </head>
  <body>

    {{-- @include('Frontend.Layout.navbar') --}}

    @yield('content')

    {{-- @include('Frontend.Layout.footer') --}}

    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <script>
      $(window).on('load', function () {
        $("#preloader").fadeOut(100);
      });
    </script>
    <!-- Argon JS -->
    <script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
    <script src="{{ asset('assets/js/iziToast.js') }}"></script>
    <script src="{{ asset('assets/js/iziToast.min.js') }}"></script>

    {{-- <script src="{{ asset('assets/js/splide.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(){

            el_autohide = document.querySelector('.autohide');

            // add padding-top to bady (if necessary)
            navbar_height = document.querySelector('.navbar').offsetHeight;
            document.body.style.paddingTop = navbar_height + 'px';

            if(el_autohide){

                var last_scroll_top = 0;
                window.addEventListener('scroll', function() {
                       let scroll_top = window.scrollY;
                   if(scroll_top < last_scroll_top) {
                        el_autohide.classList.remove('scrolled-down');
                        el_autohide.classList.add('scrolled-up');
                    }
                    else {
                        el_autohide.classList.remove('scrolled-up');
                        el_autohide.classList.add('scrolled-down');
                    }
                    last_scroll_top = scroll_top;

                });
                // window.addEventListener

            }
            // if

        });
    </script>

    @yield('js')

  </body>
</html>
