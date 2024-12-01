self.addEventListener('install', event => {
    console.log('Service Worker instalado');
    // Realiza la instalación (por ejemplo, caché)
});

self.addEventListener('activate', event => {
    console.log('Service Worker activado');
});

self.addEventListener('push', event => {
    const options = {
        body: event.data.text(),
        icon: 'icons/icon-192x192.png',
        badge: 'icons/icon-192x192.png'
    };

    event.waitUntil(
        self.registration.showNotification('Notificación push', options)
    );
});

self.addEventListener('notificationclick', event => {
    event.notification.close();
    // Define qué hacer cuando el usuario hace clic en la notificación
    event.waitUntil(
        clients.openWindow('/') // Redirigir a la página principal
    );
});

// Solicita permiso para notificaciones
function requestNotificationPermission() {
    if ('Notification' in window && navigator.serviceWorker) {
        Notification.requestPermission().then(permission => {
            if (permission === "granted") {
                console.log("Permiso para notificaciones concedido");
                // Aquí puedes registrar un Service Worker
                registerServiceWorker();
            } else {
                console.log("Permiso denegado para notificaciones");
            }
        });
    }
}

// Llamar a esta función cuando el usuario cargue la app
requestNotificationPermission();

// Registra el Service Worker
function registerServiceWorker() {
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/service-worker.js')
            .then(registration => {
                console.log('Service Worker registrado con éxito:', registration);
            })
            .catch(error => {
                console.log('Error al registrar el Service Worker:', error);
            });
    }
}

function subscribeUserToPush() {
    navigator.serviceWorker.ready.then(registration => {
        registration.pushManager.subscribe({
            userVisibleOnly: true, // Esto permite mostrar notificaciones
            applicationServerKey: urlB64ToUint8Array('<TU_CLAVE_PUBLICA>')
        })
        .then(subscription => {
            console.log('Usuario suscrito a notificaciones:', subscription);
            // Aquí puedes enviar esta suscripción a tu servidor para enviarla
        })
        .catch(error => {
            console.error('Error al suscribir al usuario:', error);
        });
    });
}

const admin = require("firebase-admin");

admin.initializeApp({
    credential: admin.credential.cert(serviceAccount),
    databaseURL: "https://your-database-name.firebaseio.com"
});

// Enviar notificación push
const message = {
    notification: {
        title: "Título de la notificación",
        body: "Mensaje de la notificación"
    },
    token: "<TOKEN_DEL_USUARIO>"
};

admin.messaging().send(message)
    .then(response => {
        console.log("Mensaje enviado exitosamente:", response);
    })
    .catch(error => {
        console.log("Error al enviar el mensaje:", error);
    });
