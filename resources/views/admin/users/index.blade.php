@extends('layouts.main')

@section('title', trans_choice('general.user', 2))

@section('content')
    <div class="columns is-marginless is-multiline">

        {{ Breadcrumbs::render('users.index') }}

        @include('partials.session-message')

        <div class="column is-12">
            <div class="panel">
                <p class="panel-heading">
                    <span class="icon"><i class="fa fa-user"></i></span>
                    <span>{{ trans_choice('general.user', 2) }}</span>
                    @can('create-users')
                        @include('components.buttons.new', ['route' => 'users.create'])
                    @endcan
                </p>
                <div class="panel-block">
                    @include('partials.users-table')
                </div>
            </div>
            {{ $users->links() }}
        </div>
    </div>
@endsection
