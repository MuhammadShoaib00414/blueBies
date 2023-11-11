@extends('backend.layouts.app')

@section('title', __('Create Pakage Feature') . ' | ' . __('labels.backend.access.faqs.create'))

@section('breadcrumb-links')
    @include('backend.features.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::open(['route' => 'admin.features.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.features.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.features.index' ])
    </div><!--card-->
    {{ Form::close() }}
@endsection