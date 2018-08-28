<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;
use Auth;

class ExplorerController extends Controller
{
    public function index()
    {
        $maps = Map::all();
        $userMap = Auth::user()->map;

        return view('explorer.index', compact('maps', 'userMap'));
    }

    public function travel(Request $request, $mapId)
    {
        $user = Auth::user();
        $map = Map::findOrFail($mapId);

        $user->map_id = $mapId;

        $user->save();

        $request->session()->flash('success', 'Você viajou para ' . $map->name);

        return redirect()->back();
    }
}
