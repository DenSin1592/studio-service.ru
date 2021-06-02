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
        'client_css' => [
            'assets' => [

            ],
            'filters' => ['css_min', 'embed_css', 'strip_bom', 'css_url_rebase'],
            //'async' => true,
            'output' => 'client.css'
        ],
        'client_js' => [
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
