<?php
//
//class ClaseConexion {
//  
//    private $servidor;
//    private $login;
//    private $clave;
//    private $bd;
//    public $id_con;
//    public $id_bd;
//    
//   
//        function conectar(){
//        $this-> servidor ="localhost";
//        $this-> login = "root";
//        $this-> clave= "";
//        $this-> bd="acreditacionbd-6";
//        
//        $this-> id_con= mysql_connect($this->servidor,$this->login,$this->clave);
//        if(!$this->id_con){
//            die("Error en la conexion bd");
//        }
//        
//        $this->id_bd=  mysql_select_db($this->bd,$this->id_con);
//        if(!$this->id_bd){
//            die("Error BD no existe!");
//        }
//    }
//    
//    
//    function desconectar(){
//        mysql_close($this->id_con);
//    }
//    
//}
$conexion =new mysqli("localhost", "root", "", "acreditacion2.0");
//if(!$conexion) {
//    echo 'Error al conectar a la base de datos';
//}
//else {
//    echo 'Conectado a la base de datos';
//}
?>