<?php

namespace App\Services\Copier\Core;

use App\Models\Offer;
use App\Services\Copier\OfferCopier;

class CopierStaticFactory
{
    public static function build(string $key): CopierInterface
    {
        return match ($key){
           Offer::class => new OfferCopier()
       };
    }

}
