<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
		$this->satpam->jaga();
    }

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('v_ListPesanan');
		$this->load->view('template/footer');
	}
}
