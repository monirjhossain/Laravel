<?php 
class Orders extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function manage_order()
	{
		$data['page_title']="Manage Orders";
		$data['all_orders']=$this->cm->select_data('order_master','*');
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/manage_order',$data);
		$this->load->view('admin/includes/footer');
	}
	public function change_order_status()
	{

		$get_data=$this->cm->select_data('order_master','*',array('payment_mode'=>'Paypal','id'=>$_POST['id']));
		if(!$get_data)
		{
			if($_POST['data']=='2')
			{
				$_POST['payment_mode']='COD';
			}
			else 
			{
				$_POST['payment_mode']='Pending COD';	
			}	
		}

		$resp=$this->cm->update_data('order_master',array('status'=>$_POST['data'],'payment_mode'=>$_POST['payment_mode']),array('id'=>$_POST['id']));

		if($resp)
			$arr=array('status'=>'true','message'=>'success');
		else 
			$arr=array('status'=>'false','message'=>'Please Try Again');
		echo json_encode($arr);
	}
	public function edit_order($id)
	{
		$data['all_orders']=$this->cm->select_data('order_master','*',array('id'=>$id));
		if($this->input->method()=='post')
		{
			$product_arr=array();
			for($i=0;$i<sizeof($_POST['product_id']);$i++)
			{
				$product_arr[$i]['product_id']=$_POST['product_id'][$i];
				$product_arr[$i]['product_price']=$_POST['product_price'][$i];
				$product_arr[$i]['product_qty']=$_POST['product_qty'][$i];
			}
			$order_product = json_decode($data['all_orders'][0]['product_info']);
			foreach($product_arr as $key => $pa)
			{
				if($pa['product_id']==$order_product[$key]->product_id )
				{
					$order_product[$key]->qty = $pa['product_qty'];
					$order_product[$key]->Price = $pa['product_price'];	
				}
			}
			$prod_arr = json_decode(json_encode($order_product),true);
			$this->cm->update_data('order_master',array('product_info'=>json_encode($prod_arr)),array('id'=>$id));
			echo json_encode(array('status'=>'true','message'=>'Order Successfully Updated','reload'=>base_url('/index.php/orders/edit_order/'.$id)));
		}
		else 
		{
			$data['page_title']="Edit Orders";
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/edit_order',$data);
			$this->load->view('admin/includes/footer');
		}
		
	}
}
?>