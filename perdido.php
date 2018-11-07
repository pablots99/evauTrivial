
<html>
 <h1 style="font-size: 5vw; white-space: nowrap; text-align: center" >HAS PERDIDO</h1>
 <br>
 <div id="menu" align="center">
 <div id="menu" > <img src="images/HasPerdido.gif"> </img> </div>
 <div id="menu" style=" margin-top: 10px" align="center" >
        Preguntas acertadas:
 </div>

 <br>
 <div style="margin-top: 10px">
 <p><a id="perdido" class="btn btn-primary" onclick="volver()">Volver a intentar</a> 
     <a id="perdido" class="btn btn-primary" onclick="cierreSesion()">Cerrar Sesión</a>
        
 </div>
</div>
</html>


<script>
    function volver() {
        $('#principal').load('aplicacion.php');
    }
    
    function cierreSesion(){
        $('#principal').load('index.php');
    }
 
</script>


