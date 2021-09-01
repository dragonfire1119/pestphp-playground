<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class MigrateDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:db {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate one db';

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
            $this->error('You must provide a name');
            return null;
        }

        $this->info('Running migration for "' . $name . '"');
        $this->call('migrate', ['--database' => $name, '--path' => "database/migrations/$name", "--force" => true]);
    }
}
