<?php 
	class wow_model extends CI_Model {
		// Karya
		function karya_list() {
			//$result = $this->db->get('tb_karya');
			$result = $this->db->query("SELECT k.id_karya, k.id_user, k.id_kategori, k.judul, k.tanggal, k.hits, k.gambar, u.id_user, u.username, ka.id_kategori, ka.nama FROM tb_karya k, tb_user u, tb_kategori ka WHERE u.id_user = k.id_user AND ka.id_kategori = k.id_kategori");
			return $result->result();
		}
		function karya_delete() {
			$id=$this->input->post('id');
			$this->db->where('id_karya', $id);
			$result=$this->db->delete('tb_karya');
			return $result;
		}
		function karya_edit() {
			$id=$this->input->post('id');
			$judul=$this->input->post('judul');
			$hits=$this->input->post('hits');
	
			$this->db->set('judul', $judul);
			$this->db->set('hits', $hits);
			$this->db->where('id_karya', $id);
			$result=$this->db->update('tb_karya');
			return $result;
		}
		function karya_get() {
			//$result = $this->db->get('tb_karya');
			$get = $this->input->post('cari');
			$result = $this->db->query("SELECT k.id_karya, k.id_user, k.id_kategori, k.judul, k.tanggal, k.hits, k.gambar, u.id_user, u.username, ka.id_kategori, ka.nama FROM tb_karya k, tb_user u, tb_kategori ka WHERE u.id_user = k.id_user AND ka.id_kategori = k.id_kategori AND k.judul LIKE '%".$get."%'");
			return $result->result();
		}

		// User
		function user_list() {
			$result = $this->db->get('tb_user');
			return $result->result();
		}
		function user_delete(){
			$id=$this->input->post('id');
			$this->db->where('id_user', $id);
			$result=$this->db->delete('tb_user');
			return $result;
		}
		function user_edit() {
			$id=$this->input->post('id');
			$username=$this->input->post('username');
			$email=$this->input->post('email');
	
			$this->db->set('username', $username);
			$this->db->set('email', $email);
			$this->db->where('id_user', $id);
			$result=$this->db->update('tb_user');
			return $result;
		}
		function user_flag() {
			$id =$this->input->post('id');
			$flag =$this->input->post('flag');

			if($flag == 'Active'){
				$this->db->set('kelas_user', 0);
			}else{
				$this->db->set('kelas_user', 1);
			}
	
			$this->db->where('id_user', $id);
			$result=$this->db->update('tb_user');
			return $result;
		}
		function user_get() {
			$get = $this->input->post('cari');
			$this->db->like('username', $get);
			$result = $this->db->get('tb_user');
			return $result->result();
		}
	}
?>