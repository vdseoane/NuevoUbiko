    
<?php ob_start()?>

<div>
<div class="divEst" id="izquierda">
  <img id="grafico_1" src="img/grafico1.png" alt="grafico1" />



</div>

<div class="divEst" id="derecha">
<div class="inferiorEst">
  <div id= "infEst">
    <input type="text" name="nombrePaciente" id="nombrePaciente" class="form-control" value="" readonly>
    <input type="text" name="nhcPaciente" id="nhcPaciente" class="form-control" value= "" readonly>
  </div>
  <div id="infEst">
    <img id="infoEst" src ="img/infoPaciente2.png">
  </div>
</div>
<img id="grafico_2" src="img/grafico2.png" alt="grafico2" />
</div>



</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>