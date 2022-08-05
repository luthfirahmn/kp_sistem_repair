<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
	private $CI;
	/**
	 * Constructor
	 */
	function __construct()
	{
		//Load your settting here
		$this->ci = &get_instance();
		$this->ci->load->library('session');
		$this->ci->load->library('email');

		$this->db = $this->ci->db;
	}

	// --------------------------------------------------------------------

	/**
	 * Check user signin status
	 *
	 * @access public
	 * @return bool
	 */



	function insert_log($data)
	{
		$this->db->insert("tr_log", $data);

		if ($this->db->insert_id() > 1) {
			return true;
		} else {
			return false;
		}
	}




	function data_template($temp, $email, $params)
	{

		switch ($temp) {
			case "ForgetPass":
				$data = array();
				$data['subject'] = "Forget Password";
				$data['body'] = "<p>Your Password : " . $params . "</p>";

				break;

			case "InfoPoint":
				$data = array();
				$data['subject'] = "Info Point";
				$data['body'] = "<p>Selamat anda mendapatkan point sebesar " . $params . " dari aplikasi Ambarrukmo</p>
                                 <p>Terimakasih ..!</p>";

				break;

			default:
				$data = array();
				$data['subject'] = "verifikasi OTP";
				$data['body'] = "<p>your OTP code : " . $params . "</p>";
		}

		return $data;
	}

	function sendEmail($temp, $email, $params)
	{

		$data_template = $this->data_template($temp, $email, $params);

		$this->ci->load->library('email_template/emailotp');
		$template = $this->ci->emailotp->html($data_template);


		$config['useragent']    = 'PHPMailer';
		$config['protocol']     = 'smtp';
		$config['smtp_host']    = 'smtp.gmail.com';
		$config['smtp_port']    = 587;
		$config['smtp_crypto']  = 'tls';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'nysoft.notif@gmail.com';
		$config['smtp_pass']    = 'X12345678x';
		$config['charset']      = 'utf-8';
		$config['newline']      = "\r\n";
		$config['mailtype']     = 'html';
		$config['validation']   = TRUE;
		$config['smtp_debug']   = 1;

		$this->ci->email->initialize($config);

		$this->ci->email->from("nysoft.notif@gmail.com", "AMBARRUKMO");
		$this->ci->email->to($email);
		$this->ci->email->subject($data_template['subject']);
		$this->ci->email->message($template);

		if ($this->ci->email->send()) {
			//    echo $this->ci->email->print_debugger();
			//    die;
			return true;
		} else {
			return false;
		}
	}


	function get_menu($aclgroup = null)
	{
		$this->db->select("mm.DID
        ,mm.Menu
        ,mm.MenuFile
        ,mm.OrderNo,
        ,(SELECT ms.Menu FROM ms_menu ms WHERE mm.ParentID = ms.DID AND ms.Active = 1) as submenu
        ,(SELECT ms2.OrderNo FROM ms_menu ms2 WHERE mm.ParentID = ms2.DID) as orders
        ");
		$this->db->from("ms_menu mm");
		$this->db->join("ms_acl_group mag", "mag.MenuID = mm.DID");
		$this->db->where("mm.Active = 1");
		$this->db->where("mm.ParentID <> 0");
		$this->db->where("mag.ACLGroup", $aclgroup);
		$this->db->where("mag.Mview <> 0");
		$this->db->order_by("orders", "asc");
		$this->db->order_by("mm.OrderNo", "asc");
		$parent_menu = $this->db->get()->result_array();
		// pre($parent_menu);

		$grup_menu = array();
		foreach ($parent_menu as $val) {
			if ($val["submenu"] != "") {
				$grup_menu[$val["submenu"]][] = $val;
			}
		}

		return $this->builMenu($grup_menu);
	}

	function builMenu($grup_menu)
	{
		$html = '';
		foreach ($grup_menu as $key => $values) {
			$sub = '';
			$arrayclass = array();
			foreach ($values as $val) {
				$link = current_url();
				$explode  = explode("/", $link);
				$gurl = $explode[4];

				if (strtolower($gurl) == strtolower($val["MenuFile"])) {
					//if (strtolower($gurl) == strtolower($val["MenuFile"]) && strpos(strtolower($link), strtolower(base_url() . "backend/" . $val["MenuFile"])) !== false){
					$active = 'class="nav-link active"';
					array_push($arrayclass, $active);
				} else {
					$active = 'class="nav-link"';
				}
				$sub .= '
                    <li class="nav-item">
                    <a href="' . base_url("backend/") . $val["MenuFile"] . '" ' . $active . '>
                        <i class="far fa-circle nav-icon" style="margin-left: 15px;"></i>
                        <p>' . $val["Menu"] . '</p>
                    </a>
                    </li>
                ';
			}

			if (in_array('class="nav-link active"', $arrayclass)) {
				$class = 'class="nav-item menu-is-opening menu-open"';
				$display = 'style="display: block;"';
				$activc = 'class="nav-link active"';
			} else {
				$class = 'class="nav-item"';
				$display = 'style="display: none;"';
				$activc = 'class="nav-link"';
			}

			$html .= '<li ' . $class . ' >
                        <a ' . $activc . '>
                            <i class="nav-icon far fa-plus-square"></i>
                            <p>' . $key . '</p>
                            <i class="right fas fa-angle-right"></i>
                        </a>
                        <ul class="nav nav-treeview " ' . $display . '>
                        ' . $sub . '
                        </ul>
                     </li>';
		}

		return $html;
	}
}

/* End of file auth.php */
/* Location: ./application/libraries/auth.php */
