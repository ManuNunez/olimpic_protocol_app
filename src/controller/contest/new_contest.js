function validateData() {
    event.preventDefault();
    sendForm();
}

function getData(id) {
    return document.getElementById(id).value;
}

function getLevels() {
    var levels = [];
    var checkboxes = document.querySelectorAll('input[name="contest_level[]"]:checked');
    checkboxes.forEach(function(checkbox) {
        levels.push(checkbox.value);
    });
    return levels;
}

function sendForm() {
    const contestName = $('#contest_name').val();
    const sede = $('#sede').val();
    const contestDate = $('#contest_date').val();
    const contestDuration = $('#contest_duration').val(); // Nuevo campo para la duración del concurso
    const levels = getLevels();
    
    const formData = {
        contest_name: contestName,
        sede: sede,
        contest_date: contestDate,
        contest_duration: contestDuration, // Incluyendo la duración del concurso
        levels: levels
    };
    
    $.ajax({
        url: "../controller/services/new_contest.php",
        type: "POST",
        data: formData,
        success: function(res) {
            if (res.status === 1) {
                alert('El concurso se ha creado correctamente.');
            } else {
                alert('Error al crear el concurso: ' + res.error);
            }
        },
        error: function() {
            alert('Error al enviar el formulario. Intente de nuevo más tarde.');
        }
    });
    
}
