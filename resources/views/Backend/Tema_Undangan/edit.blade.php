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

    <div class="card">
        <div class="card-header">
          <h2 class="text-primary">Ubah Berita</h2>
        </div>
        <div class="card-body mt-4">
            <form method="POST" action="/dapur/tema-undangan/update/{!!$data->id!!}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="container" style="margin-top: -10px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Kode Produk</label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Kode tema undangan" required value="{!!$data->code!!}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama tema undangan" required value="{!!$data->name!!}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleForm21">Gambar Tema Undangan</label>
                                <div class="file-loading">
                                    <input id="input-b6" name="thumbnail" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="float: right; margin-top: 20px;">
                                <input class="btn btn-primary" type="submit" value="Save">
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
        $("#tema-undangan").addClass("active");
    });
</script>

<script>
    $(document).ready(function() {
        $("#input-b6").fileinput({
            showUpload: false,
            dropZoneEnabled: false,
            maxFileCount: 10,
            initialPreview: [
                "{{asset('tema_undangan/'.$data->thumbnail)}}"
            ],
            initialPreviewAsData: true,
            initialPreviewFileType: 'image',

        });
    });
    </script>
@endsection
