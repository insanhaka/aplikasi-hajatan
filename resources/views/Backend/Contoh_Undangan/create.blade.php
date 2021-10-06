@extends('Backend.Layout.app')

@section('css')
<style>
    .note-btn {
        background-color: #778beb;
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Panggilan Mempelai Putra</label>
                                <input type="text" class="form-control" id="man-nickname" name="man_nickname" placeholder="Nama Panggilan" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Panjang Mempelai Putra</label>
                                <input type="text" class="form-control" id="man-fullname" name="man_fullname" placeholder="Nama Panjang" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Orangtua Mempelai Putra</label>
                                <input type="text" class="form-control" id="man-parentname" name="man_parentname" placeholder="Contoh: Putra dari bapak romeo dan ibu juliet" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleForm21">Foto Mempelai Putra</label>
                                <div class="file-loading">
                                    <input id="input-man" name="man_photo" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Panggilan Mempelai Putri</label>
                                <input type="text" class="form-control" id="women-nickname" name="women_nickname" placeholder="Nama Panggilan" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Panjang Mempelai Putri</label>
                                <input type="text" class="form-control" id="women-fullname" name="women_fullname" placeholder="Nama Panjang" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Orangtua Mempelai Putri</label>
                                <input type="text" class="form-control" id="women-parentname" name="women_parentname" placeholder="Contoh: Putri dari bapak romeo dan ibu juliet" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleForm21">Foto Mempelai Putri</label>
                                <div class="file-loading">
                                    <input id="input-women" name="women_photo" type="file">
                                </div>
                            </div>
                        </div>
                    </div>  
                    <br> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Kalimat Pembuka</label>
                                <textarea class="form-control" id="open-editor" name="open_greeting" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Kalimat Penutup</label>
                                <textarea class="form-control" id="close-editor" name="close_greeting" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama tema" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleForm21">Gambar Contoh Undangan</label>
                                <div class="file-loading">
                                    <input id="input-b6" name="thumbnail" type="file">
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
