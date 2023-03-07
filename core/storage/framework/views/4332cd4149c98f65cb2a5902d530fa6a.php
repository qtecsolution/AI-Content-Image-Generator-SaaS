<!-- Web Application Manifest -->
<link rel="manifest" href="<?php echo e(route('laravelpwa.manifest')); ?>">
<!-- Chrome for Android theme color -->
<meta name="theme-color" content="<?php echo e($config['theme_color']); ?>">

<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="<?php echo e($config['display'] == 'standalone' ? 'yes' : 'no'); ?>">
<meta name="application-name" content="<?php echo e($config['short_name']); ?>">
<link rel="icon" sizes="<?php echo e(data_get(end($config['icons']), 'sizes')); ?>" href="<?php echo e(data_get(end($config['icons']), 'src')); ?>">

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="<?php echo e($config['display'] == 'standalone' ? 'yes' : 'no'); ?>">
<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo e($config['status_bar']); ?>">
<meta name="apple-mobile-web-app-title" content="<?php echo e($config['short_name']); ?>">
<link rel="apple-touch-icon" href="<?php echo e(data_get(end($config['icons']), 'src')); ?>">


<link href="<?php echo e($config['splash']['640x1136']); ?>" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['750x1334']); ?>" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['1242x2208']); ?>" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['1125x2436']); ?>" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['828x1792']); ?>" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['1242x2688']); ?>" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['1536x2048']); ?>" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['1668x2224']); ?>" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['1668x2388']); ?>" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['2048x2732']); ?>" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />

<!-- Tile for Win8 -->
<meta name="msapplication-TileColor" content="<?php echo e($config['background_color']); ?>">
<meta name="msapplication-TileImage" content="<?php echo e(data_get(end($config['icons']), 'src')); ?>">

<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script><?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/vendor/laravelpwa/meta.blade.php ENDPATH**/ ?>