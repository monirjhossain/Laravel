<style type="text/css">
    .swiper-container {
      width: 100%;
      height: 300px;
      margin-left: auto;
      margin-right: auto;
    }
    .swiper-slide {
      background-size: cover;
      background-position: center;
    }
    .gallery-top {
      height: 80%;
      width: 100%;
    }
    .gallery-thumbs {
      height: 20%;
      box-sizing: border-box;
      padding: 10px 0;
    }
    .gallery-thumbs .swiper-slide {
      width: 25%;
      height: 100%;
      opacity: 0.4;
    }
    .gallery-thumbs .swiper-slide-thumb-active {
      opacity: 1;
    }
</style>
    <div class="main_container">
    	<div class="row">
    		<div class="col-sm-5">
    			<div class="image_container">
    			 <div class="swiper-container gallery-top">
              <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(http://localhost/Tutorial/e-commerse/tools/img/best-offers/offer_product_1.jpg)"></div>
                <div class="swiper-slide" style="background-image:url(http://localhost/Tutorial/e-commerse-website/tools/img/best-offers/offer_product_3.png)"></div>
                <div class="swiper-slide" style="background-image:url(http://localhost/Tutorial/e-commerse-website/tools/img/best-offers/offer_product_2.png)"></div>
              </div>
              <!-- Add Arrows -->
              <div class="swiper-button-next swiper-button-white"></div>
              <div class="swiper-button-prev swiper-button-white"></div>
            </div>
            <div class="swiper-container gallery-thumbs">
              <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(http://localhost/Tutorial/e-commerse-website/tools/img/best-offers/offer_product_1.jpg)"></div>
                <div class="swiper-slide" style="background-image:url(http://localhost/Tutorial/e-commerse-website/tools/img/best-offers/offer_product_3.png)"></div>
                <div class="swiper-slide" style="background-image:url(http://localhost/Tutorial/e-commerse-website/tools/img/best-offers/offer_product_2.png)"></div>
              </div>
            </div>
    			</div>
    		</div>
    		<div class="col-sm-7">
    			<div class="row">
            <div class="col-sm-8">
               <div class="product_title comon_product_single_info">
                  <?php echo $product_info[0]['name'] ?>
                </div>
                <div class="brand comon_product_single_info">
                 <?php echo $product_info[0]['brand_name'] ?>
                </div>
                <div class="price comon_product_single_info">
                  $ <?php echo $product_info[0]['Price'] ?>
                </div>     
            </div>
            <div class="col-sm-4">
                <button class="btn btn-info">Add To Cart</button>
            </div>   
          </div>
         

    			<div class="description">
    				<?php echo $product_info[0]['description'] ?>
    			</div>
    		</div>
    	</div>
    	<?php 
      foreach($product_review as $prod_r)
      {
      ?>
      <div class="row">
    		<div class="col-sm-12">
    			<div class="product_review">
    				<div class="review_block">
                        <div class="r_user_image">
                            <img src="https://image.flaticon.com/icons/svg/149/149071.svg" width="50px">
                        </div>
                        <div class="r_container">
                            <p><?php echo $prod_r['username'] ?></p>
                            <i class="<?php if($prod_r['star']>0) { ?> fa fa-star <?php } else { ?> fa fa-star-o <?php }  ?>"></i>
                            <i class="<?php if($prod_r['star']>1) { ?> fa fa-star <?php } else { ?> fa fa-star-o <?php }  ?>"></i>
                            <i class="<?php if($prod_r['star']>2) { ?> fa fa-star <?php } else { ?> fa fa-star-o <?php }  ?>"></i>
                            <i class="<?php if($prod_r['star']>3) { ?> fa fa-star <?php } else { ?> fa fa-star-o <?php }  ?>"></i>
                            <i class="<?php if($prod_r['star']>4) { ?> fa fa-star <?php } else { ?> fa fa-star-o <?php }  ?>"></i>
                        </div>            
                    </div>
    			</div>

    		</div>
    	</div>
      <?php } ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="related_products">
                    <h3>Related Products</h3>
                </div>
            </div>
        </div>
    	<div class="row">
    		<div class="col-sm-12">
    			<div class="related_products">
    				<div class="row">
                        <?php foreach($related_products as $rp) { ?>
                        <div class="col-sm-4">
                            <div class="related_product_box">
                                <div class="offers_image_box">
                                    <img src="<?php echo base_url().'tools/img/best-offers/offer_product_1.jpg' ?>">
                                  </div>
                                  <div class="product_title_section">
                                    <p><?php echo $rp['name'] ?></p>
                                  </div>
                                  <div class="offers_basic_info_box">
                                    <div class="offer_info_left">$ <?php echo $rp['Price'] ?></div>
                                    <div class="offer_info_right float-right mr-4">
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star-o" aria-hidden="true"></i>
                                      <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </div>
                                  </div>
                                  <div class="offers_add_to_cart">
                                   <button class="btn btn-info"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
                                  </div>
                            </div>
                        </div>
                         <?php } ?>
                        </div>            
                    </div>
    			</div>
    		</div>
    	</div>
    </div>
    