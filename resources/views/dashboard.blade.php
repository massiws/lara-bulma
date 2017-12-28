@extends('layouts.main')

@section('title', '| ' . __('general.dashboard'))

@section('content')
    <div class="columns is-marginless is-multiline">

        {{ Breadcrumbs::render('dashboard') }}

        <div class="column is-12">
            @include('partials.session-message')

            <div class="panel">
                <p class="panel-heading">@lang('general.dashboard')</p>
                <div class="panel-block">            
                    <div class="tile is-ancestor">
                        <div class="tile is-parent is-vertical">
                            <div class="tile is-child notification is-info">
                                You are logged in!
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
