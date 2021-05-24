<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_booking extends CI_Model
{
    private $table = 't_booking';

    public function all()
    {
        return $this->db->get($this->table);
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, ['tbooking_id' => $id]);
    }

    public function save($set, int $id = null)
    {
        if($id){
            $this->db->update($this->table, $set, ['tbooking_id' => $id]);
        } else {
            $this->db->insert($this->table, $set);
        }
    }

    public function destroy(int $id)
    {
        $this->db->delete($this->table, ['tbooking_id' => $id]);
    }

    function search_mdestinasi($title){
        $this->db->like('mdestinasi_nama', $title , 'both');
        $this->db->order_by('rticket_id', 'ASC');
        return $this->db->get('v_r_ticket')->result();
    }

    public function get_ticket($id)
    {
        $this->db->select('rticket_id, mdestinasi_nama, rticket_harga, rvarianticket_nama');
        $this->db->join('m_destinasi', 'm_destinasi.mdestinasi_id = r_ticket.mdestinasi_id');
        $this->db->join('r_varianticket', 'r_varianticket.rvarianticket_id = r_ticket.rvarianticket_id');
		$this->db->where('rticket_id',$id);
		return $this->db->get('r_ticket')->row();
    }

    public function get_booking()
    {
        $this->db->join('sys_user', 'sys_user.userId = t_booking.sysuser_id');
        $this->db->join('r_ticket', 'r_ticket.rticket_id = t_booking.rticket_id');
		return $this->db->get($this->table);
    }
}
