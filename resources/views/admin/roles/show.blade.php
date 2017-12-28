@extends('layouts.main')

@section('title', __('general.role_details'))

@section('content')
    <div class="columns is-marginless is-multiline">

        {{ Breadcrumbs::render('roles.show', $role) }}

        <div class="column is-12">
            <div class="panel">
                <p class="panel-heading">
                    <span class="icon"><i class="fa fa-eye"></i></span>
                    @lang('general.role_details')
                </p>
                <div class="panel-block">
                    <div class="control">
                        <p class="title is-4 is-spaced">{{ $role->name }}</p>
                        <p>
                            <span>{{ trans_choice('general.permission', 2) }}: </span>
                            @foreach ($role->permissions as $permission)
                                <a href="{{ route('permissions.show', [$permission]) }}" title="@lang('general.view')">
                                    <span class="tag is-info">{{ $permission->name }}</span>
                                </a>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>

            <div class="panel">
                <p class="panel-heading">@lang('general.associated_users')</p>
                <div class="panel-block">
                    @include('partials.users-table')
                </div>
            </div>
            @include('components.buttons.edit', ['entity' => $role])
            {{ $users->links() }}
        </div>
    </div>
@endsection
