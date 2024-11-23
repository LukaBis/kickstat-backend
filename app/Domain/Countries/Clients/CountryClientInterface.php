<?php

declare(strict_types=1);

namespace App\Domain\Countries\Clients;

use App\Domain\Countries\Data\CountryData;

interface CountryClientInterface
{
    /**
     * @return array<CountryData>
     */
    public function getCountries(): array;
}
