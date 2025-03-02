const CacheStatic = 'static-cache-v2';
const CacheDynamic = 'dynamic-cache-v2';

// Cache Assets
// A list of local resources we always want to be cached.
const assets = [
  'index.html',
  '/',
  'https://fonts.googleapis.com/css?family=Inter:400,500,700&display=swap',
  'https://unpkg.com/ionicons@5.0.0/dist/ionicons.js',
  'assets/js/lib/jquery-3.4.1.min.js',
  'assets/js/lib/popper.min.js',
  'assets/js/lib/bootstrap.min.js',
  'assets/js/plugins/owl-carousel/owl.carousel.min.js',
  'assets/js/base.js',
  'assets/css/inc/owl-carousel/owl.carousel.min.css',
  'assets/css/inc/owl-carousel/owl.theme.default.css',
  'assets/css/inc/bootstrap/bootstrap.min.css',
  'assets/css/style.css',
];

// Cache Size Limits
const limitCacheSize = (name, size) => {
  caches.open(name).then(cache => {
    cache.keys().then(keys => {
      if (keys.length > size) {
        cache.delete(keys[0]).then(limitCacheSize(name, size));
      }
    });
  });
};

// Install Service Workers
self.addEventListener('install', evt => {
  evt.waitUntil(
    caches.open(CacheStatic).then((cache) => {
      console.log('cache success!');
      cache.addAll(assets);
    })
  );
});

// Active Service Workers
self.addEventListener('activate', evt => {
  evt.waitUntil(
    caches.keys().then(keys => {
      return Promise.all(keys
        .filter(key => key !== CacheStatic && key !== CacheDynamic)
        .map(key => caches.delete(key))
      );
    })
  );
});

// Fetch
self.addEventListener('fetch', evt => {
  if (evt.request.url.indexOf('www.yoururl.com') === -1) {
    evt.respondWith(
      caches.match(evt.request).then(cacheRes => {
        return cacheRes || fetch(evt.request).then(fetchRes => {
          return caches.open(CacheDynamic).then(cache => {
            cache.put(evt.request.url, fetchRes.clone());
            limitCacheSize(CacheDynamic, 15);
            return fetchRes;
          })
        });
      }).catch(() => {
        if (evt.request.url.indexOf('.html') > -1) {
          return caches.match('index.html');
        }
      })
    );
  }
});
