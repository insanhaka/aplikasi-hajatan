@extends('SuperAdmin.Layouts.app')

@section('css')
    
@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid" style="margin-top: 3%; margin-bottom: 6%;">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-primary">Data Menu</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-primary" href="/dapur/super/menu/add" role="button">Add Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="menu-datatable" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
                <thead class="bg-primary" style="color: #ffff;">
                    <tr>
                        <th>Name</th>
                        <th>Uri</th>
                        <th>Icon</th>
                        <th>Is Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- Menu Server Side Handle --}}
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
</div>    
@endsection

@section('js')
<script>
    $(document).ready(function() {   
        $("#menu").addClass("active");
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
        var tablebusiness = $('#menu-datatable').DataTable({
            processing: true,
            serverSide: true,
            "language": {
                "paginate": {
                "previous": "&lt",
                "next": "&gt"
                }
            },
            ajax: "{!!url('/dapur')!!}" + "/super/menu-serverside",
            order: [
                [1, 'asc']
            ],
            columns: [
                // {data: 'checkbox',name: 'checkbox', searchable: false, orderable: false},
                {data: 'name',name: 'name'},
                {data: 'uri',name: 'uri'},
                {data: 'icon',name: 'icon'},
                {data: 'active',name: 'active'},
                {data: 'action',name: 'action'},
            ]
        });
    });
</script>

@endsection