<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;
use App\MonsterRespawn;
use Auth;
use Carbon\Carbon;

class ExplorerController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $area = $user->area;
        $currentMap = $user->map;

        $maps = Map::all();

        $respawns = $area->respawns()
            ->whereNull('cleared_at')
            ->with('monster')->get();

        return view('explorer.index', compact('maps', 'currentMap', 'areas', 'respawns'));
    }

    public function travel(Request $request, $mapId)
    {
        $user = Auth::user();
        $map = Map::findOrFail($mapId);

        $user->map_id = $mapId;
        $user->area_id = $map->areas()->first()->id;

        // dd($user->area_id);

        $user->save();

        $request->session()->flash('success', 'Você viajou para ' . $map->name);

        return redirect()->back();
    }

    function battle(Request $request, $respawnToken) {
        $respawn = MonsterRespawn::with('monster')
            ->whereToken($respawnToken)
            ->firstOrFail();

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

        $win = false;
        $carbonNow = Carbon::now();

        if ($user->current_hitpoints <= 0) {
            // Lose
            $log[] = "{$user->name} foi derrotado!";

            $user->current_hitpoints = 0;
            $user->current_energy -= 3;

            $user->dead_until = $carbonNow->addSeconds($user->level * 10);


        } else {
            // Win
            $win = true;
            $user->experience += 1;
            $log[] = "{$user->name} venceu!";

            $respawn->cleared_at = $carbonNow;
        }

        // safe check energy value

        $user->save();
        $respawn->save();

        $request->session()->flash($win ? 'success' : 'error', join("<br />", $log));

        return redirect()->back();
    }
}
