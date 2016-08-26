<?php

namespace SedpMis\DbCommands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use PDO;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class DbRecreateCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'db:recreate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop and create a new and empty database.';

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
        $database = $this->option('database') ?: Config::get('database.connections.mysql.database');

        $this->executeSql("drop database if exists {$database}");
        $this->executeSql("create database if not exists {$database}");
        $this->info("Successfully recreated a new and empty database `{$database}`.");
    }

    public function executeSql($sql)
    {
        $driver = Config::get('database.connections.mysql.driver');
        $host = Config::get('database.connections.mysql.host');
        $username = Config::get('database.connections.mysql.username');
        $password = Config::get('database.connections.mysql.password');

        $pdo = new PDO("{$driver}:host={$host}", "{$username}", "{$password}");
        $pdo->exec($sql);
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
        return [
         ['database', 'd', InputOption::VALUE_REQUIRED, 'Database to recreate.', null],
     ];
    }
}
