
var saldo=0;
   
   

function inicioSesion() {
    
    
    var login=new FormData($('#login')[0]);
 
    $.ajax({
        url: '../controlador/controlarSesion.php',
        type: 'POST',
        data: login,
        contentType: false,
        processData: false,
        success: function(response) {
           
          if(response==1){
            
           // $('#contendorLogin').hide();
            //$('#transacciones').show();
            //$('#user').text(response);
           window.location= "transacciones.html";
           
          }


        }
    });
}

function init(){
  var indice="1";
    $.ajax({
        url: '../controlador/controlarDatos.php',
        type: 'POST',
        data: indice,
        success: function(response) {
          
           var res = response.split(",");
           
            $('#user').text("Usuario: "+res[0]);
            $('#saldo').text("Saldo: "+res[1]);
            saldo=parseInt(res[1]);

        }
    });

}

function transaccion(valor){

    $('#Contenedor').empty();

    if (valor==1) {
        
        $('#Contenedor').append(` <div class="col-lg-4" ></div>
        <div class="col-lg-4" >
            <form id="retiro">
                <div class="form-group">
                <label for="exampleInputEmail1">Numero de Cuenta</label>
                <input type="number" class="form-control" id="numeroCuenta" name="numeroCuenta" aria-describedby="emailHelp">                                   
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña">
                </div>

                <div class="form-group">
                <label for="exampleInputEmail1">Valor a Retirar</label>
                <input type="number" class="form-control"  id="retiroc" name="retiro" aria-describedby="emailHelp">                                   
                </div>
               
                <button type="button" onclick="Retiro()" class="btn btn-success">Retirar</button>
            </form>
        </div>`);
        
    } else if(valor==2) {
     
        $('#Contenedor').append(` <div class="col-lg-4" ></div>
        <div class="col-lg-4" >
            <form>
                <div class="form-group">
                <label for="exampleInputEmail1">Numero de Cuenta</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">                                   
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Valor</label>
                <input type="number" class="form-control" id="exampleInputPassword1">
                </div>
   
                <button type="submit" class="btn btn-success">Consignar</button>
            </form>
        </div>`);
        
    }else if(valor==3) {
     

        $('#Contenedor').append(` <div class="col-lg-4" ></div>
        <div class="col-lg-4" >
            <form>
                <div class="form-group">
                <label for="exampleInputEmail1">Destinatario</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">                                   
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Valor</label>
                <input type="number" class="form-control" id="exampleInputPassword1">
                </div>
   
                <button type="submit" class="btn btn-success">Transferir</button>
            </form>
        </div>`);
        
    }

        

}


function Retiro(){

   var valorRet=parseInt($('#retiroc').val());
  
   
    
    if(valorRet<saldo){
 
        var retirar=new FormData($('#retiro')[0]);
        retirar.append("indice","1");
        $.ajax({
            url: '../controlador/controlarMovimientos.php',
            type: 'POST',
            data: retirar,
            contentType: false,
            processData: false,
            success: function(response) {
            
             //alert(response);
             if(response==0){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El numero de cuenta no es correcto',
                   
                  })

             }else{
             $('#saldo').text("Saldo: "+response);
             }

            }

        });
    }else{

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Lo sentimos, Tu saldo es insuficiente',
           
          })

    }


}


