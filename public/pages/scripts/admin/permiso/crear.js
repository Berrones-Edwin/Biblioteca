$(document).ready(function () {
    Biblioteca.validacionGeneral('form-general');

    $('#nombre').on('blur',function(){
        let nameValue = $(this).val().split(" ").join("-").toLowerCase();

        $('#slug').val(nameValue)

        // nameValue.;
        // console.log(nameValue);
    })
});