function validateData(event) {
    event.preventDefault();

    const form = document.getElementById('record');
    const formElements = form.elements;

    for (let i = 0; i < formElements.length; i++) {
        if (!formElements[i].checkValidity()) {
        // Si algún campo no es válido, mostrar mensaje de error y salir de la función
        alert('Por favor, complete todos los campos correctamente.');
        return;
        }
    }

    sendForm();
}

function sendForm() {
    const username = $('#username').val();
    const password = $('#password').val();
    const formData = {
        username,
        password
    };
    $.ajax({
        url: "../controller/services/sing_in.php",
        type: "POST",
        data: formData,
        success: function(res) {
            console.log(res);

            const ans = JSON.parse(res);
            if (ans[0] === 0) { // Si es un error
                if (ans[1] == 'User not found') {
                    alert('Usuario no encontrado');
                } else {
                    alert('Error durante la consulta: ' + ans[1]);
                }
            }else{

                window.location.href = "?section=attendanceList";
            }
        },
        error: function() {
            alert('Inicio de sesión fallido');
        }
    });
}
