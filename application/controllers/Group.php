<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->satpam->jaga();
        $this->load->model('M_group');
    }
	
	public function index()
	{
		$data['group'] = $this->M_group->all()->result_array();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('v_ListGroup', $data);
        $this->load->view('template/footer');
	}

	public function store()
	{
		$set = [
			'rmoment_name' => $this->input->post('rmoment_name'),
		];
		$this->M_group->save($set);
		redirect('Group', 'refresh');
	}

	public function edit(int $id)
	{
		$group = $this->M_group->find($id)->row_array();
		$this->output->set_content_type('aplication/json')
			 ->set_output(json_encode($group));
	}

	public function update(int $id)
	{
		$set = [
			'rmoment_name' => $this->input->post('rmoment_name'),
		];
		$this->M_group->save($set, $id);
		redirect('Group', 'refresh');
	}

	public function destroy(int $id)
	{
		$this->M_group->destroy($id);
		redirect('Group', 'refresh');
	}
}

?>