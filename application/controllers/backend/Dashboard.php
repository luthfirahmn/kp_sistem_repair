<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('logged_in')) {
		// 	redirect('backend/login');
		// }
		// $this->user = $this->session->userdata('user');
	}

	public function index()
	{
		/** DATA SEND TO VIEW */
		$query = $this->db->query("SELECT * FROM tr_barang_masuk WHERE grade = '' ");
		$barang_masuk = $query->num_rows();

		$query = $this->db->query("SELECT * FROM tr_barang_masuk WHERE grade != '' ");
		$barang_selesai = $query->num_rows();


		$data_content                 = array();
		$data_content['title']        = 'Dashboard';
		$data_content['breadcrumb']   = 'Dashboard';
		$data_content['breadcrumb1']  = 'Index';
		$data_content['barang_masuk']  = $barang_masuk;
		$data_content['barang_selesai']  = $barang_selesai;

		$config["content_file"] = "dashboard/index";
		$config["content_data"] = $data_content;

		$this->template->initialize($config);
		$this->template->render();
	}
}
