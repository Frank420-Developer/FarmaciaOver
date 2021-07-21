<?php

  class API{
    private $datos;
    private $response;

    public function return_data($msg, $code, $data=null){
      $this->response['code'] = $code;
      $this->response['msg'] = $msg;
      $this->response['data'] = $data;
      print_r(json_encode($this->response));
    }
  }

  class InventarioAPI extends API{
    public function get_producto($datos){
      // if($_POST){
      //    $token = $_POST['token'];
      //    $sesion = new UserSession();

      //   if($sesion->validate_token($token)){
          $product_id = $datos[1];
          $producto = new InventarioPDO();
          $producto = $producto->get_producto($product_id);
          $this -> return_data("Mostrando Usuarios API", 200, $producto);
      //   }else{
      //     write_log("Token NO válido | UsuarioAPI");
      //     $this->return_data("Ocurrió un error... No es posible procesar su solicitud", 400);
      //   }
      // }else{
      //   write_log("NO se recibieron datos POST\nInventarioAPI");
      //   $this->return_data("No es posible procesar su solicitud", 400);
    // }
  }
  }


  class ClientesAPI extends API{
    public function obtener_cliente($datos){
      // if($_POST){
      //    $token = $_POST['token'];
      //    $sesion = new UserSession();

      //   if($sesion->validate_token($token)){
          $client_id = $datos[1];
          $cliente = new ClientePDO();
          $cliente = $cliente->obtener_cliente($client_id);
          $this -> return_data("Mostrando Usuarios API", 200, $cliente);
      //   }else{
      //     write_log("Token NO válido | UsuarioAPI");
      //     $this->return_data("Ocurrió un error... No es posible procesar su solicitud", 400);
      //   }
      // }else{
      //   write_log("NO se recibieron datos POST\nInventarioAPI");
      //   $this->return_data("No es posible procesar su solicitud", 400);
  // }
  }
  }
?>
