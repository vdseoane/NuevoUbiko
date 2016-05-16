<?php

 class Model
 {
    protected $conexion;

    //Conexion a la base de datos
    public function __construct($dbname,$dbuser,$dbpass,$dbhost)
    {   
        $mvc_bd_conexion = mysqli_init();
        $mvc_bd_conexion = new mysqli($dbhost, $dbuser,$dbpass, $dbname);
        
        if ($mvc_bd_conexion->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mvc_bd_conexion->connect_errno . ") " . $mvc_bd_conexion->connect_error;
        }

       $this->conexion = $mvc_bd_conexion;
    }

    public function bd_conexion()
    {

    }

    public function logIn($nombre, $pass){
        $sql = "SELECT idUsuario, Password FROM usuario WHERE idUsuario = '".$nombre."'
            AND Password = '". $pass."'";

        $result = $this->conexion->query($sql);

        return $result;
    }

    public function insertarPaciente($nombre, $apellidos, $telefono, $direccion, $nhc, $anotaciones){
        $sql ="INSERT INTO paciente(nhc, nombre, apellidos, calle, estado, telefono, anotaciones)
            VALUES('".$nhc."','".$nombre."','".$apellidos."','".$direccion."','1','".$telefono."','".$anotaciones."')";

        $result = $this->conexion->query($sql);

        return $result;
    }
/*
     public function dameAlimentos()
     {
         $sql = "select * from alimentos order by energia desc";
         $alimentos[]= 0;
         $result = $this->conexion->query($sql);
         if($result->num_rows >0){
         $alimentos = array();
         while ($row = $result->fetch_assoc())
         {
             $alimentos[] = $row;
         }
     }

         return $alimentos;
     }

     public function buscarAlimentosPorNombre($nombre)
     {
         $nombre = htmlspecialchars($nombre);

         $sql = "select * from alimentos where nombre like '" . $nombre . "' order by energia desc";

         $result = mysql_query($sql, $this->conexion);

         $alimentos = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $alimentos[] = $row;
         }

         return $alimentos;
     }

     public function dameAlimento($id)
     {
         $id = htmlspecialchars($id);

         $sql = "select * from alimentos where id=".$id;

         $result = mysql_query($sql, $this->conexion);

         $alimentos = array();
         $row = mysql_fetch_assoc($result);

         return $row;

     }

     public function insertarAlimento($n, $e, $p, $hc, $f, $g)
     {
         $n = htmlspecialchars($n);
         $e = htmlspecialchars($e);
         $p = htmlspecialchars($p);
         $hc = htmlspecialchars($hc);
         $f = htmlspecialchars($f);
         $g = htmlspecialchars($g);

         $sql = "insert into alimentos (nombre, energia, proteina, hidratocarbono, fibra, grasatotal) values ('" .
                 $n . "'," . $e . "," . $p . "," . $hc . "," . $f . "," . $g . ")";

         $result = $this->conexion->query($sql);

         return $result;
     }

     public function validarDatos($n, $e, $p, $hc, $f, $g)
     {
         return (is_string($n) &
                 is_numeric($e) &
                 is_numeric($p) &
                 is_numeric($hc) &
                 is_numeric($f) &
                 is_numeric($g));
     }
*/
 }
 ?>