<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    public function root() {
        if (Auth::guest()) {
            return redirect('login');
        } else {
            return redirect('feed');
        }
    }
}
