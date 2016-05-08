<?php
 // web/index.php

 // carga del modelo y los controladores
 require_once __DIR__ . '/../app/Config/Config.php';
 require_once __DIR__ . '/../app/Model/modeloConexion.php';
 require_once __DIR__ . '/../app/Controller/Controller.php';

 // enrutamiento
 $map = array(
     'logIn' => array('controller' =>'Controller', 'action' =>'logIn'),
     'logOut' => array('controller' =>'Controller', 'action' =>'logOut')
     /*'listar' => array('controller' =>'Controller', 'action' =>'listar'),
     'insertar' => array('controller' =>'Controller', 'action' =>'insertar'),
     'buscar' => array('controller' =>'Controller', 'action' =>'buscarPorNombre'),
     'ver' => array('controller' =>'Controller', 'action' =>'ver')*/
 );

 // Parseo de la ruta
 if (isset($_GET['ctl'])) {
     if (isset($map[$_GET['ctl']])) {
         $ruta = $_GET['ctl'];
     } else {
         header('Status: 404 Not Found');
         echo '<html><body><h1>Error 404: No existe la ruta <i>' .
                 $_GET['ctl'] .
                 '</p></body></html>';
         exit;
     }
 } else {
     $ruta = 'logIn';
 }

 $controlador = $map[$ruta];
 // Ejecución del controlador asociado a la ruta

 if (method_exists($controlador['controller'],$controlador['action'])) {
     call_user_func(array(new $controlador['controller'], $controlador['action']));
 } else {

     header('Status: 404 Not Found');
     echo '<html><body><h1>Error 404: El controlador <i>' .
             $controlador['controller'] .
             '->' .
             $controlador['action'] .
             '</i> no existe</h1></body></html>';
 }