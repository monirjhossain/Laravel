var swiper = new Swiper('.swiper-container', {
  slidesPerView: 3,
  spaceBetween: 30,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});
var galleryThumbs = new Swiper('.gallery-thumbs', {
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
});
var galleryTop = new Swiper('.gallery-top', {
  spaceBetween: 10,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  thumbs: {
    swiper: galleryThumbs
  }
});

$(document).on('click','.add_to_cart',function(){
  var user_id=$(this).attr('data-user');
  if(user_id==0)
  {
      window.location.href=BASE_URL+'index.php/home/login';
      return false;
  }
  var product_id=$(this).attr('data-product');
  $.post(BASE_URL+'index.php/home/add_to_cart',{'user_id':user_id,'product_id':product_id},function(fb){
    console.log(fb);
    var resp=$.parseJSON(fb);
    if(resp.status=='true')
    {
      $('.cart_count').text(parseInt($('.cart_count').text())+1);
      alert(resp.message)
    }
    else
    {
     alert(resp.message) 
    }
  })
});
$(document).on('change','#country',function(){
  val=$(this).val();
  if(val!='')
  {
    if(val==1)
    {
        $('#state').html('<option>Select</option><option>India State</option>');
    }
    else 
    {
        $('#state').html('<option>Select</option><option>USA State</option>');
    }
  }
});
$(document).on('change','#state',function(){
  val=$('#country').val();
  if(val!='')
  {
    if(val==1)
    {
        $('#city').html('<option>Select</option><option>India City</option>');
    }
    else 
    {
        $('#city').html('<option>Select</option><option>USA City</option>');
    }
  }
});
$(document).on('click','.pay_pal_pay',function(){
  $.get(BASE_URL+'index.php/home/paypal_form',function(fb){
      $('.form_box').html(fb);
      $('#payuForm').submit();
  })
});