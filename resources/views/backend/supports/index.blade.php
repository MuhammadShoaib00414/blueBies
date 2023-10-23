@extends('backend.layouts.app')

<blade
    section|(%26%2339%3Btitle%26%2339%3B%2C%20app_name()%20.%20%26%2339%3B%20%7C%20%26%2339%3B%20.%20__(%26%2339%3Blabels.backend.access.faqs.management%26%2339%3B))%0D />



@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Supports <small class="text-muted">Supports List</small>
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
                            <th>Email</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($supports as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->type }}</td>
                                <td>{{ $data->description }}</td>

                                <td class="btn-td">
                                    <div class="btn-group" role="group" aria-label="User Actions">
                                        <a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top"
                                            href="supports/{{$data->id}}/edit" title="Reply">
                                            <i class="fa fa-reply"></i>
                                        </a>
                                
                                    </div>

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

</script>

@stop
