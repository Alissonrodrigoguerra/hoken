<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'Hoken Água',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => true,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>Hoken</b>Água',
    'logo_img' => '/imagens/logo.gif',
    'logo_img_class' => 'brand-image img-responsive ',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',
    'logo_view' => '/imagens/logo.png',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#661-authentication-views-classes
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#662-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-light-warning elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

    'menu' => [
        [
            'text' => 'search',
            'search' => true,
            'topnav' => true,
        ],
       
        ['header' => ''],
        [
            'text'    => 'Banner',
            'icon'    => 'fas fa-pen-nib',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => 'painel/banner',
                ],
                [
                    'text'    => 'Novo Banner',
                    'url'     => 'painel/banner/create',
                   
                ],
               
            ],
        ],
       
        [
            'text'    => 'Blog',
            'icon'    => 'fas fa-pen-nib',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => 'painel/blog',
                ],
                [
                    'text'    => 'Novo Artigo',
                    'url'     => 'painel/blog/create',
                   
                ],
               
            ],
        ],

        [
            'text'    => 'Comentários',
            'icon'    => 'fas fa-box-open',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => 'painel/comentarios',
                ],
                [
                    'text'    => 'Novo Comentário',
                    'url'     => 'painel/comentarios/create',
                   
                ],
               
            ],
        ],

        [
            'text'    => 'Protudos',
            'icon'    => 'fas fa-box-open',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => 'painel/produto',
                ],
                [
                    'text'    => 'Novo Produto',
                    'url'     => 'painel/produto/create',
                   
                ],
               
            ],
        ],

       
        [
            'text'    => 'Manuais',
            'icon'    => 'fas fa-book-open',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Novo Maual',
                    'url'     => '#',
                   
                ],
               
            ],
        ],
        [
            'text'    => 'Dúvidas',
            'icon'    => 'fas fa-question-circle',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Novo Dúvida',
                    'url'     => '#',
                   
                ],
               
            ],
        ],
        [
            'text'    => 'Termos',
            'icon'    => 'fas fa-paste',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Novo termo',
                    'url'     => '#',
                   
                ],
               
            ],
        ],

        [
            'text'    => 'Franquias',
            'icon'    => 'fas fa-store',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Visualizar',
                    'url'     => '#',
                   
                ],
                [
                    'text'    => 'Nova Franquia',
                    'url'     => '#',
                   
                ],
               
            ],
        ],
      
        [
            'text'    => 'CAF',
            'icon'    => 'fas fa-ticket-alt',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Gestor',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Departamento',
                    'url'     => '#',
                   
                ],
                [
                    'text'    => 'Ticket',
                    'url'     => '#',
                   
                ],
               
            ],
        ],

        [
            'text'    => 'SAC',
            'icon'    => 'fas fa-headphones-alt',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Gestor',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Departamento',
                    'url'     => '#',
                   
                ],
                [
                    'text'    => 'Ticket',
                    'url'     => '#',
                   
                ],
               
            ],
        ],

        [
            'text'    => 'Marketing',
            'icon'    => 'fas fa-photo-video',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Categorias',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Listar',
                    'url'     => '#',
                   
                ],
                [
                    'text'    => 'Novo Arquivo',
                    'url'     => '#',
                   
                ],
               
            ],
        ],

        ['header' => 'Acessos'],

        [
            'text'    => 'Usuários',
            'icon'    => 'fas fa-user nav-icon',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => 'painel/usuario',
                ],
                [
                    'text'    => 'Cadastrar',
                    'url'     => 'painel/usuario/create',
                   
                ],
               
            ],
        ],

        ['header' => 'Permissões'],

        [
            'text'    => 'Tabelas',
            'icon'    => 'far fa-circle nav-icon',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Novo Artigo',
                    'url'     => '#',
                   
                ],
               
            ],
        ],
        [
            'text'    => 'Tabelas Grupos',
            'icon'    => 'far fa-circle nav-icon',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Novo Artigo',
                    'url'     => '#',
                   
                ],
               
            ],
        ],
        [
            'text'    => 'Acessos',
            'icon'    => 'far fa-circle nav-icon',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Novo Artigo',
                    'url'     => '#',
                   
                ],
               
            ],
        ],
       
        [
            'text'    => 'Área',
            'icon'    => 'far fa-circle nav-icon',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Novo Artigo',
                    'url'     => '#',
                   
                ],
               
            ],
        ],
        [
            'text'    => 'Ações',
            'class'   => 'nav-link active',
            'icon'    => 'far fa-circle nav-icon',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Novo Artigo',
                    'url'     => '#',
                   
                ],
               
            ],
        ],
        [
            'text'    => 'Cargos',
            'icon'    => 'far fa-circle nav-icon',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Novo Artigo',
                    'url'     => '#',
                   
                ],
               
            ],
        ],
        [
            'text'    => 'Áreas',
            'icon'    => 'far fa-circle nav-icon',
            'icon_color' => 'cyan',

            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Novo Artigo',
                    'url'     => '#',
                   
                ],
               
            ],
        ],
        
        
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'summernote' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true ,
                    'location' => 'plugins/summernote/summernote-bs4.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/summernote/summernote-bs4.min.js',
                ],
            ],

        ],

        'daterangepicker' => [
            'active' => true,
            'files' => [
         
                [
                    'type' => 'css',
                    'asset' => true ,
                    'location' => 'plugins/daterangepicker/daterangepicker.css',
                ],
                // [
                //     'type' => 'css',
                //     'asset' => true ,
                //     'location' => 'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                // ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/moment/moment.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/daterangepicker/daterangepicker.js',
                ],
               
            ],

        ],
        'slick' => [
            'active' => false,
            'files' => [
         
                [
                    'type' => 'css',
                    'asset' => true ,
                    'location' => 'plugins/slick/slick.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true ,
                    'location' => 'plugins/slick/slick-theme.css',
                ],
        
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//code.jquery.com/jquery-1.11.0.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//code.jquery.com/jquery-migrate-1.2.1.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/slick/slick.min.js',
                ],
               
            ],

        ],
        
    ],
];
