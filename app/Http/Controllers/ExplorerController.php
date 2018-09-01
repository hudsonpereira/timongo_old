<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;
use App\MonsterRespawn;
use Auth;
use App\User;
use Carbon\Carbon;

class ExplorerController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $area = $user->area;
        $currentMap = $user->map;
        $users = User::whereMapId($currentMap->id)
            ->where('id', '!=', $user->id)
            ->get();

        $maps = Map::all();

        $respawns = $area->respawns()
            ->whereNull('cleared_at')
            ->with('monster')->get();

        return view('explorer.index', compact('maps', 'currentMap', 'areas', 'respawns', 'users'));
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
        $turnCounter = 0;

        while($user->current_hitpoints > 0 && $respawn->current_hitpoints > 0) {
            $turnCounter++;
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
            $experienceEarned = 1;
            $manaStones = round($turnCounter * 0.4);

            $user->experience += $experienceEarned;
            $user->mana_stone += $manaStones;

            $log[] = "{$user->name} venceu!";
            $log[] = "Você recebeu {$experienceEarned} ponto(s) de experiência.";
            $log[] =  "Você recebeu {$manaStones} pedra(s) de mana.";

            $respawn->cleared_at = $carbonNow;
        }

        // safe check energy value

        $user->save();
        $respawn->save();

        $request->session()->flash($win ? 'success' : 'error', join("<br />", $log));

        return redirect()->back();
    }
}
