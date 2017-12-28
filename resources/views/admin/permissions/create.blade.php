@extends('layouts.main')

@section('title', __('general.create_permission'))

@section('content')
    <div class="columns is-marginless is-multiline">

        {{ Breadcrumbs::render('permissions.create') }}

        <div class="column is-12">
            {!! Form::open(['method' => 'POST', 'route' => ['permissions.store'], 'class' => 'control']) !!}
                <div class="panel">
                    <p class="panel-heading">
                        <span class="icon"><i class="fa fa-plus"></i></span>
                        <span>@lang('general.create_permission')</span>
                    </p>
                    <div class="panel-block">
                        @include('admin.permissions.form')
                    </div>
                </div>
                @include('components.buttons.save', ['back' => 'permissions.index'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
