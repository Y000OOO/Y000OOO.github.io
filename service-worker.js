// service-worker.js

const CACHE_NAME = "monarca-si-cache-v1";
const urlsToCache = [
    "/",
    "/index.html",
    "/app.js",
    "/style.css",
    "/manifest.json",
    "/icon-192x192.png",
    "/icon-512x512.png"
];

// Instalación del service worker y cacheo de archivos
self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(urlsToCache);
        })
    );
});

// Activación del service worker
self.addEventListener("activate", (event) => {
    const cacheWhitelist = [CACHE_NAME];
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cacheName) => {
                    if (!cacheWhitelist.includes(cacheName)) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});

// Intercepción de las solicitudes de red
self.addEventListener("fetch", (event) => {
    event.respondWith(
        caches.match(event.request).then((cachedResponse) => {
            // Si se encuentra en caché, se devuelve la respuesta de caché
            if (cachedResponse) {
                return cachedResponse;
            }
            // Si no se encuentra, se realiza la solicitud de red
            return fetch(event.request);
        })
    );
});
