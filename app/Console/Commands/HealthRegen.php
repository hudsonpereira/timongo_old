<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use DB;

class HealthRegen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rpg:health';

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
        $users = User::whereRaw('current_hitpoints < max_hitpoints')->get();

        foreach ($users as $user) {
            $user->procHealthRegen()
                ->save();
        }
    }
}
