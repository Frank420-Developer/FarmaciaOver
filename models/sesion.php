<?php

  Class Session{
      private $id_user;
      private $user;
      private $user_name;
      

      public function __construct(){
        session_start();  // Inicia la sesión
      }

      public function set_sesion_actual($datos_usuario){
        $_SESSION['id_user'] = $datos_usuario['id_user'];
        $_SESSION['user'] = $datos_usuario['user'];
        $_SESSION['user_name'] = $datos_usuario['user_name'];
      }

      public function get_datos_sesion(){
        $datos_sesion['usr_id'] = $_SESSION['usr_id'];
        $datos_sesion['usr'] = $_SESSION['usr'];
        $datos_sesion['usr_type'] = $_SESSION['usr_type'];
        $datos_sesion['usr_name'] = $_SESSION['usr_name'];
        $datos_sesion['usr_fecha_alta'] = $_SESSION['usr_fecha_alta'];
        return $datos_sesion;
      }

      public function close_sesion(){
        session_unset();  // Limpia
        session_destroy();  // Elimina
      }
  }
?>
