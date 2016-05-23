 <?php

 class Controller
 {

    private $model;
    private $hora;

    public function __construct(){
        //session_start();
        session_start();
        $this->model = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
            Config::$mvc_bd_clave, Config::$mvc_bd_hostname);  
        //echo "<script type=\"text/javascript\">alert(\"$this->usuario\");</script>";
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
            $resultado = $this->model->logIn($nombre, $pass);

            if ($resultado->num_rows > 0) {
                $_SESSION["nombreUsuario"] = $nombre;
                $_SESSION["nombrePaciente"] = "Introduzca Paciente";
                $_SESSION['apellidosPaciente']=" ";
                $_SESSION["nhcPaciente"] = "NHC";
                //$_SESSION["hora1"] = date("H:i");

                header('Location: index.php?ctl=admision');
            }
            else{
                header('Location: index.php?ctl=logIn');
            }
        }
        require __DIR__ . '/Templates/inicio.php';
    }

    public function admision(){

        if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['nhc'])){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $nhc = $_POST['nhc'];
            $anotaciones = $_POST['anotaciones'];
            $horaActual = date("H:i");
            $fechaActual = date("y-m-d");

            $resultado = $this->model->insertarPaciente($nombre, $apellidos, $telefono, $direccion, $nhc, $anotaciones);

            $_SESSION["nombrePaciente"]=$nombre;
            $_SESSION['apellidosPaciente']=$apellidos;
            $_SESSION["nhcPaciente"]=$nhc;

            $this->insertarUbicacion($nhc, 'TR', $horaActual, $fechaActual, $_SESSION['nombreUsuario']);
            
            header('Location: index.php?ctl=seguimiento');
        }

        require __DIR__ . '/Templates/admision.php';
    }

    public function logOut(){ 
        session_destroy(); 
  
        header('Location: index.php?ctl=logIn'); 
    }

    public function seguimiento(){
        //echo "<script type=\"text/javascript\">alert(\"hello\");</script>";
        if(isset($_POST['buscador'])){
            $nhc = $_POST['buscador'];
            $params = array(
             'resultado' => array()
         );
            //echo "<script type=\"text/javascript\">alert(\"adios\");</script>";
            $params['resultado'] = $this->model->buscarPacienteNhc($nhc);
            if(count($params) > 0){
                //echo "<script type=\"text/javascript\">alert(\"ai mama\");</script>";
                foreach ($params['resultado'] as $result) :
                    $_SESSION['nombrePaciente'] = $result['nombre'];
                    $_SESSION['apellidosPaciente'] = $result['apellidos'];
                    $_SESSION['nhcPaciente'] = $result['nhc'];
                endforeach;
            }

            $this->recuperarUbicacionesPaciente($nhc);
        }else{
            $this->recuperarUbicacionesPaciente($_SESSION['nhcPaciente']);
        }


        require __DIR__ . '/Templates/seguimiento.php';    
    }

    public function seg(){
                   

        require __DIR__ . '/Templates/seguimiento.php';    
    }

    public function insertarUbicacion($nhc, $idLocalizacion, $horaInicio, $fecha, $usuario){

        $this->model->insertarUbicacion($nhc, $idLocalizacion, $horaInicio, $fecha, $usuario);
    }

    public function box(){
         require __DIR__ . '/Templates/box.php';
    }

    public function recuperarUbicacionesPaciente($nhc){
        $params['resultado'] = $this->model->recuperarUbicacionesPaciente($nhc);

        if(count($params) > 0){
                //echo "<script type=\"text/javascript\">alert(\"ai mama\");</script>";
            //reset de $_SESSION['infoUbicacion'] para que cada vez que se ejecute una búsqueda guarde unicamente los datos de la busqueda en cuestión.
                $_SESSION['infoUbicacion'] = null;
                foreach ($params['resultado'] as $result) :
                    $info = array('horaInicio' => $result['horaInicio'], 'localizacion' => $result['Localizacion_idLocalizacion']);
                    $_SESSION['infoUbicacion'][] = $info;

                    //$infoUbicacion[]=new articulo ($result['horaInicio'],$result['Localizacion_idLocalizacion']);
                    $_SESSION['hora'] = $result['horaInicio'];
                    $this->hora = $result['horaInicio'];
                    $u1= $result['Localizacion_idLocalizacion'];
                endforeach;
                $mostrar = $_SESSION['infoUbicacion'][0]['horaInicio'];
                $mostrar1 = $_SESSION['infoUbicacion'][0]['localizacion'];
                $mostrar2 = $_SESSION['infoUbicacion'][1]['horaInicio'];
                $mostrar3 = $_SESSION['infoUbicacion'][1]['localizacion'];
                $mostrar4 = $_SESSION['infoUbicacion'][2]['horaInicio'];
                $mostrar5 = $_SESSION['infoUbicacion'][2]['localizacion'];
                echo "<script type=\"text/javascript\">alert(\"$mostrar, $mostrar1, $mostrar2, $mostrar3, $mostrar4, $mostrar5\");</script>";
            }
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