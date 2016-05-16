 <?php

 class Controller
 {
    private $m;
    private $_SESSION;
    private $usuario = "man";

     public function __construct(){
        //session_start();

        $this->m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
            Config::$mvc_bd_clave, Config::$mvc_bd_hostname);  
     }

    //Carga la plantilla del log in (inicio.php)
    //Una vez hecho el post llama al model para buscar el usuario enviado
    //En caso de encontrarlo vuelve al index
    //En caso negativo vuelve al log in (inicio.php)
    public function logIn()
    {
        if(isset($_POST['usuario']) && isset($_POST['password'])){
            $nombre = $_POST['usuario'];
            $pass = $_POST['password'];
            //$m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
            //         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
            
            $result = $this->m->logIn($nombre, $pass);

            if ($result->num_rows > 0) {

                //$this->_SESSION = $nombre;
                $this->usuario = $_POST['usuario'];
                
                header('Location: index.php?ctl=admision');
            }
            else{
                header('Location: index.php?ctl=logIn');
            }
        }
        require __DIR__ . '/Templates/inicio.php';
    }

    









/*
     public function inicio()
     {
         $params = array(
             'mensaje' => 'Bienvenido al curso de symfony 1.4',
             'fecha' => date('d-m-yyy'),
         );
         require __DIR__ . '/templates/inicio.php';
     }

     public function listar()
     {
         $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

         $params = array(
             'alimentos' => $m->dameAlimentos(),
         );

         require __DIR__ . '/templates/mostrarAlimentos.php';
     }

     public function insertar()
     {
         $params = array(
             'nombre' => '',
             'energia' => '',
             'proteina' => '',
             'hc' => '',
             'fibra' => '',
             'grasa' => '',
         );

         $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

             // comprobar campos formulario
             if ($m->validarDatos($_POST['nombre'], $_POST['energia'],
                      $_POST['proteina'], $_POST['hc'], $_POST['fibra'],
                      $_POST['grasa'])) {
                 $m->insertarAlimento($_POST['nombre'], $_POST['energia'],
                           $_POST['proteina'], $_POST['hc'], $_POST['fibra'],
                           $_POST['grasa']);
                 header('Location: index.php?ctl=listar');

             } else {
                 $params = array(
                     'nombre' => $_POST['nombre'],
                     'energia' => $_POST['energia'],
                     'proteina' => $_POST['proteina'],
                     'hc' => $_POST['hc'],
                     'fibra' => $_POST['fibra'],
                     'grasa' => $_POST['grasa'],
                 );
                 $params['mensaje'] = 'No se ha podido insertar el alimento. Revisa el formulario';
             }
         }

         require __DIR__ . '/templates/formInsertar.php';
     }

     public function buscarPorNombre()
     {
         $params = array(
             'nombre' => '',
             'resultado' => array(),
         );

         $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $params['nombre'] = $_POST['nombre'];
             $params['resultado'] = $m->buscarAlimentosPorNombre($_POST['nombre']);
         }

         require __DIR__ . '/templates/buscarPorNombre.php';
     }

     public function ver()
     {
         if (!isset($_GET['id'])) {
             throw new Exception('Página no encontrada');
         }

         $id = $_GET['id'];

         $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

         $alimento = $m->dameAlimento($id);

         $params = $alimento;

         require __DIR__ . '/templates/verAlimento.php';
     }

     */

 }
 ?>