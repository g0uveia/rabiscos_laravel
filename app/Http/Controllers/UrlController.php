<?php

namespace Mundo dos Rabiscos\Http\Controllers;

use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function root () {
        return redirect('feed');
    }
    public function feed () {
        return view('feed');
    }
}
