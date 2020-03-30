<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CovidGoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'covid:go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initiate COVID-19 Data Application';

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
        $this->call('migrate:fresh', [
            '--seed' => true
        ]);
    }
}
