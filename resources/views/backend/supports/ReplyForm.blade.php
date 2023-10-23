@extends('backend.layouts.app')

@section('title', __('Supports') . ' | ' . __('Reply'))


@section('content')


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Reply to
                    <small class="text-muted">{{ $users->name }}</small>
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <hr>
        {{ Form::model($users, ['route' => ['admin.supports.update', $users], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-role', 'files' => true]) }}

        <div class="row mt-4 mb-4">
            <div class="col">
                


                <div class="form-group row">
                    {{ Form::label('title', trans('Send To'), ['class' => 'col-md-2 from-control-label required']) }}
                    <div class="col-md-10">
                    <input class="form-control" placeholder="Email" readonly value="{{$users->email}}" name="title" type="text" id="title">
                    </div>
                    <!--col-->
                </div>

                <div class="form-group row">
                    {{ Form::label('description', trans('validation.attributes.backend.access.pages.description'), ['class' => 'col-md-2 from-control-label required']) }}

                    <div class="col-md-10">
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('reply here.....')]) }}
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->
                <div class="card-footers">
                    <div class="row">
                        <!--col-->
                        <div class="col text-right">
                            <button type="submit" class="btn btn-success btn-sm pull-right"> Submit </button>
                        </div>
                        <!--row-->
                    </div>
                    <!--row-->
                </div>
                <!--card-footer-->


                <!--form-group-->
            </div>
            <!--col-->
        </div>
        {{ Form::close() }}
        <!--row-->
    </div>

    </div><!--card-->

@endsection