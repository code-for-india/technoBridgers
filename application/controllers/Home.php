<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	var $head;
	var $foot;

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$data['csrf_token_name'] = $this->security->get_csrf_token_name();
		$data['csrf_token'] = $this->security->get_csrf_hash();
		$this->head =  $this->load->view('common/head',$data,true);
		$this->foot =  $this->load->view('common/foot',$data,true);
		$this->left =  $this->load->view('common/left',$data,true);
	}

	public function index()
	{
		redirect(base_url('/generateHallCard'));
	}

	public function generateHallCard()
	{
		$data['head'] = $this->head;
		$data['foot'] = $this->foot;
		$data['left'] = $this->left;
		$this->load->view('generateHallCard',$data);
	}

	public function hallCardDetails()
	{
		$url = '';
		if ($x = $this->input->post('url')) {
			$url = $x;
		}
		include_once(DIR_PATH.'application/third_party/lib/QrReader.php');
		$text = '';
		if($url != '')
		{
			$qrcode = new QrReader("".urldecode($url));
			$text = $qrcode->text(); //return decoded text from QR Code
		}
		$text = str_replace(' ','+',$text);
		$text = base64_decode($text);
		$privkey = $this->session->userdata('privateKey');
		openssl_private_decrypt($text, $decrypted, $privkey);
		$data['candidate_data'] = json_decode($decrypted,true);
		$data['head'] = $this->head;
		$data['foot'] = $this->foot;
		$data['left'] = $this->left;
		$this->load->view('hallCardDetails', $data);

	}

	public function generateHC()
	{
		$candidate_name = '';
		$candidate_roll_number = '';
		$candidate_aadhaar_card_number = '';
		$finger_print_template = '';
		if ($x = $this->input->post('candidate_name')) {
			$candidate_name = $x;
		}
		if ($x = $this->input->post('candidate_roll_number')) {
			$candidate_roll_number = $x;
		}
		if ($x = $this->input->post('candidate_aadhaar_card_number')) {
			$candidate_aadhaar_card_number = $x;
		}
		$finger_print_template = ($x = $this->input->post('finger-print-template'))?$x:'';
		$data = array(
			'candidate_name' => $candidate_name,
			'candidate_roll_number' => $candidate_roll_number,
			'candidate_aadhaar_card_number' => $candidate_aadhaar_card_number,
			'finger_print_template' => $finger_print_template,
			);
		$qr_data = json_encode($data);
		$res = openssl_pkey_new();
		openssl_pkey_export($res, $privkey);
		$pubkey = openssl_pkey_get_details($res);
		$this->session->set_userdata('privateKey',$privkey);
		$pubkey = $pubkey["key"];
		$encrypted = "";
		openssl_public_encrypt($qr_data,$encrypted, $pubkey);
		$encrypted = base64_encode($encrypted);
		$qr_code_link = 'http://api.qrserver.com/v1/create-qr-code/?data='.$encrypted.'&size=100x100';
		$data['head'] = $this->head;
		$data['foot'] = $this->foot;
		$data['left'] = $this->left;
		$data['qr_code_link'] = $qr_code_link;
		$this->load->view('hallCard',$data);
	}

}
