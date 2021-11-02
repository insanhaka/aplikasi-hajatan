@extends('Backend.Layout.app')

@section('css')

@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid" style="margin-top: 3%; margin-bottom: 6%;">

    <div class="card">
        <div class="card-header">
          <h2 class="text-primary">Add Package Data</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="/dapur/package/create">
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
                                <label for="exampleFormControlInput1">price</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="price">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">discount</label>
                                <input type="number" class="form-control" id="number" name="discount" placeholder="number">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Best</label>
                                <select name="best" class="form-control" id="best">
                                    <option value="no">no</option>
                                    <option value="yes">yes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Premium</label>
                                <select name="premium" class="form-control" id="premium">
                                    <option value="no">no</option>
                                    <option value="yes">yes</option>
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
        $("#package").addClass("active");
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
