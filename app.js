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

function notifyUser() {
  if (Notification.permission === 'granted') {
    navigator.serviceWorker.getRegistration().then((registration) => {
      registration.showNotification('Tarea registrada con éxito');
    });
  }
}

document.getElementById('task-form').addEventListener('submit', function (e) {
  e.preventDefault();
  
  const taskInput = document.getElementById('task-input');
  const taskText = taskInput.value.trim();
  if (taskText) {
    const taskList = document.getElementById('task-list');
    const taskItem = document.createElement('li');
    taskItem.textContent = taskText;
    taskList.appendChild(taskItem);
    
    // Notificar al usuario
    notifyUser();

    // Limpiar el campo de tarea
    taskInput.value = '';
  }
});
