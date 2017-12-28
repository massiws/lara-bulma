@extends('layouts.main')

@section('title', __('general.edit_permission'))

@section('content')
    <div class="columns is-marginless is-multiline">

        {{ Breadcrumbs::render('permissions.edit', $permission) }}

        <div class="column is-12">
            {!! Form::model($permission, ['method' => 'PATCH', 'route' => ['permissions.update', $permission], 'class' => 'control' ]) !!}
                <div class="panel">
                    <p class="panel-heading">
                        <span class="icon"><i class="fa fa-pencil"></i></span>
                        <span>@lang('general.edit_permission')</span>
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
