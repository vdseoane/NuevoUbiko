 <?php ob_start() ?>

<div id="form">
    <form method="POST" action="index.php?ctl=logIn">
    	<div id="logo">
			<a href="logIn.html">
                <img src="../../web/img/logo_ubiko.png" width="165" height="72" alt="logo"/>
            </a>
    	</div>
    	<div class="form-inblock" id="divUsuario">
                <label id="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" class="form-control">
        </div>
        <div class="form-inblock" id="divPass">
                <label id="password">Contrase&ntildea</label>
                <input type="password" name="password" required id="password" class="form-control">
        </div>
        <div id="enviar">
        	<input type="image" value="" SRC="../../web/img/boton_enviar.jpg">
        </div>
    </form>
</div>

<?php $contenedor = ob_get_clean() ?>

<?php include 'layout.php' ?>