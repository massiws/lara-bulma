@extends('layouts.main')

@section('title', __('general.user_details'))

@section('content')
    <div class="columns is-marginless is-multiline">

        {{ Breadcrumbs::render('users.show', $user) }}

        <div class="column is-12">
            <div class="panel">
                <p class="panel-heading">
                    <span class="icon"><i class="fa fa-eye"></i></span>
                    <span>@lang('general.user_details')</span>
                </p>
                <div class="panel-block">
                    <div class="control container">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-96x96 is-rounded">
                                    <img src="{{ is_null($user->avatar) ? asset(env('DEFAULT_AVATAR', '-')) : asset(env('AVATAR_FOLDER') . '/' . $user->avatar) }}">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-4 is-spaced">{{ $user->name }}</p>
                                <p class="subtitle is-6">{{ $user->email }}</p>
                                <p>
                                    <span>{{ trans_choice('general.role', 1) }}: </span>
                                    <span class="tag is-info">{{ $user->role->name }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('components.buttons.edit', ['entity' => $user])
        </div>
    </div>
@endsection
