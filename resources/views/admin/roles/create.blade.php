@extends('layouts.main')

@section('title', __('general.create_role'))

@section('content')
    <div class="columns is-marginless is-multiline">

        {{ Breadcrumbs::render('roles.create') }}

        <div class="column is-12">
            {!! Form::open(['method' => 'POST', 'route' => ['roles.store'], 'class' => 'control']) !!}
                <div class="panel">
                    <p class="panel-heading">
                        <span class="icon"><i class="fa fa-plus"></i></span>
                        <span>@lang('general.create_role')</span>
                    </p>
                    <div class="panel-block">
                        @include('admin.roles.form')
                    </div>
                </div>
                @include('components.buttons.save', ['back' => 'roles.index'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
