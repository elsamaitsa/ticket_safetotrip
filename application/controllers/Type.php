<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Type extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->satpam->jaga();
		$this->load->model('M_type');
	}

	public function index()
	{
		$data['data_type'] = $this->M_type->view_type();

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('v_ListType', $data);
		$this->load->view('template/footer');
	}

	public function Insert()
	{
		$this->M_type->Insert();
		redirect(site_url('Type'), 'refresh');
	}

	public function Delete($rvarianticket_id)
	{
		$this->M_type->Delete($rvarianticket_id);
		redirect(site_url('Type'), 'refresh');
	}

	public function Update()
	{
		$this->M_type->Update();
		redirect(site_url('Type'), 'refresh');
	}
}
