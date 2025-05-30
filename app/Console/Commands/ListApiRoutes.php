<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ListApiRoutes extends Command
{
    protected $signature = 'route:list:api';
    protected $description = 'List only API routes';

    public function handle()
    {
        $this->call('route:list', ['--path' => 'api']);
    }
}
