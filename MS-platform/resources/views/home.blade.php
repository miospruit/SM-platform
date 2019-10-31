@extends('layouts.app')

@section('content')
<div class="container">
    {{-- @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        You are logged in!

        @else
        You need to login. Or register
    @endif --}}

    @if (Auth::check())
        logged in
    @else
        you need to login or geister
    @endif


    {{-- @foreach ($photos as $photo)

    @endforeach --}}

    <div class="tile is-ancestor">
        <div class="tile is-parent">
          <article class="tile is-child ">
            <p class="title">Hello World</p>
            <p class="subtitle">What is up?</p>
          </article>
        </div>
        <div class="tile is-parent">
          <article class="tile is-child ">
            <p class="title">Foo</p>
            <p class="subtitle">Bar</p>
          </article>
        </div>
        <div class="tile is-parent">
          <article class="tile is-child card">
                        <div class="card-image">
                          <figure class="image is-4by3">
                            <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                          </figure>
                        </div>
                        <div class="card-content">
                          <div class="media">
                            <div class="media-left">
                              <figure class="image is-48x48">
                                <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                              </figure>
                            </div>
                            <div class="media-content">
                              <p class="title is-4">John Smith</p>
                              <p class="subtitle is-6">@johnsmith</p>
                            </div>
                          </div>

                          <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                            <a href="#">#css</a> <a href="#">#responsive</a>
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                          </div>
                        </div>
          </article>
        </div>
      </div>

    </div>
      @endsection
