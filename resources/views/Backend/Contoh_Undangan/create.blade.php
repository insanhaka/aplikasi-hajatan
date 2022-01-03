@extends('Backend.Layout.app')

@section('css')
<style>
    .note-btn {
        background-color: #778beb;
    }

    .mc-display__header {
        background-color: #546de5;
    }
    .mc-display__header h3 {
        color: #fff;
    }
    .mc-display__body {
        background-color: #778beb;
    }
    .mc-display__body h1 {
        background-color: #778beb;
    }
    .mc-table__weekday {
        color: #546de5;
    }
</style>
@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid" style="margin-top: 3%; margin-bottom: 6%;">

    <div class="card" style="border-left-width: 10px; border-left-color: #546de5; border-left-style: solid">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-primary">Tambah Data</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <br>
        <div class="card-body mt-4">
            <form method="POST" action="/dapur/contoh-undangan/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="container" style="margin-top: -10px;">
                    <div class="row select-formhide" id="select_parent">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Pilih Tema Undangan</label>
                                <select class="form-control" name="theme_id">
                                    <option value=""> -- Pilih -- </option>
                                    @foreach ($theme as $tema)
                                    <option value="{!! $tema->id !!}">{!! $tema->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card" style="border: 1px solid #ddd">
                        <div class="card-header" style="background-color: #ecf0f1">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{asset('assets/img/couple.png')}}" class="img-fluid" width="40" alt="...">
                                </div>
                                <div class="col-md-10">
                                    <h3 style="margin-top: 1%">Data Mempelai</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="background-color: #f0f6ff">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" style="color: #546de5">Nama Panggilan Mempelai Putra</label>
                                        <input type="text" class="form-control" id="man-nickname" name="man_nickname" placeholder="Nama Panggilan" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" style="color: #546de5">Nama Panjang Mempelai Putra</label>
                                        <input type="text" class="form-control" id="man-fullname" name="man_fullname" placeholder="Nama Panjang" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" style="color: #546de5">Nama Bapak Mempelai Putra</label>
                                        <input type="text" class="form-control" id="man-parentname" name="man_parentname" placeholder="Nama bapak mempelai putra" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" style="color: #546de5">Nama Ibu Mempelai Putra</label>
                                        <input type="text" class="form-control" id="man-parentname" name="man_parentname" placeholder="Nama ibu mempelai putra" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleForm21" style="color: #546de5">Foto Mempelai Putra</label>
                                        <div class="file-loading">
                                            <input id="input-man" name="man_photo" type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" style="color: #f78fb3">Nama Panggilan Mempelai Putri</label>
                                        <input type="text" class="form-control" id="women-nickname" name="women_nickname" placeholder="Nama Panggilan" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" style="color: #f78fb3">Nama Panjang Mempelai Putri</label>
                                        <input type="text" class="form-control" id="women-fullname" name="women_fullname" placeholder="Nama Panjang" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" style="color: #f78fb3">Nama Bapak Mempelai Putri</label>
                                        <input type="text" class="form-control" id="women-parentname" name="women_parentname" placeholder="Nama bapak mempelai putri" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" style="color: #f78fb3">Nama Ibu Mempelai Putri</label>
                                        <input type="text" class="form-control" id="women-parentname" name="women_parentname" placeholder="Nama ibu mempelai putri" required>
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleForm21" style="color: #f78fb3">Foto Mempelai Putri</label>
                                        <div class="file-loading">
                                            <input id="input-women" name="women_photo" type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>

                    <div class="card" style="border: 1px solid #ddd">
                        <div class="card-header" style="background-color: #ecf0f1">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{asset('assets/img/datetime.png')}}" class="img-fluid" width="40" alt="...">
                                </div>
                                <div class="col-md-10">
                                    <h3 style="margin-top: 1%">Data Acara</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="background-color: #f0f6ff">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tanggal Akad Nikah</label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="tan" name="akad_date" placeholder="Tanggal Akad">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Waktu Akad Nikah</label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="wan" name="akad_time" placeholder="Waktu Akad">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-clock" aria-hidden="true"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tempat Akad</label>
                                        <input type="text" class="form-control" id="place" name="place" placeholder="Nama tempat akad" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Alamat Tempat Akad</label>
                                        <textarea class="form-control" id="akad-address" name="akad_address" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tanggal Resepsi</label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="tr" name="resepsi_date" placeholder="Tanggal Akad">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Waktu Resepsi</label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="resepsi_time" id="wr" placeholder="Waktu Akad">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-clock" aria-hidden="true"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tempat Resepsi</label>
                                        <input type="text" class="form-control" id="place" name="place" placeholder="Nama tempat akad" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Alamat Tempat Resepsi</label>
                                        <textarea class="form-control" id="akad-address" name="akad_address" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Google map embeded code</label>
                                        <textarea class="form-control" id="google-map" name="google_map" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="border: 1px solid #ddd">
                        <div class="card-header" style="background-color: #ecf0f1">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{asset('assets/img/gallery.png')}}" class="img-fluid" width="40" alt="...">
                                </div>
                                <div class="col-md-10">
                                    <h3 style="margin-top: 1%">Galeri Foto</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="background-color: #f0f6ff">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleForm21">Upload Foto Kenangan</label>
                                        <div class="file-loading">
                                            <input id="gal-pict" name="pict" type="file" multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="float: right; margin-top: 20px;">
                                <input class="btn btn-primary" type="submit" value="Simpan">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $("#contoh-undangan").addClass("active");
    });
</script>

<script>
    $(document).ready(function () {
        const datePickerOne = MCDatepicker.create({ 
            el: '#tan',
            dateFormat: 'dd-mm-YYYY',
        })

        const datePickerTwo = MCDatepicker.create({ 
            el: '#tr',
            dateFormat: 'dd-mm-YYYY',
        })
    })
</script>

<script>
    $(document).ready(function () {
        $(function () {
            $('#wan').timepicker();
        });

        $(function () {
            $('#wr').timepicker();
        });
    })
</script>

<script>
    $(document).ready(function() {
        $("#input-man").fileinput({
            showUpload: false,
            dropZoneEnabled: false,
            maxFileCount: 10,
            // mainClass: "input-group-lg"
        });
        $("#input-women").fileinput({
            showUpload: false,
            dropZoneEnabled: false,
            maxFileCount: 10,
            // mainClass: "input-group-lg"
        });
        $("#gal-pict").fileinput({
            showUpload: false,
            dropZoneEnabled: false,
            maxFileCount: 10,
            // mainClass: "input-group-lg"
        });
    });
</script>

<script>
    var editor = new FroalaEditor('#open-editor', {
        imageUploadParam: 'gambar',
        imageUploadMethod: 'POST',
        imageUploadURL: '/dapur/article/image/upload',
        imageUploadParams: {
            froala: 'true',
            _token: "{{ csrf_token() }}",
        },

        videoUploadParam: 'video',
        videoUploadMethod: 'POST',
        videoUploadURL: '/dapur/article/video/upload',
        videoMaxSize: 1000 * 1280 * 720,
        videoUploadParams: {
            froala: 'true',
            _token: "{{ csrf_token() }}",
        }
    });
</script>

<script>
    var editor = new FroalaEditor('#close-editor', {
        imageUploadParam: 'gambar',
        imageUploadMethod: 'POST',
        imageUploadURL: '/dapur/article/image/upload',
        imageUploadParams: {
            froala: 'true',
            _token: "{{ csrf_token() }}",
        },

        videoUploadParam: 'video',
        videoUploadMethod: 'POST',
        videoUploadURL: '/dapur/article/video/upload',
        videoMaxSize: 1000 * 1280 * 720,
        videoUploadParams: {
            froala: 'true',
            _token: "{{ csrf_token() }}",
        }
    });
</script>

@endsection
