<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->satpam->jaga();
		$this->load->model('M_layanan');
	}


	public function index()
	{
		$data['data_layanan'] = $this->M_layanan->view_layanan();

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('v_ListLayanan', $data);
		$this->load->view('template/footer');
	}

	public function Insert()
	{
		$this->M_layanan->Insert();
		redirect(site_url('Layanan'), 'refresh');
	}

	public function Delete($rservice_id)
	{
		$this->M_layanan->Delete($rservice_id);
		redirect(site_url('Layanan'), 'refresh');
	}

	public function Update()
	{
		$this->M_layanan->Update();

		redirect(site_url('Layanan'), 'refresh');
	}
}
