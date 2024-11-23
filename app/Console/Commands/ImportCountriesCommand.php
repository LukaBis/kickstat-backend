<?php

namespace App\Console\Commands;

use App\Domain\Countries\Services\CountriesImportService;
use Illuminate\Console\Command;

class ImportCountriesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-countries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importing countries from the external API';

    /**
     * Execute the console command.
     */
    public function handle(CountriesImportService $service): void
    {
        $result = $service->import();

        $this->info("Countries imported. Updated: {$result['updated']}, Created: {$result['created']}");
    }
}
