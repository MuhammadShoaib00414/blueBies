@extends('backend.layouts.app')

@section('title', __('Subscription') . ' | ' . __('Create package'))

@section('breadcrumb-links')
    @include('backend.packages.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.packages.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}
    @csrf
    <div class="card">
        @include('backend.packages.form')
        @include('backend.components.footer-buttons', ['cancelRoute' => 'admin.packages.index'])
    </div><!--card-->
    {{ Form::close() }}
@endsection