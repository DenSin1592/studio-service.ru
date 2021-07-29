<?php


namespace App\Services\FormProcessors;


abstract class BaseSubProcessor implements SubProcessorInterface
{
    public function prepareInputData(array $data): array
    {
        return $data;
    }
}
