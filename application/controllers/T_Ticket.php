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
		$this->satpam->jaga();
		$this->M_t_ticket->Update();
		redirect(site_url('T_Ticket'), 'refresh');
	}

	public function CheckTicket()
	{
		$this->satpam->jaga();
		$this->M_t_ticket->CheckTicket();
	}

	public function Delete($tticket_id)
	{
		$this->satpam->jaga();
		$this->M_t_ticket->Delete($tticket_id);
		redirect(site_url('T_Ticket'), 'refresh');
	}

	public function Detail($tticket_id)
	{
		$detail = $this->M_t_ticket->Detail($tticket_id);
		$this->output->set_content_type('aplication/json')
			->set_output(json_encode($detail));
	}

	public function Note_check($tbooking_no)
	{
		$check = $this->M_t_ticket->Note_check($tbooking_no);
		$this->output->set_content_type('aplication/json')
			->set_output(json_encode($check));
	}

	public function Cetak($tbooking_no)
	{
		$data['booking'] = $this->M_t_ticket->get_topdf($tbooking_no);
		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'lanscape');
		$this->pdf->filename = "ticket.pdf";
		$this->pdf->load_view('v_ticketpdf', $data);
	}
}
