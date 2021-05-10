<?php
defined('BASEPATH') or die('Tidak Boleh Akses Langsung');

class M_layanan extends CI_model
{

    public function view_layanan()
    {
        $this->db->order_by('id');
        $sql = $this->db->get('r_service_ticket');
        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        }
    }

    public function Insert()
    {
        $data = array(
            'nama_service_ticket' => $_POST['service'],
        );
        $this->db->insert('r_service_ticket', $data);
    }

    public function Delete($rservice_id)
    {
        $this->db->where('id', $rservice_id);
        $this->db->delete('r_service_ticket');
    }

    public function Update()
    {
        $data = array(
            'nama_service_ticket' => $_POST['service'],
        );
        $this->db->where('id',  $_POST['id_service']);
        $this->db->update('r_service_ticket', $data);
    }
}
