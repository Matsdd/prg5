<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function profile()
    {
        $user = auth()->user();
        $favoritedPosts = $user->favorites()->with('post')->get();

        return view('profile', compact('favoritedPosts'));
    }

    public function updateAdminRights($userId)
    {
        // Update admin_rights to 1 for the specified user
        User::where('id', $userId)->update(['admin_rights' => 1]);

        return view('home');
    }
}
