@extends('SuperAdmin.Layouts.app')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.26.0/slimselect.min.css" rel="stylesheet">
@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid" style="margin-top: 3%; margin-bottom: 6%;">

    <div class="card">
        <div class="card-header">
          <h2 class="text-primary">Add Permission For Role</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="/dapur/super/permission/create">
                {{ csrf_field() }}
                <div class="container" style="margin-top: -10px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Role Give Permission</label>
                                <select name="role_id" id="slimselect">
                                    <option value=""> --Select Role-- </option>
                                    @foreach ($role as $item)
                                    <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-sm">
                                <thead class="borderless">
                                  <tr class="text-center table" style="background-color: #546de5; color: #fff;">
                                    <th colspan="5" style="font-weight: bold; font-size: 11px;">Permission</th>
                                  </tr>
                                  <tr class="table-primary">
                                    <th scope="col" style="font-weight: bold; font-size: 11px;">Menu</th>
                                    <th scope="col" style="font-weight: bold; font-size: 11px;" class="text-center">View</th>
                                    <th scope="col" style="font-weight: bold; font-size: 11px;" class="text-center">Create</th>
                                    <th scope="col" style="font-weight: bold; font-size: 11px;" class="text-center">Edit</th>
                                    <th scope="col" style="font-weight: bold; font-size: 11px;" class="text-center">Delete</th>
                                  </tr>
                                  <tr class="table-light">
                                    <th scope="col" style="font-weight: bold; font-size: 11px;">Select All</th>
                                    <th scope="col" style="font-weight: bold; font-size: 11px;" class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1"></label>
                                        </div>
                                    </th>
                                    <th scope="col" style="font-weight: bold; font-size: 11px;" class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2"></label>
                                        </div>
                                    </th>
                                    <th scope="col" style="font-weight: bold; font-size: 11px;" class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3"></label>
                                        </div>
                                    </th>
                                    <th scope="col" style="font-weight: bold; font-size: 11px;" class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                                            <label class="custom-control-label" for="customCheck4"></label>
                                        </div>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    @if ($item->is_active == 1)
                                    <tr>
                                        <td>{!! $item->name !!}</td>
                                        <td id="tdview">
                                            <center>
                                            <label class="custom-toggle">
                                            <input type="checkbox" id="view" name="permission[]" value="{!! "/".Str::lower($item->name)."/view" !!}">
                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                            </label>
                                            </center>
                                        </td>
                                        <td id="tdcreate">
                                            <center>
                                            <label class="custom-toggle">
                                            <input type="checkbox" id="create" name="permission[]" value="{!! "/".Str::lower($item->name) ."/create" !!}">
                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                            </label>
                                            </center>
                                        </td>
                                        <td id="tdedit">
                                            <center>
                                            <label class="custom-toggle">
                                            <input type="checkbox" id="edit" name="permission[]" value="{!! "/".Str::lower($item->name) ."/edit" !!}">
                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                            </label>
                                            </center>
                                        </td>
                                        <td id="tddelete">
                                            <center>
                                            <label class="custom-toggle">
                                            <input type="checkbox" id="delete" name="permission[]" value="{!! "/".Str::lower($item->name) ."/delete" !!}">
                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                            </label>
                                            </center>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
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
        $("#permission").addClass("active");
    });
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

<script>
    $(document).ready(function() {
        new SlimSelect({
            select: '#slimselect',
        })
    });
</script>

<script>
    $( '#customCheck1' ).click( function () {
        $( '#tdview input[type="checkbox"]' ).prop('checked', this.checked)
    });

    $( '#customCheck2' ).click( function () {
        $( '#tdcreate input[type="checkbox"]' ).prop('checked', this.checked)
    });

    $( '#customCheck3' ).click( function () {
        $( '#tdedit input[type="checkbox"]' ).prop('checked', this.checked)
    });

    $( '#customCheck4' ).click( function () {
        $( '#tddelete input[type="checkbox"]' ).prop('checked', this.checked)
    });
</script>

@endsection