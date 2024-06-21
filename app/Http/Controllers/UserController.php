<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    public function userPosts(User $user)
    {
        return view('users.posts', [
            'user' => $user,
            'posts' => $user->posts
        ]);
    }
}
