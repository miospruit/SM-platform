@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Show photos</h1>

    <div class="tile is-ancestor">

            <div class="tile is-parent">

                <article class="tile is-child">
                    <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
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
                                <a href=""><p class="title is-4">{{$photo->title}}</p></a>
                                <p class="subtitle is-6">{{$photo->user->name}}</p>
                            </div>
                        </div>
                    <div class="content">
                        <strong>
                                {{$photo->description}}
                        </strong>

                        <br>
                    <time class="is-right" datetime="{{ $photo->created_at }}">{{ $photo->created_at }}</time>
                    </div>
                </div>
            </div>
            </article>

    </div>
</div>
<a class="button is-primary" href="/photos/{{$photo->id}}/edit">Anchor</a>


    <article class="media">
            <figure class="media-left">
              <p class="image is-64x64">
                <img src="https://bulma.io/images/placeholders/128x128.png">
              </p>
            </figure>
            <div class="media-content">
              <div class="field">
                <p class="control">
                  <textarea class="textarea" placeholder="Add a comment..."></textarea>
                </p>
              </div>
              <nav class="level">
                <div class="level-left">
                  <div class="level-item">
                    <a class="button is-info">Submit</a>
                  </div>
                </div>
                <div class="level-right">
                  <div class="level-item">
                    <label class="checkbox">
                      <input type="checkbox"> Press enter to submit
                    </label>
                  </div>
                </div>
              </nav>
            </div>
        </article>

    </div>
@endsection
