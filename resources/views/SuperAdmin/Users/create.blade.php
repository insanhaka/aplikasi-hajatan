@extends('SuperAdmin.Layouts.app')

@section('css')

@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid" style="margin-top: 3%; margin-bottom: 6%;">

    <div class="card">
        <div class="card-header">
          <h2 class="text-primary">Add User Data</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="/dapur/super/view/create">
                {{ csrf_field() }}
                <div class="container" style="margin-top: -10px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="username">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Role</label>
                                <select class="form-control" name="roles_id">
                                    <option value="">---Select role---</option>
                                    @foreach ($roles as $item)
                                    <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                                    @endforeach
                                </select>
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
        $("#users").addClass("active");
    });
</script>

<script type="text/javascript">
    @if ($message = Session::get('success'))
            iziToast.success({
                        title: 'Success',
                        message: 'User berhasil dibuat',
                        position: 'topRight'
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
