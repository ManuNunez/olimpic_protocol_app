// Función para abrir el modal de edición
window.openEditModal = (button) => {

    const contest = JSON.parse(button.getAttribute('data-contest'));

    const contestCampuses = JSON.parse(button.getAttribute('data-contest-campuses'));

    // console.log(contestCampuses.data);

    // console.log(contest);

    document.getElementById('modal').classList.remove('hidden');
    document.getElementById('editContestForm').dataset.id = contest.id;
    document.getElementById('name').value = contest.name;
    document.getElementById('duration_minutes').value = contest.duration_minutes;
    document.getElementById('contest_date').value = contest.contest_date;
    document.getElementById('phase').value = contest.phase_type;
    document.getElementById('level1').checked = contest.level_1;
    document.getElementById('level2').checked = contest.level_2;
    document.getElementById('level3').checked = contest.level_3;
    document.getElementById('level4').checked = contest.level_4;
    document.getElementById('level5').checked = contest.level_5;
    document.getElementById('level6').checked = contest.level_6;
    document.getElementById('level7').checked = contest.level_7;
    document.getElementById('level8').checked = contest.level_8;

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




