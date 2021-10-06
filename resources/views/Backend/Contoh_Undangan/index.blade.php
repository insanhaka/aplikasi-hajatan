@extends('Backend.Layout.app')

@section('css')

@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid mt-5">

    <div class="card" style="border-left-width: 10px; border-left-color: #546de5; border-left-style: solid">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-primary">Data Contoh Undangan</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-primary" href="/dapur/contoh-undangan/add" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <br>
        <div class="card-body mt-3">
            <table id="contoh-datatable" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
                <thead class="bg-primary" style="color: #ffff;">
                    <tr>
                        <th>Wedding</th>
                        <th>Theme</th>
                        <th>Uri</th>
                        <th>Is Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- DATA TABLES SERVERSIDE --}}
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal -->
@foreach ($contoh_undangan as $item )
<div class="modal fade" id="tema{!!$item->id!!}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="modal-title">{!!$item->name!!}</h5>
                </div>
                <div class="col-md-12">
                    <small>{!!$item->code!!}</small>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <img src="{{asset('tema_undangan/'.$item->thumbnail)}}" class="img-fluid" alt="...">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
@endforeach

@endsection

@section('js')
<script>
    $(document).ready(function() {
        $("#contoh-undangan").addClass("active");
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

<script type="text/javascript">
    $(document).ready(function() {
        var tablebusiness = $('#contoh-datatable').DataTable({
            processing: true,
            serverSide: true,
            "language": {
                "paginate": {
                "previous": "&lt",
                "next": "&gt"
                }
            },
            ajax: "{!!url('/dapur')!!}" + "/contoh/getdatacontoh-serverside",
            order: [
                [1, 'asc']
            ],
            columns: [
                // {data: 'checkbox',name: 'checkbox', searchable: false, orderable: false},
                {data: 'code',name: 'code'},
                {data: 'name',name: 'name'},
                {data: 'view',name: 'view'},
                {data: 'action',name: 'action'},
            ]
        });
    });
</script>

@endsection
