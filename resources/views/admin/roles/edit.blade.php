@extends('layouts.main')

@section('title', __('general.edit_role'))

@section('content')
    <div class="columns is-marginless is-multiline">

        {{ Breadcrumbs::render('roles.edit', $role) }}

        <div class="column is-12">
            {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role], 'class' => 'control' ]) !!}
                <div class="panel">
                    <p class="panel-heading">
                        <span class="icon"><i class="fa fa-pencil"></i></span>
                        <span>@lang('general.edit_role')</span>
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
