<?php

namespace App\Addons\Message\Controllers;

use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        return view('message::message.index')->render();
    }

    public function create()
    {
        return view('message::message.create')->render();
    }
}
