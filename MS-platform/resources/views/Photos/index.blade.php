@extends('layouts.app')

@section('content')

<section class="hero is-medium is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Photo Wall
            </h1>
            <h2 class="subtitle">
                @if(Auth::check())
                @if(auth()->user()->is_admin == 1)
                <span>
                    {{ Auth::user()->name }} your an
                    <a href="{{url('admin/routes')}}">{{ Auth::user()->name }} your an Admin</a>
                </span>
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
        {{-- {{dd($photos)}} --}}

        {{-- @foreach ($photos->chunk(3) as $chunk) --}}
        @foreach($photos->chunk($countPhotos) as $chunk)
        <div class="tile is-ancestor">

            @foreach ($chunk as $photo)
            <div class="tile is-parent">

                {{-- {{dd($photo->user())}} --}}
                <article class="tile is-child box">
                    <div>
                        <div class="card-image">
                            <figure class="image is-square">
                                <img src="{{ asset("storage/photos/" . "$photo->image") }}"
                                    alt="{{$photo->user->name}}">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">

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
                            <footer>
                                <div class="field is-grouped">
                                    @if(Auth::user()->id == $photo->user_id)
                                    <p class="control">
                                        <a class="button is-primary" href="/photos/{{$photo->id}}/edit">Edit</a>
                                    </p>
                                    <p class="control">
                                        <a class="button is-primary is-danger"
                                            href="/photos/{{$photo->id}}/delete">Delete</a>
                                    </p>
                                    @endif
                                    <p class="control is-pulled-right">
                                        @if ($photo->likes_count)
                                        <span class="tag is-danger is-large">{{$photo->likes_count}}</span>

                                        @endif

                                    </p>
                                </div>
                            </footer>
                        </div>
                    </div>
                </article>

            </div>
            @endforeach
        </div>
        @endforeach

    </div>
    @endsection
</section>
