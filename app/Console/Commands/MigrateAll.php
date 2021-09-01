<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\ParallelTesting;

class MigrateAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate all for the databases';

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
                $this->info('Running migration for "' . $name . '"');
                $this->call('migrate', ['--database' => $name, '--path' => "database/migrations/$name", '--force' => true]);
            }
        }
    }
}
