    <div class="main_container">
    	<div class="filter_container">
	    	<div class="row">
	    		<div class="col-sm-4">
	    			<select class="form-control">
	    				<option>Select Category</option>
	    			</select>
	    		</div>
	    		<div class="col-sm-4">
	    			<select class="form-control">
	    				<option>Select Brand</option>
	    			</select>
	    		</div>
	    		<div class="col-sm-4">
	    			<input type="text" name="search" placeholder="Search..." class="form-control">
	    		</div>
	    	</div>
    	</div>
    	<div class="row">
   			<?php foreach($products as $prod) { ?>
    		<div class="col-sm-4">
    			<div class="product_box">
    				 <div class="offers_image_box">
		                <img src="<?php echo base_url().'tools/img/best-offers/offer_product_3.png' ?>">
		              </div>
		               <div class="product_title_section">
		                <p><?php echo $prod['name'] ?></p>
		              </div>
		              <div class="offers_basic_info_box">
		                <div class="offer_info_left">$ <?php echo $prod['Price'] ?></div>
		                <div class="offer_info_right float-right mr-4">
		                  <i class="fa fa-star" aria-hidden="true"></i>
		                  <i class="fa fa-star" aria-hidden="true"></i>
		                  <i class="fa fa-star" aria-hidden="true"></i>
		                  <i class="fa fa-star-o" aria-hidden="true"></i>
		                  <i class="fa fa-star-o" aria-hidden="true"></i>
		                </div>
		              </div>
		              <?php 
		              $user_session=$this->session->userdata('user_session');
		              if(isset($user_session['user_id']))
		              	$user_id=$user_session['user_id'];
		              else 
		              	$user_id='';
		              ?>
		              <div class="offers_add_to_cart1">
		               <button class="btn btn-info add_to_cart" data-user="<?php echo $user_id ?>" data-product="<?php echo $prod['id'] ?>" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
		              </div>
    			</div>
    		</div>
    		<?php } ?>
    		</div>
    		</div>
    	</div>
    </div>
    