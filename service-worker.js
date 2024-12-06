const CACHE_NAME = 'mi-app-cache-v1';
const urlsToCache = [
  './',
  './index.html',
  './manifest.json',
  './icon-192x192.png',
  './icon-512x512.png'
];

// Instalar el Service Worker
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME).then(cache => {
      console.log('Archivos en caché durante la instalación');
      return cache.addAll(urlsToCache);
    })
  );
});

// Activar el Service Worker
self.addEventListener('activate', event => {
  console.log('Service Worker activado');
});

// Manejo de solicitudes
self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request).then(response => response || fetch(event.request))
  );
});

// Manejo de notificaciones push
self.addEventListener('push', event => {
  const data = event.data ? event.data.text() : 'Notificación sin contenido';
  const options = {
    body: data,
    icon: './icon-192x192.png'
  };
  event.waitUntil(
    self.registration.showNotification('Mi PWA', options)
  );
});
