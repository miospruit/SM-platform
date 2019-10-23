@extends('layouts.app')

@section('content')

<div class="container">

    @if (Auth::check())
    logged in
    @else
    you need to login or geister
    @endif

    @foreach ($photos->chunk(3) as $chunk)
    <div class="tile is-ancestor">

        @foreach ($chunk as $photo)
        <div class="tile is-parent">

            <article class="tile is-child box">
                <div>
                    <div class="card-image">
                        <figure class="image is-square">
                            <img src="{{ asset("storage/photos/" . "$photo->image") }}" alt="{{$photo->user->name}}">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img src="" alt="avatar">
                                </figure>
                            </div>
                            <div class="media-content">
                                <a href="/photos/{{$photo->id}}">
                                    <p class="title is-4">{{$photo->title}}</p>
                                </a>
                                <p class="subtitle is-6">{{"@".$photo->user->name}}</p>
                            </div>
                        </div>
                        <div class="content">
                            <strong>
                                {{$photo->description}}
                            </strong>

                            <br>
                            <time class="has-text-right is-family-monospace has-text-grey-light"
                                datetime="{{ $photo->created_at }}">{{ $photo->created_at }}</time>
                        </div>
                    </div>
                </div>
            </article>

        </div>
        @endforeach
    </div>
    @endforeach

</div>
@endsection
