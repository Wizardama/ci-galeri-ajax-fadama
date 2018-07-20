<?php 
	class login_model extends CI_Model {

		function admin_login(){
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

		    $this->db->where('username', $username );
		    $this->db->where('password', $password );
		    $this->db->where('kelas_user', 1);
			$result=$this->db->get('tb_user');
			if($result->num_rows()){
				return 1;
			}else{
				return 0;
			}
		}

		function user_login(){
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

		    $this->db->where('username', $username );
		    $this->db->where('password', $password );
		    $this->db->where('kelas_user', 2);
			$result=$this->db->get('tb_user');
			if($result->num_rows()){
				return 1;
			}else{
				return 0;
			}
		}
	}
 ?>