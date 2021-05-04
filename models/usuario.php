<?php
    require_once 'libs/conexion_bd.php';

    Class UsuarioPDO extends ConexionPDO{
        private $nombre;
        private $correo;
        private $user_name;
        private $contraseña;

        function __construct($nom='', $email='', $userName='',$contra=''){
            parent::__construct();
            
            $this->nombre = $nom;
            $this->correo = $email;
            $this->user_name = $userName;
            $this->contraseña = $contra;
        }
        public function obtener_usuarios(){
            $this->conectar();
            $state = $this->conexion->prepare("SELECT * FROM login");
            $state->execute();
            $result = $state->fetchAll(PDO::FETCH_ASSOC);
            write_log(serialize($result));
            return $result;
        }
        public function registrar_usuario(){
            $this->conectar();
            try {
                $sql = "INSERT INTO login (Nombre, Correo, Username, Contraseña) 
                VALUES('$this->nombre','$this->correo','$this->user_name','$this->contraseña')";
                $this->conexion->exec($sql);
                write_log('Se realizo el insert de manera correcta '. $this->correo);
                $this->desconectar();
                return true;
            } catch (PDOException $e) {
                $this->desconectar();
                return false;
            }
        }

        public function logear_usuario($email, $contra){
            $this->conectar();
            try {
                $sql = "SELECT * FROM login WHERE Correo ='$email' and Contraseña='$contra'";
                $query = $this->conexion->prepare($sql);
                $query->execute();
                write_log("correo: " . $email);
                write_log("contra: " . $contra);
                write_log("consulta: " . $sql);

                if($query->rowCount() > 0){
                    write_log('datos coinciden');
                    return true;
                }else{
                    write_log('datos no coinciden');
                    return false;
                }

                // $this->desconectar();
                // return true;
            } catch (PDOException $e) {
                $this->desconectar();
                return false;
            }
        }
        
    }

    // class UsuarioMySQL extends MySQL_Object{
    //     public function iniciar_sesion($email, $contra){
    //         $this->conectar();
    //         try {
    //             //---------------------------------CORREGIR---------------------------------//
    //         $validar_login = mysqli_query($this->conn, "SELECT * FROM login WHERE (Correo='$email') AND (Contraseña='$contra')");

    //             if($validar_login){
    //                 write_log('login correcto ' . $email);
    //                 $this->desconectar();
    //                 return true;
    //             }else{
    //                 write_log('login incorrecto ' . $email);
    //                 $this->desconectar();
    //                 return false;
    //             }
    //         } catch (Exception $e) {

    //         }
    //             //----------------------------------CORREGIR-----------------------// 
    //     }
    // }
?>