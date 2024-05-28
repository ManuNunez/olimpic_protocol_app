
function openModal(modalId, id) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
        if (id === -1) {
            console.log('Abriendo modal para crear un nuevo concurso');
        } else {
            console.log('Abriendo modal para editar el concurso con ID:', id);
        }
    }
}

function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
    }
}