$(document).ready(function () {

    // CERRAR ALERTAS AUTOMATICAMENTE
    //Cerrar Las Alertas Automaticamente
    $('.alert[data-auto-dismiss]').each(function (index, element) {
        const $element = $(element),
            timeout = 3000;
        setTimeout(function () {
            $element.alert('close');
        }, timeout);
    });

    // TOOLTIPS
    $('body').tooltip({
        trigger: 'hover',
        selector: '.tooltipsC',
        placement: 'top',
        html: true,
        container: 'body'
    });

    $('ul.sidebar-menu').find('li.active').parents('li').addClass('active');

    //---------------------------------------------------------
    //--------------TRABAJO CON VENTANA DE ROLES----------------
    //---------------------------------------------------------
    const modal = $('#modal-seleccionar-rol');
    if (modal.length && modal.data('rol-set') == 'NO')
        modal.modal('show');

    $('.asignar-rol').on('click', function (event) {
        event.preventDefault();
        const data = {
            'rol_id': $(this).data('rolid'),
            'rol_nombre': $(this).data('rolnombre'),
            '_token': $('input[name=_token]').val()
        }
        ajaxRequest(data, '/Laravel/tutoVirtual/biblioteca/public/ajax-session', 'asignar-rol');
    });

    let ajaxRequest = (data, url, funcion) => {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                if (funcion == 'asignar-rol' && respuesta.mensaje == 'ok') {
                    $('#modal-seleccionar-rol').hide();
                    location.reload();
                }
            }
        })


    }
});