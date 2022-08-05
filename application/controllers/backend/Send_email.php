<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Send_email extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		require APPPATH . 'libraries/phpmailer/src/Exception.php';
		require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH . 'libraries/phpmailer/src/SMTP.php';
	}

	// public function index()
	// {
	// 	// $this->load->view('form_email');
	// }

	public function send($id)
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
		$mail->addAddress($this->input->post('email')); //email tujuan pengiriman email

		// Set email format to HTML
		$mail->isHTML(true);

		$query = $this->db->query("SELECT * FROM tr_barang_masuk WHERE id={$id}");
		$result = $query->row();
		// Email body content
		$mailContent = "<p><b>REPORT DATA BARANG SELESAI</b></p>
		<style>
		.table1 {
			font-family: sans-serif;
			color: #232323;
			border-collapse: collapse;
		}
		 
		.table1, th, td {
			border: 1px solid #999;
			padding: 8px 20px;
		}
		</style>
   <table class='table1'>
     <tr>
       <td>PO NUMBER</td>
       <td>:</td>
       <td>" . $result->po_no . "</td>
     </tr>
     <tr>
       <td>STYLE NO</td>
       <td>:</td>
       <td>" . $result->style_no . "</td>
     </tr>
	 <tr>
       <td>BARANG</td>
       <td>:</td>
       <td>" . $result->barang . "</td>
     </tr>
     <tr>
       <td>GRADE</td>
       <td>:</td>
       <td>" . $result->grade . "</td>
     </tr>
	 <tr>
       <td>TOT</td>
       <td>:</td>
       <td>" . $result->tot . "</td>
     </tr>
	 <tr>
       <td>REMARK</td>
       <td>:</td>
       <td>" . $result->remark . "</td>
     </tr>
	 <tr>
       <td>TANGGAL PO</td>
       <td>:</td>
       <td>" . $result->po_date . "</td>
     </tr>
   </table>"; // isi email
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
