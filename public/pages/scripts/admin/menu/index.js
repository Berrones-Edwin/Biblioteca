$(document).ready(function () {
    const url = 'http://localhost:8080/Laravel/tutoVirtual/biblioteca/public/'
    $('#nestable').nestable().on('change', function () {
        const data = {
            menu: JSON.stringify($('#nestable').nestable('serialize')),
            _token: $('input[name=_token]').val()
        };
        $.ajax({
            url: `${url}/admin/menu/guardar-orden`,
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (response) {
                console.log(response);
            }
        });
    });

    $('.eliminar-menu').on('click', function (e) {
        e.preventDefault();

        const url = $(this).attr('href');

        swal({
            title: '¿Está seguro que desea eliminar el registro?',
            text: 'Esta acción no se puede deshacer!',
            icon: 'warning',
            buttons: {
                cancel: 'Cancelar',
                confirm: 'Aceptar'
            }
        }).then((value) => {
            if (value) window.location.href= url;
        });
    });

    $('#nestable').nestable('collapseAll');
});