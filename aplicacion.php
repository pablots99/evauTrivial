
<h1 style="font-size: 5vw; white-space: nowrap">PREGUNTAS EVAU</h1>
<DIV id="menu">
    <p><a id="inicio" class="btn btn-block btn-primary" onclick="sigue('1')">HISTORIA</a></p>
    <p><a id="inicio" class="btn btn-block btn-primary" onclick="sigue('2')">ECONOMIA</a></p>
    <p><a id="inicio" class="btn btn-block btn-primary" onclick="sigue('3')">FILOSOFIA</a></p>
    <p><a id="inicio" class="btn btn-block btn-primary" onclick="sigue('4')">INGLES</a></p>
    <p><a id="inicio" class="btn btn-block btn-primary" onclick="sigue('5')">LENGUA</a></p>

</div>

<div id="modalPrueba" class="modal" tabindex="-1" role="dialog" style="color: darkgreym ">
  <div class="modal-dialog" role="document">    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">ad a awd W w
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
   var _vidas =3;
    function sigue(_tema) {        
        switch (_tema) {
            case'1': $("#menu").load("juego.php",{vidas:_vidas,correctas:0,tema:"Historia"});break;
            
            case'2':$("#menu").load("juego.php",{vidas:_vidas,correctas:0,tema:"Economia"});break;

            case'3':$("#menu").load("juego.php",{vidas:_vidas,correctas:0,tema:"Filosofia"});break;

            case'4':$("#menu").load("juego.php",{vidas:_vidas,correctas:0,tema:"Ingles"});break;

            case'5':$("#menu").load("juego.php",{vidas:_vidas,correctas:0,tema:"Lengua"});break;

            


        }
    }
  
</script>
<?php




