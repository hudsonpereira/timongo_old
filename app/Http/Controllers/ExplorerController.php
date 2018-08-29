<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;
use App\MonsterRespawn;
use Auth;

class ExplorerController extends Controller
{
    public function index()
    {
        $maps = Map::with('areas')->all();
        $userMap = Auth::user()->map;

        $respawns = $userMap->respawns()->with('monster')->get();

        return view('explorer.index', compact('maps', 'userMap', 'respawns'));
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

    function battle(Request $request, $respawnToken) {
        $respawn = MonsterRespawn::whereToken($respawnToken)->with('monster')->firstOrFail();
        $user = Auth::user();

        $log = [];

        while($user->current_hitpoints > 0 && $respawn->current_hitpoints > 0) {
            $userDamage = $user->attack * rand(1, 6);
            $respawn->current_hitpoints -= $userDamage;
            $log[] = "{$user->name} causou " . $userDamage . ' a ' . $respawn->monster->name;

            if ($respawn->current_hitpoints <= 0) {
                break;
            }

            $monsterDamage = $respawn->attack * rand(1, 6);
            $user->current_hitpoints -= $monsterDamage;
            $log[] = "{$respawn->monster->name} causou {$monsterDamage} a {$user->name}";
        }

        $user->current_energy -= 1;
        $user->experience += 1;

        if ($user->current_hitpoints <= 0) {
            // Lose
            $user->current_hitpoints = 0;
            $user->current_energy -= 3;

            if ($user->current_energy < 0) {
                $user->current_energy = 0;
            }
        }

        $user->save();
        $respawn->save();

        $request->session()->flash('success', join(" ", $log));

        return redirect()->back();
    }
}
