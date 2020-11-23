$(document).ready(function() {
    $('.datatable').DataTable();
} );
$(document).on('submit','.database_operations',function(){
	var url=$(this).attr('action');
	var data=new FormData($(this)[0]);
	$.ajax({
        type:'POST',
        url:url,
        data:data,
        contentType:false,
        processData:false,
        success:function(fb)
        {
          var resp=$.parseJSON(fb);
          if(resp.status=='true')
	  	    {
	   			alert(resp.message);
	   			if(resp.message!='Review Successfully Added')
	   			{
	   				setTimeout(function(){
		   				window.location.href=resp.reload;
		   			},2000);	
	   			}
	   			
	   		}
	   		else
	   		{
	   			alert(resp.message);
	   		}  
        }


    });
	/*$.post(url,data,function(fb){
		var resp=$.parseJSON(fb);
		if(resp.status=='true')
		{
			alert(resp.message);
			setTimeout(function(){
				window.location.href=resp.reload;
			},2000);
		}
		else
		{
			alert(resp.message);
		}
	});*/
	return false;
});
$(document).on('change','.order_status',function(){
	var data=$(this).val();
	var id=$(this).attr('data-id');
	$.post(base_url+'index.php/orders/change_order_status',{'id':id,'data':data},function(fb){
		var resp=$.parseJSON(fb);
		if(resp.status=='true')
		{
			if(data==2)
			{
				window.location.reload();
			}
			else 
			{
				alert(resp.message);	
			}
			
		}
		else 
		{
			alert(resp.message);
		}
	})
});
$(document).on('keyup','.calculate',function(){
	var index=$(this).attr('data-index');
	var qty=parseFloat($('#qty_'+index).val());
	var price=parseFloat($('#price_'+index).val());
	if($('#qty_'+index).val()=='')
	{
		$('#qty_'+index).val(1);
		qty=1;
		$('#tp_'+index).val(price*qty);
	}
	else 
	{
		$('#tp_'+index).val(price*qty);
	}
	
});

$(document).on('change','#product_category',function(){
	var data=$(this).val();
	if(data!='')
	{
		$.post(base_url+'index.php/users/find_scat',{category:data},function(fb){
			$('#sub_cat').html(fb);
		})
	}
});
$(document).on('change','.product_status',function(){
	var id=$(this).attr('data-id');
	$.post(base_url+'index.php/users/change_order_status',{'id':id},function(fb){
		var resp=$.parseJSON(fb);
		if(resp.status=='true')
		{
			alert(resp.message)
		}
		else 
		{
			alert(resp.message)
		}
	})
});
$(document).on('click','.product_review',function(){
	var data=$(this).attr('data-id');
	$('#product_id').val(data);
	$('#popup_review').modal('show');
});