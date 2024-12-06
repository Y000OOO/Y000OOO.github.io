// Durante la instalación del Service Worker, almacenamos los recursos en la caché
self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open('app-cache').then((cache) => {
      // Los archivos importantes para el funcionamiento offline
      return cache.addAll([
        './', 
        './index.html', 
        './styles.css', 
        './app.js', 
        './icon-192x192.png',  // Asegúrate de agregar tu ícono
        './icon-512x512.png'   // Si usas íconos adicionales
      ]);
    })
  );
});

// Manejo de notificaciones push
self.addEventListener('push', (event) => {
  const options = {
    body: event.data ? event.data.text() : 'Tienes una nueva tarea pendiente.',
    icon: 'icon-192x192.png',
    badge: 'icon-192x192.png'
  };

  event.waitUntil(
    self.registration.showNotification('Nueva Tarea', options)
  );
});

// Durante la activación del Service Worker, limpiamos cachés antiguos
self.addEventListener('activate', (event) => {
  const cacheWhitelist = ['app-cache']; // Lista de cachés que queremos conservar

  event.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames.map((cacheName) => {
          if (!cacheWhitelist.includes(cacheName)) {
            // Eliminar cachés antiguos
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

// Interceptar peticiones de red para servir contenido desde la caché o la red
self.addEventListener('fetch', (event) => {
  event.respondWith(
    caches.match(event.request).then((response) => {
      // Si el archivo está en caché, devolverlo
      if (response) {
        return response;
      }

      // Si no está en caché, hacer la petición de red y almacenar la respuesta en caché
      return fetch(event.request).then((networkResponse) => {
        // Solo almacenar en caché las respuestas exitosas
        if (networkResponse && networkResponse.status === 200) {
          caches.open('app-cache').then((cache) => {
            cache.put(event.request, networkResponse.clone());
          });
        }
        return networkResponse;
      });
    })
  );
});
