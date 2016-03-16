<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Agencia</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="" />
<!-- styles -->
<?php echo link_tag('assets/css/fancybox/jquery.fancybox.css'); ?>
<?php echo link_tag('css/lib/bootstrap.min.css'); ?>
<?php echo link_tag('assets/css/bootstrap-theme.css'); ?>
<?php echo link_tag('assets/css/slippry.css'); ?>
<?php echo link_tag('assets/css/font-awesome.css'); ?>
<?php echo link_tag( 'css/lib/bootstrapValidator.css');?>
<?php echo link_tag('assets/css/style.css'); ?>
<?php echo link_tag('assets/color/default.css'); ?>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo base_url();?>js/lib/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url();?>js/lib/bootstrapValidator.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script>
    <?php
    if (isset($scripts)):
    foreach ($scripts as $js):?>
                <script src="<?php echo base_url()."js/{$js}.js";?>" type="text/javascript"></script>
    <?php
    endforeach;
    endif;?>

</head>
<body>
