<html>
<head>
  <?php echo link_tag('assets/css/style.css'); ?>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript"
  src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <script type="text/javascript"
        src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
<script type='text/javascript'
  src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>

<script type="text/javascript">
        $(document).ready(function() {

            OpenPay.setId('mbbhthnfoofqpkzdjqyz');
            OpenPay.setApiKey('pk_9c8f9d3b2b1f4bd69aa49a6f53577323');
            OpenPay.setSandboxMode(true);
            //Se genera el id de dispositivo
            var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");

            $('#pay-button').on('click', function(event) {
                event.preventDefault();
                $("#pay-button").prop( "disabled", true);
                OpenPay.token.extractFormAndCreate('payment-form', sucess_callbak, error_callbak);
            });

            var sucess_callbak = function(response) {
              var token_id = response.data.id;
              $('#token_id').val(token_id);
              $('#payment-form').submit();
            };

            var error_callbak = function(response) {
                var desc = response.data.description != undefined ? response.data.description : response.message;
                alert("ERROR [" + response.status + "] " + desc);
                $("#pay-button").prop("disabled", false);
            };

        });
    </script>


</head>
<body>
  <!--Barra de navegacion-->
  <header>

  <div id="navigation" class="navbar navbar-inverse navbar-fixed-top default" role="navigation">
    <div class="container">

      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?php echo anchor('inicio', 'Agencia', array('class' => 'navbar-brand')); ?>
      </div>

    <div class="navigation">
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <nav>
        <ul class="nav navbar-nav navbar-right">
          <li class="current"><?php echo anchor('inicio', 'Home'); ?></li>
          <li><?php echo anchor('paquete/nuevos', 'Paquetes'); ?></li>
          <li><?php echo anchor('contacto', 'Contacto'); ?></li>
          <li><?php echo anchor('carrito', '<span class="glyphicon glyphicon-shopping-cart"></span>'); ?></li>
        </ul>
      </nav>
      </div><!-- /.navbar-collapse -->
    </div>

    </div>
  </div>

  </header>
  <!--Fin barra de navegacion-->
  <section>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h3><span>Realizar Pago</span></h3>
        </div>
        <div class="sub-heading">
          <p>
             Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.
          </p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">

              <div class="bkng-tb-cntnt">
                  <div class="pymnts">
                      <form action="<?php echo base_url();?>index.php/carrito/transaccion" method="POST" id="payment-form">
                        <div class="sctn-row">
                            <div class="sctn-col l">
                              <div class="form-group">
                                <label for="nombre-cliente">Nombre</label>
                                <input type="text" class="form-control" id="nombre-cliente" name="nombre-cliente" placeholder="" required>

                              </div>
                              <div class="form-group">
                                <label for="ape-paterno">Apellido Paterno</label>
                                <input type="text" class="form-control" id="ape-paterno" name="ape-paterno" placeholder="" required>

                              </div>
                              <div class="form-group">
                                <label for="ape-materno">Apellido Materno</label>
                                <input type="text" class="form-control" id="ape-materno" name="ape-materno" placeholder="" required>

                              </div>
                            </div>
                            <div class="sctn-col">
                                <div class="form-group">
                                  <label for="correo-cliente">Correo</label>
                                  <input type="email" class="form-control" id="correo-cliente" name="correo-cliente" placeholder="" required>

                                </div>
                                <div class="form-group">
                                  <label for="telefono">Telefono</label>
                                  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="" required>

                                </div>
                            </div>
                          </div>
                          <input type="hidden" name="token_id" id="token_id">
                          <div class="pymnt-itm card active">
                              <h2>Tarjeta de crédito o débito</h2>
                              <div class="pymnt-cntnt">
                                  <div class="card-expl">
                                      <div class="credit"><h4>Tarjetas de crédito</h4></div>
                                      <div class="debit"><h4>Tarjetas de débito</h4></div>
                                  </div>
                                  <div class="sctn-row">
                                      <div class="sctn-col l">
                                          <label>Nombre del titular</label><input type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name">
                                      </div>
                                      <div class="sctn-col">
                                          <label>Número de tarjeta</label><input type="text" autocomplete="off" data-openpay-card="card_number"></div>
                                      </div>
                                      <div class="sctn-row">
                                          <div class="sctn-col l">
                                              <label>Fecha de expiración</label>
                                              <div class="sctn-col half l"><input type="text" placeholder="Mes" data-openpay-card="expiration_month"></div>
                                              <div class="sctn-col half l"><input type="text" placeholder="Año" data-openpay-card="expiration_year"></div>
                                          </div>
                                          <div class="sctn-col cvv"><label>Código de seguridad</label>
                                              <div class="sctn-col half l"><input type="text" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2"></div>
                                          </div>
                                      </div>
                                      <div class="openpay"><div class="logo">Transacciones realizadas vía:</div>
                                      <div class="shield">Tus pagos se realizan de forma segura con encriptación de 256 bits</div>
                                  </div>
                                  <div class="sctn-row">
                                          <a class="button rght" id="pay-button">Pagar</a>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
