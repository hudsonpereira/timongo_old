<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    function revive()
    {
        $user = Auth::user();

        $user->revive()
            ->save();

        return redirect()->back();
    }
}
