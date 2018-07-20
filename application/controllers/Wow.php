<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wow extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct();
		if(empty($this->session->userdata('username'))){
			redirect('user/admin','refresh');
		}
		$this->load->model('wow_model');
	}
	function index()
	{
		$this->load->view('common');
		$this->load->view('karya');
	}
	function user()
	{
		$this->load->view('common');
		$this->load->view('user');
	}
	function karya()
	{
		$this->load->view('common');
		$this->load->view('karya');
	}

	// Karya
	function karya_list()
	{
		$data = $this->wow_model->karya_list();
		echo json_encode($data);
	}
	function karya_delete()
	{
		$data = $this->wow_model->karya_delete();
		echo json_encode($data);
	}
	function karya_edit()
	{
		$data = $this->wow_model->karya_edit();
		echo json_encode($data);
	}
	function karya_get()
	{
		$data = $this->wow_model->karya_get();
		echo json_encode($data);
	}

	// User
	function user_list()
	{
		$data = $this->wow_model->user_list();
		echo json_encode($data);
	}
	function user_delete(){
		$data=$this->wow_model->user_delete();
		echo json_encode($data);
	}
	function user_edit()
	{
		$data = $this->wow_model->user_edit();
		echo json_encode($data);
	}
	function user_flag()
	{
		$data = $this->wow_model->user_flag();
		echo json_encode($data);
	}
	function user_get()
	{
		$data = $this->wow_model->user_get();
		echo json_encode($data);
	}
}
