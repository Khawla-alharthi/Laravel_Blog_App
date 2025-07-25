@extends('layouts.app')

@section('title') Home @endsection

@section('content')
    <div class="mt-3">
        <div class="text-center">
            <a href="{{route('posts.create')}}" type="button" class="btn btn-success">Create Post</a>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at->format('Y-m-d')}}</td>
                    <td>
                        <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">View</a>
                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Update</a>
                        <form method="POST" action="{{route('posts.destroy', $post->id)}}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

