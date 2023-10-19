@extends('backend.layouts.app')

@section('title', __('labels.backend.access.contacts.management') . ' | ' . __('labels.backend.access.contacts.edit'))

@section('breadcrumb-links')
    @include('backend.contacts.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::model($contact, ['route' => ['admin.contacts.update', $contact], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
         @include('backend.contacts.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.contacts.index', 'id' => $contact->id ])
    </div><!--card-->
    {{ Form::close() }}
@endsection