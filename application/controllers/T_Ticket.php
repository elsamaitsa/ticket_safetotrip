<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_Ticket extends CI_Controller {

	public function index()
	{
		$this->satpam->jaga();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('v_List_TTicket');
        $this->load->view('template/footer');
	}
}
?>