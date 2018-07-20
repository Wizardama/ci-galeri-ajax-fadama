<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wuw extends CI_Controller {

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
			redirect('user','refresh');
		}
		$this->load->model('wuw_model');
	}
	function index()
	{
		$this->load->view('cummun');
		$this->load->view('upload');
	}
	function karya_user()
	{
		$data = $this->wuw_model->karya_user();
		echo json_encode($data);
	}
	function karya_user_edit()
	{
		$data = $this->wuw_model->karya_user_edit();
		echo json_encode($data);
	}

	function kategori_karya()
	{
		$data = $this->wuw_model->kategori_karya();
		echo json_encode($data);
	}

	function save_karya()
	{
			$file_element_name = 'gambar';

			$config['upload_path'] = './assets/img/';
       		$config['allowed_types'] = 'gif|jpg|png|doc|txt';
       		$config['max_size'] = 1024 * 8;
       		$config['encrypt_name'] = TRUE;
 
       		$this->load->library('upload', $config);
 
       		if (!$this->upload->do_upload($file_element_name))
       		{
       		    $status = 'error';
       		    $msg = $this->upload->display_errors('', '');
       		}
       		else
       		{
       		    $data = $this->upload->data();
       		    $_POST['gambar'] = $data['file_name'];
				$data = $this->wuw_model->save_karya();
       		}
       		@unlink($_FILES[$file_element_name]);
			//$data = $this->wuw_model->save_karya();
		echo json_encode($data);
	}
}
