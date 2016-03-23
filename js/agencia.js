/*  peters.js
 */
var agencia = window.agencia || {};
agencia.viajes = (function() {
  var base_url = "http://localhost:8888/agencia/";
  return {
    obtener_form_contacto: function(){
      $(document).ready(function() {
        $('#contenido').load(base_url+'/index.php/contacto/obtenerFormulario');
      });
    },
    agregar_item: function(){
      $(document).on('click', '#ordenar-platillo', function(e) {
          $.ajax({
                type : 'POST',
                dataType: 'text',
                data: $('#form-item').serialize(),
                url: base_url+'index.php/carrito/agregar',
                success : function(response){
                            //alert(response.nombre);
                            //$('#myTab a:last').tab('show');
                            //$('#det-pedido').tab('show');
                            //$('#detalle-pedido').load(base_url+'index.php/menu/verPedido');
              },
              error: function (request, status, error) {
                  alert(request.responseText);
                  alert('Error');
              }
              });
                    //$('#detalle-pedido').tab('show');
                    //$('.nav-tabs a[href="#detalle-pedido"]').tab('show');
                    //e.preventDefault();

          });
    },
    validar_formulario: function() {
      $(document).ready(function() {
        $('.form-validacion').bootstrapValidator({
          message: 'This value is not valid',
          errors: {
            require: 'Este valor es requerido',
            match: 'Does not match',
            minlength: 'Not long enough',
          },
          feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh',
          }
        });
      });
    },
      formato_tabla: function() {
        $(document).ready(function() {
          $('.tbl-datatable').DataTable({
            pagingType: "bootstrapPager",
            pagerSettings: {
              searchOnEnter: true
            },language: {
                  "sProcessing": "Procesando...",
                  "sLengthMenu": "Mostrar _MENU_ registros",
                  "sZeroRecords": "No se encontraron resultados",
                  "sEmptyTable": "Ningún dato disponible en esta tabla",
                  "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sInfoPostFix": "",
                  "sSearch": "Buscar:",
                  "sUrl": "",
                  "sInfoThousands": ",",
                  "sLoadingRecords": "Cargando...",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast": "Último",
                      "sNext": "Siguiente",
                      "sPrevious": "Anterior"
                  },
                  "oAria": {
                      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                  }
              }

          });
        });
      },
    }
})();
