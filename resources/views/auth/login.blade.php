@extends('layouts.app')
@section('content')
<div class="login-wrapper columns">
    <div class="column is-8 is-hidden-mobile hero-banner">
        <section class="hero is-fullheight is-dark">
            <div class="hero-body">
                <div class="container section">
                </div>
            </div>
        </section>
    </div>
    <div class="column is-4">
        <section class="hero is-fullheight">
            <div class="hero-heading">
                <div class="section has-text-centered">
                    <h1 class="title is-1">Keeton House</h1>
                </div>
            </div>
            <div class="hero-body">
                <div class="container neg-margin-top-100">
                    <div class="columns">
                        <div class="column is-8 is-offset-2">
                            <form action="{{ route('login') }}" method="POST" role="form">
                                {{ csrf_field() }}
                                <div class="login-form">
                                    <p class="control has-icon has-icon-right">
                                        <input class="input email-input {{ $errors->has('email') ? 'is-danger' : '' }}" type="text" name="email" value="{{ old('email') }}" placeholder="jsmith@example.org">
                                        <span class="icon user">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </p>
                                    @if ($errors->has('email'))
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                    <p class="control has-icon has-icon-right">
                                        <input class="input password-input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" name="password" placeholder="●●●●●●●">
                                        <span class="icon user">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </p>
                                    @if ($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                    <p class="control login">
                                        <button type="submit" class="button is-success is-outlined is-large is-fullwidth">Login</button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection