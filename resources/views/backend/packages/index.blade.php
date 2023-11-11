@extends('backend.layouts.app')


@section('title', app_name() . ' | ' . __('labels.backend.access.pages.management'))

@section('breadcrumb-links')
@include('backend.packages.includes.breadcrumb-links')
@endsection


@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Subscription <small class="text-muted">List of Package</small>
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
                            <th>Pckage In Name</th>
                            <th>Price</th>
                            <th>Package In Arabic</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->localization }}</td>

                                <td class="btn-td">
                                    <a href="#" class="btn btn-primary btn-danger btn-sm" data-method="delete"
                                        data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete"
                                        data-trans-title="Are you sure you want to do this?" style="cursor:pointer;"
                                        onclick="test();">
                                        <i data-toggle="tooltip" data-placement="top" title="Delete"
                                            class="fa fa-trash"></i>

                                        <form action="/admin/packages/{{ $data->id }}" method="POST"
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
