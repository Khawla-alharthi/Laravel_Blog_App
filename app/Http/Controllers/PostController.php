<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DbPosts =Post::all();
        #region AllPosts Test Data
        // $allPosts = [
        //     ['id' => 1, 'title' => 'Getting Started with PHP', 'posted_by' => 'Ahmad', 'created_at' => '2024-01-15 10:30:00'],
        //     ['id' => 2, 'title' => 'Laravel Best Practices', 'posted_by' => 'Sarah', 'created_at' => '2024-01-20 14:45:00'],
        //     ['id' => 3, 'title' => 'Database Design Fundamentals', 'posted_by' => 'John', 'created_at' => '2024-01-25 09:15:00'],
        //     ['id' => 4, 'title' => 'JavaScript ES6 Features', 'posted_by' => 'Emily', 'created_at' => '2024-02-01 16:20:00'],
        //     ['id' => 5, 'title' => 'Building RESTful APIs', 'posted_by' => 'Michael', 'created_at' => '2024-02-05 11:30:00']
        // ];
        #endregion
        return view('posts.index', ['posts'=>$DbPosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        // Fixed: Added missing quote mark after 'users'
        return view('posts.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'post_creator' => 'required|exists:users,id',
        ]);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->post_creator,
        ]);
        
        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        #region Sample Static Post (for testing)
        // $post = [
        //     'id' => 1, 
        //         'title' => 'Getting Started with PHP', 
        //         'description' => 'this is descrption',
        //         'posted_by' => 'Ahmad', 
        //         'created_at' => '2024-01-15 10:30:00'
        // ];
        #endregion

        // Check if post exists BEFORE returning the view
        if(is_null($post)){
            return redirect()->route('posts.index');
        }
        
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $users = User::all();

        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return to_route('posts.index');
    }
}
