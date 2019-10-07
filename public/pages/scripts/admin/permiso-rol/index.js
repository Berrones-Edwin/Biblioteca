$(document).ready(function () {

    $('.permiso_rol').on('change', function () {
        const url = 'http://localhost:8080/Laravel/tutoVirtual/biblioteca/public/admin/permiso-rol';

        let data = {
            permiso_id: $(this).data('permisoid'),
            rol_id: $(this).val(),
            _token: $('input[name=_token]').val()
        };


        if ($(this).is(':checked')) {
            data.estado = 1;
        } else {

            data.estado = 0;
        }

        ajaxRequest(url, data);
    });

    let ajaxRequest = (url, data) => {
        
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (data) {
              
                console.log(data)
                if (data.respuesta == "1") {

                    Biblioteca.notificaciones('El rol se asigno correctamente', 'Biblioteca', 'success');
                } else {
                    Biblioteca.notificaciones('El rol se elimino ', 'Biblioteca', 'error');

                }
            }
        })
    }



});



