self.addEventListener('install', (event) => {
    event.waitUntil(
      caches.open('app-cache').then((cache) => {
        return cache.addAll(['./', './index.html', './styles.css', './app.js']);
      })
    );
  });
  
  self.addEventListener('push', (event) => {
    const options = {
      body: event.data.text(),
      icon: 'icon-192x192.png',
      badge: 'icon-192x192.png'
    };
    event.waitUntil(
      self.registration.showNotification('Nueva Tarea', options)
    );
  });
  
  self.addEventListener('fetch', (event) => {
    event.respondWith(
      caches.match(event.request).then((response) => {
        return response || fetch(event.request);
      })
    );
  });
  