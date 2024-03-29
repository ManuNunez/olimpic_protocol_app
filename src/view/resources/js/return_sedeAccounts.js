
// Función para abrir el modal
function openModal(action, sedeId) {
    //console.log("Botón Consultar de la sede con ID:", sedeId);
    getSedeAccounts(sedeId);
}

function getSedeAccounts(id) {
    $.ajax({
        url: "../controller/services/return_sedeAccounts.php",
        type: "POST",
        data: { id: id },
        success: function(res) {
            // Mostrar los datos en el modal
            //console.log(res);
            const accounts = JSON.parse(res);
            mostrarCuentas(accounts);
        },
        error: function() {
        }
    });
}

// Función para mostrar las cuentas en el modal
function mostrarCuentas(accounts) {
    // Limpiar el cuerpo del modal
    $('#modal-content tbody').empty();
    
    if (accounts && accounts.empty !== undefined && accounts.empty !== null) { // SI NO HAY CUENTAS

        $('#modal-content tbody').html('<tr><td class="text-red-500">No se encontraron cuentas asignadas</td></tr>');
    }else{
        // Insertar las cuentas en el cuerpo del modal
        accounts.forEach(account => {
            const fila = '<tr>' +
                        '<td class="px-6 py-4 whitespace-nowrap">' + account.id + '</td>' +
                        '<td class="px-6 py-4 whitespace-nowrap">' + account.usuario + '</td>' +
                        '</tr>';
            $('#modal-content tbody').append(fila);
        });
    }

    // Mostrar el modal
    $('#modal').removeClass('hidden');
}

// Función para cerrar el modal
function closeModal() {
    $('#modal').addClass('hidden');
}


