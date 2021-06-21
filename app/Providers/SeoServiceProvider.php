<?php

namespace App\Providers;

use App\Services\Seo\MetaHelper;
use Illuminate\Support\ServiceProvider;

class SeoServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            MetaHelper::class,
            function () {
                $metaHelper = new MetaHelper();
                $additionalData = [
                    'phone' => \Setting::get('site_content.phone'),
                ];

                $this->addDefaultRule($metaHelper, $additionalData);

                return $metaHelper;
            }
        );
    }


    private function addDefaultRule(MetaHelper $metaHelper, array $additionalData): void
    {
        $metaHelper->addRule(
            function (array $metaData, array $input) use ($additionalData) {
                $object = \Arr::get($input, 'object');
                $name = \Arr::get($input, 'name');
                if (empty($name) && !is_null($object)) {
                    $name = object_get($object, 'name');
                }
                $name = (string)$name;
                $phone = \Arr::get($additionalData, 'phone');

                if (empty($metaData['meta_title'])) {
                    $metaData['meta_title'] = $name . ' | studio-service.ru';
                }

                if (empty($metaData['meta_description'])) {
                    $metaData['meta_description'] = $name . ' | studio-service.ru | ' . $phone;
                }

                if (empty($metaData['meta_keywords'])) {

                    $metaData['meta_keywords'] = mb_strtolower($name) . ', studio-service';
                }

                return $metaData;
            }
        );
    }
}
