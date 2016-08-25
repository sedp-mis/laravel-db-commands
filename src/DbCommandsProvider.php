<?php

namespace SedpMis\DbCommands;

use Illuminate\Support\Facades\Artisan;

class DbCommandsProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->commands('SedpMis\DbCommands\DbRecreateCommand');
        $this->commands('SedpMis\DbCommands\DbRemigrateCommand');
    }

    public function register() {}
}
