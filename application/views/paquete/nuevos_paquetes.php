<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1>Paquetes<small></small></h1>
      </div>
      <hr class="">
       <?php if ($paquetes !== FALSE): ?>
         <?php foreach ($paquetes as $p): ?>
           <div class="row">
             <div class="col-md-2">
               <a href="<?php echo base_url().'index.php/paquete/informacion/'.$p->id ?>">
                 <img class=" img-responsive img-thumbnail " height="100" width="200" data-src="holder.js/500x500/auto" src="<?php echo base_url();?>img/caratulas/<?php echo $p->caratula_imagen; ?>" alt="Generic placeholder image">
               </a>
             </div>
             <div class="col-md-10">
               <h2 class=""><?php echo $p->nombre_paquete; ?> <span class="text-muted"><?php echo $p->precio.' '.$p->denominacion ?></span></h2>
               <p class="lead"><?php echo $p->especificaciones; ?></p>
                 <p><?php echo anchor('paquete/informacion/'.$p->id,'Información',array('class'=>'btn btn-info btn-xs')) ?></p>
             </div>
           </div>
           <hr class="">
         <?php endforeach; ?>
       <?php endif; ?>
    </div>
  </div>

</div>
<script>

</script>
