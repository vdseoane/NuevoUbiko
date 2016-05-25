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
                $_SESSION["fondo"] = 'ad';
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
        $_SESSION["fondo"] = 'ad';
        if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['nhc'])){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $nhc = $_POST['nhc'];
            $anotaciones = $_POST['anotaciones'];

            $resultado = $this->model->insertarPaciente($nombre, $apellidos, $telefono, $direccion, $nhc, $anotaciones);
            echo "<script type=\"text/javascript\">alert(\"hello\");</script>";
            $_SESSION["nombrePaciente"]=$nombre;
            $_SESSION['apellidosPaciente']=$apellidos;
            $_SESSION["nhcPaciente"]=$nhc;

            $this->insertarPrimeraUbicacion($nhc, $_SESSION['nombreUsuario']);
            
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
        $_SESSION["fondo"] = 'seg';
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

    public function insertarUbicacion($nhc, $idLocalizacion, $usuario){
        $horaActual = date("H:i");
        $fechaActual = date("y-m-d");
        $this->model->insertarUbicacion($nhc, $idLocalizacion, $horaActual, $fechaActual, $usuario);
    }

    public function insertarPrimeraUbicacion($nhc, $usuario){
        $horaActual = date("H:i");
        $fechaActual = date("y-m-d");
        $this->model->insertarPrimeraUbicacion($nhc, 'AD', $horaActual, $fechaActual, $usuario);
        $this->model->insertarPrimeraUbicacion($nhc, 'TR', $horaActual, $fechaActual, $usuario);
    }

    public function box(){
        $_SESSION["fondo"] = 'box';
        $this->recuperarCamas();

         require __DIR__ . '/Templates/box.php';
    }

    public function recuperarUbicaciones(){
        $this->recuperarUbicacionesPaciente($_SESSION['nhcPaciente']);
        require __DIR__ . '/Templates/seguimiento.php';
        
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
                endforeach;
                /*$mostrar = $_SESSION['infoUbicacion'][0]['horaInicio'];
                $mostrar1 = $_SESSION['infoUbicacion'][0]['localizacion'];
                $mostrar2 = $_SESSION['infoUbicacion'][1]['horaInicio'];
                $mostrar3 = $_SESSION['infoUbicacion'][1]['localizacion'];
                $mostrar4 = $_SESSION['infoUbicacion'][2]['horaInicio'];
                $mostrar5 = $_SESSION['infoUbicacion'][2]['localizacion'];
                echo "<script type=\"text/javascript\">alert(\"$mostrar, $mostrar1, $mostrar2, $mostrar3, $mostrar4, $mostrar5\");</script>";*/
            }
    }
    //Recupera todas las camas de BD con su Localización y con el paciente asignado en caso de existir
    public function recuperarCamas(){
        $params['resultado'] = $this->model->recuperarCamas();
        if(count($params) > 0){
            $_SESSION['infoCamas'] = null;
            foreach ($params['resultado'] as $result) :
                $info = array('localizacion' => $result['Localizacion_idLocalizacion'], 'numeroCama' => $result['numeroCama'], 'paciente' => $result['Paciente_NHCPaciente']);
                $_SESSION['infoCamas'][] = $info;
            endforeach;
        }
    }

    public function insertarBOX(){
        echo "<script type=\"text/javascript\">alert(\"dentro BOX\");</script>";
        $this->model->insertarCamaBOX($_SESSION['nhcPaciente']);
        $ultimaUbicacion = count($_SESSION['infoUbicacion']);
        //$this->insertarFinUbicacionAnterior($_SESSION['nhcPaciente'], $_SESSION['infoUbicacion'][$ultimaUbicacion]['localizacion']);
        $this->insertarUbicacion($_SESSION['nhcPaciente'], 'BOX', $_SESSION['nombreUsuario']);
        $this->recuperarUbicaciones();
    }

    public function insertarECO(){
        $ultimaUbicacion = count($_SESSION['infoUbicacion']);
        //$this->insertarFinUbicacionAnterior($_SESSION['nhcPaciente'], $_SESSION['infoUbicacion'][$ultimaUbicacion]['localizacion']);
        $this->insertarUbicacion($_SESSION['nhcPaciente'], 'ECO', $_SESSION['nombreUsuario']);
        $this->recuperarUbicaciones();
    }

    public function insertarRX(){
        $ultimaUbicacion = count($_SESSION['infoUbicacion']);
        //$this->insertarFinUbicacionAnterior($_SESSION['nhcPaciente'], $_SESSION['infoUbicacion'][$ultimaUbicacion]['localizacion']);
        $this->insertarUbicacion($_SESSION['nhcPaciente'], 'RX', $_SESSION['nombreUsuario']);
        $this->recuperarUbicaciones();
    }

    public function insertarTAC(){
        $ultimaUbicacion = count($_SESSION['infoUbicacion']);
        //$this->insertarFinUbicacionAnterior($_SESSION['nhcPaciente'], $_SESSION['infoUbicacion'][$ultimaUbicacion]['localizacion']);
        $this->insertarUbicacion($_SESSION['nhcPaciente'], 'TAC', $_SESSION['nombreUsuario']);
        $this->recuperarUbicaciones();
    }

    public function insertarTR(){
        $ultimaUbicacion = count($_SESSION['infoUbicacion']);
        //$this->insertarFinUbicacionAnterior($_SESSION['nhcPaciente'], $_SESSION['infoUbicacion'][$ultimaUbicacion]['localizacion']);
        $this->insertarUbicacion($_SESSION['nhcPaciente'], 'TR', $_SESSION['nombreUsuario']);
        $this->recuperarUbicaciones();
    }

    public function insertarSalaA(){
        $ultimaUbicacion = count($_SESSION['infoUbicacion']);
        //$this->insertarFinUbicacionAnterior($_SESSION['nhcPaciente'], $_SESSION['infoUbicacion'][$ultimaUbicacion]['localizacion']);
        $this->insertarUbicacion($_SESSION['nhcPaciente'], 'SALA A', $_SESSION['nombreUsuario']);
        $this->recuperarUbicaciones();
    }

    public function insertarSalaB(){
        $ultimaUbicacion = count($_SESSION['infoUbicacion']);
        //$this->insertarFinUbicacionAnterior($_SESSION['nhcPaciente'], $_SESSION['infoUbicacion'][$ultimaUbicacion]['localizacion']);
        $this->insertarUbicacion($_SESSION['nhcPaciente'], 'SALA B', $_SESSION['nombreUsuario']);
        $this->recuperarUbicaciones();
    }

    public function insertarSalaTra(){
        $ultimaUbicacion = count($_SESSION['infoUbicacion']);
        //$this->insertarFinUbicacionAnterior($_SESSION['nhcPaciente'], $_SESSION['infoUbicacion'][$ultimaUbicacion]['localizacion']);
        $this->insertarUbicacion($_SESSION['nhcPaciente'], 'SALA TRA', $_SESSION['nombreUsuario']);
        $this->recuperarUbicaciones();
    }

    public function insertarOBS(){
        $ultimaUbicacion = count($_SESSION['infoUbicacion']);
        //$this->insertarFinUbicacionAnterior($_SESSION['nhcPaciente'], $_SESSION['infoUbicacion'][$ultimaUbicacion]['localizacion']);
        $this->insertarUbicacion($_SESSION['nhcPaciente'], 'SALA OBS', $_SESSION['nombreUsuario']);
        $this->recuperarUbicaciones();
    }

    public function insertarQUI(){
        $ultimaUbicacion = count($_SESSION['infoUbicacion']);
        //$this->insertarFinUbicacionAnterior($_SESSION['nhcPaciente'], $_SESSION['infoUbicacion'][$ultimaUbicacion]['localizacion']);
        $this->insertarUbicacion($_SESSION['nhcPaciente'], 'QUI', $_SESSION['nombreUsuario']);
        $this->recuperarUbicaciones();
    }

    public function insertarING(){
        $ultimaUbicacion = count($_SESSION['infoUbicacion']);
        //$this->insertarFinUbicacionAnterior($_SESSION['nhcPaciente'], $_SESSION['infoUbicacion'][$ultimaUbicacion]['localizacion']);
        $this->insertarUbicacion($_SESSION['nhcPaciente'], 'ING', $_SESSION['nombreUsuario']);
        $this->recuperarUbicaciones();
    }

    public function insertarExitus(){
        $ultimaUbicacion = count($_SESSION['infoUbicacion']);
        //$this->insertarFinUbicacionAnterior($_SESSION['nhcPaciente'], $_SESSION['infoUbicacion'][$ultimaUbicacion]['localizacion']);
        $this->insertarUbicacion($_SESSION['nhcPaciente'], 'EXITUS', $_SESSION['nombreUsuario']);
        $this->recuperarUbicaciones();
    }

    public function insertarAlta(){
        $ultimaUbicacion = count($_SESSION['infoUbicacion']);
        //$this->insertarFinUbicacionAnterior($_SESSION['nhcPaciente'], $_SESSION['infoUbicacion'][$ultimaUbicacion]['localizacion']);
        $this->insertarUbicacion($_SESSION['nhcPaciente'], 'ALTA', $_SESSION['nombreUsuario']);
        $this->recuperarUbicaciones();
    }

 public function insertarFinUbicacionAnterior($nhc, $ultimaUbicacion){
    $hora = date("H:i");
    $this->model->insertarFinUbicacionAnterior($nhc, $ultimaUbicacion, $hora);
 }
}
 ?>