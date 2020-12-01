<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
        var BASE_URL="<?php echo base_url() ?>";
    </script>
	<title>Home</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url() ?>tools/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>tools/css/swiper.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>tools/fonts/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>tools/css/style.css">
</head>
<body>
<div class="container">
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><font face="FreeMono">E-Shop</font></a>
            <?php 
            $all_category=$this->cm->select_data('product_category','*');
            ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                </li>
                <?php foreach($all_category as $cat) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url().'index.php/home/more_products/'.$cat['name'] ?>"><?php echo $cat['name']  ?></a>
                </li>
                <?php 
                }
                $user_session=$this->session->userdata('user_session');
                if(!$user_session) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url().'index.php/home/login' ?>"><i class="fa fa-sign-in"></i></a>
                </li>
            <?php } else { 
            $cart=$this->cm->select_data('add_to_cart','*',array('status'=>'1','user_id'=>$user_session['user_id']));
            $qty=0;
            foreach($cart as $c1)
            {
                $qty=$qty+$c1['qty'];
            }
                ?>  
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url().'index.php/home/cart' ?>"><i class="fa fa-cart-plus"></i></a>
                    <span class="cart_count"><?php echo $qty; ?></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url().'index.php/users' ?>"><i class="fa fa-user"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url().'index.php/home/logout' ?>"><i class="fa fa-sign-out"></i></a>
                </li>
            <?php } ?>
            </ul>
        </div>
    </nav>