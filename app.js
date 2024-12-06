let deferredPrompt;

// Evento que detecta si el navegador soporta la instalación como PWA
window.addEventListener('beforeinstallprompt', (e) => {
  e.preventDefault(); // Prevenimos el comportamiento por defecto
  deferredPrompt = e;

  // Verificamos si el botón de instalación existe antes de manipularlo
  const installButton = document.getElementById('installButton');
  if (installButton) {
    installButton.style.display = 'block'; // Mostramos el botón de instalación

    // Escuchamos el evento de clic en el botón de instalación
    installButton.addEventListener('click', () => {
      if (deferredPrompt) {
        deferredPrompt.prompt(); // Mostramos el cuadro de instalación
        deferredPrompt.userChoice.then((choiceResult) => {
          if (choiceResult.outcome === 'accepted') {
            console.log('User accepted the A2HS prompt');
          } else {
            console.log('User dismissed the A2HS prompt');
          }
          deferredPrompt = null; // Limpiamos el prompt para evitar futuras interacciones
        });
      }
    });
  }
});
