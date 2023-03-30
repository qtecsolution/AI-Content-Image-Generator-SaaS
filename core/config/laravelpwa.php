<?php

return [
    'name' => 'Type.ez',
    'manifest' => [
        'name' => env('APP_NAME', 'My PWA App'),
        'short_name' => 'R',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#d33636',
        'display' => 'standalone',
        'orientation' => 'any',
        'status_bar' => 'black',
        'icons' => [
            '72x72' => [
                'path' => 'assets/uploads/site/pwx5020.png',
                'purpose' => 'any',
            ],
            '96x96' => [
                'path' => 'assets/uploads/site/pwx5149.png',
                'purpose' => 'any',
            ],
            '128x128' => [
                'path' => 'assets/uploads/site/pwx8680.png',
                'purpose' => 'any',
            ],
            '144x144' => [
                'path' => 'assets/pwaIcons/icon-144x144.png',
                'purpose' => 'any',
            ],
            '152x152' => [
                'path' => 'assets/uploads/site/pwx9925.png',
                'purpose' => 'any',
            ],
            '192x192' => [
                'path' => 'assets/pwaIcons/icon-192x192.png',
                'purpose' => 'any',
            ],
            '384x384' => [
                'path' => 'assets/uploads/site/pwx9976.png',
                'purpose' => 'any',
            ],
            '512x512' => [
                'path' => 'assets/pwaIcons/icon-512x512.png',
                'purpose' => 'any',
            ],
        ],
        'splash' => [
            '640x1136' => 'assets/pwaIcons/splash-640x1136.png',
            '750x1334' => 'assets/pwaIcons/splash-750x1334.png',
            '828x1792' => 'assets/pwaIcons/splash-828x1792.png',
            '1125x2436' => 'assets/pwaIcons/splash-1125x2436.png',
            '1242x2208' => 'assets/pwaIcons/splash-1242x2208.png',
            '1242x2688' => 'assets/pwaIcons/splash-1242x2688.png',
            '1536x2048' => 'assets/pwaIcons/splash-1536x2048.png',
            '1668x2224' => 'assets/pwaIcons/splash-1668x2224.png',
            '1668x2388' => 'assets/pwaIcons/splash-1668x2388.png',
            '2048x2732' => 'assets/pwaIcons/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/assets/pwaIcons/icon-72x72.png",
                    "purpose" => "any",
                ],
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2',
            ],
        ],
        'custom' => [],
    ],
];
