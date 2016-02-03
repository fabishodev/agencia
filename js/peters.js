/*  peters.js
 */
var peters = window.peters || {};
peters.pizza = (function() {
  var base_url = "http://localhost:8888/peters/";
  return {
    validar_formulario: function() {
      $(document).ready(function() {
        $('.form-validacion').bootstrapValidator({
          message: 'This value is not valid',
          feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh',
          }
          /*,
          fields: {
            nombre-completo: {
              validators: {
                notEmpty: {
                  message: 'El Nombre es requerido'
                }
              }
            },
            curp: {
              validators: {
                notEmpty: {
                  message: 'No puede dejar la CURP vacía'
                },
                stringLength: {
                  min: 18,
                  max: 18,
                  message: 'La CURP debe tener 18 caracteres'
                }
              }

            }
          }*/
        });
      });
    },
    mostrar_tab: function() {
        $(document).ready(function() {
          var tab = sessionStorage.getItem('id-btn');
        //alert(tab);
          switch (tab) {
            case 'ord-pizzas':
              $('#myTab a[href="#ord-pizzas"]').tab('show');
              break;
            case 'ord-ham':
              $('#myTab a[href="#ord-ham"]').tab('show');
              break;
            case 'ord-ensaladas':
              $('#myTab a[href="#ord-ensaladas"]').tab('show');
              break;
            case 'ord-carnes':
                $('#myTab a[href="#ord-carnes"]').tab('show');
                break;
            case 'ord-espag':
                    $('#myTab a[href="#ord-espag"]').tab('show');
                    break;
            case 'ord-otros':
                  $('#myTab a[href="#ord-otros"]').tab('show');
                  break;
            case 'ordenar-platillo':
              $('#myTab a:last').tab('show');
              break;
            case 'eliminar-item':
              $('#myTab a:last').tab('show');
              break;
            case 'btn-actualizar':
              $('#myTab a:last').tab('show');
              break;
            case 'personalizar':
              $('#myTab a[href="#ord-pizzas-per"]').tab('show');
              break;
            default:
              $('#myTab a[href="#ord-pizzas"]').tab('show');
              break;

          }
          sessionStorage.removeItem('id-btn');
        });
      },
    guardar_id_btn: function() {
      $(".btn").click(function (e) {
        var clave = 'id-btn';
        var valor = $(this).attr('id');
        sessionStorage.setItem(clave,valor);
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
    tabla_listas: function() {
      $(document).ready(function() {
        $('.tbl-datatable').DataTable({
          'order': [[ 0, "desc" ]],
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
    alerta_editar: function() {
      $(".btn-editar").click(function (e) {
            if (confirm("¿Estas seguro de realizar esta acción?")) {
              return true;
            } else {
                e.preventDefault();
            }

        });
      },
    alerta_eliminar_item: function() {
      $(".eliminar-item").click(function (e) {
            if (confirm("¿Estas seguro de realizar esta acción?")) {
              var clave = 'id-btn';
              var valor = 'eliminar-item';
              sessionStorage.setItem(clave,valor);
              return true;
            } else {
                e.preventDefault();
            }

        });
      },
      obtener_seleccion: function() {
        $(document).on('click', '#btn-sel-per', function(e) {
          var cod_tamanio = $('#sel-tamanio-per').get(0).value;
          var cod_pizza_uno = $('#sel-pizza-1').get(0).value;
          var cod_pizza_dos = $('#sel-pizza-2').get(0).value;
          var extra1 = $('#extra1:checked').val();
          if (cod_pizza_uno && cod_tamanio) {
            $('#detalle-per').load(base_url+'index.php/menu/obtenerPizzaDetallePersonalizada', {
              cod_tamanio: cod_tamanio,
              cod_pizza_uno: cod_pizza_uno,
              cod_pizza_dos: cod_pizza_dos,
              extra: extra1
            });
            //$('#myModal').modal('hide');
          //  alert(extra);
          }
        });
      $(document).on('click', '#seleccion-pedido', function(e) {
        var cod_tamanio = $('#sel-tamanio').get(0).value;
        var cod_pizza = $('#sel-pizza').get(0).value;
        var extra = $('#extra:checked').val();
        if (cod_pizza && cod_tamanio) {
          $('#detalle').load(base_url+'index.php/menu/obtenerPizzaDetalle', {
            cod_tamanio: cod_tamanio,
            cod_pizza: cod_pizza,
            extra: extra
          });
        }
      });
      $(document).on('click', '#seleccion-pedido-promo', function(e) {
        var cod_tamanio_promo = $('#sel-tamanio-promo').get(0).value;
        var cod_pizza_promo = $('#sel-pizza-promo').get(0).value;
        var extra_promo = $('#extra-promo:checked').val();
        if (cod_pizza_promo && cod_tamanio_promo) {
          $('#detalle-promo').load(base_url+'index.php/menu/obtenerPizzaDetallePromo', {
            cod_tamanio: cod_tamanio_promo,
            cod_pizza: cod_pizza_promo,
            extra: extra_promo
          });
        }
      });
      $(document).on('click', '#seleccion-pedido-ham', function(e) {
        var cod_ham = $('#sel-ham').get(0).value;
        var tipo = $('input:radio[name=tipo]:checked').val();
        if (cod_ham) {
          $('#detalle-ham').load(base_url+'index.php/menu/obtenerHamburguesaDetalle', {
            cod_ham: cod_ham,
            tipo: tipo
          });
          //alert(tipo);
        }
      });
      $(document).on('click', '#seleccion-pedido-ensalada', function(e) {
        var cod_ensalada = $('#sel-ensalada').get(0).value;
        if (cod_ensalada) {
          $('#detalle-ensalada').load(base_url+'index.php/menu/obtenerEnsaladaDetalle', {
            cod_ensalada: cod_ensalada
          });
          //alert(tipo);
        }
      });
      $(document).on('click', '#seleccion-pedido-carnes', function(e) {
        var cod_carne = $('#sel-carnes').get(0).value;
        if (cod_carne) {
          $('#detalle-carnes').load(base_url+'index.php/menu/obtenerCarneDetalle', {
            cod_platillo: cod_carne
          });
          //alert(tipo);
        }
      });
      $(document).on('click', '#seleccion-pedido-otros', function(e) {
        var cod_otro = $('#sel-otros').get(0).value;
        if (cod_otro) {
          $('#detalle-otros').load(base_url+'index.php/menu/obtenerOtroDetalle', {
            cod_platillo: cod_otro
          });
          //alert(tipo);
        }
      });
    },
    agregar_item: function(){
      $(document).on('click', '#ordenar-platillo', function(e) {
          var clave = 'id-btn';
          var valor = $(this).attr('id');
          sessionStorage.setItem(clave,valor);
          $.ajax({
                type : 'POST',
                dataType: 'text',
                data: $('#form-ordenar').serialize(),
                url: base_url+'index.php/menu/ordenarAhora',
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
            $('#myTab a:last').tab('show');
          });
    },
    cargar_form_datos_orden: function() {
      $( document ).ready(function() {
          $( "#datos-orden" ).load(base_url+'index.php/pedido/datosOrden');
      });

    },
    cargar_form_detalle_pedido: function() {
      $( document ).ready(function() {
          $( "#detalle-pedido" ).load(base_url+'index.php/pedido/detallePedido');
      });

    },
    vaciar_detalle_pedido: function(e) {
      $(document).on('click', '#vaciar-pedido', function(e) {
        if (confirm("¿Estas seguro de realizar esta acción?")) {
          $.get(base_url+'index.php/pedido/vaciarPedido')
            .done(function( data ) {
              $( "#detalle-pedido" ).load(base_url+'index.php/pedido/detallePedido');
            });

          return true;
        } else {
            e.preventDefault();
        }

      });

      },
      actualizar_detalle_pedido: function() {
        $(document).on('click', '#btn-actualizar', function(e) {
          var clave = 'id-btn';
          var valor = $(this).attr('id');
          sessionStorage.setItem(clave,valor);
        //  e.preventDefault();
            //$("#detalle-pedido").empty();
            $.get(base_url+'index.php/pedido/actualizarPedido');
        });

      },
      eliminar_costo_platillo: function(){
        $(document).on('click', '.btn-eliminar-costo', function(e) {
          var cod = $('#id').get(0).value;
            var sku = $(this).closest("tr").find(".sku").text().trim();
          //alert(cod);
          //alert(sku);
          //e.preventDefault();

          $.ajax({
            method: "POST",
            dataType: 'text',
            url: base_url+'index.php/menu/eliminarCosto',
            data: { sku: sku, id: cod }

          })
        });
      },
      evento_seguir_ordenando: function() {
        $(document).on('click', '#btn-seg-ord', function(e) {
        $('#myTab a:first').tab('show');
        });

      },
      evento_cambiar_tab_personalizar: function() {
        $(document).on('click', '#btn-personalizar', function(e) {
          $('#myTab a[href="#ord-pizzas-per"]').tab('show');
          //$('#myTab a:first').tab('show');
        });
      },
      mostrar_costo_extra: function() {
        var p = parseFloat($('input[name=price]').get(0).value);
        var e = parseFloat($('input[name=extra]').get(0).value);
        $(".p-costo-extra").hide();

        $('#extra').change(function() {
          if($('#extra').is(":checked")){
            $(".p-costo-extra").show();
            var t = parseFloat(p+e);
            $('input[name=costo-extra]').val(e);
            $('input[name=total]').val(t);
          }else{
            $(".p-costo-extra").hide();
            $('input[name=costo-extra]').val(0);
            $('input[name=total]').val(p);
          }
        });

        $('#extra-per').change(function() {
          if($('#extra-per').is(":checked")){
            $(".p-costo-extra").show();

            var t = parseFloat(p+e);
            $('input[name=costo-extra]').val(e);
            $('input[name=total]').val(t);
          }else{
            $(".p-costo-extra").hide();
            $('input[name=costo-extra]').val(0);
            $('input[name=total]').val(p);
          }
        });

        $('#extra-promo').change(function() {
          if($('#extra-promo').is(":checked")){
            $(".p-costo-extra").show();

            var t = parseFloat(p+e);
            $('input[name=costo-extra]').val(e);
            $('input[name=total]').val(t);
          }else{
            $(".p-costo-extra").hide();
            $('input[name=costo-extra]').val(0);
            $('input[name=total]').val(p);
          }
        });
      }
    }
})();
