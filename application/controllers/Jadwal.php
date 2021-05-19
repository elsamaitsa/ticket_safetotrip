<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->satpam->jaga();
		$this->load->model('M_jadwal');
	}

	public function index()
	{
		$data['data_jadwal'] = $this->M_jadwal->view_jadwal();

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('v_ListJadwal', $data);
		$this->load->view('template/footer');
	}

	public function Insert()
	{
		$this->M_jadwal->Insert();
		redirect(site_url('Jadwal'), 'refresh');
	}

	public function Delete($rjadwal_id)
	{
		$this->M_jadwal->Delete($rjadwal_id);
		redirect(site_url('Jadwal'), 'refresh');
	}

	public function Update()
	{
		$this->M_jadwal->Update();

		redirect(site_url('Jadwal'), 'refresh');
	}
}
