<?php 

	class User extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('login_model');
		}
		function index(){
			$this->load->view('login');
		}
		function admin(){
			$this->load->view('admin');
		}

		// User
		function user_logout(){
			$this->session->unset_userdata('username');
			redirect('','refresh');
		}
		function user_login(){

			$data = $this->login_model->user_login();

			if($data){
				$this->session->set_userdata('username', $this->input->post('username'));
				echo 1;
			}else{
				echo 0;
			}

		}

		// Admin
		function admin_logout(){
			$this->session->unset_userdata('username');
			redirect('','refresh');
		}
		function admin_login(){

			$data = $this->login_model->admin_login();

			if($data){
				$this->session->set_userdata('username', $this->input->post('username'));
				echo 1;
			}else{
				echo 0;
			}

		}
	}
 ?>