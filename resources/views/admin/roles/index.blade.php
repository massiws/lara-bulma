@extends('layouts.main')

@section('title', trans_choice('general.role', 2))

@section('content')
    <div class="columns is-marginless is-multiline">

        {{ Breadcrumbs::render('roles.index') }}

        @include('partials.session-message')

        <div class="column is-12">
            <div class="panel">
                <p class="panel-heading">
                    <span class="icon"><i class="fa fa-users"></i></span>
                    <span>{{ trans_choice('general.role', 2) }}</span>
                    @can('create-roles', App\Role::class)
                        @include('components.buttons.new', ['route' => 'roles.create'])
                    @endcan
                </p>
                <div class="panel-block">
                    <table class="table is-striped is-narrow is-hoverable is-fullwidth">
                        <thead class="thead">
                            <tr>
                                <th class="is-narrow has-text-right">ID</th>
                                <th>@lang('general.name')</th>
                                <th class="is-hidden-mobile">{{ trans_choice('general.permission', 2) }}</th>
                                <th class="is-narrow"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr data-uid="{{ $role->id }}">
                                    <td class="has-text-right">{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="is-hidden-mobile">
                                        @foreach ($role->permissions as $permission)
                                            <span class="tag is-info">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="has-text-right">
                                        @include('partials.action-buttons', ['entity' => $role])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $roles->links() }}
        </div>
    </div>
@endsection
