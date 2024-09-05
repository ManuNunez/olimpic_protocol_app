
function validateData() {
    event.preventDefault();
    sendForm();
}

function getData(id) {
    return document.getElementById(id).value;
}

function sendForm() {
    const name = $('#location_name').val();
    const classrooms = getData('classroom_quantity');
    const capacity = getData('classroom_capacity');
    const formData = {
        sede_name: name,
        classrooms: classrooms,
        capacity: capacity
    };
    $.ajax({
        url: "../controller/services/new_sede.php",
        type: "POST",
        data: formData,
        success: function(res) {
            alert(res);
        },
        error: function() {
            alert('¡Archivo no encontrado!');
        }
    });
}
