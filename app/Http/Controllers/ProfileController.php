<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class ProfileController extends Controller
{
    function show($playerSlug)
    {
        $user = User::whereSlug($playerSlug)->first();

        return view('profile.show', compact('user'));
    }
}
