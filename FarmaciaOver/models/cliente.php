<?php
    require_once 'libs/conexion_bd.php';

    Class ClientePDO extends ConexionPDO{
        private $id_cliente;
        private $activo;
        private $nombre;

        function __construct($client_id='', $act=0, $nom=''){
            parent::__construct();
            
            $this->id_cliente = $client_id;
            $this->activo = $act;
            $this->nombre = $nom;
            
        }
        public function obtener_clientes(){
            $this->conectar();
            $state = $this->conexion->prepare("SELECT * FROM clientes");
            $state->execute();
            $result = $state->fetchAll(PDO::FETCH_ASSOC);
            write_log(serialize($result));
            return $result;
        }
        public function obtener_cliente($client_id){
            $this->conectar();

            $sql = "SELECT * FROM clientes
            WHERE id = '$client_id'";

            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->desconectar();
            write_log(serialize($result));
            return $result;
        }
        public function registrar_cliente(){
            $this->conectar();
            try {
                $sql = "INSERT INTO clientes(Activo, nombre) 
                VALUES('$this->activo','$this->nombre')";
                $this->conexion->exec($sql);
                write_log('Se realizo el insert de manera correcta '. $this->nombre);
                $this->desconectar();
                return true;
            } catch (PDOException $e) {
                write_log("Ocurrió un error al realizar el INSERT del cliente\nError: ". $e->getMessage());
                $this->desconectar();
                return false;
            }
        }
        public function actualizar_cliente(){
            $this->conectar();
            try {
                $sql = "UPDATE clientes SET 
                Activo = '$this->activo',
                nombre = '$this->nombre'
                WHERE id = '$this->id_cliente'";
                $this->conexion->exec($sql);
                write_log('Se realizo el insert de manera correcta '. $this->nombre);
                $this->desconectar();
                return true;
            } catch (PDOException $e) {
                $this->desconectar();
                return false;
            }
        }
        public function eliminar_cliente($id_cliente){
            $this->conectar();
            try{
                $sql = "DELETE FROM clientes WHERE id ='$id_cliente'";
                $stmt = $this->conexion->prepare($sql);
                $stmt->execute();
               

                write_log("Se eliminaron: " . $stmt->rowCount() . " registros de manera correcta");
                $this->desconectar();
                return true;
            } catch (PDOException $e) {
                $this->desconectar();
                return false;
            }
        }

        public function cambiar_activo(){
            $this->conectar();
            try{
                $sql = "UPDATE clientes SET Activo = '$this->activo'
                        WHERE id = '$this->id_cliente'";
                $stmt = $this->conexion->prepare($sql);
                $stmt->execute();
                write_log("SQL: " . $sql);
                write_log("Se actualizaron: " . $stmt->rowCount() . " registros de forma exitosa");
                $this->desconectar();
                return true;
            }catch (PDOException $e) {
                write_log("Ocurrió un error al actualizar el campo Activo del cliente\nError: ". $e->getMessage());
                write_log("SQL: ". $sql);
                $this->desconectar();
            }
        }
        
    }
?>