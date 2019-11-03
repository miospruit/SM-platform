@extends('layouts.app')

@section('content')
<section class="hero is-medium is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Dashboard
            </h1>
            <h2 class="subtitle">
                @if(Auth::check())
                @if(auth()->user()->is_admin == 1)
                <a href="{{url('admin/routes')}}">Admin</a>
                @else
                {{ Auth::user()->name }}
                @endif
                @else
                log in.
                @endif

            </h2>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th><abbr title="Position">Id</abbr></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)

                {{-- {{dd($user->is_admin)}} --}}
                <tr>
                    <th>{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    {{-- {{dd($user->is_admin)}} --}}
                    <td>
                        <div class="field">
                            <input id="switch" data-id="{{$user->id}}" class="toggle-class switch" type="checkbox"
                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                data-off="InActive" {{ $user->is_admin ? 'checked' : '' }}>
                            <label for="switch">{{ $user->is_admin ? 'Admin' : 'User' }}</label>
                        </div>
                    </td>
                    @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
