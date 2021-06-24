<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class TypeContainer
 * Facade for TypeContainer getter.
 * @package Facade
 */
class TypeContainer extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'structure_types.types';
    }
}
