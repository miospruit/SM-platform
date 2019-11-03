@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="title">Create a new post</h1>
    <h2 class="subtitle">Upload your new photo to add on your post board.</h2>
    <form method="POST" action="/photos" enctype="multipart/form-data">
        @csrf

        <div class="field">
            <label class="label">Title</label>
            <div class="control">
                <input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title"
                    placeholder="Title" value="{{ old('title') }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Discription</label>
            <div class="control">
                <textarea class="textarea {{ $errors->has('title') ? 'is-danger' : '' }}" placeholder="Discription"
                    name="description" required value="{{ old('description') }}"></textarea>
            </div>
        </div>

        <label class="label">Upload your photo</label>
        <div class="file field has-name is-boxed {{ $errors->has('title') ? 'is-danger' : '' }}">
            <label class="file-label">
                <input class="file-input" type="file" name="image" required value="{{ old('image') }}">
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                        Choose a Photo…
                    </span>
                </span>
                <span class="file-name">
                    Photo
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

        @if ($errors->any())
        <div class="notification is-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    </form>
</div>

@endsection
