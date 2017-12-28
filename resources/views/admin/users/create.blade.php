@extends('layouts.main')

@section('title', __('general.create_user'))

@section('content')
    <div class="columns is-marginless is-multiline">

        {{ Breadcrumbs::render('users.create') }}

        <div class="column is-12">
            {!! Form::open(['method' => 'POST', 'route' => ['users.store'], 'class' => 'control', 'files' => true]) !!}
                <div class="panel">
                    <p class="panel-heading">
                        <span class="icon"><i class="fa fa-plus"></i></span>
                        <span>@lang('general.create_user')</span>
                    </p>
                    <div class="panel-block">
                        @include('admin.users.form')
                    </div>
                </div>
                @include('components.buttons.save', ['back' => 'users.index'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
