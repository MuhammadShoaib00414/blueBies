@extends('backend.layouts.app')

@section('title', __('labels.backend.access.pages.management') . ' | ' . __('labels.backend.access.pages.create'))

@section('breadcrumb-links')
    @include('backend.partners.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::model($partner, ['route' => ['admin.partners.update', $partner], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-role', 'files' => true]) }}

    <div class="card">
        @include('backend.partners.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.partners.index', 'id' => $partner->id ])
    </div><!--card-->
    {{ Form::close() }}
@endsection