<?php

namespace SedpMis\DbCommands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\Config;
use PDO;

class RemigrateCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'remigrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recreate database and run migrations.';

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
    public function fire()
    {
        $this->call('db:recreate');
        $this->call('migrate');

        if ($this->option('seed')) {
            $this->call('db:seed');
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    // protected function getArguments()
    // {
    //  return array(
    //      array('example', InputArgument::REQUIRED, 'An example argument.'),
    //  );
    // }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
     return array(
        array('seed', 's', InputOption::VALUE_NONE, 'Seed database.'),
     );
    }
}
