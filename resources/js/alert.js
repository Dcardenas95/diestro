const success = document.getElementById('success');
setTimeout(() => {
    success.style.opacity = '0';
    success.style.transition = 'opacity 2s ease-in-out';
    setTimeout(() => {
        success.remove();
    }, 2000);
}, 1000); // tiempo de espera antes de ocultar


const error = document.getElementById('error');
setTimeout(() => {
    error.style.opacity = '0';
    error.style.transition = 'opacity 2s ease-in-out';
    setTimeout(() => {
        error.remove();
    }, 2000);
}, 1000); // tiempo de espera antes de ocultar


