// Función para abrir el modal de edición
window.openEditModal = (button) => {

    const contest = JSON.parse(button.getAttribute('data-contest'));

    const contestCampuses = JSON.parse(button.getAttribute('data-contest-campuses'));

    // console.log(contestCampuses.data);

    // console.log(contest);

    document.getElementById('modal').classList.remove('hidden');
    document.getElementById('editContestForm').dataset.id = contest.id;
    document.getElementById('name').defaultValue = contest.name;
    document.getElementById('duration_minutes').defaultValue = contest.duration_minutes;
    const contestTime = document.getElementById('contest_date');
    contestTime.defaultValue = contest.contest_date;
    const formatTime = contestTime.value;
    contestTime.defaultValue = formatTime;
    // document.getElementById('contest_date').defaultValue = contest.contest_date;

    document.getElementById('phase_type').defaultValue = contest.phase_type;
    document.getElementById('level_1').defaultChecked = contest.level_1;
    document.getElementById('level_2').defaultChecked = contest.level_2;
    document.getElementById('level_3').defaultChecked = contest.level_3;
    document.getElementById('level_4').defaultChecked = contest.level_4;
    document.getElementById('level_5').defaultChecked = contest.level_5;
    document.getElementById('level_6').defaultChecked = contest.level_6;
    document.getElementById('level_7').defaultChecked = contest.level_7;
    document.getElementById('level_8').defaultChecked = contest.level_8;

    displayCampuses(contestCampuses.data, contest.id);
};

    // Función para cerrar el modal
window.closeModal = () => {
    document.getElementById('modal').classList.add('hidden');
};

const displayCampuses = (campuses, id) => {
    const campusListContainer = document.getElementById('campusList');
    campusListContainer.innerHTML = ''; // Limpiar lista antes de agregar nuevos elementos

    const filteredCampuses = campuses.filter(campus => campus.contest_id === id);

    filteredCampuses.forEach(campus => {
        const listItem = document.createElement('li');
        listItem.className = 'p-2 border-b'; 
        listItem.textContent = campus.campus_name;
        campusListContainer.appendChild(listItem);
    });
};

const convertToInputFormat = (value) => {
    return value;
}

window.saveChanges = async () => {
    
    const data = {};
    const inputs = document.querySelectorAll('input');
    const form = document.getElementById('editContestForm');
    const id_ = form.dataset.id;
    // console.log(id_);
    data['id'] = id_;
    

    inputs.forEach(input => {

        // if (input.type === 'datetime-local') {
        //     let inputValue = input.value
        //     input.value = convertToInputFormat(inputValue);
        //     console.log(input.value);
        // }

        if (input.value !== input.defaultValue) {
            if (input.type === 'checkbox') {
                data[input.id] = input.checked ? true : false;
            } else if (input.value !== input.defaultValue) {
                data[input.id] = input.value;
            }
        }
    });
    
    // console.log(data);

    if (Object.keys(data).length === 0) {
        showErrorModal('No se realizaron cambios.');
        return;
    }

    // Convertir los datos en un string para consulta
    const queryString = new URLSearchParams(data).toString();
    // console.log(queryString);

    try{
        const response = await fetch('../models/contest/update_contest.php', {
            method: 'POST',
            headers: {
                'Content-type': 'application/x-www-form-urlencoded',
            },
            body: queryString,
        });

        const result = await response.json();
        // console.log(result);

        if (result.status == 1) {
            updateInputDefaults(data);
            showErrorModal('Datos actualizados exitosamente', 'Aviso');
        } else {
            showErrorModal(result.error);
        }

    } catch (error) {
        showErrorModal('Hubo problema con la solicitud - Intentelo de nuevo');
    }

}

const updateInputDefaults = (updatedValues) => {
    for (const [id, value] of Object.entries(updatedValues)) {
        const input = document.getElementById(id);
        if (input) {
            input.defaultValue = value; // Actualizar el valor por defecto
        }
    }
}

const showErrorModal = (message, title) => {
    // Obtener elementos del modal y el fondo
    const modal = document.getElementById('errorModal');
    const background = document.querySelector('#errorModal .fixed.bg-black');

    const modalTitle = document.getElementById('errorModalTitle');
    const modalMessage = document.getElementById('errorModalMessage');

    if(title) modalTitle.textContent = title;
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




