<?php

namespace App\Domain\Countries\Data;

use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class CountryData extends Data
{
    public function __construct(
        #[Required] public readonly string $name,
        public readonly ?string $code,
        public readonly ?string $flag,
    ) {}
}
