$('#frmRegister').submit(function(e){
    e.preventDefault();
    $(".loader").fadeIn('slow');    
    let email=$('#email').val();

    form=$('#frmRegister').serialize();
    route='registerUser';
    token=$('#token').val();
    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        data: form,
        dataType: 'json',
        success: function(response){
            if(response.resultado==1){
                $('#errorEmail').removeClass('d-none');
                $('#email').focus();
                notification('INFORMACION', 'El email ingresado no esta disponible.','warning','top','right');
            }
            else if(response.resultado==3)
            {
                notification('ERROR', 'Ocurrio un error durante la operacion.','danger','top','right');                
            }
            else if(response.resultado==2)
            {
                location.href = "/";
            }
            $(".loader").fadeOut('slow');
        },
        error:function(msj){
            $(".loader").fadeOut('slow');
        }
    });
});