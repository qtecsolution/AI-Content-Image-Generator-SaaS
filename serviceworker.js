var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/assets/css/style.min.css',
    '/assets/uploads/pwaIcons/icon-72x72.png',
    '/assets/uploads/pwaIcons/icon-96x96.png',
    '/assets/uploads/pwaIcons/icon-128x128.png',
    '/assets/uploads/pwaIcons/icon-144x144.png',
    '/assets/uploads/pwaIcons/icon-152x152.png',
    '/assets/uploads/pwaIcons/icon-192x192.png',
    '/assets/uploads/pwaIcons/icon-384x384.png',
    '/assets/uploads/pwaIcons/icon-512x512.png',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});