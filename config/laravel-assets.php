<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Merge environments
    |--------------------------------------------------------------------------
    |
    | List of environments, where assets should be merged.
    |
     */
    'merge_environments' => ['production'],

    /*
    |--------------------------------------------------------------------------
    | Groups
    |--------------------------------------------------------------------------
    |
    | Groups of assets to run over a set of filters into an output file.
    | By default, all paths to files begin in the public_path() directory.
    | The order of asset definition is maintained in the output file.
    |
     */

    'groups' => [
        'admin_css' => [
            'assets' => [
                'vendor/bootstrap/css/v3/bootstrap.min.css',
                'vendor/bootstrap/css/v3/bootstrap-theme.min.css',
                'vendor/font-awesome/css/font-awesome.min.css',
                'vendor/fancybox/fancybox.jquery.min.css',
                'vendor/datetimepicker/css/jquery.datetimepicker.css',
                'vendor/select2/select2.min.css',
                'vendor/select2/select2-bootstrap.min.css',
                'vendor/jquery.dataTables/css/dataTables.bootstrap.css',
                'vendor/jquery.dataTables/css/fixedHeader.dataTables.min.css',
                'css/admin/base.css',
                'css/admin/guest.css',
            ],
            'filters' => ['css_min', 'embed_css', 'strip_bom', 'css_url_rebase'],
            //'async' => true,
            'output' => 'client.css'
        ],
        'admin_js' => [
            'assets' => [

            ],
            'filters' => ['js_min', 'end_with_semicolon'],
            //'async' => true,
            'output' => 'client.js'
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Filters
    |--------------------------------------------------------------------------
    |
    | Name => class key-values for filters to use.
    | The use of closure based filters are also possible.
    |
     */

    'filters' => [
        'css_min' => \Assetic\Filter\CssMinFilter::class,
        'embed_css' => \Diol\LaravelAssets\Filter\LimitedEmbedCss::class,
        'css_url_rebase' => \Diol\LaravelAssets\Filter\CssUrlRebase::class,
        'strip_bom' => \Diol\LaravelAssets\Filter\StripBomFilter::class,

        'js_min' => \Assetic\Filter\JSMinFilter::class,
        'end_with_semicolon' => \Diol\LaravelAssets\Filter\EndWithSemicolon::class,
    ],
];
