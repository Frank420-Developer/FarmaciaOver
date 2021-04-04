<?php

  Class Session{
      private $id_user;
      private $user;
      private $user_name;
      private $user_lastname;
      private $groups;
      private $status;

      public function __construct(){
        session_start();  // Inicia la sesión
      }

      public function set_sesion_actual($datos_usuario){
        $_SESSION['id_user'] = $datos_usuario['id_user'];
        $_SESSION['user'] = $datos_usuario['user'];
        $_SESSION['user_name'] = $datos_usuario['user_name'];
        $_SESSION['user_lastname'] = $datos_usuario['user_lastname'];
        $_SESSION['status'] = $datos_usuario['status'];
        $_SESSION['groups'] = $datos_usuario['groups'];
      }

      public function get_datos_sesion(){
        $datos_sesion['usr_id'] = $_SESSION['usr_id'];
        $datos_sesion['usr'] = $_SESSION['usr'];
        $datos_sesion['usr_status'] = $_SESSION['usr_status'];
        $datos_sesion['usr_type'] = $_SESSION['usr_type'];
        $datos_sesion['usr_name'] = $_SESSION['usr_name'];
        $datos_sesion['usr_ap_paterno'] = $_SESSION['usr_ap_paterno'];
        $datos_sesion['usr_ap_materno'] = $_SESSION['usr_ap_materno'];
        $datos_sesion['usr_fecha_alta'] = $_SESSION['usr_fecha_alta'];
        return $datos_sesion;
      }

      public function close_sesion(){
        session_unset();  // Limpia
        session_destroy();  // Elimina
      }
  }
?>
