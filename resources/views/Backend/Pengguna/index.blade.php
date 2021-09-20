@extends('Backend.Layout.app')

@section('css')

@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid" style="margin-top: 3%; margin-bottom: 6%;">

    <div class="card" style="border-left-width: 10px; border-left-color: #546de5; border-left-style: solid">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h2>Data Pengguna</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <br>
        <div class="card-body">
            <table id="pengguna-tableserverside" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
                <thead class="bg-primary" style="color: #ffff;">
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Picture</th>
                        <th>Status</th>
                        <th>Aksi</th>
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
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $("#pengguna").addClass("active");
    });
</script>

<script type="text/javascript">
    @if ($message = Session::get('updated'))
            iziToast.success({
                        title: 'Success',
                        message: 'Data berhasil diperbaharui',
                        position: 'topRight'
                    });
    @endif
</script>
<script type="text/javascript">
    @if ($message = Session::get('error'))
            iziToast.error({
                        title: 'Error',
                        message: 'Gagal memproses',
                        position: 'topRight'
                    });
    @endif
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var tablebusiness = $('#pengguna-tableserverside').DataTable({
            processing: true,
            serverSide: true,
            "language": {
                "paginate": {
                "previous": "&lt",
                "next": "&gt"
                }
            },
            ajax: "{!!url('/dapur')!!}" + "/pengguna/getdatapengguna-serverside",
            order: [
                [1, 'asc']
            ],
            columns: [
                // {data: 'checkbox',name: 'checkbox', searchable: false, orderable: false},
                {data: 'name',name: 'name'},
                {data: 'username',name: 'username'},
                {data: 'email',name: 'email'},
                {data: 'photo',name: 'photo'},
                {data: 'active',name: 'active'},
                {data: 'action',name: 'action'},
            ]
        });
    });
</script>

@endsection
