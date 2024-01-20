<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        $favoritedPosts = $user->favorites()->with('post')->get();

        return view('profile', compact('favoritedPosts'));
    }
}
