@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        You are logged in!

        @else
        You need to login. Or register
    @endif

</div>
@endsection
