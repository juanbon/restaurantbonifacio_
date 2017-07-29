<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CodeIgniter Shopping Cart</title>

<link href="<?php echo base_url(); ?>assets/css/core.css" media="screen" rel="stylesheet" type="text/css" />

        <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/960.css"   />
        <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/reset.css"   />
        <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/text.css"   />
        <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/estilo.css"   />
        <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/anythingslider.css"></link>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
 <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/funciones.js" ></script>
</head>
<body>

<div id="wrap">

	<?php $this->view($content); ?>
	
	<div class="cart_list">
		<h3>Your shopping cart</h3>
		<div id="cart_content">
			<?php echo $this->view('cart/cart.php'); ?>
		</div>
	</div>
</div>

</body>
</html>