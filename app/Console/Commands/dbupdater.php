<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class dbupdater extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dbupdater';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'DB Updater';

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
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
