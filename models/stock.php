<?php
    require_once 'libs/conexion_bd.php';

    Class InventarioPDO extends ConexionPDO{
        private $id_producto;
        private $unidades;
        private $codigo;
        private $nombre;
        private $precio;
        private $descripcion;

        function __construct($product_id='', $unities='',$cod='',$nom='', $price='', $desc=''){
            parent::__construct();
            
            $this->id_producto = $product_id;
            $this->unidades = $unities;
            $this->codigo = $cod;
            $this->nombre = $nom;
            $this->precio = $price;
            $this->descripcion = $desc;
            
        }
        public function get_productos(){
            $this->conectar();
            $stmt = $this->conexion->prepare("SELECT * FROM inventario");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->desconectar();
            write_log(serialize($result));
            return $result;
        }
        public function get_producto($product_id){
            $this->conectar();

            $sql = "SELECT * FROM inventario
            WHERE id = '$product_id'";

            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->desconectar();
            write_log(serialize($result));
            return $result;
        }
        public function crear_producto(){
            $this->conectar();
            try {
                $sql = "INSERT INTO inventario (unidades, codigo, nombre, precio, descripcion) 
                VALUES('$this->unidades','$this->codigo','$this->nombre','$this->precio','$this->descripcion')";
                $this->conexion->exec($sql);
                write_log('Se realizo el insert del producto de manera correcta ');
                $this->desconectar();
                return true;
            } catch (PDOException $e) {
                write_log("Ocurrió un error al realizar el INSERT del producto\nError: ". $e->getMessage());
                $this->desconectar();
                return false;
            }
        }

        public function actualizar_producto(){
            $this->conectar();
            try {
                $sql = "UPDATE inventario SET
                unidades = '$this->unidades', 
                codigo = '$this->codigo',
                nombre = '$this->nombre',
                precio = '$this->precio',
                descripcion = '$this->descripcion'
                WHERE id = '$this->id_producto'";

                $stmt = $this->conexion->prepare($sql);
                $stmt->execute();

                write_log("Se actualizaron: " . $stmt->rowCount() . " registros de manera correcta");
                $this->desconectar();
                return true;

            } catch (PDOException $e) {
                write_log("Ocurrió un error al realizar el UPDATE del producto \nError: ". $e->getMessage());
                write_log("SQL: " . $sql);
                $this->desconectar();
                return false;
            }
        }

        public function borrar_producto(){
            $this->conectar();
            try {
                $sql = "DELETE FROM inventario WHERE id = '$this->id_producto'";

                $stmt = $this->conexion->prepare($sql);
                $stmt->execute();
               

                write_log("Se eliminaron: " . $stmt->rowCount() . " registros de manera correcta");
                $this->desconectar();
                return true;
            } catch (PDOException $e) {
                write_log("Ocurrió un error al realizar el DELETE del producto \nError: ". $e->getMessage());
                write_log("SQL: " . $sql);
                $this->desconectar();
                return false;
            }
        }
        
    }
?>