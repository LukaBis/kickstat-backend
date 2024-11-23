<?php

declare(strict_types=1);

namespace App\Domain\Countries\Clients;

use App\Domain\Countries\Data\CountryData;
use Illuminate\Support\Facades\Http;

class CountryClient implements CountryClientInterface
{
    public function getCountries(): array
    {
        $response = Http::countries()->get('/');

        return CountryData::collect($response->json()['response']);
    }
}
