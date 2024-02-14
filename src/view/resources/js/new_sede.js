
function validateData() {
    event.preventDefault();
    sendForm();
}

function getData(id) {
    return document.getElementById(id).value;
}

function sendForm() {
    const name = getData('location_name');
    const classrooms = getData('classroom_quantity');
    const capacity = getData('classroom_capacity');

    const formData = {
        name: name,
        classrooms: classrooms,
        capacity: capacity
    };

    $.ajax({
        url: "../controller/services/new_sede.php",
        type: "POST",
        data: formData,
        success: function(res) {
            if (res == 1) {
                window.location.href = '?section=locations';
            }
        },
        error: function() {
            alert('¡Archivo no encontrado!');
        }
    });
}
