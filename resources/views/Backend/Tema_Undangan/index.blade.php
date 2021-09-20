@extends('Backend.Layout.app')

@section('css')

@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid mt-5">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-primary">Data Tema Undangan</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-primary" href="/dapur/tema-undangan/add" role="button">Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body mt-3">
            <table id="datatable" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
                <thead class="bg-primary" style="color: #ffff;">
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Is Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                    <tr>
                        <td>{!! $loop->iteration !!}</td>
                        <td>{!! wordwrap($value->title,65,"<br>\n")!!}</td>
                        <td>
                            @if ($value->picture == null)
                            <img src="{{asset('assets/img/no-image-yet.png')}}" class="img-fluid" width="50" alt="...">
                            @else
                            <img src="{{asset('tema_undangan/'.$value->picture)}}" class="img-fluid" width="50" alt="...">
                            @endif
                        </td>
                        <td>{!! wordwrap($value->description,65,"<br>\n")!!}</td>
                        @if ($value->is_active == 0)
                        <td>
                            <label class="custom-toggle">
                                <input id="{!!$value->id!!}" type="checkbox">
                                <span class="custom-toggle-slider rounded-circle" data-label-off="OFF" data-label-on="ON" ></span>
                            </label>
                        </td>
                        @else
                        <td>
                            <label class="custom-toggle">
                                <input id="{!!$value->id!!}" type="checkbox" checked>
                                <span class="custom-toggle-slider rounded-circle" data-label-off="OFF" data-label-on="ON" ></span>
                            </label>
                        </td>
                        @endif
                        <td>
                            <a style="margin-right: 20px;" href="{{url()->current().'/edit/'.$value->id}}"><i class="fa fa-edit text-primary" style="font-size: 21px;"></i></a>
                            <a style="margin-right: 10px;" href="{{url()->current().'/delete/'.$value->id}}"><i class="fa fa-trash text-primary" style="font-size: 21px;"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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

<script type="text/javascript">
    @if ($message = Session::get('created'))
            iziToast.success({
                        title: 'Success',
                        message: 'Data berhasil disimpan',
                        position: 'topRight'
                    });
    @endif
</script>
<script type="text/javascript">
    @if ($message = Session::get('updated'))
            iziToast.success({
                        title: 'Success',
                        message: 'Data berhasil diubah',
                        position: 'topRight'
                    });
    @endif
</script>
<script type="text/javascript">
    @if ($message = Session::get('deleted'))
            iziToast.success({
                        title: 'Success',
                        message: 'Data berhasil dihapus',
                        position: 'topRight'
                    });
    @endif
</script>
<script type="text/javascript">
    @if ($message = Session::get('warning'))
            iziToast.error({
                        title: 'Failed',
                        message: 'Data gagal diproses',
                        position: 'topRight'
                    });
    @endif
</script>

@foreach ($data as $cek)
<script>
    $(function() {
      $('#{!! $cek->id !!}').change(function(event) {
        var status = ($(this).prop('checked')) ? '1' : '0';
        var id = event.target.id;
        var is_active = status;
        // console.log(id);
        // console.log(status);
        axios.post('/dapur/tema-undangan/activation', {
            is_active: is_active,
            id: id
        })
        .then(function (response) {
            iziToast.success({
                title: 'Success',
                message: 'Proses Berhasil',
                position: 'topRight'
            });
        })
        .catch(function (error) {
            iziToast.warning({
                title: 'Upps !',
                message: 'Proses Gagal',
                position: 'topRight'
            });
        });
      })
    })
</script>
@endforeach

@endsection
