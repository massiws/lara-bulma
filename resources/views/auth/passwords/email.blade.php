@extends('layouts.auth')

@section('title', '| Reset Password')

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
                        {{-- <p class="block has-text-left has-text-grey">Forgot your password?</p> --}}

                        @component('components.message-status', ['style' => 'success'])
                            {{ session('status') }}
                        @endcomponent

                        <form class="forgot-password-form" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" id="email"
                                    type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
                                    <span class="icon is-small is-left"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                </p>
                                @includeWhen($errors->has('password'), 'components.form.help', ['msg' => $errors->first('password')])
                            </div>

                            <div class="field">
                                <div class="control has-text-right">
                                    <button type="submit" class="button is-primary is-fullwidth">
                                        <span class="icon is-small"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                        <span>&nbsp;Send Password Reset Link</span>
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
