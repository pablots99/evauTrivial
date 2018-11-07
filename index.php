

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <title>PRUEBA DE PHP CON BOOTSTRAP</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background-color:  #666">

        <div class="container" id="principal">
            <div class ="row">
                <div class="col-12">
                    <h2 class="text-center" style="color:white;">PREGUNTAS EVAU</h2> 
                </div>
            </div>
            <div class ="row">
                <div class="col-4">
                </div>
                <div class="col-4">
                    <br/><br/>
                    <input id ="cajaNombre" class="form-control" type="text" placeholder="Usuario" required="required">
                    <br/>
                    <input id ="cajaPassword" class="form-control" type="password" placeholder="Contraseña">
                    <br/>
                    <button id="boton1" class="btn btn-primary btn-block" type="submit">ok</button>

                    <p style="text-align: center"><a type="button" class="btn btn-link"  data-toggle="modal" data-target="#myModal"> crear usuario</a></p>
                </div>
                <div class="col-4">
                </div>
            </div>
          


        </div>



        <!--moodaaaaal boostrap -->
        <div class="modal" tabindex="-1" id="myModal"
             data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crea tu usuario!</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>

                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="inputUserName">Usuario</label>
                                <input class="form-control" placeholder="Login Username"
                                       type="text" id="cajaCrearUsuario" />
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Contraseña</label>
                                <input class="form-control" placeholder="Login Password"
                                       type="password" id="cajaCrearContraseña" />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="botonCrear">Crear</button>
                        <button type="button" class="btn btn-primary"
                                data-dismiss="modal">Close</button>
                    </div>
                </div>
                 <div id="divErrores">
                
                
            </div>
            </div>
              
           
        </div>


    </body>
    <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script scr="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>



    <script>
            var _caja1 = $('#').val();
            var _caja2 = $('#cajaCrearContraseña').val();
        // document ready se ejecuta cuando toda la página se ha cargado correctamente
        $(document).ready(function () {
            //$('#cajaNombre').hide();
        });

        $.validate({
            lang: 'es'
        });

        $('#boton1').click(function () {
            //leo el contenido de las cajas de nombre y contraseña
            var _cajaNombre = $('#cajaNombre').val();
            var _cajaPassword = $('#cajaPassword').val();

            $('#principal').load("login.php", {
                cajaNombre: _cajaNombre,
                cajaPassword: _cajaPassword
            });
        });

      $('#botonCrear').click(function () {
            //leo el contenido de las cajas de nombre y contraseña
            var _cajaNombreCr = $('#cajaCrearUsuario').val();
            var _cajaPasswordCr = $('#cajaCrearContraseña').val();
          

            $('#divErrores').load("creaUsuario.php", {
                cajaNombreCr: _cajaNombreCr,
                cajaPasswordCr: _cajaPasswordCr
            });
        });    
    

   

    </script>
</html>
