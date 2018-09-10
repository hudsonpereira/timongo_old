<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SkillsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $skills = $user->skills;

        return view('skills.index', compact('skills'));
    }
}
