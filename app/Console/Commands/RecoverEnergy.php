<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use DB;

class RecoverEnergy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rpg:energy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bumps energy';

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
        $users = User::whereRaw('current_energy < max_energy')
            ->update([
                'current_energy' => DB::raw('current_energy + 1')
            ]);
    }
}
