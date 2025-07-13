@extends('layouts.app')

@section('title') Edit Post @endsection

@section('content')

    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" class="form-control" value="{{ old('title', $post->title) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $post->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Post Creator</label>
    <select name="user_id" class="form-control">
        @foreach($users as $user)
            <option value="{{ $user->id }}" @if(old('user_id', $post->user_id) == $user->id) selected @endif>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

@endsection
