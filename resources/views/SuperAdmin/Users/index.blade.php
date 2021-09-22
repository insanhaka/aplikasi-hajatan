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

                    </tr>
                    {{-- @foreach ($data as $user)
                    <tr>
                        <td>{!!$user->name!!}</td>
                        <td>{!!$user->username!!}</td>
                        <td>{!!$user->email!!}</td>
                        @if ($user->roles_id == null)
                        <td>----</td>
                        @else
                        <td>{!!$user->role->name!!}</td>
                        @endif
                        @if ($user->photo == null)
                        <td> <img src="{{asset('assets/img/no-image.jpg')}}" class="img-fluid" alt="Responsive image" width="50"> </td>
                        @else
                        <td><img src="{{asset('profile_pictures/'.$user->photo)}}" class="img-fluid" alt="Responsive image" width="50"></td>
                        @endif
                        @if ($user->is_active == 0)
                        <td>
                            <label class="custom-toggle">
                                <input id="{!!$user->id!!}" type="checkbox">
                                <span class="custom-toggle-slider rounded-circle" data-label-off="OFF" data-label-on="ON" ></span>
                            </label>
                        </td>
                        @else
                        <td>
                            <label class="custom-toggle">
                                <input id="{!!$user->id!!}" type="checkbox" checked>
                                <span class="custom-toggle-slider rounded-circle" data-label-off="OFF" data-label-on="ON" ></span>
                            </label>
                        </td>
                        @endif
                        <td>
                            <a style="margin-right: 20px;" href="{{url()->current().'/'.$user->id.'/edit'}}"><i class="fa fa-edit text-primary" style="font-size: 21px;"></i></a>
                            <a style="margin-right: 10px;" href="{{url()->current().'/'.$user->id.'/delete'}}"><i class="fa fa-trash text-primary" style="font-size: 21px;"></i></a>
                        </td>
                    </tr>
                    @endforeach --}}
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
