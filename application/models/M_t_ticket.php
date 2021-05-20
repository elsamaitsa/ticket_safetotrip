<?php
defined('BASEPATH') or die('Tidak Boleh Akses Langsung');

class M_t_ticket extends CI_model
{
    private $table = 't_ticket';

    public function get_all()
    {
        $this->db->order_by('tticket_id');
        $sql = $this->db->get($this->table);
        return $sql->result_array();
    }

    public function Delete($tticket_id)
    {
        $this->db->where('tticket_id', $tticket_id);
        $this->db->delete($this->table);
    }

    public function Update()
    {
        $data = array(
            'tticket_status' => $_POST['status'],
        );
        $this->db->where('tticket_id',  $_POST['id_Tticket']);
        $this->db->update($this->table, $data);
    }

    public function CheckTicket()
    {
        $tgl  = date("Y-m-d");
    }
}
