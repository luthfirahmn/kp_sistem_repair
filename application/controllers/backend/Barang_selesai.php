<?php defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Barang_selesai extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('logged_in')) {
		// 	redirect('backend/login');
		// }
		// $this->user = $this->session->userdata('user');
		$this->user = 'admin';
		$this->table = 'tr_barang_masuk';

		require APPPATH . 'libraries/phpmailer/src/Exception.php';
		require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH . 'libraries/phpmailer/src/SMTP.php';
	}

	public function index()
	{
		/** DATA SEND TO VIEW */

		$data_content                 = array();
		$data_content['title']        = 'Barang Selesai';
		$data_content['breadcrumb']   = 'Barang Selesai';
		$data_content['breadcrumb1']  = 'Barang Selesai List';


		$config["js"] = 'barang_selesai/index';
		$config["content_file"] = "barang_selesai/index";
		$config["content_data"] = $data_content;

		$this->template->initialize($config);
		$this->template->render();
	}

	public function table_list($all_data, $recordsTotal, $recordsFiltered)
	{
		$data = array();
		$number = $_POST['start'];
		foreach ($all_data as $key => $val) {

			$btn_report = '<button type="button" onclick="myForm_edit(' . $val->id . ')" class="btn btn-icon rounded-circle btn-outline-primary btn-sm">
						<i data-feather="printer"></i></button>';
			$btn_delete = '<button type="button" onclick="btn_delete(' . $val->id . ')" class="btn btn-icon rounded-circle btn-outline-danger btn-sm">
			<i data-feather="trash"></i> </button>';
			$number++;
			$row = array();
			$row[] = $btn_report . ' ' . $btn_delete;
			$row[] = $val->po_no;
			$row[] = $val->style_no;
			$row[] = $val->barang;
			$row[] = $val->po_date;
			$row[] = $val->tot;
			$row[] = $val->remark;
			$row[] = $val->grade;
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
		$this->db->select("table1.*");
		$this->db->from($this->table . ' table1');
		$this->db->where('grade !=', '');
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
		$this->db->select("table1.*");
		$this->db->from($this->table . ' table1');
		$this->db->where('grade !=', '');
		$recordsTotal = $this->db->get()->num_rows();


		/* SELECT COUNT FILTR DATA */
		$this->db->select("table1.*");
		$this->db->from($this->table . ' table1');
		$this->db->where('grade !=', '');
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
										FROM ms_barang
								");
		$barang = $query->result();

		/** DATA SEND TO VIEW */

		$data_content                 = array();
		$data_content['title']        = 'Barang Selesai';
		$data_content['breadcrumb']   = 'Barang Selesai';
		$data_content['breadcrumb1']  = 'Barang Selesai Form';
		$data_content['status_form']  = 0;
		$data_content['barang']  = $barang;


		$config["content_file"] = "barang_selesai/form";
		$config["content_data"] = $data_content;

		$this->template->initialize($config);
		$this->template->render();
	}

	public function form_edit($param)
	{

		$query = $this->db->query("SELECT *
										FROM {$this->table} table1 
										WHERE id = {$param} 
										");
		$all_data = $query->row();

		$query = $this->db->query("SELECT *
										FROM ms_barang
								");
		$barang = $query->result();
		/** DATA SEND TO VIEW */

		$data_content                 = array();
		$data_content['title']        = 'Barang Selesai';
		$data_content['breadcrumb']   = 'Barang Selesai';
		$data_content['breadcrumb1']  = 'Barang Selesai Form Edit';
		$data_content['status_form']  = 1;
		$data_content['id']  = $all_data->id;
		$data_content['all_data']  = $all_data;
		$data_content['barang']  = $barang;


		$config["content_file"] = "barang_selesai/form";
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
		$data['tot'] 	= $_POST["tot"];
		$data['remark']     	= $_POST['remark'];
		$data['grade'] 	= $_POST["grade"];

		$validation = $this->validation($data);

		$data['created_by'] = $this->user;
		$data['created_time'] = date("Y-m-d H:i:s");
		$data['updated_by'] = $this->user;
		$data['updated_time'] = date("Y-m-d H:i:s");

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
		$data['tot'] 	= $_POST["tot"];
		$data['remark'] = $_POST['remark'];
		$data['grade'] 	= $_POST["grade"];

		$validation = $this->validation($data);

		$data['updated_by'] = $this->user;
		$data['updated_time'] = date("Y-m-d H:i:s");

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

	public function report_all()
	{
		$query = $this->db->query("SELECT *
									FROM {$this->table} table1 
									");
		$all_data = $query;

		$data_content['data']  		= $all_data->row();
		$data_content['all_data']  = $all_data->result();
		$this->send($this->input->post('email'));
		$this->load->view('barang_selesai/print_all', $data_content);
	}

	public function report($param)
	{
		$query = $this->db->query("SELECT *
									FROM {$this->table} table1 
									WHERE id = {$param} 
									");
		$all_data = $query->row();

		// /** DATA SEND TO VIEW */
		// $data_content                 = array();
		// $data_content['title']        = 'Barang Selesai';
		// $data_content['breadcrumb']   = 'Barang Selesai';
		// $data_content['breadcrumb1']  = 'Barang Selesai Form Edit';
		// $data_content['status_form']  = 1;
		// $data_content['id']  = $all_data->id;
		$data_content['all_data']  = $all_data;
		// $data_content['barang']  = $barang;


		// $config["content_file"] = "barang_selesai/print";
		// $config["content_data"] = $data_content;

		$this->load->view('barang_selesai/print', $data_content);
	}

	public function send($email)
	{
		// PHPMailer object
		$response = false;
		$mail = new PHPMailer();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'akunduaaov@gmail.com'; // user email anda
		$mail->Password = 'hmldsfwgijthnwtf'; // password email anda
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;

		$mail->setFrom('akunduaaov@gmail.com', 'PT PRATAMA'); // user email anda
		// $mail->addReplyTo('luthfirrahman696@gmail.com', ''); //user email anda

		// Email subject
		$mail->Subject = 'REPORT DATA BARANG SELESAI'; //subject email

		// Add a recipient
		$mail->addAddress($email); //email tujuan pengiriman email

		// Set email format to HTML
		$mail->isHTML(true);

		$query = $this->db->query("SELECT * FROM tr_barang_masuk ");
		$row = $query->result();
		// Email body content
		$mailContent = "";
		$mailContent .= "<p><b>REPORT DATA BARANG SELESAI</b></p>
		<style>
		.table1 {
			font-family: sans-serif;
			color: #232323;
			border-collapse: collapse;
		}
		 
		.table1, th, td {
			border: 5px solid #000;
			padding: 8px 20px;
		}
		</style>
		<table class='table1' style='border: 1px solid #000;'>";
		$mailContent .= "
			<tr style='border: 1px solid #000;'>
			<th style='border: 1px solid #000;'>PO NUMBER</th>
			<th style='border: 1px solid #000;'>STYLE NO</th>
			<th style='border: 1px solid #000;'>BARANG</th>
			<th style='border: 1px solid #000;'>GRADE</th>
			<th style='border: 1px solid #000;'>TOT</th>
			<th style='border: 1px solid #000;'>REMARK</th>
			<th style='border: 1px solid #000;'>TANGGAL PO</th>
			</tr>";

		foreach ($row as $result) {
			$mailContent .= "
			<tr style='border: 1px solid #000;'>
			<td style='border: 1px solid #000;'>" . $result->po_no . "</td>
			<td style='border: 1px solid #000;'>" . $result->style_no . "</td>
			<td style='border: 1px solid #000;'>" . $result->barang . "</td>
			<td style='border: 1px solid #000;'>" . $result->grade . "</td>
			<td style='border: 1px solid #000;'>" . $result->tot . "</td>
			<td style='border: 1px solid #000;'>" . $result->remark . "</td>
			<td style='border: 1px solid #000;'>" . $result->po_date . "</td>
			";
		}
		$mailContent .= "</tr></table>"; // isi email
		$mail->Body = $mailContent;

		// Send email
		if (!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
	}
}