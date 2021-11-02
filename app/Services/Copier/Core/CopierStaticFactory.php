<?php

namespace App\Services\Copier\Core;

use App\Models\Offer;
use App\Models\Service;
use App\Services\Copier\OfferCopier;
use App\Services\Copier\ServiceCopier;

class CopierStaticFactory
{
    public static function build(string $key): CopierInterface
    {
        return match ($key){
           Offer::class => new OfferCopier(),
           Service::class => new ServiceCopier(),
       };
    }

}
