<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('get_auth_lib')) {
	function get_auth_lib()
	{
		$ci = &get_instance();
		$ci->load->library('auth');
		return $ci->auth;
	}
}

if (!function_exists('get_api_lib')) {
	function get_api_lib()
	{
		$ci = &get_instance();
		$ci->load->library('api');
		return $ci->api;
	}
}


if (!function_exists("pre")) {
	function pre($param = array())
	{
		echo "<PRE>";
		print_r($param);
		exit;
	}
}


if (!function_exists('get_random_string')) {
	function get_random_string($valid_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789", $length = 2)
	{
		// start with an empty random string
		$random_string = "";

		// count the number of chars in the valid chars string so we know how many choices we have
		$num_valid_chars = strlen($valid_chars);

		// repeat the steps until we've created a string of the right length
		for ($i = 0; $i < $length; $i++) {
			// pick a random number from 1 up to the number of valid chars
			$random_pick = mt_rand(1, $num_valid_chars);

			// take the random character out of the string of valid chars
			// subtract 1 from $random_pick because strings are indexed starting at 0, and we started picking at 1
			$random_char = $valid_chars[$random_pick - 1];

			// add the randomly-chosen char onto the end of our string so far
			$random_string .= $random_char;
		}

		// return our finished random string
		return $random_string;
	}
}


if (!function_exists("dateSekarang")) {
	function dateSekarang($act = 1, $param = FALSE, $convert_normal_date = FALSE)
	{
		if (!empty($param) and $convert_normal_date)
			$param = trim(str_replace(array("T", "Z"), " ", $param));

		if ($param == "0001-01-01 00:00:00")
			return "-";

		if ($act == 1) {
			return date("Y-m-d H:i:s");
		} else if ($act == 2) {
			return date("Y-m-d");
		} else if ($act == 3) {
			return date("d F Y H:i", strtotime($param));
		} else if ($act == 4) {
			return date("d F Y", strtotime($param));
		} else if ($act == 5) {
			return date("Y/m/d");
		} else if ($act == 6) {
			return date("d/m/Y H:i");
		} else if ($act == 7) {
			$paramex = explode("/", substr($param, 0, 10));
			$jam = substr($param, 11, 6);
			return "{$paramex[2]}-{$paramex[1]}-{$paramex[0]} {$jam}";
		} else if ($act == 8) {
			return date("d M Y");
		} else if ($act == 9) {
			return date("Ymd");
		} else if ($act == 10) {
			$paramex = explode("/", substr($param, 0, 10));
			return "{$paramex[2]}-{$paramex[1]}-{$paramex[0]}";
		} else if ($act == 11) {
			$paramex = explode("-", substr($param, 0, 10));
			return "{$paramex[2]}-{$paramex[1]}-{$paramex[0]}";
		} else if ($act == 12) {
			return date("d F Y H:i:s", strtotime($param));
		} else if ($act == 13) {
			return date("d F Y", strtotime($param));
		} else if ($act == 14) {
			return date("H:i", strtotime($param));
		} else if ($act == 15) {
			return date("d", strtotime($param));
		} else if ($act == 16) {
			return date("m", strtotime($param));
		} else if ($act == 17) {
			return date("Y", strtotime($param));
		} else if ($act == 18) {
			return date("Y-m-d H:i:s", strtotime($param));
		} else if ($act == 19) {
			return date("Y-m-d", strtotime($param));
		} else if ($act == 20) {
			return date("Y-m-d H:i", strtotime($param));
		} else if ($act == 21) {
			return date("d F Y H:i", strtotime($param));
		} else if ($act == 22) {
			return date("Y-m-d\TH:i:s\Z", strtotime($param));
		}
	}
}


if (!function_exists('notify_message')) {
	function notify_message($success_msg = "", $error_message = "", $info_message = "")
	{
		$result = "";
		if ($success_msg)
			$result =  '<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						<strong>Success!</strong> ' . $success_msg . '
						</div>';
		if ($error_message)
			$result =  '<div class="alert alert-danger">
						<button class="close" data-dismiss="alert">&times;</button>
						<strong>Error!</strong> ' . $error_message . '
						</div>';
		if ($info_message)
			$result =  '<div class="alert alert-info">
						<button class="close" data-dismiss="alert">&times;</button>
						<strong>Info!</strong> ' . $info_message . '
						</div>';
		return $result;
	}
}

if (!function_exists("group_by_array")) {
	function group_by_array($array, $key)
	{
		$return = array();
		foreach ($array as $val) {
			$return[$val[$key]][] = $val;
		}
		return $return;
	}
}

if (!function_exists('get_menu_module')) {
	function get_menu_module($userid = NULL)
	{
		$modules = array();
		$modules = get_auth_lib()->get_all_module($userid);

		return $modules;
	}
}

if (!function_exists('privilage')) {
	function privilage($userid = NULL, $module = NULL, $function = NULL)
	{
		$allowed = get_auth_lib()->privilage($userid, $module, $function);
		// pre($allowed);
		return $allowed;
	}
}


// if (!function_exists('get_user')) {
// 	function get_user($email = NULL)
// 	{
// 		$fullname = get_auth_lib()->get_user($email);
// 		return $fullname;
// 	}
// }


if (!function_exists('get_role')) {
	function get_role($email = NULL)
	{
		$role = get_auth_lib()->get_role($email);
		return $role;
	}
}

if (!function_exists('tr_log')) {
	function tr_log($logquery = null, $logpage = null, $rbu = null)
	{
		$data["LogQuery"]	= $logquery;
		$data["LogPage"]    = $logpage;
		$data["RBU"] 		= $rbu;
		$data["RBT"] 		= date("Y-m-d H:i:s");

		$result = get_auth_lib()->insert_log($data);

		return $result;
	}
}


if (!function_exists('sendOTP')) {
	function sendOTP($temp = null, $email = null, $kode = null)
	{
		$result = get_auth_lib()->sendEmail($temp, $email, $kode);
		return $result;
	}
}

if (!function_exists('send_email_notif')) {
	function send_email_notif($temp = null, $email = null, $kode = null)
	{
		$result = get_auth_lib()->sendEmail($temp, $email, $kode);
		return $result;
	}
}

if (!function_exists('base64Image')) {
	function base64Image($pathImage = null)
	{
		$path = IMAGE_BLOCK_APPS_ROOT . $pathImage;;
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$dataimg = file_get_contents($path);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($dataimg);

		return $base64;
	}
}


if (!function_exists('resizeImage')) {
	function resizeImage($SrcImage, $DestImage, $MaxWidth, $MaxHeight, $Quality)
	{
		list($iWidth, $iHeight, $type)      = getimagesize($SrcImage);
		$ImageScale                         = min($MaxWidth / $iWidth, $MaxHeight / $iHeight);
		$NewWidth                           = ceil($ImageScale * $iWidth);
		$NewHeight                          = ceil($ImageScale * $iHeight);
		$NewCanves                          = imagecreatetruecolor($NewWidth, $NewHeight);

		switch (strtolower(image_type_to_mime_type($type))) {
			case 'image/jpeg':
				$NewImage = imagecreatefromjpeg($SrcImage);
				break;
			case 'image/png':
				$NewImage = imagecreatefrompng($SrcImage);
				break;
			case 'image/gif':
				$NewImage = imagecreatefromgif($SrcImage);
				break;
			case 'image/jpg':
				$NewImage = imagecreatefromgif($SrcImage);
				break;
			default:
				return false;
		}

		// Resize Image
		if (imagecopyresampled($NewCanves, $NewImage, 0, 0, 0, 0, $NewWidth, $NewHeight, $iWidth, $iHeight)) {
			// copy file
			if (imagejpeg($NewCanves, $DestImage, $Quality)) {
				imagedestroy($NewCanves);
				return true;
			}
		}
	}
}

if (!function_exists('Buttons')) {
	function Buttons($buttons = null, $func = null)
	{
		switch ($buttons) {
			case "delete":
				$button = '<button onclick="' . $func . '" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
				break;
			case "edit":
				$button = '<button onclick="' . $func . '" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></button>';
				break;
			case "actived":
				$button = '<button onclick="' . $func . '" class="btn btn-warning btn-sm" style="width: 36px; height:30px; "><i class="fas fa-eye"></i></button>';
				break;
			case "disabled":
				$button = '<button onclick="' . $func . '" class="btn btn-warning btn-sm" style="width: 36px; height:30px;"><i class="fas fa-eye-slash"></i></button>';
				break;
			case "check":
				$button = '<button onclick="' . $func . '" class="btn btn-danger btn-sm " style="width: 36px; height:30px;"><i class="fa fa-times"></i></button>';
				break;
			case "checked":
				$button = '<button onclick="' . $func . '" class="btn btn-success btn-sm" style="width: 36px; height:30px;"><i class="fa fa-check"></i></button>';
				break;
			case "used":
				$button = '<button class="btn btn-secondary btn-sm " style="width: 80px; height:30px;" disabled>Used</button>';
				break;
			case "notused":
				$button = '<button onclick="' . $func . '" class="btn btn-danger btn-sm" style="width: 80px; height:30px;">Not Used</button>';
				break;
			case "notsendStatus":
				$button = '<button onclick="' . $func . '" class="btn btn-danger btn-sm " style="width: 36px; height:30px;"><i class="fa fa-times"></i></button>';
				break;
			case "sendStatus":
				$button = '<button onclick="' . $func . '" class="btn btn-success btn-sm" style="width: 36px; height:30px;"><i class="fa fa-check"></i></button>';
				break;
			case "header":
				$button = '<button onclick="' . $func . '" class="btn btn-success btn-sm" style="width: 65px; height:30px;">Header</button>';
				break;
			case "footer":
				$button = '<button onclick="' . $func . '" class="btn btn-danger btn-sm" style="width: 65px; height:30px;">Footer</button>';
				break;
			default:
				$button = '<button onclick="' . $func . '" class="btn btn-info btn-sm"><i class="fas fa-list"></i></button>';
		}
		return $button;

		//   $row[] = $val->Active == 1 ? Buttons("disabled", "myActive($val->DID,1)"):Buttons("actived", "myActive($val->DID,0)");
		//   $row[] = Buttons("delete", "myActive($val->DID,1)").Buttons("edit", "myActive($val->DID,1)");

	}
}

if (!function_exists('OnesignalNotification')) {
	function OnesignalNotification($PlayerID, $Title, $Message)
	{
		$content = array(
			"en" => $Message
		);
		$heading = array(
			"en" => $Title
		);
		$fields = array(
			'app_id' => "9bf92305-403b-4c58-acff-5d167e0ca1ec",
			'include_player_ids' => array("$PlayerID"),
			'data' => array("foo" => "bar"),
			'contents' => $content,
			'headings' => $heading
		);

		$fields = json_encode($fields);
		// print("\nJSON sent:\n");
		// print($fields);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);

		return $response;
	}
}

if (!function_exists('get_menu')) {
	function get_menu($userid = NULL)
	{
		$allowed_menu = get_auth_lib()->get_menu($userid);
		return $allowed_menu;
	}
}

// if (!function_exists('get_user')) {
// 	function get_user($userid = NULL)
// 	{
// 		$user = get_auth_lib()->get_user($userid);
// 		return $user;
// 	}
// }

if (!function_exists('bulan')) {
	function bulan($bln)
	{
		switch ($bln) {
			case 1:
				return "January";
				break;
			case 2:
				return "February";
				break;
			case 3:
				return "March";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "May";
				break;
			case 6:
				return "June";
				break;
			case 7:
				return "July";
				break;
			case 8:
				return "August";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "October";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "December";
				break;
		}
	}
}

if (!function_exists('medium_bulan')) {
	function medium_bulan($bln)
	{
		switch ($bln) {
			case 1:
				return "Jan";
				break;
			case 2:
				return "Feb";
				break;
			case 3:
				return "Mar";
				break;
			case 4:
				return "Apr";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Jun";
				break;
			case 7:
				return "Jul";
				break;
			case 8:
				return "Ags";
				break;
			case 9:
				return "Sep";
				break;
			case 10:
				return "Okt";
				break;
			case 11:
				return "Nov";
				break;
			case 12:
				return "Des";
				break;
		}
	}
}

if (!function_exists('short_bulan')) {
	function short_bulan($bln)
	{
		switch ($bln) {
			case 1:
				return "01";
				break;
			case 2:
				return "02";
				break;
			case 3:
				return "03";
				break;
			case 4:
				return "04";
				break;
			case 5:
				return "05";
				break;
			case 6:
				return "06";
				break;
			case 7:
				return "07";
				break;
			case 8:
				return "08";
				break;
			case 9:
				return "09";
				break;
			case 10:
				return "10";
				break;
			case 11:
				return "11";
				break;
			case 12:
				return "12";
				break;
		}
	}
}

if (!function_exists('longdate_indo')) {
	function longdate_indo($tanggal)
	{
		$ubah = gmdate($tanggal, time() + 60 * 60 * 8);
		$pecah = explode("-", $ubah);
		$tgl = $pecah[2];
		$bln = $pecah[1];
		$thn = $pecah[0];
		$bulan = bulan($pecah[1]);

		$nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
		$nama_hari = "";
		if ($nama == "Sunday") {
			$nama_hari = "Sun";
		} else if ($nama == "Monday") {
			$nama_hari = "Mon";
		} else if ($nama == "Tuesday") {
			$nama_hari = "Tue";
		} else if ($nama == "Wednesday") {
			$nama_hari = "Wed";
		} else if ($nama == "Thursday") {
			$nama_hari = "Thu";
		} else if ($nama == "Friday") {
			$nama_hari = "Fri";
		} else if ($nama == "Saturday") {
			$nama_hari = "Sat";
		}
		return $nama_hari . ', ' . $bulan . ' ' . $tgl . ',  ' . $thn;
	}
}


if (!function_exists('mediumdate_indo')) {
	function mediumdate_indo($tgl)
	{
		$ubah = gmdate($tgl, time() + 60 * 60 * 8);
		$pecah = explode("-", $ubah);
		$tanggal = $pecah[2];
		$bulan = medium_bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal . '-' . $bulan . '-' . $tahun;
	}
}

if (!function_exists('log_api')) {
	function log_api($LogType = null, $LogRequest = null, $LogResponse = null, $LogIP = null)
	{
		$data["LogType"]		= $LogType;
		$data["LogRequest"]    	= $LogRequest;
		$data["LogResponse"]    = $LogResponse;
		$data["LogIP"] 			= $LogIP;
		$data["RBT"] 			= date("Y-m-d H:i:s");

		$result = get_api_lib()->insert_log_api($data);

		return $result;
	}
}

if (!function_exists('getid')) {
	function getid($Param1, $Param2)
	{
		$ci = &get_instance();
		$query = $ci->db->query(
			"SELECT ParamID 
										FROM ms_parameter
										WHERE ParamVariable = '{$Param1}'
										AND ParamValue = '{$Param2}'
										"
		);
		$result = $query->row();
		return $result->ParamID;
	}
}

if (!function_exists('tlang')) {
	function tlang($MemberID, $Msg, $Error, $Data)
	{
		$ci = &get_instance();
		$date = date("Y-m-d H:s:i");

		$query1 = $ci->db->query("SELECT ID_LANG 
									  FROM ms_trans_lang
									  WHERE ID_LANG = '{$Msg}'
									");

		$result1 = $query1->row();

		if (!$result1) {
			$ci->db->query("INSERT INTO ms_trans_lang (ID_LANG, RBT) 
							    SELECT 
							    '{$Msg}'
							    ,'{$date}'
							 ");
			/*$msg_result = $Msg;*/
		}

		$query2 = $ci->db->query("SELECT AppLanguage 
									 FROM ms_member
									 WHERE MemberID = '{$MemberID}'
									");

		$result2 = $query2->row()->AppLanguage;

		if ($result2 != "EN") {
			$query3 = $ci->db->query("SELECT ID_LANG 
									 	FROM ms_trans_lang
									 	WHERE ID_LANG = '{$Msg}'
									");
			$result3 = $query3->row();

			if (!$result3) {
				$msg_result = $Msg;
			} else {
				$msg_result = $query3->row()->ID_LANG;
			}
		} else {
			$query4 = $ci->db->query("SELECT EN_LANG,ID_LANG
										  FROM ms_trans_lang
										  WHERE ID_LANG = '{$Msg}'
											");
			$msg_result = $query4->row()->EN_LANG;

			if (!$msg_result) {
				$msg_result = $query4->row()->ID_LANG;
			} else {
				$msg_result = $query4->row()->EN_LANG;
			}
		}

		$arr = array(
			'message'  => $msg_result,
			'errors'	=> $Error,
			'data'		=> $Data
		);
		return $arr;
	}
}


/*APP LOG*/
if (!function_exists('api_log')) {
	function api_log($debug = null, $LogType = null, $LogRequest = null, $LogResponse = null, $LogIP = null)
	{
		$ci = &get_instance();

		if ($debug == 1) {
			$data["LogType"]		= $LogType;
			$data["LogRequest"]    	= $LogRequest;
			$data["LogResponse"]    = $LogResponse;
			$data["LogIP"] 			= $ci->input->ip_address();
			$data["RBT"] 			= date("Y-m-d H:i:s");

			$result = $ci->db->insert('api_log', $data);

			$a = $ci->db->last_query();
			return $a;
		} else {
			return false;
		}
	}
}

if (!function_exists('cross_merge_array')) {
	function cross_merge_array($arr1, $arr2)
	{
		$arr1 = array_values($arr1);
		$arr2 = array_values($arr2);
		$count = max(count($arr1), count($arr2));
		$arr = array();
		for ($i = 0; $i < $count; $i++) {
			if ($i < count($arr1)) $arr[] = $arr1[$i];
			if ($i < count($arr2)) $arr[] = $arr2[$i];
		}
		return $arr;
	}
}


if (!function_exists('generateRandomString')) {
	function generateRandomString($length = 7)
	{
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}

if (!function_exists('tes_generate')) {
	function finalCode($arr)
	{
		$data1 = $arr[0];
		$data2 = $arr[1];
		$data3 = $arr[2];
		$data4 = $arr[3];
		$data5 = $arr[4];
		$data6 = $arr[5];
		$data7 = $arr[6];

		$salt1 = array(
			'E' => 0,
			'F' => 1,
			'G' => 2,
			'H' => 3,
			'I' => 4,
			'J' => 5,
			'K' => 6,
			'L' => 7,
			'M' => 8,
			'N' => 9
		);

		$salt2 = array(
			'U' => 0,
			'P' => 1,
			'W' => 2,
			'Q' => 3,
			'Y' => 4,
			'Z' => 5,
			'A' => 6,
			'B' => 7,
			'C' => 8,
			'D' => 9
		);

		$salt3 = array(
			'K' => 0,
			'L' => 1,
			'M' => 2,
			'N' => 3,
			'O' => 4,
			'P' => 5,
			'Q' => 6,
			'R' => 7,
			'S' => 8,
			'T' => 9
		);

		$salt4 = array(
			'A' => 0,
			'B' => 1,
			'C' => 2,
			'D' => 3,
			'E' => 4,
			'F' => 5,
			'G' => 6,
			'H' => 7,
			'I' => 8,
			'J' => 9
		);

		$array1 = array_search($data1, $salt1);
		$array2 = array_search($data3, $salt2);
		$array3 = array_search($data5, $salt3);
		$array4 = array_search($data7, $salt4);

		$result = $array1 . $data2 . $array2 . $data4 . $array3 . $data6 . $array4;
		return $result;
	}
}

if (!function_exists('api_response')) {
	function api_response($error = '', $msg = '', $data = '')
	{

		if ($error == 'true') {
			$response = array(
				'massage' => $msg,
				'data'	  => $data,
				'error' => $error
			);
		} else {
			$response = array(
				'massage' => $msg,
				'error' => $error
			);
		}

		return $response;
	}
}



if (!function_exists('send_email_default')) {
	function send_email_default($email_from, $data_template)
	{
		$template_id = "d-06f64394598b46788a36d31c501e783c";

		$data = array(
			"from" => array(
				"email" => "info@ambarrukmo.com"
			),
			"personalizations" => array(
				array(
					"to" => array(
						array(
							"email" => $email_from
						)
					),
					"dynamic_template_data" => $data_template
				)
			),
			"template_id" => $template_id
		);

		$send = send_email($data);

		return $send;
	}
}

if (!function_exists('send_email_buy_voucher')) {
	function send_email_buy_voucher($email_from, $data_template)
	{
		$template_id = "d-20f313f760e34fc1a31253badb2c288e";

		$data = array(
			"from" => array(
				"email" => "info@ambarrukmo.com"
			),
			"personalizations" => array(
				array(
					"to" => array(
						array(
							"email" => $email_from
						)
					),
					"dynamic_template_data" => $data_template
				)
			),
			"template_id" => $template_id
		);

		$send = send_email($data);

		return $send;
	}
}

if (!function_exists('send_email_table')) {
	function send_email_table($email_from, $data_template)
	{
		$template_id = "d-a755ee5026d74d3285a5121d2736da22";

		$data = array(
			"from" => array(
				"email" => "info@ambarrukmo.com"
			),
			"personalizations" => array(
				array(
					"to" => array(
						array(
							"email" => $email_from
						)
					),
					"dynamic_template_data" => $data_template
				)
			),
			"template_id" => $template_id
		);

		$send = send_email($data);

		return $send;
	}
}

if (!function_exists('send_email')) {
	function send_email($data)
	{
		$ci = &get_instance();

		$query = $ci->db->query("SELECT api_key
									 FROM api_key
									 WHERE api_name = 'voucher'
									");
		$api_key = $query->row()->api_key;

		$data_json = json_encode($data);

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.sendgrid.com/v3/mail/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $data_json,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Authorization: Bearer ' . $api_key
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$log_request =  $data_json;
		$log_response = $response;

		api_log(1, "OUT", $log_request, $log_response, "");

		return $response;
	}
}

if (!function_exists('send_sms')) {
	function send_sms($pesan, $number)
	{
		$base_url = 'http://otp.citrahost.com/citra-sms.api.php?';
		$action   = 'send';
		$outhkey  = '65c9d83e92c4714b882b5def4eee5d62';
		$secret   = '73518343c2231108cd2c3de2c5f6c4b9';

		$pesan_final =  str_replace(' ', '%20', $pesan);
		// 'http://otp.citrahost.com/citra-sms.api.php?action=send&outhkey=65c9d83e92c4714b882b5def4eee5d62&secret=73518343c2231108cd2c3de2c5f6c4b9&pesan=Your%20OTP%20is%209999&to=+6281996883459',
		$url = $base_url . 'action=' . $action . '&outhkey=' . $outhkey . '&secret=' . $secret . '&pesan=' . $pesan_final . '&to=' . $number;
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLINFO_HEADER_OUT => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		// LOG API
		$log_request =  'nomor = ' . $number . ' , ' . 'Pesan = ' . $pesan;
		$log_response = $response;

		api_log(1, "OUT", $log_request, $log_response, "");

		return $response;
	}
}

if (!function_exists('email_checkpoint')) {
	function email_checkpoint($data)
	{
		$ci = &get_instance();

		$query = $ci->db->query("SELECT api_key
									 FROM api_key
									 WHERE api_name = 'voucher'
									");
		$api_key = $query->row()->api_key;

		require_once  APPPATH . 'third_party/SendGrid/sendgrid-php.php';

		$email = new \SendGrid\Mail\Mail();
		// Replace the email address and name with your verified sender
		$email->setFrom(
			'info@ambarrukmo.com',
			'info@ambarrukmo.com'
		);
		$email->setSubject('Check point versus');
		// Replace the email address and name with your recipient
		$email->addTo('nl@onedeca.com');

		$email->addContent(
			'text/html',
			template_email_checkpoint($data)
		);
		$sendgrid = new \SendGrid($api_key);
		try {
			$response = $sendgrid->send($email);
			printf("Response status: %d\n\n", $response->statusCode());

			$headers = array_filter($response->headers());
			$res = '';
			$res .= "Response Headers\n\n";
			foreach ($headers as $header) {
				$res .= '- ' . $header . "\n";
			}
		} catch (Exception $e) {
			$res .= 'Caught exception: ' . $e->getMessage() . "\n";
		}

		return $res;
	}
}

if (!function_exists('template_email_checkpoint')) {
	function template_email_checkpoint($data)
	{
		$a = '';

		$a .= '<html>
			<head>
			<style>
			table, td, th {
			  border: 1px solid black;
			}
			td {
				padding-left:4px;
			}
	
			table {
			  width: 100%;
			  border-collapse: collapse;
			}
			</style>
			</head>
			<body>
				<h3>List Data Versus</h3>   
				<table > 
					<thead>
						<tr>
							<th>Member ID</th>
							<th>Member Name</th>
							<th>Total Point</th>
							<th>CountPoint</th>
						</tr>    
					</thead>
					<tbody>';

		foreach ($data as $row) {
			$MemberID =  $row['MemberID'];
			$CountPoint =  $row['CountPoint'];
			$FullName =  $row['FullName'];
			$TotalPoint =  $row['TotalPoint'];
			$a .= "<tr>
							<td>" . $MemberID . "</td>
							<td>" . $FullName . "</td>
							<td>" . $TotalPoint . "</td>
							<td>" . $CountPoint . "</td>
						</tr>";
		};
		$a .= '</tbody>
						</table>
						<hr />     
					</body>
					</html>';

		return $a;
	}
}

if (!function_exists('email_notif_batch')) {
	function email_notif_batch($email_to, $content)
	{
		$ci = &get_instance();

		$query = $ci->db->query("SELECT api_key
									 FROM api_key
									 WHERE api_name = 'voucher'
									");
		$api_key = $query->row()->api_key;

		require_once  APPPATH . 'third_party/SendGrid/sendgrid-php.php';

		$email = new \SendGrid\Mail\Mail();
		// Replace the email address and name with your verified sender
		$email->setFrom(
			'info@ambarrukmo.com',
			'info@ambarrukmo.com'
		);
		$email->setSubject('Notification Ambarrukmo');
		// Replace the email address and name with your recipient
		$email->addTo($email_to);

		$email->addContent(
			'text/html',
			$content
		);
		$sendgrid = new \SendGrid($api_key);
		try {
			$response = $sendgrid->send($email);
			printf("Response status: %d\n\n", $response->statusCode());

			$headers = array_filter($response->headers());
			$res = '';
			$res .= "Response Headers\n\n";
			foreach ($headers as $header) {
				$res .= '- ' . $header . "\n";
			}
		} catch (Exception $e) {
			$res .= 'Caught exception: ' . $e->getMessage() . "\n";
		}

		return $res;
	}
}

if (!function_exists('translate_by_member')) {
	function translate_by_member($param, $msg)
	{
		$ci = &get_instance();

		$query = $ci->db->query("SELECT *
									FROM ms_trans_lang
									WHERE EN_LANG = '{$msg}'
									");
		$check_translate = $query->num_rows();
		$data_translate = $query->row();

		if ($check_translate < 1) {
			$ci->db->insert('ms_trans_lang', ['EN_LANG' => $msg, 'RBT' => date('Y-m-d H:i:s')]);
		}

		$query = $ci->db->query("SELECT CASE WHEN AppLanguage = 'EN' THEN 0 ELSE 1 END AS AppLanguage
									 FROM ms_member
									 WHERE MemberID = '{$param}'
									");

		$check_member = $query->row()->AppLanguage;

		if ($check_member == 0) {
			$return_msg = $msg;
		} else if ($check_member == 1) {
			$return_msg = isset($data_translate->ID_LANG) ? $data_translate->ID_LANG : $msg;
		} else {
			$return_msg = $msg;
		}

		return $return_msg;
	}
}

if (!function_exists('translate_by_lang')) {
	function translate_by_lang($param, $msg)
	{
		$ci = &get_instance();

		$query = $ci->db->query("SELECT *
									FROM ms_trans_lang
									WHERE EN_LANG = '{$msg}'
									");
		$check_translate = $query->num_rows();
		$data_translate = $query->row();

		if ($check_translate < 1) {
			$ci->db->insert('ms_trans_lang', ['EN_LANG' => $msg, 'RBT' => date('Y-m-d H:i:s')]);
		}

		if ($param == 'EN') {
			$return_msg = $msg;
		} else if ($param == 'ID') {
			$return_msg = isset($data_translate->ID_LANG) ? $data_translate->ID_LANG : $msg;
		} else {
			$return_msg = $msg;
		}

		return $return_msg;
	}
}
