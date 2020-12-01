<?php 

$user_info=json_decode($all_orders[0]['user_info']);
$product_info=json_decode($all_orders[0]['product_info']);
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card pl-4 pt-4 pr-4 pb-4">
		<form action="<?php echo base_url('index.php/orders/edit_order/'.$all_orders[0]['id']) ?>" class="database_operations"> 
         <div class="row">
           <div class="col-sm-12 order_heading_block">
             <h3>User Information</h3>
           </div>
           <div class="col-sm-12">
             <div class="form-group">
               <label>Name</label>
               <input type="text" name="name" id="name" class="form-control" value="<?php echo $user_info->name ?>" placeholder="Name">
             </div>
           </div>
           <div class="col-sm-6">
             <div class="form-group">
               <label>E-Mail</label>
               <input type="email" name="email" id="email" class="form-control" value="<?php echo $user_info->email ?>" placeholder="E-Mail">
             </div>
           </div>
           <div class="col-sm-6">
             <div class="form-group">
               <label>Mobile No</label>
               <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="<?php echo $user_info->mobile_no ?>" placeholder="Mobile No">
             </div>
           </div>
           <div class="col-sm-12">
             <div class="form-group">
               <label>City</label>
               <input type="text" name="city" id="city" class="form-control" value="<?php echo $user_info->city ?>" placeholder="City">
             </div>
           </div>
           <div class="col-sm-12 order_heading_block">
             <h3>Product Information</h3>
           </div>
           <div class="col-sm-3">Product Name</div>
           <div class="col-sm-3">Product Price</div>
           <div class="col-sm-3">Product Qty</div>
           <div class="col-sm-3">Product Total Price</div>
		   <?php 
       $i=0;
		   foreach($product_info as  $prod) {
		   ?>
           <div class="col-sm-3">
            <input type="hidden" name="product_id[]" value="<?php echo $prod->product_id ?>">
            <input type="text" name="product_name[]"  readonly="readonly" value="<?php echo $prod->pname ?>" class="form-control" placeholder="Product Name"></div>
          
           <div class="col-sm-3"><input type="text" data-index="<?php echo $i ?>" id="price_<?php echo $i ?>" name="product_price[]" value="<?php echo $prod->Price ?>" class="form-control calculate" data-index="<?php echo $i ?>" id="qty_<?php echo $i ?>" placeholder="Product Price"></div>

           <div class="col-sm-3"><input type="text" name="product_qty[]" data-index="<?php echo $i ?>" id="qty_<?php echo $i ?>" value="<?php echo $prod->qty ?>" class="form-control calculate" placeholder="Product Qty"></div>

           <div class="col-sm-3"><input type="text" readonly="readonly" name="product_tot_price[]" data-index="<?php echo $i ?>" id="tp_<?php echo $i ?>" value="<?php echo $prod->Price*$prod->qty ?>" class="form-control" placeholder="Product Total Price"></div>
		   <?php $i++; } ?>
           <div class="col-sm-3">
             <button type="submit" class="btn btn-info mt-2">Update</button>
           </div>
         </div>
		 </form>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>