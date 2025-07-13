@extends('layouts.app')

@section('title') Show Post @endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post->title}}</h5>
            <p class="card-text">Description: {{$post->description}}</p>
            <p class="card-text">Created At: {{$post->created_at->format('M d, Y H:i')}}</p>
        </div>
    </div>

    <div class="card mt-3">
        <h5 class="card-header">Post Creator Info</h5>
        <div class="card-body">
            <h5 class="card-title">Name: {{$post->user ? $post->user->name : 'user not found'}}</h5>
            <p class="card-text">Email: {{$post->user->email}}</p>
            <p class="card-text">Created At: {{$post->user->created_at}}</p>
        </div>
    </div>
@endsection
