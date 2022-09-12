<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('logged_in')) {
		// 	redirect('backend/login');
		// }
		// $this->user = $this->session->userdata('user');
		$this->user = 'admin';
		$this->table = 'ms_login';
	}

	public function index()
	{
		/** DATA SEND TO VIEW */

		$data_content                 = array();
		$data_content['title']        = 'Admin';
		$data_content['breadcrumb']   = 'Admin';
		$data_content['breadcrumb1']  = 'Admin List';


		$config["js"] = 'admin/index';
		$config["content_file"] = "admin/index";
		$config["content_data"] = $data_content;

		$this->template->initialize($config);
		$this->template->render();
	}

	public function table_list($all_data, $recordsTotal, $recordsFiltered)
	{
		$data = array();
		$number = $_POST['start'];
		foreach ($all_data as $key => $val) {

			$btn_edit = '<button type="button" onclick="myForm_edit(' . $val->id . ')" class="btn btn-icon rounded-circle btn-outline-primary btn-sm">
						<i data-feather="edit"></i> </button>';
			$btn_delete = '<button type="button" onclick="btn_delete(' . $val->id . ')" class="btn btn-icon rounded-circle btn-outline-danger btn-sm">
			<i data-feather="trash"></i> </button>';
			$number++;
			$row = array();
			$row[] = $btn_edit . ' ' . $btn_delete;
			$row[] = $val->nama;
			$row[] = $val->no_telp;
			$row[] = $val->jenis_kelamin;
			$row[] = $val->tanggal_lahir;
			$row[] = $val->alamat;
			$row[] = $val->posisi;
			$row[] = $val->username;
			$row[] = $val->role;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => count($recordsFiltered),
			"data" => $data,
		);

		echo json_encode($output);
	}

	public function get_list()
	{
		/* SELECT DATA ALL */
		$this->db->select("*,(SELECT role FROM ms_role WHERE id = table1.id_role) AS role");
		$this->db->from($this->table . ' table1');
		// $this->db->where("(EmpID LIKE '%" . $_REQUEST['search']['value'] . "%' 
		//                     or FullName LIKE '%" . $_REQUEST['search']['value'] . "%' 
		//                     or Department LIKE '%" . $_REQUEST['search']['value'] . "%'
		//                     or Position LIKE '%" . $_REQUEST['search']['value'] . "%'
		//                     )");


		/* ORDER */
		$order = array('id' => 'DESC');
		$order  = $this->input->post("order");
		$col = 0;
		$dir = "";
		if (empty($order)) {
			$this->db->order_by("id", "DESC");
		} else {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = array(
			// 0 => 'EmpID',
			// 1 => 'FullName',
			// 2 => 'Department',
			// 3 => 'Position',
			// 4 => 'Email',
			// 5 => 'Active',
		);

		if (!isset($valid_columns[$col])) {
			$ordr = null;
		} else {
			$ordr = $valid_columns[$col];
		}
		if ($ordr != null) {
			$this->db->order_by($ordr, $dir);
		}

		if ($_REQUEST['length'] != -1)
			$this->db->limit($_REQUEST['length'], $_REQUEST['start']);
		$all_data = $this->db->get()->result();



		/* SELECT COUNT DATA ALL */
		$this->db->select("*,(SELECT role FROM ms_role WHERE id = table1.id_role) AS role");
		$this->db->from($this->table . ' table1');
		$recordsTotal = $this->db->get()->num_rows();


		/* SELECT COUNT FILTR DATA */
		$this->db->select("*,(SELECT role FROM ms_role WHERE id = table1.id_role) AS role");
		$this->db->from($this->table . ' table1');
		// $this->db->where("(EmpID LIKE '%" . $_REQUEST['search']['value'] . "%' 
		//                     or FullName LIKE '%" . $_REQUEST['search']['value'] . "%' 
		//                     or Department LIKE '%" . $_REQUEST['search']['value'] . "%'
		//                     or Position LIKE '%" . $_REQUEST['search']['value'] . "%'
		//                     )");
		$recordsFiltered = $this->db->get()->result();

		$this->table_list($all_data, $recordsTotal, $recordsFiltered);
	}

	public function form()
	{
		$query = $this->db->query("SELECT *
										FROM ms_role
								");
		$role = $query->result();

		$query = $this->db->query("SELECT *
									FROM ms_parameter
									WHERE param_variable = 'POSISI'
									");
		$posisi = $query->result();
		/** DATA SEND TO VIEW */

		$data_content                 = array();
		$data_content['title']        = 'Admin';
		$data_content['breadcrumb']   = 'Admin';
		$data_content['breadcrumb1']  = 'Admin Form';
		$data_content['status_form']  = 0;
		$data_content['role']  = $role;
		$data_content['posisi']  = $posisi;

		$config["content_file"] = "admin/form";
		$config["content_data"] = $data_content;

		$this->template->initialize($config);
		$this->template->render();
	}

	public function form_edit($param)
	{
		$query = $this->db->query("SELECT *
										FROM ms_parameter
										WHERE param_variable = 'POSISI'
										");
		$posisi = $query->result();

		$query = $this->db->query("SELECT *
										FROM ms_role
								");
		$role = $query->result();

		$query = $this->db->query("SELECT table1.*,t2.role
										FROM {$this->table} table1 
										LEFT JOIN ms_role t2 ON t2.id = table1.id_role
										WHERE table1.id = {$param} 
										");
		$all_data = $query->row();

		/** DATA SEND TO VIEW */

		$data_content                 = array();
		$data_content['title']        = 'Admin';
		$data_content['breadcrumb']   = 'Admin';
		$data_content['breadcrumb1']  = 'Admin Form Edit';
		$data_content['status_form']  = 1;
		$data_content['id']  = $all_data->id;
		$data_content['all_data']  = $all_data;
		$data_content['role']  = $role;
		$data_content['posisi']  = $posisi;


		$config["content_file"] = "admin/form";
		$config["content_data"] = $data_content;

		$this->template->initialize($config);
		$this->template->render();
	}

	public function validation($data)
	{
		foreach ($data as $key => $val) {
			$this->form_validation->set_rules($key, $key, "required");
		}
		if ($this->form_validation->run() == FALSE) {
			return validation_errors();
		} else {
			return false;
		}
	}

	public function add()
	{
		$data = array();
		$data['username'] 	= $_POST["username"];
		$data['nama'] 	= $_POST["nama"];
		$data['id_role'] 	= $_POST["id_role"];
		$data['password'] 	= md5($_POST["password"]);
		$data['no_telp'] 	= $_POST["no_telp"];
		$data['jenis_kelamin'] 	= $_POST["jenis_kelamin"];
		$data['tanggal_lahir'] 	= $_POST["tanggal_lahir"];
		$data['alamat'] 	= $_POST["alamat"];
		$data['posisi'] 	= $_POST["posisi"];

		$validation = $this->validation($data);

		if ($validation) {
			echo json_encode(['error' => true, 'msg' => $validation]);
			die;
		}
		$this->db->insert($this->table, $data);
		$lastid = $this->db->insert_id();
		if ($lastid > 1) {
			echo json_encode(['error' => false, 'msg' => 'Success insert data']);
		} else {
			echo json_encode(['error' => true, 'msg' => 'Error insert data']);
		}
	}

	public function edit($param)
	{
		$data = array();
		$data['username'] 	= $_POST["username"];
		$data['nama'] 	= $_POST["nama"];
		$data['id_role'] 	= $_POST["id_role"];
		$data['password'] 	= md5($_POST["password"]);
		$data['no_telp'] 	= $_POST["no_telp"];
		$data['jenis_kelamin'] 	= $_POST["jenis_kelamin"];
		$data['tanggal_lahir'] 	= $_POST["tanggal_lahir"];
		$data['alamat'] 	= $_POST["alamat"];
		$data['posisi'] 	= $_POST["posisi"];

		$validation = $this->validation($data);

		if ($validation) {
			echo json_encode(['error' => true, 'msg' => $validation]);
			die;
		}
		$this->db->where('id', $param);
		$update = $this->db->update($this->table, $data);
		if ($update) {
			echo json_encode(['error' => false, 'msg' => 'Success update data']);
		} else {
			echo json_encode(['error' => true, 'msg' => 'Error update data']);
		}
	}

	public function delete()
	{
		$this->db->where('id', $_POST['id']);
		$this->db->delete($this->table);

		if ($this->db->affected_rows() > 0 ? TRUE : FALSE) {
			echo json_encode(['error' => false, 'msg' => 'Sukses menghapus  data']);
		} else {
			echo json_encode(['error' => true, 'msg' => 'Gagal menghapus data']);
		}
	}
}
