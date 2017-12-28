@extends('layouts.auth')

@section('title', '| New password')

@section('content')
    <section class="hero is-fullheight is-light">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="columns">
                    <div class="column is-one-third is-offset-one-third box">
                        <div class="logo">
                            <figure class="image is-3by2">
                                <img src="{{ url('images/logo.png') }}">
                            </figure>
                        </div>
                        <p class="block has-text-left has-text-grey">Enter your new credentials</p>

                        @component('components.message-status', ['style' => 'info'])
                            {{ session('status') }}
                        @endcomponent

                        <form class="password-reset-form" method="POST" action="{{ route('password.request') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" id="email"
                                    type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
                                    <span class="icon is-small is-left"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                </p>
                                @includeWhen($errors->has('email'), 'components.form.help', ['msg' => $errors->first('email')])
                            </div>

                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" id="password"
                                    type="password" name="password" placeholder="Password" required>
                                    <span class="icon is-small is-left"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                </p>
                                @includeWhen($errors->has('password'), 'components.form.help', ['msg' => $errors->first('password')])
                            </div>

                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" id="password-confirm"
                                    type="password" name="password_confirmation" placeholder="Confirm password" required>
                                    <span class="icon is-small is-left"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                </p>
                                @includeWhen($errors->has('password'), 'components.form.help', ['msg' => $errors->first('password')])
                            </div>

                            <div class="field">
                                <div class="control has-text-right">
                                    <button type="submit" class="button is-primary is-fullwidth">
                                        <span class="icon is-small"><i class="fa fa-check" aria-hidden="true"></i></span>
                                        <span>&nbsp;Reset Password</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
