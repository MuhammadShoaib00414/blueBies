@extends('backend.layouts.app')

@section('title', app_name())
@section('breadcrumb-links')
    @include('backend.contcats.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::open(['route' => 'admin.faqs.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.faqs.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.faqs.index' ])
    </div><!--card-->
    {{ Form::close() }}
@endsection