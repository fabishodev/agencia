<?php $rows = count($paquetes); ?>
<?php if ($rows > 0): ?>
  <ul id="slippry-slider">
    <?php $i=0; ?>
    <?php foreach ($paquetes as $fila): ?>
      <li>
      <a href="paquete/informacion/<?php echo $fila->id;  ?>">
        <img src="<?php echo base_url();?>img/caratulas/<?php echo $fila->caratula_imagen ?>" alt="<?php echo $fila->nombre_paquete ?>">
      </a>
    </li>
      <?php $i++; ?>
    <?php endforeach; ?>
  </ul>
<?php else: ?>
  <div class="jumbotron">
    <h1>Hola, viajero!</h1>
    <p>Por el momento no tenemos ningun viaje que ofrecerte.</p>
  </div>
<?php endif; ?>

<li><a class="fancybox" data-fancybox-group="gallery" title="Portfolio name" href="../img/caratulas/banner-circuitodeltequila.jpg"><img src="../img/caratulas/banner-circuitodeltequila.jpg" alt="" /></a>
  <button class="btn btn-xs btn-success" type="button" name="button">Mas Informacion</button>
</li>
