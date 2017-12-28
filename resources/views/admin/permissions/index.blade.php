@extends('layouts.main')

@section('title', trans_choice('general.permission', 2))

@section('content')
    <div class="columns is-marginless is-multiline">

        {{ Breadcrumbs::render('permissions.index') }}

        @include('partials.session-message')

        <div class="column is-12">
            <div class="panel">
                <p class="panel-heading">
                    <span class="icon"><i class="fa fa-lock"></i></span>
                    <span>{{ trans_choice('general.permission', 2) }}</span>
                    @can('create-permissions', App\Permission::class)
                        @include('components.buttons.new', ['route' => 'permissions.create'])
                    @endcan
                </p>
                <div class="panel-block">
                    <table class="table is-striped is-narrow is-hoverable table is-fullwidth">
                        <thead class="thead">
                            <tr>
                                <th class="is-narrow has-text-right">ID</th>
                                <th>@lang('general.name')</th>
                                <th>{{ trans_choice('general.role', 2) }}</th>
                                <th class="is-narrow"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr data-uid="{{ $permission->id }}">
                                    <td class="has-text-right">{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td class="is-hidden-mobile">
                                        @foreach ($permission->roles as $role)
                                            <span class="tag is-info">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="has-text-right">
                                        @include('partials.action-buttons', ['entity' => $permission])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $permissions->links() }}
        </div>
    </div>
@endsection
