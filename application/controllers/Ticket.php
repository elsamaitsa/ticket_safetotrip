<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_ticket','ticket');
		$this->load->library('session');
	}

	public function index()
	{
		$data['type'] = $this->ticket->get_type()->result();
		$data['group'] = $this->ticket->get_group()->result();
		$data['id'] = $this->ticket->createID();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('v_ListTicket',$data);
        $this->load->view('template/footer');
	}

	public function list_ticket()
	{
		$list = $this->ticket->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $ticket) {
			$no++;
			$row = array();
			$row[] = $ticket->rticket_id;
			$row[] = $ticket->rticket_harga;
			$row[] = $ticket->rvarianticket_id;
			$row[] = $ticket->rmoment_id;
			$row[] = $ticket->mdestinasi_id;

			//add html for action
			$row[] = '<a class="btn btn-outline-info btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_ticket('."'".$ticket->rticket_id."'".')"><i class="fa fa-edit"></i></a>
				  <a class="btn btn-outline-danger btn-sm" href="javascript:void(0)" title="Hapus" onclick="delete_ticket('."'".$ticket->rticket_id."'".')"><i class="fa fa-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->ticket->count_all(),
						"recordsFiltered" => $this->ticket->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	// public function edit_ticket($id)
	// {
	// 	$data = $this->ticket->get_by_id($id);
	// 	// $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
	// 	echo json_encode($data);
	// }

	function get_autocomplete_destinasi(){
        if(isset($_GET['term'])){
            $result = $this->ticket->search_destinasi($_GET['term']);
            if(count($result) > 0){
                foreach($result as $row)
                    $arr_result[] = array(
                        'label' => $row->mdestinasi_nama,
                        'value' => $row->mdestinasi_nama,
                        'mdestinasi_id' => $row->mdestinasi_id 
                    );
                echo json_encode($arr_result);
            }
        }
    }

	public function cek_ticket(){
		// $this->_validate();
		$id = $this->input->post('rticket_id');
		$type = $this->input->post('rvarianticket_id');
		$group = $this->input->post('rmoment_id');
		$wisata = $this->input->post('mdestinasi_id');

		$cek = $this->ticket->cek_ticket($id, $type, $group, $wisata);
		if($cek > 0){
			echo "ok";
		}
	}

	public function add_ticket()
	{
		// $this->_validate();
		$data = array(
				'rticket_id' => $this->input->post('rticket_id'),
				'rticket_harga' => $this->input->post('rticket_harga'),
				'rvarianticket_id' => $this->input->post('rvarianticket_id'),
				'rmoment_id' => $this->input->post('rmoment_id'),
				'mdestinasi_id' => $this->input->post('mdestinasi_id')
			);
		$insert = $this->ticket->save_ticket($data);
		echo json_encode(array("status" => TRUE));
	}

	// public function update_indikator()
	// {
	// 	$this->_validate();
	// 	$data = array(
	// 			'mindikator_id' => $this->input->post('mindikator_id'),
	// 			'mindikator_desk' => $this->input->post('mindikator_desk'),
	// 			'rgroup_id' => $this->input->post('rgroup_id')
	// 		);
	// 	$this->indikator->update(array('mindikator_id' => $this->input->post('mindikator_id')), $data);
	// 	echo json_encode(array("status" => TRUE));
	// }

	// public function delete_indikator($mindikator_id)
	// {
	// 	$this->indikator->delete_by_id($mindikator_id);
	// 	echo json_encode(array("status" => TRUE));
	// }
	
}

?>