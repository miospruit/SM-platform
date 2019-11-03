@extends('layouts.app')

@section('content')

<section class="hero is-medium is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Hi {{$user->name}}!
            </h1>
            <h2 class="subtitle">
                You can edit your account here!
            </h2>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">

        <form method="post" action="{{route('users.update', $currentUser)}}">
            @csrf
            @method('PATCH')

            {{-- <input type="text" name="name" value="{{ $user->name }}" />

            <input type="email" name="email" value="{{ $user->email }}" /> --}}
            <input type="password" name="current_password" />
            <input type="password" name="new_password" />


            <input type="password" name="new_confirm_password" />

            <button type="submit">Send</button>
        </form>
        @if ($errors->any())
        <div class="notification is-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</section>

@endsection
