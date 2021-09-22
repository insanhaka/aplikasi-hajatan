@extends('Frontend.UserAuth.layout')

@section('css')

@endsection

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-50 p-b-90">
            <form class="login100-form validate-form flex-sb flex-w" action="/postdaftar" method="POST">
                @csrf
                <span class="login100-form-title p-b-51">
                    Daftar
                </span>

                <div class="wrap-input100 validate-input m-b-16" data-validate = "Name is required">
                    <input class="input100" type="text" id="name" name="name" placeholder="Nama">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
                    <input class="input100" type="text" id="username" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                </div>
                

                <div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
                    <input class="input100" type="email" id="email" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                </div>

                
                <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn m-t-17">
                    <button class="login100-form-btn" type="submit" id="buttonku">
                        Sign Up
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
@endsection


@section('js')

<script type="text/javascript">
    @if ($message = Session::get('success'))
            swal({
                title: "Registrasi berhasil !",
                text: "Silahkan login untuk akses selanjutnya.",
                icon: "success",
                button: "Oke",
                closeOnClickOutside: false,
            })
            .then((value) => {
                if(value == true){
                    window.location.href = '/masuk';
                }
            });
    @endif
</script>
<script type="text/javascript">
    @if ($message = Session::get('error'))
            iziToast.error({
                        title: 'Failed',
                        message: '{{$message}}',
                        position: 'topRight'
                    });
    @endif
</script>

@endsection