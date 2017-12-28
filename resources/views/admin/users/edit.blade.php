@extends('layouts.main')

@section('title', __('general.edit_user'))

@section('content')
    <div class="columns is-marginless is-multiline">

        {{ Breadcrumbs::render('users.edit', $user) }}

        <div class="column is-12">
            {!! Form::model($user, [
                'method' => 'PATCH',
                'route' => ['users.update', $user],
                'class' => 'control',
                'files' => true,
            ]) !!}
                <div class="panel">
                    <p class="panel-heading">
                        <span class="icon"><i class="fa fa-pencil"></i></span>
                        <span>@lang('general.edit_user')</span>
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
