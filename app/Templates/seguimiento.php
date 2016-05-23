    
     <?php ob_start() ?>

      <div id="navCirculos">
        <div id="navCirculosDentro1" class="item-wrapper">
          <div id="box" class="xxx arrastrable"><span class="circulos blanco circulo">BOX</span></div>
          <div id="tac" class="xxx arrastrable"><span class="circulos blanco">TAC</span></div>
          <div id="salaA" class="xxx arrastrable"><span class="circulos azul">SALA A</span></div>
          <div id="salaTra" class="xxx arrastrable"><span class="circulos lila">SALA TRA</span></div>
          <div id="qui" class="xxx arrastrable"><span class="circulos violeta">QUI</span></div>
          <div id="exitus" class="xxx arrastrable"><span class="circulos negro">EXITUS</span></div>
        </div>
        <div id="navCirculosDentro2" class="item-wrapper">
          <div id="eco" class="xxx arrastrable"><span class="circulos blanco">ECO</span></div>
          <div id="rx" class="xxx arrastrable"><span class="circulos blanco">RX</span></div>
          <div id="salaB" class="xxx arrastrable"><span class="circulos pistacho">SALA B</span></div>
          <div id="salaObs" class="xxx arrastrable"><span class="circulos naranja">SALA OBS</span></div>
          <div id="ing" class="xxx arrastrable"><span class="circulos rojo">ING</span></div>
          <div id="alta" class="xxx arrastrable"><span class="circulos verde">ALTA</span></div>
        </div>
      </div>
      <div id="infoPaciente">
        <div class="superior">
        <form method='post' action='index.php?ctl=seguimiento'>
          <div class= "buscadorPaciente"> 
              <input type="image" class="imgBuscar" src ="img/boton_buscar.png">
              <input type="text" name="buscador" required id="buscador" class="form-control">
          </div>
          </form>
          <img type="image" value="" src ="img/infoPaciente1.png">
        </div>
        <div class="inferior">
          <div id= "inf">
            <input type="text" name="nombrePaciente" id="nombrePaciente" class="form-control" value= "<?php echo $_SESSION['nombrePaciente']." ".$_SESSION['apellidosPaciente']; ?>" readonly>
            <input type="text" name="nhcPaciente" id="nhcPaciente" class="form-control" value= "<?php echo $_SESSION['nhcPaciente']; ?>" readonly>
          </div>
          <img src ="img/infoPaciente2.png">
        </div>
      </div>
      
      <div id="libros"><img src="img/libros.jpg" alt="libros" /></div>
      <div class="infiniteCarousel">
        <!--<div id="botonCancelar"><img src="img/boton_cancelar.png" alt="cancelar" /></div>-->
        <div id="botonesScroll" class="next"><img src="img/flechaArriba.png" alt="cancelar" /></div>
        <div id="botonesScroll" class="pre"><img src="img/flechaAbajo.png" alt="cancelar" /></div>     
        <div class="viewport">
          <div class="list">
            <div class="columnaCarousel">




              <div class="cuadradoLista droppable" id="1">
                <div id="ad" class="xxx"><span class="circulos azulAD">AD</span></div>
              </div>
              <div class="cuadradoLargoLista">
                <div id="2" class="flecha" style="display:inline-block">
                  <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][0]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][0]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
              <div class="cuadradoLista droppable" id="3">
                <div id="tr" class="xxx"><span class="circulos azulTriaje">TR</span></div>
              </div>
              <div class="cuadradoLargoLista">
                <div id="4" class="flecha" style="display:none">
                  <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][1]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][1]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
              <div class="cuadradoLista droppable" id="5"></div>
              <div class="cuadradoLargoLista">
                <div id="6" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][2]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][2]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
            </div>
            <div class="columnaCarousel">
              <div class="cuadradoLista droppable" id="7"></div>
              <div class="cuadradoLargoLista">
                <div id="8" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][3]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][3]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
              <div class="cuadradoLista droppable" id="9"></div>
              <div class="cuadradoLargoLista">
                <div id="10" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][4]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][4]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
              <div class="cuadradoLista droppable" id="11">
              </div>
              <div class="cuadradoLargoLista">
                <div id="12" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][5]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][5]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
            </div>
            <div class="columnaCarousel">
              <div class="cuadradoLista droppable" id="13"></div>
              <div class="cuadradoLargoLista">
                <div id="14" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][6]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][6]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
              <div class="cuadradoLista droppable" id="15"></div>
              <div class="cuadradoLargoLista">
                <div id="16" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][7]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][7]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
              <div class="cuadradoLista droppable" id="17"></div>
              <div class="cuadradoLargoLista">
                <div id="18" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][8]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][8]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
            </div>
            <div class="columnaCarousel">
              <div class="cuadradoLista droppable" id="19"></div>
              <div class="cuadradoLargoLista">
                <div id="20" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][10]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][10]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
              <div class="cuadradoLista droppable" id="21"></div>
              <div class="cuadradoLargoLista">
                <div id="22" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][11]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][11]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
              <div class="cuadradoLista droppable" id="23"></div>
              <div class="cuadradoLargoLista">
                <div id="24" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][12]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][12]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
            </div>
            <div class="columnaCarousel">
              <div class="cuadradoLista droppable" id="25"></div>
              <div class="cuadradoLargoLista">
                <div id="26" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][13]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][13]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
              <div class="cuadradoLista droppable" id="27"></div>
              <div class="cuadradoLargoLista">
                <div id="28" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][14]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][14]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
              <div class="cuadradoLista droppable" id="29"></div>
              <div class="cuadradoLargoLista">
                <div id="30" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][15]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][15]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
            </div>
            <div class="columnaCarousel">
              <div class="cuadradoLista droppable" id="31"></div>
              <div class="cuadradoLargoLista">
                <div id="32" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][16]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][16]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
              <div class="cuadradoLista droppable" id="33"></div>
              <div class="cuadradoLargoLista">
                <div id="34" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][17]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][17]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
              <div class="cuadradoLista droppable" id="35"></div>
              <div class="cuadradoLargoLista">
                <div id="36" class="flecha" style="display:none">
                   <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php
                    if(isset($_SESSION['infoUbicacion'][18]['horaInicio'])){
                        echo $_SESSION['infoUbicacion'][18]['horaInicio'];
                      }else{
                        echo 'na';     
                      }
                    ?>"
                    readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>