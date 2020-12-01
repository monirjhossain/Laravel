<?php 
class Home extends CI_Controller
{

	public function index()
	{
		$data['products']=$this->cm->select_data('products','*');
		$this->db->order_by('id','RANDOM');
		$data['best_offers']=$this->cm->select_data('products','*');
		$this->load->view('includes/header');
		$this->load->view('home',$data);
		$this->load->view('includes/footer');
	}
	public function more_products($id='')
	{
		if($id!='')
		{
			$this->db->where('category',$id);
		}
		$data['products']=$this->cm->select_data('products','*');
		$this->load->view('includes/header');
		$this->load->view('more_products',$data);
		$this->load->view('includes/footer');
	}
	public function product_single($id)
	{
		$this->db->join('product_brand','products.brand=product_brand.id');
		$data['product_info']=$this->cm->select_data('products',['products.*','product_brand.brand_name'],array('products.id'=>$id));
		$this->db->join('users','product_review.user_id=users.id');
		$data['product_review']=$this->cm->select_data('product_review',['product_review.*','users.name as username'],array('product_id'=>$id));
		$data['related_products']=$this->cm->select_data('products','*',array('category'=>$data['product_info'][0]['category']));
		$this->load->view('includes/header');
		$this->load->view('product_single',$data);
		$this->load->view('includes/footer');
	}
	public function login()
	{
		if($this->input->method()=='post')
		{
			$_POST['password']=md5($_POST['password']);
			$resp=$this->db->select(['id','name','email','status','access'])->from('users')->where($_POST)->get()->row();
			if($resp)
			{

				$this->session->set_userdata('user_session',array('access'=>$resp->access,'name'=>$resp->name,'email'=>$resp->email,'user_id'=>$resp->id));
				if($resp->access==1)
				{
					$arr=array('status'=>'true','message'=>'Success','reload'=>base_url().'index.php/admin');
				}
				else 
				{
					$arr=array('status'=>'true','message'=>'Success','reload'=>base_url());
				}
				
			}
			else 
			{
				$arr=array('status'=>'false','message'=>'Username And Password Not Match');
			}

			echo json_encode($arr);
		}
		else 
		{
			$session_data=$this->session->userdata('user_session');
			if($session_data)
			{
				redirect(base_url().'admin');
				die();
			}
			$this->load->view('login');	
		}
		
	}
	public function signup()
	{
		$this->load->view('signup');	
	}
	function logout()
	{
		$this->session->unset_userdata('user_session');
		redirect(base_url().'index.php/home/login');
	}
	public function add_to_cart()
	{
		$resp=$this->cm->select_data('add_to_cart','*',array('user_id'=>$_POST['user_id'],'product_id'=>$_POST['product_id'],'status'=>'1'));
		if($resp)
		{
			$qty=$resp[0]['qty']+1;
			$resp=$this->cm->update_data('add_to_cart',array('qty'=>$qty),array('user_id'=>$_POST['user_id'],'product_id'=>$_POST['product_id'],'status'=>'1'));	
		}
		else 
		{
			$resp=$this->cm->insert_data('add_to_cart',array('user_id'=>$_POST['user_id'],'product_id'=>$_POST['product_id'],'qty'=>'1','status'=>'1'));
		}
		if($resp)
			$arr=array('status'=>'true','message'=>'Successfully Added');
		else 
			$arr=array('status'=>'false','message'=>'Please Try Again');
		echo json_encode($arr);
	}
	public function cart()
	{
		$user_session=$this->session->userdata('user_session');
		$this->db->join('products','add_to_cart.product_id=products.id');
		$data['cart_product']=$this->cm->select_data('add_to_cart','add_to_cart.*,products.name as pname,products.Price',array('add_to_cart.status'=>'1','add_to_cart.user_id'=>$user_session['user_id']));
		$this->load->view('includes/header');
		$this->load->view('cart',$data);
		$this->load->view('includes/footer');
	}
	public function delete_cart_product($id)
	{
		$this->cm->delete_data('add_to_cart',array('id'=>$id));
		redirect(base_url().'index.php/home/cart');
	}
	public function billing_process()
	{
		$user_session=$this->session->userdata('user_session');
		$this->db->join('products','add_to_cart.product_id=products.id');
		$data['cart_product']=$this->cm->select_data('add_to_cart','add_to_cart.*,products.name as pname,products.Price',array('add_to_cart.status'=>'1','add_to_cart.user_id'=>$user_session['user_id']));
		$this->load->view('includes/header');
		$this->load->view('billing_process',$data);
		$this->load->view('includes/footer');
	}
	public function process_to_pay()
	{
		$this->session->set_userdata('pay_info',$_POST);
		$this->load->view('includes/header');
		$this->load->view('process_to_pay');
		$this->load->view('includes/footer');

	}
	function paypal_form()
	{
		$total_amount=0;
		$user_session=$this->session->userdata('user_session');
		$this->db->join('products','add_to_cart.product_id=products.id');
		$cart_product=$this->cm->select_data('add_to_cart','add_to_cart.*,products.name as pname,products.Price',array('add_to_cart.status'=>'1','add_to_cart.user_id'=>$user_session['user_id']));
		foreach($cart_product as $cp)
		{
			$tot=$cp['qty']*$cp['Price'];
			$total_amount=$total_amount+$tot;

		}
		echo $form='<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="payuForm" name="pay_form_name">
										<input type="hidden" name="business" value="syinfotech333-facilitator1@gmail.com">
										<input type="hidden" name="item_name" value="1">
										<input type="hidden" name="amount" value="'.$total_amount.'">
										<input type="hidden" name="item_number" value="1">
										<input type="hidden" name="no_shipping" value="1">
										<input type="hidden" name="currency_code" value="USD">
										<input type="hidden" name="cmd" value="_xclick">
										<input type="hidden" name="handling" value="0">
										<input type="hidden" name="no_note" value="1">
										<input type="hidden" name="custom" value="1">
										<input type="hidden" name="cancel_return" value="'.base_url('index.php/home/paypal_cancel').'">
										<input type="hidden" name="return" value="'.base_url('index.php/home/paypal_success').'">
										<input type="hidden" name="notify_url" value="'.base_url('index.php/home/paypal_noti').'">
		</form>';
	}
	public function paypal_cancel()
	{
		echo "paypal_cancel";
	}
	public function paypal_success()
	{
		    $user_session=$this->session->userdata('user_session');
			$user_info=$this->session->userdata('pay_info');
			$this->db->join('products','add_to_cart.product_id=products.id');
		    $product_info=$this->cm->select_data('add_to_cart','add_to_cart.*,products.name as pname,products.Price',array('add_to_cart.status'=>'1','add_to_cart.user_id'=>$user_session['user_id']));	
			$arr=array('user_info'=>json_encode($user_info),'product_info'=>json_encode($product_info),'payment_mode'=>'Paypal','status'=>'0');
			$this->cm->insert_data('order_master',$arr);
			$this->cm->update_data('add_to_cart',array('status'=>'0'),array('add_to_cart.status'=>'1','add_to_cart.user_id'=>$user_session['user_id']));
			redirect(base_url().'index.php/home/success');
	}
	public function success()
	{
		$this->load->view('includes/header');
		$this->load->view('success');
		$this->load->view('includes/footer');
	}
	public function cod_payment()
	{

		    $user_session=$this->session->userdata('user_session');

			$user_info=$this->session->userdata('pay_info');
			$this->db->join('products','add_to_cart.product_id=products.id');
		    $product_info=$this->cm->select_data('add_to_cart','add_to_cart.*,products.name as pname,products.Price',array('add_to_cart.status'=>'1','add_to_cart.user_id'=>$user_session['user_id']));	

			$arr=array('user_info'=>json_encode($user_info),'product_info'=>json_encode($product_info),'payment_mode'=>'Pending COD','status'=>'0','user_id'=>$user_session['user_id']);
			$this->cm->insert_data('order_master',$arr);
			$this->cm->update_data('add_to_cart',array('status'=>'0'),array('add_to_cart.status'=>'1','add_to_cart.user_id'=>$user_session['user_id']));
			redirect(base_url().'index.php/home/success');
	}
}
?>
