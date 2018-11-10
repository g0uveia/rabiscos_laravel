<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\User;
class UserController extends Controller
{
    public function show($username) {
        return view('user.show')->with('user', User::findOrFail($username));
    }

    public function edit($username) {
        return view('user.edit')->with('user', User::findOrFail($username));
    }

    public function update(Request $request, $username) {
        $user = User::findOrFail($username);
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($request->file('image') != null) {
            $default_path = 'public/profile-imgs/noimage.jpg';
            if ($user->img_path != $default_path)
                Storage::delete($user->img_path);
            $path = $request->file('image')->store('public/profile-imgs');
            $user->img_path = $path;
        }


        if ($user->name != $request->name) {
            $user->name = $request->name;
        }
        if ($user->bio != $request->bio) {
            $user->bio = $request->bio;
        }
        if ($user->username != $request->username) {
            $validatedData = $request->validate([
                'username' => 'unique:users'
            ]);
            $user->username = $request->username;
        }
        if ($user->email != $request->email) {
            $validatedData = $request->validate([
                'email' => 'unique:users'
            ]);
            $user->email = $request->email;
        }


        $user->save();

        return redirect()->route('user', ['user' => User::findOrFail($username)])->with(['success' => 'As alterações no perfil foram salvas']);
    }
}
