<?php
defined('BASEPATH') or die('Tidak Boleh Akses Langsung');

class M_jadwal extends CI_model
{

    public function view_jadwal()
    {
        $this->db->order_by('rjadwal_id');
        $sql = $this->db->get('r_jadwal');
        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        }
    }

    public function Insert()
    {
        $data = array(
            'rjadwal_hari' => $_POST['hari'],
            'rjadwal_start_time' => $_POST['start_time'],
            'rjadwal_end_time' => $_POST['end_time'],
        );
        $this->db->insert('r_jadwal', $data);
    }

    public function Delete($rjadwal_id)
    {
        $this->db->where('rjadwal_id', $rjadwal_id);
        $this->db->delete('r_jadwal');
    }

    public function Update()
    {
        $data = array(
            'rjadwal_hari' => $_POST['hari'],
            'rjadwal_start_time' => $_POST['start_time'],
            'rjadwal_end_time' => $_POST['end_time'],
        );
        $this->db->where('rjadwal_id',  $_POST['rjadwal_id']);
        $this->db->update('r_jadwal', $data);
    }
}
