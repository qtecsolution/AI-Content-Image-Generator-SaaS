<?php

return [
    'name' => readConfig('name'),
    'manifest' => [
        'name' => readConfig('name'),
        'short_name' => 'R',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#d33636',
        'display' => 'standalone',
        'orientation' => 'any',
        'status_bar' => 'black',
        'icons' => [
            '72x72' => [
                'path' => 'assets/uploads/pwaIcons/icon-72x72.png',
                'purpose' => 'any',
            ],
            '96x96' => [
                'path' => 'assets/uploads/pwaIcons/icon-96x96.png',
                'purpose' => 'any',
            ],
            '128x128' => [
                'path' => 'assets/uploads/pwaIcons/icon-128x128.png',
                'purpose' => 'any',
            ],
            '144x144' => [
                'path' => 'assets/uploads/pwaIcons/icon-144x144.png',
                'purpose' => 'any',
            ],
            '152x152' => [
                'path' => 'assets/uploads/pwaIcons/icon-152x152.png',
                'purpose' => 'any',
            ],
            '192x192' => [
                'path' => 'assets/uploads/pwaIcons/icon-192x192.png',
                'purpose' => 'any',
            ],
            '384x384' => [
                'path' => 'assets/uploads/pwaIcons/icon-384x384.png',
                'purpose' => 'any',
            ],
            '512x512' => [
                'path' => 'assets/uploads/pwaIcons/icon-512x512.png',
                'purpose' => 'any',
            ],
        ],
        'splash' => [
            '640x1136' => 'assets/uploads/pwaIcons/splash-640x1136.png',
            '750x1334' => 'assets/uploads/pwaIcons/splash-750x1334.png',
            '828x1792' => 'assets/uploads/pwaIcons/splash-828x1792.png',
            '1125x2436' => 'assets/uploads/pwaIcons/splash-1125x2436.png',
            '1242x2208' => 'assets/uploads/pwaIcons/splash-1242x2208.png',
            '1242x2688' => 'assets/uploads/pwaIcons/splash-1242x2688.png',
            '1536x2048' => 'assets/uploads/pwaIcons/splash-1536x2048.png',
            '1668x2224' => 'assets/uploads/pwaIcons/splash-1668x2224.png',
            '1668x2388' => 'assets/uploads/pwaIcons/splash-1668x2388.png',
            '2048x2732' => 'assets/uploads/pwaIcons/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/assets/uploads/pwaIcons/icon-72x72.png",
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
