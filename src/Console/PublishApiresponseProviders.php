<?php

namespace Jeybin\Apiresponse\Console;

use Illuminate\Console\Command;

class PublishApiresponseProviders extends Command {

    protected $signature = 'apiresponse:install';

    protected $description = 'Publishing api response providers';

    public function handle() {
        $this->info('Publishing providers');

        $this->call('vendor:publish', [
            '--provider' => "Jeybin\Apiresponse\Providers\ApiresponseServiceProvider",
            '--force'=>true
        ]);

        $this->info('Installed !');
    }
}