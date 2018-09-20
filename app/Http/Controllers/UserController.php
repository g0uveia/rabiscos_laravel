<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
class UserController extends Controller
{
    public function show($username) {
        return view('user.show')->with('user', User::findOrFail($username));
    }
}
