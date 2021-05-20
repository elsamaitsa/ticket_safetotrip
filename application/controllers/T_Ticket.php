<?php
defined('BASEPATH') or exit('No direct script access allowed');

class T_Ticket extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->satpam->jaga();
		$this->load->model('M_t_ticket');
	}

	public function index()
	{
		$this->satpam->jaga();
		$data['data_Tticket'] = $this->M_t_ticket->get_all();

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('v_List_TTicket', $data);
		$this->load->view('template/footer');
	}

	public function Update()
	{
		$this->M_t_ticket->Update();
		redirect(site_url('T_Ticket'), 'refresh');
	}

	public function CheckTicket()
	{
		$this->M_t_ticket->CheckTicket();
	}

	public function Delete($tticket_id)
	{
		$this->M_t_ticket->Delete($tticket_id);
		redirect(site_url('T_Ticket'), 'refresh');
	}
}
