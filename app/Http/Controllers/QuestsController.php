<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestsController extends Controller
{
    public function index()
    {
        return view('quests.index');
    }
}
