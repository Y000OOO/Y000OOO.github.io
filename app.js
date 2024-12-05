let deferredPrompt;

window.addEventListener('beforeinstallprompt', (event) => {
  event.preventDefault();
  deferredPrompt = event;

  const installButton = document.createElement('button');
  installButton.textContent = 'Instalar App';
  installButton.style.cssText = `
    position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 10px 20px;
    background-color: #875803;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  `;
  document.body.appendChild(installButton);

  installButton.addEventListener('click', () => {
    installButton.style.display = 'none';
    deferredPrompt.prompt();
    deferredPrompt.userChoice.then((choice) => {
      if (choice.outcome === 'accepted') {
        console.log('PWA instalada');
      } else {
        console.log('PWA no instalada');
      }
      deferredPrompt = null;
    });
  });
});
