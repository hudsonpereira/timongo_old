<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ArsenalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $arsenal = $user->arsenal;
        $armor = $user->equipedArmor;
        $weapon = $user->equipedWeapon;

        return view('arsenal.index', compact('user', 'armor', 'weapon', 'arsenal'));
    }
}
