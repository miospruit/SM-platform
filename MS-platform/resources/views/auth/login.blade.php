@extends('layouts.app')

@section('content')
<section class="hero is-medium is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Login to your account
            </h1>
            <h2 class="subtitle">
                Don't forget your email and password
            </h2>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input name="email" class="input {{ $errors->has('email') ? 'is-danger' :'' }}" type="email"
                        placeholder="Email" required>
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
                    <input name="password" class="input {{ $errors->has('password') ? 'is-danger' :'' }}"
                        type="password" placeholder="Password" required>
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
