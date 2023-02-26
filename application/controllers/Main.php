<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends My_Controller
{

	protected $access = array('Admin', 'Owner');

	public function index()
	{

		$title = array(
			'root' => $this->db->get('root')->result(),
			'm_mhs' => $this->db->get('m_mhs')->result(),
			'm_dosen' => $this->db->get('m_dosen')->result(),
			'setting' => $this->db->get('setting')->result(),
		);

		$this->load->view('cover/header', $title);
		$this->load->view('index');
		$this->load->view('cover/footer');
	}
}
	
	/* End of file Main.php */
	/* Location: ./application/controllers/Main.php */
