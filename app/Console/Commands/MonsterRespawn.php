<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MonsterRespawn as MonsterRespawnModel;

class MonsterRespawn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rpg:monster_respawn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $respawns = MonsterRespawnModel::whereNotNull('cleared_at')
            ->get();

        foreach ($respawns as $respawn) {
            $respawn->doRespawn()
                ->save();
        }

            // ->update([
            //     'cleared_at' => null,
            //     'token' => MonsterRespawnModel::generateToken(),
            //     'current_hitpoints' => 'max_hitpoints'
            // ]);
    }
}
