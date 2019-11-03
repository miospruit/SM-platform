@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="notification is-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<section class="hero is-fullheight is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                @if(Auth::check())
                @if(auth()->user()->is_admin == 1)
                <a href="{{url('admin/routes')}}">Secret Admin Page</a>
                @else
                Hi {{ Auth::user()->name }}
                @endif
                @else
                log in.
                @endif
            </h1>
            <h2 class="subtitle">
                <a href="/photos" class="button is-primary">Head to the wall!</a>
            </h2>
        </div>
    </div>
</section>
@endsection
