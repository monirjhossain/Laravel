$(document).on('submit','.login_user',function(){
	var url=$(this).attr('action');
	var data=$(this).serialize();
	$.post(url,data,function(fb){
		var resp=$.parseJSON(fb);
		if(resp.status=='true')
		{
			
				window.location.href=resp.reload;
		}
		else
		{
			alert(resp.message);
		}
	})
	return false;
});