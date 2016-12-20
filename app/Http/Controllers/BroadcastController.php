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
        // $user = request()->user();

        // broadcast(new \App\Events\ServerCreated($user, ['text' => 'Say hi to me']))->toOthers();

        return view('pages.broadcast.index');
    }
}
