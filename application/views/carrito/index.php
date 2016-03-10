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
  <div class="container">


  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h3><span>Carrito</span></h3>
      </div>
      <div class="sub-heading">
        <p>
           Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.
        </p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <?php echo form_open('carrito/actualizar'); ?>

    <table class="table" cellpadding="6" cellspacing="1" style="width:100%" border="0">

      <tr>
        <th>Opciones</th>
        <th>Cant</th>
        <th>Descripcion</th>
        <th style="text-align:right">Precio</th>
        <th style="text-align:right">Sub-Total</th>
      </tr>

    <?php $i = 1; ?>
    <?php foreach ($this->cart->contents() as $items): ?>
      <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
      <tr>
        <td>
          <?php echo anchor('carrito/eliminar/'.$items['rowid'], '<span class="glyphicon glyphicon-remove"></span>', array('class' => 'btn btn-link')) ?>
        </td>
        <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
        <td>
          <strong><?php echo $items['name']; ?></strong>
          <?php if ($this->cart->has_options($items['rowid']) == true): ?>
            <p>
              <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
              <?php endforeach; ?>
          </p>
        <?php endif; ?>
      </td>
        <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
        <td style="text-align:right"><strong>$<?php echo $this->cart->format_number($items['subtotal']); ?></strong></td>
      </tr>

      <?php ++$i; ?>
      <?php endforeach; ?>
      <tr>
        <td colspan="3"> </td>
        <td class="right"><strong>Total</strong></td>
        <td class="right"><strong>$<?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
      </tr>

      </table>

      <p>
        <?php echo form_submit('', 'Actualizar Carrito', array('class' => 'btn btn-lg btn-theme')); ?>
        <?php echo anchor('carrito/pagar', 'Realizar Pago', array('class' => 'btn btn-lg btn-danger')); ?>
      </p>
  </div>
</div>

</div>
</section>
