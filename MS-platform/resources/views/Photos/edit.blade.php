@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="title">Edit a post</h1>
    <h2 class="subtitle">Upload your new photo to add on your post board.</h2>

    {{-- {{ Auth::user()->id }} --}}
    <form class="box" method="POST" action="/photos/{{ $photo->id }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <div class="field">
            <label class="label">Title</label>
            <div class="control">
                <input class="input" type="text" name="title" placeholder="Title" value="{{ $photo->title }}">
            </div>
        </div>

        <div class="field">
            <label class="label">Description</label>
            <div class="control">
                <textarea class="textarea" placeholder="Description"
                    name="description">{{ $photo->description }}</textarea>
            </div>
        </div>

        <label class="label">Upload your photo</label>
        <div class="file field has-name is-boxed">
            <label class="file-label">
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                        Your photo
                    </span>
                </span>
                <span class="file-name">
                    {{ $photo->image }}
                </span>
            </label>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Submit</button>
            </div>
            <div class="control">
                <button class="button is-text">Cancel</button>
            </div>
        </div>
    </form>

</div>

@endsection
