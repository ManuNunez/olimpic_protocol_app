function validateData() {
    // event.preventDefault();

    const form = document.getElementById('record');
    const formElements = form.elements;

    for (let i = 0; i < formElements.length; i++) {
        if (!formElements[i].checkValidity()) {
            // Si algún campo no es válido, mostrar mensaje de error y salir de la función
            showErrorModal('Por favor, complete todos los campos correctamente.');
            return;
        }
    }

    sendForm();
}

const sendForm = async () => {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const formData = new URLSearchParams();
    formData.append('username', username);
    formData.append('password', password);

    try {
        const response = await fetch('../models/services/sing_in.php', {
            method: 'POST',
            body: formData,
            credentials: 'include' // Incluye las credenciales en la solicitud
        });

        if (!response.ok) {
            throw new Error('File not Found!');
        }

        const res = await response.json();
        console.log(res);

        if (res.status == 1) {
            console.log('User logged.');
            window.location.href = '?section=contest';
        } else if (res.error) {
            showErrorModal(res.error);
        } else {
            showErrorModal('Error desconocido.');
        }
    } catch (error) {
        showErrorModal(error.message); // Mensaje de error si no se encuentra el archivo
    }
}

const showErrorModal = (message) => {
    // Obtener elementos del modal y el fondo
    const modal = document.getElementById('errorModal');
    const background = document.querySelector('#errorModal .fixed.bg-black');

    const modalMessage = document.getElementById('errorModalMessage');

    modalMessage.textContent = message;

    // Mostrar el modal
    modal.classList.remove('hidden');
    background.classList.add('block');

    // evento para cerrar el modal
    const closeButtons = document.querySelectorAll('[data-modal-hide="hideErrorModalButton"]');

    closeButtons.forEach((button) => {
        button.addEventListener('click', hideErrorModal);
    });
};

const hideErrorModal = () => {
    const modal = document.getElementById('errorModal');
    const background = document.querySelector('#errorModal .fixed.bg-black');

    modal.classList.add('hidden');
    background.classList.remove('block');
};



