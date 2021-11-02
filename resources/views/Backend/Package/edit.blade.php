@extends('Backend.Layout.app')

@section('css')

@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid" style="margin-top: 3%; margin-bottom: 6%;">

    <div class="card">
        <div class="card-header">
          <h2 class="text-primary">Edit Data Package</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="/dapur/package/update/{!!$data->id!!}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="container" style="margin-top: -10px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{!! $data->name !!}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Price</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{!! $data->price !!}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Discount</label>
                                <input type="number" class="form-control" id="discount" name="discount" placeholder="Discount" value="{!! $data->discount !!}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Best</label>
                                @php
                                $yes = '';
                                $no = '';
                                 if($data->best == 'yes'){
                                    $yes = 'checked';
                                 }else{
                                     $no = 'checked';
                                 }
                                @endphp
                                <select name="best" class="form-control" id="best">
                                    <option value="no" {{ $no }}>no</option>
                                    <option value="yes" {{ $yes }}>yes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Premium</label>
                                @php
                                $y = '';
                                $n = '';
                                 if($data->premium == 'yes'){
                                    $y = 'checked';
                                 }else{
                                     $n = 'checked';
                                 }
                                @endphp
                                <select name="premium" class="form-control" id="premium">
                                    <option value="no" {{ $n }}>no</option>
                                    <option value="yes" {{ $y }}>yes</option>
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
    $('#demoInput5').fileInput({
        iconClass: 'mdi mdi-fw mdi-upload'
    });
</script>
@endsection
