





<?php
session_start();
include ('misFunciones.php');
$mysqli = conectaBBDD();
$tema = $_POST['tema'];

$vidas = $_POST['vidas'];

$correctas = $_POST['correctas'];

$resultadoQuery = $mysqli->query("SELECT * FROM preguntas WHERE tema ='$tema' ");
$numPreguntas = $resultadoQuery->num_rows;
echo $numPreguntas;
//declaro un array en php para guardar el resultado de la query
$listaPreguntas = array();
for ($i = 0; $i < $numPreguntas; $i++) {
    $r = $resultadoQuery->fetch_array(); //leo una fila del resultado de la query
    $listaPreguntas[$i][0] = $r['numero'];
    $listaPreguntas[$i][1] = $r['enunciado'];
    $listaPreguntas[$i][2] = $r['r1'];
    $listaPreguntas[$i][3] = $r['r2'];
    $listaPreguntas[$i][4] = $r['r3'];
    $listaPreguntas[$i][5] = $r['r4'];
    $listaPreguntas[$i][6] = $r['correcta'];
}

$preguntaActual = rand(0, $numPreguntas - 1);
?>
<div id="contenedor">
    <div>0


        <h1><a id="sigue1" class="btn btn-block btn-primary" >Usuario: <?php echo $_SESSION['nombreUsuario'] ?></a></h1>
        <h1><a id="sigue1" class="btn btn-block btn-primary" ><?php echo $tema; ?></a></h1>
        <div id="cajatiempo" style="height: 30px;" >
            <div id="tiempo" class="progress-bar progress-bar-striped bg-success" style="width: 0%;"></div>
        </div>
    </div>
    <p><a id="enunciado" class="btn btn-block btn-primary " ></a></p>
    <div>
        <p><a id="r1" class="btn btn-block btn-success  btn-info "  onclick="compruebaCorrecta(1)" ></a></p>
        <p><a id="r2"  class="btn btn-block btn-success  btn-info"  onclick="compruebaCorrecta(2)"></a></p>
        <p><a id="r3"  class="btn btn-block btn-success  btn-info "   onclick="compruebaCorrecta(3)"></a></p>
        <p><a id="r4"  class="btn btn-block btn-success btn-info "   onclick="compruebaCorrecta(4)"></a></p>
        <img id="f1" src="images/corazon.png" class="img-circle" style="width:50px; height:50px;">
        <img id="f2" src="images/corazon.png" class="img-circle" style="width:50px; height:50px;">
        <img id="f3" src="images/corazon.png" class="img-circle" style="width:50px; height:50px;" >
    </div>
    <!--   <div>
            <a id="inicio" class="btn  btn-primary  " >ANTERIOR</a>
            <a id="inicio" class="btn  btn-primary" onclick="sigue()" >SIGUIENTE</a></p>
    onclick="compruebaCorrecta(4)"
    
        </div>-->



</div>

<script>
    function volver() {
        $('#principal').load('aplicacion.php');
    }
    var progreso;
    var segundo = 0;

    //temporizador de la barra
    var tiempo = $("#tiempo");
    clearInterval(progreso);
     var caja = $("#cajatiempo");
    progreso = setInterval(function () {
        var caja = $("#cajatiempo");


        if (segundo ==  10 ) {

            sigue();

        } else {

            

            segundo++;
        }
        //cambia el color de la barra dependiendo del segundo en que está
     
        tiempo.text(segundo);
    }, 600);
    var contadorPreguntas = 15;
    //cargo el array php de preguntas en una variable javascript
    var listaPreguntas = <?php echo json_encode($listaPreguntas); ?>;
    //calculo un numero aleatorio
    var numeroPregunta = Math.floor(Math.random() * listaPreguntas.length);
    //dibujo los textos en los botones correspondientes
    //no se repitan preguntas
//    var arrayNumeros = new Array();
//     arrayNumeros.push("0");
    var num;


    var vidas = <?php echo $vidas ?>;

    sigue();


    function sigue() {
        contadorPreguntas = contadorPreguntas - 1;
        numeroPregunta = Math.floor(Math.random() * listaPreguntas.length);
        tiempo.width(caja.width());
        segundo = 0;
//que no se repitan preguntas
//      var p = false;
//        var num = listaPreguntas[numeroPregunta][0];
//        console.log("numero pregunta"+num);
//        for(i=0; i<arrayNumeros.length; i++){
//            if(arrayNumeros[i]==num){
//              p= true;
//              console.log(p);
//            }
//        }
//        if (p=false){
//           console.log("pus");
//           arrayNumeros.push(num)
//        }
//         console.log(p);
//         console.log(arrayNumeros);
        document.getElementById('r1').className = "btn btn-block   btn-info ";
        document.getElementById('r2').className = "btn btn-block   btn-info ";
        document.getElementById('r3').className = "btn btn-block   btn-info ";
        document.getElementById('r4').className = "btn btn-block   btn-info ";



        $('#enunciado').text(listaPreguntas[numeroPregunta][1]);
        $('#r1').text(listaPreguntas[numeroPregunta][2]);
        $('#r2').text(listaPreguntas[numeroPregunta][3]);
        $('#r3').text(listaPreguntas[numeroPregunta][4]);
        $('#r4').text(listaPreguntas[numeroPregunta][5]);
        $('#r5').text("VIDAS = " + vidas);
        var num = listaPreguntas[numeroPregunta][6];
              console.log(num);



    }
    function muestraCorrecta() {


    }


    function compruebaCorrecta(numeroCorrecta) {
        var num = listaPreguntas[numeroPregunta][6];
        console.log(numeroCorrecta);
        console.log(num);
        if (numeroCorrecta == num) {
        
            segundo = 9;
            document.getElementById('r' + num).className = "btn btn-block  btn-success";


        } else {
          
            segundo = 9;

            vidas = vidas - 1;
            console.log("vidas" + vidas);
            $('#r5').text("VIDAS = " + vidas);
            document.getElementById('r' + numeroCorrecta).className = "btn btn-block  btn-danger";
            document.getElementById('r' + num).className = "btn btn-block  btn-success";

            if (vidas == 2) {
                document.getElementById('f1').style.display = 'none';
            }
            if (vidas == 1) {
                document.getElementById('f2').style.display = 'none';
            }
        }
        if (vidas == 0 || contadorPreguntas == 0) {
            document.getElementById('f3').style.display = 'none';

            $("#contenedor").load("perdido.php");


        }


    }


</script>

