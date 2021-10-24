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
                    <h2 class="text-primary">Data Feature Package {{ $package_features->name }}</h2>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="package-datatable" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
                <thead class="bg-primary" style="color: #ffff;">
                    <tr>
                        <th>Feature Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($features as $feature)
                        <tr>
                            <td>{{ $feature->name }}</td>
                            <td>
                                <input type="checkbox" class="checkboxes" name="feature" onchange="saveFeature({{ $feature->id }})" id="{{ $feature->id }}" value="{{ $feature->id }}" switch="none" @if ($package_features->features->contains('id',$feature->id))
                                            checked
                                        @endif />
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
<script>
    function saveFeature(featureId){
        var post = {};
        post.feature_id = featureId;
        post.package_id = '{{ $package_features->id }}';
        post.checked = event.target.checked;
        post._token  = "{{ csrf_token() }}";
        $.ajax({
            url: "{{ url('dapur/savefeature') }}",
            type: 'POST',
            data: post,
            cache: false,
            success: function (data) {
                alert('data updated');
                return data;
            },
            error: function () {
                alert('something went wrong');
            }
        });
    }
</script>

@endsection
