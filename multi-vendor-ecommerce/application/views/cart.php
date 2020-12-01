<?php foreach($cart_product as $cp) { ?>
<div class="row">
	<div class="col-sm-2"><img src="http://localhost/Tutorial/e-commerse/tools/img/best-offers/offer_product_3.png" class="cart_img"></div>
	<div class="col-sm-6"><?php echo $cp['pname'] ?></div>
	<div class="col-sm-1"><?php echo $cp['Price'] ?></div>
	<div class="col-sm-1"><?php echo $cp['qty'] ?></div>
	<div class="col-sm-1"><?php echo $cp['Price']*$cp['qty'] ?></div>
	<div class="col-sm-1"><a href="<?php echo base_url().'index.php/home/delete_cart_product/'.$cp['id'] ?>" class="btn btn-danger">X</a></div>
</div>
<?php } ?>
<div class="row">
	<div class="col-sm-12">
		<a href="<?php echo base_url().'index.php/home/billing_process' ?>" class="btn btn-info float-right mb-4">Continue</a>
	</div>
</div>