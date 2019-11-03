@extends('layouts.app')

@section('content')
<section class="hero is-medium is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Register for a new account!
            </h1>
            <h2 class="subtitle">
                Don't forget your email and password
            </h2>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input class="input {{ $errors->has('name') ? 'is-danger' :'' }}" type="text" name="name"
                        placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span>
                </p>
                @error('email')
                <span class="is-danger has-text-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input class="input {{ $errors->has('email') ? 'is-danger' :'' }}" type="email" placeholder="Email"
                        value="{{ old('email') }}" required autocomplete="email" name="email">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span>
                </p>
                @error('email')
                <span class="is-danger has-text-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="field">
                <p class="control has-icons-left">
                    <input class="input {{ $errors->has('password') ? 'is-danger' :'' }}" type="password"
                        placeholder="Password" name="password" required autocomplete="new-password">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </p>
                @error('email')
                <span class="is-danger has-text-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input {{ $errors->has('password') ? 'is-danger' :'' }}" type="password"
                        placeholder="Password Confirm" name="password_confirmation" required
                        autocomplete="new-password">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </p>
                @error('email')
                <span class="is-danger has-text-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="field">
                <p class="control">
                    <button type="submit" class="button is-success">
                        Login
                    </button>
                </p>
            </div>
        </form>
    </div>
</section>

@endsection
