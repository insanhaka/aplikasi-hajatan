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
                    <h2 class="text-primary">Data User</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-primary" href="/dapur/super/view/add" role="button">Add Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="user-datatable" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
                <thead class="bg-primary" style="color: #ffff;">
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Picture</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- Datatables Serverside Handle --}}
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
        $("#users").addClass("active");
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
    @if ($message = Session::get('success'))
            iziToast.success({
                        title: 'Success',
                        message: 'Data berhasil dibuat',
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
    @if ($message = Session::get('error'))
            iziToast.error({
                        title: 'Error',
                        message: 'Gagal memproses',
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
        axios.post('/dapur/super/activation', {
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

<script type="text/javascript">
    $(document).ready(function() {
        var tablebusiness = $('#user-datatable').DataTable({
            processing: true,
            serverSide: true,
            "language": {
                "paginate": {
                "previous": "&lt",
                "next": "&gt"
                }
            },
            ajax: "{!!url('/dapur')!!}" + "/super/user-serverside",
            order: [
                [1, 'asc']
            ],
            columns: [
                // {data: 'checkbox',name: 'checkbox', searchable: false, orderable: false},
                {data: 'name',name: 'name'},
                {data: 'username',name: 'username'},
                {data: 'email',name: 'email'},
                {data: 'role',name: 'role'},
                {data: 'photo',name: 'photo'},
                {data: 'active',name: 'active'},
                {data: 'action',name: 'action'},
            ]
        });
    });
</script>

@endsection
