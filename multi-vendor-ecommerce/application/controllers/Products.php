<?php 
class Products extends CI_Controller
{
	public function __contruct()
	{
		parent::__contruct();
	}
	public function category()
	{
		if($this->input->method()=='post')
		{
			$this->form_validation->set_rules('name','Category Name','required');
			if($this->form_validation->run()=='true')
			{
				$resp=$this->cm->insert_data('product_category',$_POST);
				if($resp)
					$arr=array('status'=>'true','message'=>'Category Successfully Inserted','reload'=>base_url().'products/category');
				else 
					$arr=array('status'=>'false','message'=>'Same Technical Problum Please Try Again');
				echo json_encode($arr);
			}
			else 
			{
				print_r(validation_errors());
			}
		}
		else 
		{
			$data['page_title']="Category";
			$data['all_category']=$this->cm->select_data('product_category','*');
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/category',$data);
			$this->load->view('admin/includes/footer');
		}
		
	}
	public function delete_product_category($id)
	{
		$res=$this->cm->delete_data('product_category',array('id'=>$id));
		if($res)
		{
			redirect(base_url().'products/category');
		}
	}
	public function edit_product_category($id)
	{
		if($this->input->method()=='post')
		{
			$res=$this->cm->update_data('product_category',$_POST,array('id'=>$id));
			if($res)
				$arr=array('status'=>'true','message'=>'Category Successfully Updated','reload'=>base_url().'products/category');
			else 
				$arr=array('status'=>'false','message'=>'Category Not Updated');
			echo json_encode($arr);
		}
		else 
		{
			$data['category_info']=$this->cm->select_data('product_category','name,id',array('id'=>$id));
			$data['page_title']="Edit Category";
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/edit_category',$data);
			$this->load->view('admin/includes/footer');
		}
	}
	public function subcategory()
	{
			$data['page_title']="Sub Category";
			$data['all_category']=$this->cm->select_data('product_category','*');
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/sub_category',$data);
			$this->load->view('admin/includes/footer');
	}
}
?>