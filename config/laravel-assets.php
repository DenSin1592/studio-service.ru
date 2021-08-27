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

                'vendor/swiper-4.5.1/dist/css/swiper.min.css',
                'vendor/fancybox-master/dist/jquery.fancybox.min.css',
                'vendor/twentytwenty-master/css/twentytwenty.css',
                'css/client/auth_menu.css',
                'css/client/style.css',
            ],
            'filters' => ['css_min', 'embed_css', 'strip_bom', 'css_url_rebase'],
            //'async' => true,
            'output' => 'css/compiled/client_layout.css'
        ],

        'client_js' => [
            'assets' => [
                'vendor/jquery/v3/jquery-3.3.1.min.js',
                'vendor/popper/popper.min.js',
                'vendor/bootstrap-4.6.0/js/dist/util.js',
                'vendor/bootstrap-4.6.0/js/dist/tab.js',
                'vendor/bootstrap-4.6.0/js/dist/collapse.js',
                'vendor/bootstrap-4.6.0/js/dist/modal.js',
                'vendor/bootstrap-4.6.0/js/dist/tooltip.js',
                'vendor/swiper-4.5.1/dist/js/swiper.min.js',
                'vendor/fancybox-master/dist/jquery.fancybox.min.js',
                'vendor/twentytwenty-master/js/jquery.twentytwenty.js',
                'vendor/twentytwenty-master/js/jquery.event.move.js',
                'vendor/bs-custom-file-input/bs-custom-file-input.min.js',
                'vendor/jquery.validate/jquery.validate.min.js',
                'vendor/jquery.validate/additional-methods.min.js',
                'vendor/jquery.validate/additional-methods.ext.js',
                'vendor/jquery.validate/additional-methods.ext.js',
                'vendor/jquery.inputmask/jquery.inputmask.min.js',

                'js/common/csrf.js',
                'js/common/inputmask.init.js',


                'js/client/header.js',
                'js/client/sliders.js',
                'js/client/forms.js',
                'js/client/services.js',
                'js/client/offcanvas.js',
                'js/client/fancybox.js',
                'js/client/tooltip.js',
                'js/client/twentytwenty.js',
                'js/client/swiper_helpers.js',
                'js/client/auth_menu.js',
                'js/client/feedback.js',
                'js/client/modal_message.js',
            ],
            'filters' => ['js_min', 'end_with_semicolon'],
            //'async' => true,
            'output' => 'js/compiled/client_layout.js'
        ],



        'admin_css' => [
            'assets' => [
                'vendor/bootstrap/v3/css/bootstrap.min.css',
                'vendor/bootstrap/v3/css/bootstrap-theme.min.css',
                'vendor/datetimepicker/css/jquery.datetimepicker.css',
                'vendor/font-awesome/css/font-awesome.min.css',
                'vendor/fancybox/fancybox.jquery.min.css',
                'vendor/select2/select2.min.css',
                'vendor/select2/select2-bootstrap.min.css',
                'vendor/jquery.dataTables/css/dataTables.bootstrap.css',
                'vendor/jquery.dataTables/css/fixedHeader.dataTables.min.css',
                'css/admin/base.css',
                'css/admin/element_list.css',
                'css/admin/forms.css',
                'css/admin/guest.css',
                'css/admin/modal_associations.css',
                'css/admin/menu.css',
                'css/admin/admin_users.css',
                'css/admin/admin_roles.css',
                'css/admin/node_structure.css',
                'css/admin/settings.css',
                'css/admin/scrollable_container.css',
                'css/admin/select2_customisation.css',
                'css/admin/feedback.css',
            ],
            'filters' => ['css_min', 'embed_css', 'strip_bom', 'css_url_rebase'],
            //'async' => true,
            'output' => 'css/compiled/admin.css'
        ],
        'admin_js' => [
            'assets' => [
                'vendor/jquery/v2/jquery-2.1.3.min.js',
                'vendor/jquery-ui/jquery-ui.min.js',
                'vendor/bootstrap/v3/js/bootstrap.min.js',
                'vendor/datetimepicker/js/jquery.datetimepicker.js',
                'vendor/fancybox/fancybox.jquery.min.js',
                'vendor/tinymce/tinymce.min.js',
                'vendor/select2/select2.min.js',
                'vendor/select2/i18n/ru.js',
                'vendor/jquery.inputmask/jquery.inputmask.min.js',
                'vendor/jquery.inputmask/inputmask.binding.js',
                'vendor/js.cookie/js.cookie.js',
                'vendor/jquery.dataTables/js/jquery.dataTables.js',
                'vendor/jquery.dataTables/js/dataTables.bootstrap.js',
                'vendor/jquery.dataTables/js/dataTables.fixedHeader.min.js',
                'js/admin/settings.js',
                'js/admin/hooks.js',
                'js/admin/datetimepicker_init.js',
                'js/admin/structure.js',
                'js/admin/sortable_tree.js',
                'js/admin/menu.js',
                'js/admin/tinymce_init.js',
                'js/admin/pagination.js',
                'js/admin/element_list.js',
                'js/admin/admin_users.js',
                'js/admin/modal_associations.js',
                'js/admin/model_search.js',

                'js/common/csrf.js',
                'js/common/inputmask.init.js',
            ],
            'filters' => ['js_min', 'end_with_semicolon'],
            //'async' => true,
            'output' => 'js/compiled/admin.js'
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
