$(document).ready(function () {

});

/* ..:: CARGA DATOS DE CLIENTES | AJAX ::.. */
function carga_datos_cliente(client_id){
  var token = $("input[name='token']").val();

  $.ajax({
    type: "POST",
    dataType: 'json',
    url: "./API/cliente/obtener_cliente/" + client_id,
    data: {"token":token},
    success: function(resp){
      // Obtiene los datos del servicio
      var id = resp.data['0'].id;
      var name = resp.data['0'].nombre;
      
      // Setea los datos en el formulario
      $("input[name='id_cliente']").val(id);
      $("input[name='nombre_editar']").val(name);
      
    },
    error : function(xhr, status) {
      console.log(xhr);
    }
  });
}