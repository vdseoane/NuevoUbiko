<!doctype html>
<html>
<link rel="stylesheet" href="./css/bootstrap.css">

<link href="./libs/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">

<link href="./css/log.css" rel="stylesheet" type="text/css">
<link href="./css/cssIndex.css" rel="stylesheet" type="text/css">
<link href="./css/cssAdmision.css" rel="stylesheet" type="text/css">
<link href="./css/cssSeguimiento.css" rel="stylesheet" type="text/css">

<link href="" rel="stylesheet" type="text/css" id="linkestilo">

<!--<script src="./js/jquery-1.9.0.js"></script>-->
<script src="./libs/jquery-1.12.0.js"></script>
<script src="./libs/jquery-ui/jquery-ui.min.js"></script>
<script src='./libs/infinitecarrousel.js'></script>
<script src='./js/main.js'></script>
<!--<script src="./js/jquery-1.5.min.js"></script>-->




<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
-->

<head>
<title>index</title>
</head>

<body>

<div id="main">
    <div id="cabecera">
      	<div id="logo">
            <a href="index.html">
                <img src="../../web/img/logo_ubiko.png" width="165" height="72" alt="logo"/>
            </a>
        </div>
      	<div id="navegacion">
      		<ul class="navegacion_ul">
        		<li class="navegacion_li" href="">
                    <a href="#"  id="admision" title="Admision">Admisi&oacute;n</a>
                </li>
            	<li class="navegacion_li" >
                    <a href="#" id="seguimiento"  title="Seguimiento">Seguimiento</a>
                </li>
            	<li class="navegacion_li">
                    <a href="#" id="box" title="BOX">BOX</a>
                </li>
            	<li class="navegacion_li">
                    <a href="#" id="estadisticas" title="Estadisticas">Estad&iacute;sticas</a>
                </li>
        	</ul>
       	</div>
		<div id="login">
       		<div method="POST" action="index.php?ctr=logOut">
                <input type="text" name="texto_login" value="Nombre usuario" id="texto_login" class="form-control">
                <img id="imagen_login" src="../../web/img/acceso.jpg" width="220" height="72" alt="login" />
                <a href="./php/logOut.php">
                	<img id="boton_login" src="../../web/img/power.png" width="220" height="72" alt="boton_login" />
                </a>
            </div>
   		</div>
    </div>
    <div id="contenedor">
        <?php echo $contenedor ?>
    </div>
</div>
</body>
</html>
