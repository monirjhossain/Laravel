    <div class="best_offers_container">
    <div class="row mt-4">
      <div class="col-sm-12">
        <h3 class="text-center">Best Offers</h3>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-sm-12">
        <div class="swiper-container">
          <div class="swiper-wrapper swiper_block">
          <?php 
          foreach($best_offers as $offers)
          {
          ?>
            <div class="swiper-slide">
              <div class="offers_image_box">
                <img src="<?php echo base_url().'tools/img/best-offers/offer_product_1.jpg' ?>">
              </div>
              <div class="product_title_section">
                <p><a href="<?php echo base_url().'index.php/home/product_single/'.$offers['id'] ?>"><?php echo $offers['name'] ?></a></p>
              </div>
              <div class="offers_basic_info_box">
                <div class="offer_info_left">$ <?php echo $offers['Price'] ?></div>
                <?php 
                $product_review=$this->cm->select_data('product_review','*',array('product_id'=>$offers['id']));
                $total_star=0;
                foreach($product_review as $pr)
                {
                   $total_star=$total_star+$pr['star'];
                }
                if($total_star!=0)
                {
                $final_star =  $total_star/count($product_review);
                ?>
                <div class="offer_info_right float-right mr-4">
                  <i  class="<?php if($final_star>0) { ?> fa fa-star <?php } else { ?> fa fa-star-o <?php }  ?>"  aria-hidden="true"></i>
                  <i class="<?php if($final_star>1) { ?> fa fa-star <?php } else { ?> fa fa-star-o <?php }  ?>" aria-hidden="true"></i>
                  <i class="<?php if($final_star>2) { ?> fa fa-star <?php } else { ?> fa fa-star-o <?php }  ?>" aria-hidden="true"></i>
                  <i class="<?php if($final_star>3) { ?> fa fa-star <?php } else { ?> fa fa-star-o <?php }  ?>" aria-hidden="true"></i>
                  <i class="<?php if($final_star>4) { ?> fa fa-star <?php } else { ?> fa fa-star-o <?php }  ?>" aria-hidden="true"></i>
                </div>
              <?php } ?>
              </div>
              <?php 
              $user_session=$this->session->userdata('user_session');
              if(isset($user_session['user_id']))
                $user_id=$user_session['user_id'];
              else 
                $user_id='';
              ?>
              <div class="offers_add_to_cart">
               <button class="btn btn-info add_to_cart" data-user="<?php echo $user_id ?>" data-product="<?php echo $offers['id'] ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
              </div>
            </div>
          <?php } ?>
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
    </div>
    <hr>
    <div class="best_offers_container">
    <div class="row mt-4">
      <div class="col-sm-12">
        <h3 class="text-center">Our Products</h3>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-sm-12">
        <div class="swiper-container">
          <div class="swiper-wrapper swiper_block">
            <?php 
            foreach($products as $prod)
            {
            ?>
            <div class="swiper-slide">
              <div class="offers_image_box">
                <img src="<?php echo base_url().'tools/img/best-offers/offer_product_1.jpg' ?>">
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
              <div class="offers_add_to_cart">
               <button class="btn btn-info add_to_cart" data-user="<?php echo $user_id ?>" data-product="<?php echo $offers['id'] ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
              </div>
            </div>
           <?php } ?>
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <center><a href="<?php echo base_url().'index.php/home/more_products' ?>" class="btn btn-info btn-block">More Products</a></center>
      </div>
    </div><br><br>