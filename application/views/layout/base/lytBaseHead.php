<!DOCTYPE HTML>
<html>
    <head>
        <title>Agencia</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- styles -->
       <!-- <link href="css/lib/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/styles.css" rel="stylesheet" type="text/css">-->

        <!-- Google web Font -->
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,100' rel='stylesheet' type='text/css'>

        <!-- styles -->
        <?php echo link_tag('css/lib/bootstrap.min.css'); ?>
        <?php echo link_tag('css/lib/jquery-ui.min.css'); ?>
        <?php echo link_tag('css/lib/jquery.dataTables.min.css'); ?>
        <?php echo link_tag('css/lib/dataTables.bootstrap.min.css'); ?>
        <?php echo link_tag('css/lib/jquery.fancybox.css'); ?>
        <?php echo link_tag('css/lib/font-awesome.min.css'); ?>
        <?php echo link_tag( 'css/lib/bootstrapValidator.css');?>
        <?php echo link_tag('css/main.css'); ?>
        <?php //echo link_tag('css/styles.css');?>


        <!-- scripts -->
        <script src="<?php echo base_url();?>js/lib/jquery-2.1.4.min.js"></script>
        <script src="<?php echo base_url();?>js/lib/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>js/lib/jquery-ui.min.js"></script>
        <script src="<?php echo base_url();?>js/lib/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>js/lib/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>js/lib/bootstrapPager.min.js"></script>
        <script src="<?php echo base_url();?>js/lib/jquery.zoom-scroller.js"></script>
        <script src="<?php echo base_url();?>js/lib/jquery.fancybox.js"></script>
        <script src="<?php echo base_url();?>js/lib/bootstrapValidator.js" type="text/javascript"></script>


    <?php
    if (isset($scripts)):
    foreach ($scripts as $js):?>
                <script src="<?php echo base_url()."js/{$js}.js";?>" type="text/javascript"></script>
    <?php
    endforeach;
    endif;?>

    </head>
    <body>
        <!--Barra de navegacion-->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php echo anchor('inicio','Agencia',array('class'=>'navbar-brand')); ?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Paquetes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?php echo anchor('paquete/nuevos','Nuevos'); ?></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tours <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?php echo anchor('tour/tours','Nuevos'); ?></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><?php echo anchor('admin/ingresar','Ingresar'); ?></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        <!--Fin barra de navegacion-->
