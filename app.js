if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('./service-worker.js')
        .then((registration) => {
            console.log('Service Worker registrado:', registration);
        })
        .catch((error) => {
            console.error('Error al registrar el Service Worker:', error);
        });
}

document.getElementById('task-form').addEventListener('submit', (event) => {
    event.preventDefault();
    const taskInput = document.getElementById('task-input');
    const task = taskInput.value;

    if (task) {
        // Agregar tarea a la lista
        const taskList = document.getElementById('task-list');
        const listItem = document.createElement('li');
        listItem.textContent = task;
        taskList.appendChild(listItem);

        // Limpiar campo de entrada
        taskInput.value = '';

        // Mostrar notificación
        if ('Notification' in window && Notification.permission === 'granted') {
            new Notification('Nueva tarea agregada', { body: task });
        } else if ('Notification' in window && Notification.permission !== 'denied') {
            Notification.requestPermission().then((permission) => {
                if (permission === 'granted') {
                    new Notification('Nueva tarea agregada', { body: task });
                }
            });
        }
    }
});
