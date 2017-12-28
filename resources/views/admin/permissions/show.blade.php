@extends('layouts.main')

@section('title', __('general.permission_details'))

@section('content')
    <div class="columns is-marginless is-multiline">

        {{ Breadcrumbs::render('permissions.show', $permission) }}

        <div class="column is-12">
            <div class="panel">
                <p class="panel-heading">
                    <span class="icon"><i class="fa fa-eye"></i></span>
                    <span>@lang('general.permission_details')</span>
                </p>
                <div class="panel-block">
                    <div class="control">
                        <p class="title is-4 is-spaced">{{ $permission->name }}</p>
                        <p>
                            <span>{{ trans_choice('general.role', 2) }}: </span>
                            @foreach ($permission->roles as $role)
                                <a href="{{ route('roles.show', [$role->id]) }}" title="">
                                    <span class="tag is-info">{{ $role->name }}</span>
                                </a>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
            @include('components.buttons.edit', ['entity' => $permission])
        </div>
    </div>
@endsection
