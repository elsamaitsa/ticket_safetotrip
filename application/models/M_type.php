<?php
defined('BASEPATH') or die('Tidak Boleh Akses Langsung');

class M_type extends CI_model
{

    public function view_type()
    {
        $this->db->order_by('rvarianticket_id');
        $sql = $this->db->get('r_varianticket');
        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        }
    }

    public function Insert()
    {
        $data = array(
            'rvarianticket_type' => $_POST['type'],
            'rvarianticket_nama' => $_POST['nama'],
        );
        $this->db->insert('r_varianticket', $data);
    }

    public function Delete($rvarianticket_id)
    {
        $this->db->where('rvarianticket_id', $rvarianticket_id);
        $this->db->delete('r_varianticket');
    }

    public function Update()
    {
        $data = array(
            'rvarianticket_type' => $_POST['type'],
            'rvarianticket_nama' => $_POST['nama'],
        );
        $this->db->where('rvarianticket_id',  $_POST['rvarianticket_id']);
        $this->db->update('r_varianticket', $data);
    }
}
