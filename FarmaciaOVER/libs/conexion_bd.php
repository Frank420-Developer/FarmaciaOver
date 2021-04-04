<?php
 class ConexionPDO{
    protected $servername;
    protected $username;
    protected $password;
    protected $dbname;
    protected $conexion;

    function __construct(){
//------ASIGNAMOS LOS VALORES A LAS VARIABLES PARA REALIZAR CONEXION PDO A LA BASE DE DATOS----//
        $this->servername = 'localhost';
        $this->username = 'Francisco Vera';
        $this->password = '';
        $this->dbname = 'farmacia over';
    }

    function conectar(){
        try {
            $this->conexion =new PDO("mysql:host=$this->servername; dbname=$this->dbname", $this->username, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            write_log('Conexion Exitosa!');
        } catch (PDOException $e) {
            write_log('Conexion a la BD fallida. \nERROR: ' . $e->getMessage());
        }   
    }

    function desconectar(){
        write_log('Se ha desconectado de la BD');
        $this->conexion = null;
    }

 }
?>