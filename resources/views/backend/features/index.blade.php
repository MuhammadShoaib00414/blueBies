@extends('backend.layouts.app')

<blade
    section|(%26%2339%3Btitle%26%2339%3B%2C%20app_name()%20.%20%26%2339%3B%20%7C%20%26%2339%3B%20.%20__(%26%2339%3BPackage%20Feature%26%2339%3B))%0D />

@section('breadcrumb-links')
@include('backend.features.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('Package Feature') }} <small
                        class="text-muted">{{ __('List of Package Feature') }}</small>
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <div class="row mt-4">
            <div class="col">
                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ trans('Name in English') }}</th>
                            <th>{{ trans('Name in Arabic') }}</th>
                            <!-- <th>{{ trans('Created at') }}</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($features as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->localization }}</td>
                                <!-- <td>{{ $data->created_at }}</td> -->
                                <td class="btn-td">
                                    <a href="#" class="btn btn-primary btn-danger btn-sm" data-method="delete"
                                        data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete"
                                        data-trans-title="Are you sure you want to do this?" style="cursor:pointer;"
                                        onclick="test();">
                                        <i data-toggle="tooltip" data-placement="top" title="Delete"
                                            class="fa fa-trash"></i>

                                        <form action="/admin/features/{{ $data->id }}" method="POST"
                                            name="delete_item" style="display:none">
                                            <input type="hidden" name="_method" value="delete">
                                            @csrf
                                        </form>
                                    </a>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!--col-->
        </div>
        <!--row-->

    </div>
    <!--card-body-->
</div>
<!--card-->
@endsection

@section('pagescript')

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>





</script>
<script>
    new DataTable('#example', {
        responsive: true
    });

    function test() {
        alert('e');
    }

</script>

@stop
