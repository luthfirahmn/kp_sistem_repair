<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data_content                 = array();
		$this->load->view('login/index', $data_content);
	}

	public function login_proccess()
	{
		$username         = $this->input->post('username');
		$password         = md5($this->input->post('password'));

		$query = $this->db->query("SELECT username,password,id,nama FROM ms_login WHERE username = '{$username}' AND password = '{$password}'");
		$result = $query->row();
		if ($result) {
			$session_data = array('id' => $result->id, 'nama' => $result->nama, 'status_login' => true);
			$this->session->set_userdata($session_data);
			echo json_encode(['error' => false, 'msg' => 'Sukses Login']);
			// redirect('userlogin');
		} else {
			echo json_encode(['error' => true, 'msg' => 'Username atau password salah']);
		}
	}

	public function remember_me()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$email    = $this->session->userdata('remember_email');
		$password = $this->session->userdata('remember_password');
		$checked  = $this->session->userdata('remember_chekbox');

		$res = array(
			"status"   => true,
			"email"    => $email,
			"password" => $password,
			"checked"  => $checked
		);
		echo json_encode($res);
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('backend/login');
	}


	// public function register(){
	//   try{
	//     if($this->input->post()){

	//       $email           = $this->input->post('email');
	//       $password        = $this->input->post('password');
	//       $full_name       = $this->input->post('full_name');
	//       $retype_password = $this->input->post('retype_password');

	//       /* CHECK EMAIL EXIST */

	//       $query = $this->db->query(" SELECT * 
	//                                   FROM ms_login 
	//                                   WHERE email = '{$email}'");

	//       /* CHECK EMAIL EXIST */

	//       if($query === false)
	//           throw new Exception();

	//         $cekemail = $query->num_rows();

	//         if($cekemail == 1){

	//          //message belum
	//           redirect('backend/login/register');

	//         }else{

	//           if($password <> $retype_password){
	//             redirect('backend/login/register');
	//           }
	//           /* INSERT MEMBER */

	//               $query = $this->db->query("	INSERT INTO ms_login( Email ,Password, Active)
	//                                           SELECT 
	//                                             '{$email}' as email
	//                                             ,'{$this->bcrypt->hash_password($password)}' as password
	//                                             ,1 as Active
	//                                           ");						

	//                 if($query === FALSE)
	//                   throw new Exception();

	//                 $result = $this->db->affected_rows();	

	//                 if($result){
	//                   // message belum
	//                   redirect('backend/login');
	//                 }else{
	//                   redirect('backend/login/register');
	//                 }

	//           /* INSERT MEMBER */

	//         }
	//     }

	//     $this->load->view('login/register');

	//   } catch(Exception $e){
	//     return $e;
	//   }
	// }

}
