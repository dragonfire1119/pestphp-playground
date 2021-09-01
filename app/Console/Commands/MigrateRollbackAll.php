<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class MigrateRollbackAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:all:rollback';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rollback all the migrations for migrate all';

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
        foreach (Config::get('database.connections') as $name => $details) {
            if ($details['driver'] == 'mysql') {
                $this->info('Running rollback for "' . $name . '"');
                $this->call('migrate:rollback', array('--database' => $name, '--path' => "database/migrations/$name"));
            }
        }
    }
}
