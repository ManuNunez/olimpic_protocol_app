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
    const levels = getLevels();
    const formData = {
        contest_name: contestName,
        sede: sede,
        contest_date: contestDate,
        levels: levels
    };
    $.ajax({
        url: "../controller/services/new_contest.php",
        type: "POST",
        data: formData,
        success: function(res) {
            alert(res);
        },
        error: function() {
            alert('Error al enviar el formulario. Intente de nuevo más tarde.');
        }
    });
}
