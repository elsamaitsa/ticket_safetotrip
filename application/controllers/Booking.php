<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->satpam->jaga();
		$this->load->model('M_booking');
	}

	public function index()
	{
		$data['booking'] = $this->M_booking->get_booking()->result_array();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('v_ListBooking', $data);
        $this->load->view('template/footer');
	}

	public function create()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('rticket_id', 'Tempat Wisata', 'required');
        $this->form_validation->set_rules('tbooking_jumlah', 'Jumlah Ticket', 'required');
        $this->form_validation->set_rules('tbooking_total', 'Total Biaya', 'required');
        $this->form_validation->set_rules('tbooking_date_booking', 'Tanggal Booking', 'required');
        $this->form_validation->set_rules('tbooking_date_visited', 'Tanggal Visit', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('template/sidebar');
			$this->load->view('v_AddBooking');
			$this->load->view('template/footer');
		}else{
			$total = $this->input->post('tbooking_total');
			$tbooking_total = preg_replace("/[^0-9]/","",$total);

			$set = [
				'rticket_id' => $this->input->post('rticket_id'),
				'tbooking_no' => $this->input->post('tbooking_no'),
				'tbooking_jumlah' => $this->input->post('tbooking_jumlah'),
				'tbooking_total' => $tbooking_total,
				'tbooking_date_booking' => $this->input->post('tbooking_date_booking'),
				'tbooking_date_visited' => $this->input->post('tbooking_date_visited'),
				'sysuser_id' =>$this->session->userdata('userId'),
			];
			$this->M_booking->save($set);

			$jumlah = $this->input->post('tbooking_jumlah');
            $no_booking = $this->input->post('tbooking_no');
			for($i = 0; $i < $jumlah; $i++){
				$transaksi[$i] = [
					'tbooking_no' => $no_booking++
				];
			}
			if (!empty($transaksi)) {
				$this->db->insert_batch('t_ticket', $transaksi);
			}
			redirect('Booking', 'refresh');
		}
	}

	function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_booking->search_mdestinasi($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
				$arr_result[] = array(
                    'label'         => $row->rticket_id . ' - ' . $row->mdestinasi_nama . ' - ' . $row->rvarianticket_nama,
                    'rticket_id'   => $row->rticket_id,
             	);
			 	echo json_encode($arr_result);
            }
        }
    }

	public function totalBiaya($rticket_id)
	{
		$ticket = $this->M_booking->get_ticket($rticket_id);
		$this->output->set_content_type('aplication/json')
            ->set_output(json_encode($ticket));
	}
}
?>