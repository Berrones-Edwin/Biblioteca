$(document).ready(function () {

    $('.menu_rol').on('change', function () {

        const url ='http://localhost:8080/Laravel/tutoVirtual/biblioteca/public/admin/menu-rol'
        const data = {

            menu_id: $(this).data('menuid'),
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
                
                if(data.respuesta === "1"){

                    Biblioteca.notificaciones('El rol se asigno correctamente','Biblioteca','success');
                }else{
                    Biblioteca.notificaciones('El rol se elimino ','Biblioteca','error');

                }
            }
        });
    };
})