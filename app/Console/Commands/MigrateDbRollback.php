<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class MigrateDbRollback extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:db:rollback {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rollback db migrations';

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
        $name = $this->option('name');

        if (is_null($name)) {
            $this->error('Must provide a name');
            return null;
        }

        $this->info('Running rollback for "' . $name . '"');
        $this->call('migrate:rollback', array('--database' => $name, '--path' => "database/migrations/$name"));
    }
}
