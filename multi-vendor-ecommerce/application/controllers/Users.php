<?php 
class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['page_title']="User Dashboard";
		$this->load->view('users/includes/header',$data);
		$this->load->view('users/dashboard');
		$this->load->view('users/includes/footer');
	}
	public function myorder()
	{
		$user_session=$this->session->userdata('user_session');
		$data['order'] =$this->cm->select_data('order_master','*',array('user_id'=>$user_session['user_id']));
		$data['page_title']="My Orders";
		$this->load->view('users/includes/header',$data);
		$this->load->view('users/myorder');
		$this->load->view('users/includes/footer');
	}
	public function order_product($id)
	{
		$order =$this->cm->select_data('order_master','*',array('id'=>$id));
		$data['prod_info']=json_decode($order[0]['product_info']);
		$data['page_title']="My Orders";
		$this->load->view('users/includes/header',$data);
		$this->load->view('users/order_product');
		$this->load->view('users/includes/footer');
	}
	public function manage_product()
	{
		$data['page_title']="Manage Prooduct";
		$user_session=$this->session->userdata('user_session');
		$data['all_products']=$this->cm->select_data('products','*',array('created_by'=>$user_session['user_id']));

		$this->load->view('users/includes/header',$data);
		$this->load->view('users/manage_product',$data);
		$this->load->view('users/includes/footer');	
	}
	public function delete_product($id)
	{	
		$this->db->where('id',$id);
		$this->db->delete('products');
		redirect(base_url('index.php/users/manage_product'));
	}
	function change_order_status()
	{
		$prod_info=$this->cm->select_data('products','status',$_POST);
		if($prod_info[0]['status']==1)
			$status=0;
		else 
			$status=1;
		$resp = $this->cm->update_data('products',array('status'=>$status),$_POST);
		if($resp)
			$arr=array('status'=>'true','message'=>'Status Changed');
		else 
			$arr=array('status'=>'true','message'=>'Status Not Changed');
		echo json_encode($arr);
	}
	public function edit_product($id)
	{
		if($this->input->method()=='post')
		{
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_rules('qty','qty','required');
			$this->form_validation->set_rules('Price','Price','required');
			$this->form_validation->set_rules('brand','Brand','required');
			$this->form_validation->set_rules('category','Category','required');
			$this->form_validation->set_rules('subcategory','Sub Category','required');
			if($this->form_validation->run()=='true')
			{
				if($_FILES['image']['name']!='')
				{
					$upPath="uploads/product_image/";
					$basePath 					= explode('application',dirname(__FILE__))[0];
			        $uploadPath              	= $basePath . $upPath;
			        $config['upload_path']   	= $uploadPath;
			        $config['allowed_types'] 	= 'PNG|JPG|JPEG|png|jpg|JPEG';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
			        if ($this->upload->do_upload('image')) {	
			            $uploaddata    = $this->upload->data();

			            $_POST['image']=$uploaddata['file_name'];
			        }
			        else 
			        {
			        	echo json_encode(array('status'=>'false','message'=>'Only JPG And PNG File Are Allowed'));
			        	die();
			        }
			        
				}
				$resp = $this->cm->update_data('products',$_POST,array('id'=>$id));
				if($resp)
					$arr=array('status'=>'true','message'=>'success','reload'=>base_url('index.php/users/manage_product'));
				else 
					$arr=array('status'=>'false','message'=>'Please Try Again');

			}

			else 
			{
				$arr=array('status'=>'false','message'=>validation_errors());
			}
			echo json_encode($arr);
		}
		else 
		{
			$data['prod_info']=$this->cm->select_data('products','*',array('id'=>$id));
			$data['brands']=$this->cm->select_data('product_brand','*',array('status'=>'1'));
			$data['category']=$this->cm->select_data('product_category','*',array('status'=>'1'));
			$data['sub_category']=array();
			if($data['prod_info'][0]['category']!='')
			{
				$data['sub_category']=$this->cm->select_data('product_sub_category','*',array('category'=>$data['prod_info'][0]['category']));
			}
			$data['page_title']="Edit Prooduct";
			$this->load->view('users/includes/header',$data);
			$this->load->view('users/edit_product',$data);
			$this->load->view('users/includes/footer');		
		}
		
	}
	public function add_new_product()
	{
		if($this->input->method()=='post')
		{
			$user_session=$this->session->userdata('user_session');
			$upPath="uploads/product_image/";
			$basePath 					= explode('application',dirname(__FILE__))[0];
	        $uploadPath              	= $basePath . $upPath;
	        $config['upload_path']   	= $uploadPath;
	        $config['allowed_types'] 	= 'PNG|JPG|JPEG|png|jpg|JPEG';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	        if ($this->upload->do_upload('image')) {	
	            $uploaddata    = $this->upload->data();
	            
	    
			
				$this->form_validation->set_rules('name','Name','required');
				$this->form_validation->set_rules('description','Description','required');
				$this->form_validation->set_rules('qty','QTY','required');
				$this->form_validation->set_rules('Price','Price','required');
				$this->form_validation->set_rules('brand','brand','required');
				$this->form_validation->set_rules('category','category','required');
				$this->form_validation->set_rules('subcategory','subcategory','required');
				$_POST['image']=$uploaddata['file_name'];
				if($this->form_validation->run()=='true')
				{
					$_POST['created_by']=$user_session['user_id'];
					$res=$this->cm->insert_data('products',$_POST);
					if($res)
						$arr=array('status'=>'true','message'=>'Product Successfully Added','reload'=>base_url().'index.php/users/manage_product');
					else 
						$arr=array('status'=>'false','message'=>'Product Not Added');
				}
				else 
				{
					$arr=array('status'=>'false','message'=>validation_errors());
				}
			} else {
				$arr=array('status'=>'false','message'=>'Only JPG And PNG File Are Allowed');
			}
			echo json_encode($arr);
		}
		else 
		{
			$data['page_title']="Add New Product";
			$data['brands']=$this->cm->select_data('product_brand','*',array('status'=>'1'));
			$data['category']=$this->cm->select_data('product_category','*',array('status'=>'1'));
			$this->load->view('users/includes/header',$data);
			$this->load->view('users/add_new_product');
			$this->load->view('users/includes/footer');		
		}
		
	}
	public function find_scat()
	{
		$sub_cat=$this->cm->select_data('product_sub_category','*',$_POST);
		if($sub_cat)
		{
			echo "<option value=''>Select</option>";
			foreach($sub_cat as $sc)
			{
				?><option><?php echo $sc['name']; ?></option> <?php 
			}
		}
		else 
		{
			echo "<option value=''>Select</option>";
		}
	}
	public function product_review()
	{
		$user_session=$this->session->userdata('user_session');
		$_POST['user_id']=$user_session['user_id'];
		$review_status = $this->cm->select_data('product_review','*',array('user_id'=>$user_session['user_id'],'product_id'=>$_POST['user_id']));
		if($review_status)
		{
			$this->cm->update_data('product_review',array('star'=>$_POST['star']),array('id'=>$review_status[0]['id']));
		}
		else 
		{
			$this->cm->insert_data('product_review',$_POST);
		}
		echo json_encode(array('status'=>'true','message'=>'Review Successfully Added','reload'=>'0'));
	}
	public function logout()
	{
		$this->session->unset_userdata('user_session');
		redirect(base_url());
	}
}
?>