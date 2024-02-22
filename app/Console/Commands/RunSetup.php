<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RunSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to setup the project with ease';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $commands = collect(["key:generate", "migrate --seed"]);

        $this->info("🚀🚀🚀  Running setup for the application  🚀🚀🚀");

        $progressBar = $this->output->createProgressBar($commands->count());
        $commands->each(function ($command) use ($progressBar) {
            Artisan::call($command);
            $progressBar->advance();
        });

        $progressBar->finish();

        $this->info("\n🚀🚀🚀  Running setup for the application is completed  🚀🚀🚀");
        return 0;
    }
}
