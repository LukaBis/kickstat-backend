<?php

declare(strict_types=1);

namespace App\Domain\Countries\Services;

use App\Domain\Countries\Clients\CountryClientInterface;
use App\Domain\Countries\Models\Country;
use Illuminate\Support\Facades\DB;

class CountriesImportService
{
    public function __construct(private CountryClientInterface $client) {}

    /**
     * @return array{updated: int, created: int}
     */
    public function import(): array
    {
        $countries = $this->client->getCountries();

        try {
            DB::beginTransaction();

            $updatedCount = 0;
            $createdCount = 0;

            foreach ($countries as $countryDto) {
                if (Country::where('name', $countryDto->name)->exists()) {
                    $country = Country::where('name', $countryDto->name)->firstOrFail();
                    $country->code = $countryDto->code;
                    $country->flag = $countryDto->flag;
                    $country->save();
                    $updatedCount++;
                } else {
                    $country = Country::create([
                        'name' => $countryDto->name,
                        'code' => $countryDto->code,
                        'flag' => $countryDto->flag,
                    ]);
                    $createdCount++;
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return [
            'updated' => $updatedCount,
            'created' => $createdCount,
        ];
    }
}
