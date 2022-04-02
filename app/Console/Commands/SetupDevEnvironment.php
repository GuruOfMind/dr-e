<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupDevEnvironment extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'dev:setup';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Sets up the development environment';

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
		$this->info('Setting up development environment');
		$this->MigrateAndSeedDatabase();
		$this->info('All done. Bye!');

		return 0;
	}

	public function MigrateAndSeedDatabase()
	{
		$this->call('migrate:fresh');
		$this->call('db:seed');
	}
}
