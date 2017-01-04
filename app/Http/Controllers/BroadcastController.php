<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.broadcast.index');
    }

    public function chat()
    {
        return view('pages.broadcast.chat');
    }
}
