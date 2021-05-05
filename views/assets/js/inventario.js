$(document).ready(function () {

});

/* ..:: CARGA DATOS DE PRODUCTOS | AJAX ::.. */
function carga_datos_producto(product_id){
  let token = $("input[name='token']").val();

  $.ajax({
    type: "POST",
    dataType: 'json',
    url: "./API/stock/get_producto/" + product_id,
    data: {"token":token},
    success: function(resp){
      // Obtiene los datos del servicio
      let id = resp.data['0'].id;
      let uni = resp.data['0'].unidades;
      let code = resp.data['0'].codigo;
      let name = resp.data['0'].nombre;
      let price = resp.data['0'].precio;
      let desc = resp.data['0'].descripcion;

      // Setea los datos en el formulario
      $("input[name='id_producto']").val(id);
      $("input[name='unidad_producto_editar']").val(uni);
      $("input[name='codigo_producto_editar']").val(code);
      $("input[name='nombre_producto_editar']").val(name);
      $("input[name='precio_editar']").val(price);
      $("input[name='descripcion_editar']").val(desc);
      
    },
    error : function(xhr, status) {
      console.log(xhr);
    }
  });
}
// function borra_datos_producto(product_id){
//   let token = $("input[name='token']").val();

//   $.ajax({
//     type: "POST",
//     dataType: 'json',
//     url: "./API/stock/get_producto/" + product_id,
//     data: {"token":token},
//     success: function(resp){
//       // Obtiene los datos del servicio
//       let id = resp.data['0'].id;

//       // Setea los datos en el formulario
//       $("input[name='id_product']").val(id);
      
      
//     },
//     error : function(xhr, status) {
//       console.log(xhr);
//     }
//   });
// }