<?php 
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$session_data=$this->session->userdata('user_session');
		if(!$session_data)
		{
			redirect(base_url().'home/login');
		}
	}
	public function index()
	{
		$data['page_title']="Dashboard";
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/admin_home');
		$this->load->view('admin/includes/footer');
	}
}
?>