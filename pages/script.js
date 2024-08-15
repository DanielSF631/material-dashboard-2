document.addEventListener('DOMContentLoaded', function() {
    var modalTrigger = document.querySelector('.modal-trigger');
    var modal = document.querySelector('.modal');
    var modalClose = document.querySelector('.modal-close');

    // Abrir modal al hacer clic en el botón
    modalTrigger.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'flex';
    });

    // Cerrar modal al hacer clic en el botón de cerrar o fuera del contenido del modal
    modalClose.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal')) {
            modal.style.display = 'none';
        }
    });
});
