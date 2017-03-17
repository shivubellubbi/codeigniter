<?php
class GenralModel extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
		// $this->load->library('session');
		date_default_timezone_set('Asia/Calcutta');

	}

	public function getAll($tablname) {
		if ($tablname) {
			return $this->db->get($tablname)->result();
		} else {
			return false;
		}
	}

	public function store($tablname, $data = '') {
		if ($tablname) {
			if ($data) {
				$this->db->insert($tablname, $data);
			} else {
				$this->db->insert($tablname, $this->input->post());
			}
		} else {
			return false;
		}
	}

	public function update($tablname, $cllm_name, $id, $data = null) {
		if ($tablname && $cllm_name && $id) {
			$this->db->where($cllm_name, $id);
			if (!$data) {
				$this->db->update($tablname, $this->input->post());
			} else {
				$this->db->update($tablname, $data);
			}
		} else {
			return false;
		}
	}

	public function edit($tablname, $clm_name, $id) {
		if ($tablname) {
			$this->db->where($clm_name, $id);
			return $this->db->get($tablname)->row();
		}

	}

	public function delete($tablname, $cllm_name, $id) {
		if ($tablname && $cllm_name && $id) {
			$this->db->where($cllm_name, $id);
			$this->db->delete($tablname);
			return true;
		} else {
			return false;
		}
	}

	public function get_last_id($tablname, $cllm_name) {
		return $this->db->order_by($cllm_name, 'desc')->limit(1)->get($tablname)->row()->$cllm_name;
	}

	public function get_last_row($tablname, $cllm_name) {
		return $this->db->order_by($cllm_name, 'desc')->limit(1)->get($tablname)->row();
	}
}
?>