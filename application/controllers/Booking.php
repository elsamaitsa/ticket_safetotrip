<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->satpam->jaga();
		$this->load->model('M_booking');
		$this->load->model('M_group');
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

	public function create_id(){
		$id = $this->M_booking->createID();
		echo json_encode($id);
	}

	public function create()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

        $this->form_validation->set_rules('rticket_id', 'Ticket Wisata', 'required');
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
			$userId = $this->input->post('userId');
			$visitors_id = $this->input->post('visitors_id');
			$visitors_nama = $this->input->post('visitors_nama');
			$visitors_nohp = $this->input->post('visitors_nohp');
			$visitors_email = $this->input->post('visitors_email');
			$rticket_id = $this->input->post('rticket_id');
			$tbooking_no = $this->input->post('tbooking_no');
			$tbooking_total = $this->input->post('tbooking_total') / $this->input->post('tbooking_jumlah');
			$tbooking_jumlah = $this->input->post('tbooking_jumlah');
			$tbooking_date_visited = $this->input->post('tbooking_date_visited');
			$tbooking_date_booking = $this->input->post('tbooking_date_booking');

			for ($i = 0; $i < $tbooking_jumlah; $i++) { 
				$visitors[] = [
					'rvisitors_id' => $visitors_id['input'][$i],
					'rvisitors_nama' => $visitors_nama['input'][$i],
					'rvisitors_nohp' => $visitors_nohp['input'][$i],
					'rvisitors_email' => $visitors_email['input'][$i],
				];

				$booking[] = [
					'tbooking_no' => $tbooking_no['input'][$i],
					'tbooking_date_booking' => $tbooking_date_booking,
					'tbooking_date_visited' => $tbooking_date_visited,
					'tbooking_jumlah' => 1,
					'tbooking_total' => $tbooking_total,
					'sysuser_id' => $userId,
					'rticket_id' => $rticket_id,
					'rvisitors_id' => $visitors_id['input'][$i],
				];

				$transaksi[] = [
					'tbooking_no' => $tbooking_no['input'][$i],
				];
			}
			$this->M_booking->save_batch_visitors($visitors);
			$this->M_booking->save_batch_booking($booking);
			$this->M_booking->save_batch_ticket($transaksi);
			redirect('Booking', 'refresh');
		}
	}

	function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_booking->search_mdestinasi($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
				$arr_result[] = array(
                    'label'         => $row->rticket_id . ' - ' . $row->mdestinasi_nama . ' - ' . $row->rvarianticket_nama . ' - ' . $row->rmoment_name,
                    'rticket_id'   => $row->rticket_id,
             	);
			 	echo json_encode($arr_result);
            }
        }
    }

	function get_autocomplete_nama(){
        if(isset($_GET['term'])){
            $result = $this->M_booking->search_nama($_GET['term']);
            if(count($result) > 0){
                foreach($result as $row)
                    $arr_result[] = array(
                        'label' => $row->name,
                        'value' => $row->name,
                        'userId' => $row->userId 
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

	public function destroy($tbooking_id)
	{	
		$ticket = $this->M_booking->find($tbooking_id)->row_array();
		$this->M_booking->destroy_visitor($ticket['rvisitors_id']);
		$this->M_booking->destroy_ticket($ticket['tbooking_no']);
		$this->M_booking->destroy($tbooking_id);
		redirect('Booking', 'refresh');
	}

	public function edit($tbooking_id)
	{
		$booking = $this->M_booking->find($tbooking_id)->row_array();
		$this->output->set_content_type('aplication/json')
			 ->set_output(json_encode($booking));
	}

	public function update($tbooking_id)
	{
		$ticket = $this->M_booking->find($tbooking_id)->row_array();
		$booking = [
			'rticket_id' => $this->input->post('rticket_id'),
			'sysuser_id' => $this->input->post('userId'),
			'tbooking_total' => $this->input->post('tbooking_total'),
			'tbooking_date_visited' => $this->input->post('tbooking_date_visited'),
		];

		$visitors = [
			'rvisitors_nama' => $this->input->post('rvisitors_nama'),
			'rvisitors_nohp' => $this->input->post('rvisitors_nohp'),
			'rvisitors_email' => $this->input->post('rvisitors_email'),
		];

		$this->M_booking->save_visitors($visitors, $ticket['rvisitors_id']);
		$this->M_booking->save($booking, $tbooking_id);
		redirect('Booking', 'refresh');
	}
}
?>