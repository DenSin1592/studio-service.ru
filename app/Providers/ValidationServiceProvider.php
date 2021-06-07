<?php namespace App\Providers;

use App\Services\Validation\ValidationRules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

/**
 * Class ValidationServiceProvider
 * @package App\Services\Providers
 */
class ValidationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('subset', ValidationRules\Common::class . '@validateSubset');
        Validator::replacer('subset', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':variants', implode(', ', $parameters), $message);
        });

        Validator::extend('local_or_remote_file', ValidationRules\File::class . '@validateLocalOrRemoteFile');
        \Validator::replacer(
            'local_or_remote_file',
            function ($message, $attribute, $rule, $parameters) {
                return '';
            }
        );

    }
}
