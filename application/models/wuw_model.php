<?php 
	class wuw_model extends CI_Model {
		// Karya
		function karya_user() {
			//$result = $this->db->get('tb_karya');
			$username = $this->session->userdata('username');
			$result = $this->db->query("SELECT k.id_karya, k.id_user, k.id_kategori, k.judul, k.tanggal, k.hits, k.gambar, u.id_user, u.username, ka.id_kategori, ka.nama FROM tb_karya k, tb_user u, tb_kategori ka WHERE u.id_user = k.id_user AND ka.id_kategori = k.id_kategori AND u.username = '".$username."'");
			return $result->result();
		}
		function karya_user_edit() {
			$id=$this->input->post('id');
			$judul=$this->input->post('judul');
	
			$this->db->set('judul', $judul);
			$this->db->where('id_karya', $id);
			$result=$this->db->update('tb_karya');
			return $result;
		}
		function kategori_karya() {
			//$result=$this->db->get('tb_kategori');
			$result = $this->db->query("SELECT * FROM tb_kategori");
			return $result->result();
		}
		function save_karya() {
			$judul=$this->input->post('judul');
			$kategori=$this->input->post('kategori');
			$karya=$this->input->post('gambar');
			$deskripsi=$this->input->post('deskripsi');
			$tags=$this->input->post('tags');
			$data = array(
				'id_user' => 2, 
				'id_kategori' => $kategori,
				'judul' => $judul,
				'gambar' => $karya,
				'deskripsi' => $deskripsi,
				'tags' => $tags);
			$result = $this->db->insert('tb_karya', $data);
			return $result;
		}
	}
?>