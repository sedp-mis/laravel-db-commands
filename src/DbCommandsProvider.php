<?php

namespace SedpMis\DbCommands;

class DbCommandsProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->commands('SedpMis\DbCommands\DbRecreateCommand');
        $this->commands('SedpMis\DbCommands\RemigrateCommand');
    }

    public function register()
    {
    }
}
