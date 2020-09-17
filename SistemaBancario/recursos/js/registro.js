function registraUsuario() {

   
    var formarioRegistro=new FormData($('#datosRegistro')[0]);
   
    $.ajax({
        url: '../controlador/controlarRegistro.php',
        type: 'POST',
        data: formarioRegistro,
        contentType: false,
        processData: false,
        success: function(response) {
          
            if(response=="1"){
                Swal.fire({
                    icon: 'success',
                    title: '¡Registro Exitoso!',
                    text: 'Bienvenido a nuestro banco'
                
                }).then((result) => {
                    if (result.value) {
                    window.location= "login.html";
                    }
                });

            }else{
               
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Algo salio mal, revisa los datos ingresados',
                   
                  })
            }


        }
    });
    
}
