$(document).ready(function () {
  

});



/* ..:: CARGA DATOS DE CLIENTES | AJAX ::.. */
function carga_datos_cliente(client_id){
  let token = $("input[name='token']").val();

  $.ajax({
    type: "POST",
    dataType: 'json',
    url: "./API/cliente/obtener_cliente/" + client_id,
    data: {"token":token},
    success: function(resp){
      // Obtiene los datos del servicio
      let id = resp.data['0'].id;
      let activo = resp.data['0'].Activo;
      let name = resp.data['0'].nombre;
      
      // Setea los datos en el formulario
      $("input[name='id_cliente']").val(id);
      $("input[name='activo']").val(activo);
      $("input[name='nombre_editar']").val(name);
      
    },
    error : function(xhr, status) {
      console.log(xhr);
    }
  });
}
function borra_datos_cliente(client_id){
  let token = $("input[name='token']").val();

  $.ajax({
    type: "POST",
    dataType: 'json',
    url: "./API/cliente/obtener_cliente/" + client_id,
    data: {"token":token},
    success: function(resp){
      // Obtiene los datos del servicio
      let id = resp.data['0'].id;
      let nom = resp.data['0'].nombre;

      // Setea los datos en el formulario
      $("input[name='id_cliente']").val(id);
      $("input[name='nombre_cliente_eliminar']").val(nom);
      
      
      
    },
    error : function(xhr, status) {
      console.log(xhr);
    }
  });
}