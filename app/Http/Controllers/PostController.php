<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('posts', ['posts' => $posts]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Change 'image' to 'picture'
        ]);

        // Handle picture upload
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('post_pictures', 'public');
            $validatedData['picture'] = $picturePath;
        }

        // Create a new post in the database
        $user = Auth::user();
        $post = $user->post()->create($validatedData);

        return redirect('/posts');
    }

    public function toggleFavorite(Request $request, Post $post)
    {
        $user = auth()->user();

        if ($user->hasFavorited($post)) {
            $user->favorites()->where('post_id', $post->id)->delete();
        } else {
            $user->favorites()->create(['post_id' => $post->id]);
        }

        return back();
    }
}
