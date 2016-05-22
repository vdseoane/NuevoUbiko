    
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




              <div class="cuadradoLista droppable" id="c1">
                <div id="ad" class="xxx"><span class="circulos azulAD">AD</span></div>
              </div>
              <div class="cuadradoLargoLista" id="f1">
                <div id ="f" class="flecha" style="background-image: url(img/flecha.png)"">
                  <input type="text" name="hora" id="hora" class="form-control hora" value= "<?php echo $this->hora; ?>" >
                </div>
              </div>
              <div class="cuadradoLista droppable" id="c2">
                <div id="tr" class="xxx"><span class="circulos azulTriaje">TR</span></div>
              </div>
              <div class="cuadradoLargoLista" id="f2">
               
              </div>

              <div class="cuadradoLista droppable" id="c3"></div>
              <div class="cuadradoLargoLista" id="f3"></div>
            </div>
            <div class="columnaCarousel">
              <div class="cuadradoLista droppable" id="c4"></div>
              <div class="cuadradoLargoLista" id="f4"></div>
              <div class="cuadradoLista droppable" id="c5"></div>
              <div class="cuadradoLargoLista" id="f5"></div>
              <div class="cuadradoLista droppable" id="c6"></div>
              <div class="cuadradoLargoLista" id="f6"></div>
            </div>
            <div class="columnaCarousel">
              <div class="cuadradoLista droppable" id="c7"></div>
              <div class="cuadradoLargoLista" id="f7"></div>
              <div class="cuadradoLista droppable" id="c8"></div>
              <div class="cuadradoLargoLista" id="f8"></div>
              <div class="cuadradoLista droppable" id="c9"></div>
              <div class="cuadradoLargoLista" id="f9"></div>
            </div>
            <div class="columnaCarousel">
              <div class="cuadradoLista droppable" id="c10"></div>
              <div class="cuadradoLargoLista" id="f10"></div>
              <div class="cuadradoLista droppable" id="c11"></div>
              <div class="cuadradoLargoLista" id="f11"></div>
              <div class="cuadradoLista droppable" id="c12"></div>
              <div class="cuadradoLargoLista" id="f12"></div>
            </div>
            <div class="columnaCarousel">
              <div class="cuadradoLista droppable" id="c13"></div>
              <div class="cuadradoLargoLista" id="f13"></div>
              <div class="cuadradoLista droppable" id="c14"></div>
              <div class="cuadradoLargoLista" id="f14"></div>
              <div class="cuadradoLista droppable" id="c15"></div>
              <div class="cuadradoLargoLista" id="f15"></div>
            </div>
            <div class="columnaCarousel">
              <div class="cuadradoLista droppable" id="c16"></div>
              <div class="cuadradoLargoLista" id="f126"></div>
              <div class="cuadradoLista droppable" id="c17"></div>
              <div class="cuadradoLargoLista" id="f17"></div>
              <div class="cuadradoLista droppable" id="c18"></div>
              <div class="cuadradoLargoLista" id="f18"></div>
            </div>
          </div>
        </div>
      </div>
      </div>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>