<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	var $head;
	var $foot;

		public function __construct()
	{
		parent::__construct();
		//$this->load->library(array('Data_lib','session'));
		$this->load->helper(array('url'));
		$data['csrf_token_name'] = $this->security->get_csrf_token_name();
		$data['csrf_token'] = $this->security->get_csrf_hash();
		$this->head =  $this->load->view('common/head',$data,true);
		$this->foot =  $this->load->view('common/foot',$data,true);
		$this->left =  $this->load->view('common/left',$data,true);
	}

	public function index()
	{
		$this->load->view('welcome_message');
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


	 $raw_data = json_decode(file_get_contents($url), true);

	 $raw_dat = $raw_data[0]['symbol'][0]['data'];


	 $privkey = file_get_contents("assets/test.txt");


	 openssl_private_decrypt($raw_dat, $decrypted, $privkey);



	 $data['candidate_data'] = $decrypted;
	 var_dump($data['candidate_data']);
	 die;
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
		if ($x = $this->input->post('candidate_name')) {
			$candidate_name = $x;
		}
		if ($x = $this->input->post('candidate_roll_number')) {
			$candidate_roll_number = $x;
		}
		if ($x = $this->input->post('candidate_aadhaar_card_number')) {
		 $candidate_aadhaar_card_number = $x;
	 }


			$data = array(
				'candidate_name' => $candidate_name,
				'candidate_roll_number' => $candidate_roll_number,
				'candidate_aadhaar_card_number' => $candidate_aadhaar_card_number
				);

		$qr_data = json_encode($data);

		$res = openssl_pkey_new();

openssl_pkey_export($res, $privkey);

$pubkey = openssl_pkey_get_details($res);
$pubkey = $pubkey["key"];


$encrypted = "";
$decrypted = "";

file_put_contents("assets/test.txt",$privkey);

openssl_public_encrypt($qr_data,$encrypted, $pubkey);

// openssl_private_decrypt($encrypted, $decrypted, $privkey);
// echo $decrypted;
$encrypted = base64_encode($encrypted);

		$qr_code_link = 'http://api.qrserver.com/v1/create-qr-code/?data='.$encrypted.'&size=100x100';
		$data['head'] = $this->head;
		$data['foot'] = $this->foot;
		$data['left'] = $this->left;
		$data['qr_code_link'] = $qr_code_link;

			$this->load->view('hallCard',$data);



	}
}
