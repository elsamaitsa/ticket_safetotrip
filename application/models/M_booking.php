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
        return $this->db->get_where('v_t_booking', ['tbooking_id' => $id]);
    }

    public function save($set, int $id = null)
    {
        if($id){
            $this->db->update($this->table, $set, ['tbooking_id' => $id]);
        } else {
            $this->db->insert($this->table, $set);
        }
    }

    public function save_visitors($set, $id = null)
    {
        if($id){
            $this->db->update('r_visitors', $set, ['rvisitors_id' => $id]);
        } else {
            $this->db->insert('r_visitors', $set);
        }
    }

    public function destroy(int $id)
    {
        $this->db->delete($this->table, ['tbooking_id' => $id]);
    }
    public function destroy_visitor($id)
    {
        $this->db->delete('r_visitors', ['rvisitors_id' => $id]);
    }
    public function destroy_ticket($id)
    {
        $this->db->delete('t_ticket', ['tbooking_no' => $id]);
    }

    function search_mdestinasi($title){
        $this->db->like('mdestinasi_nama', $title , 'both');
        $this->db->order_by('rticket_id', 'ASC');
        $this->db->limit(10);
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
        $this->db->join('r_visitors', 'r_visitors.rvisitors_id = t_booking.rvisitors_id');
        $this->db->join('sys_users', 'sys_users.userId = t_booking.sysuser_id');
        $this->db->join('r_ticket', 'r_ticket.rticket_id = t_booking.rticket_id');
		return $this->db->get($this->table);
    }

    public function save_batch_visitors($data)
    {
        return $this->db->insert_batch('r_visitors', $data);
    }
    
    public function save_batch_booking($data)
    {
        return $this->db->insert_batch('t_booking', $data);
    }

    public function save_batch_ticket($data)
    {
        return $this->db->insert_batch('t_ticket', $data);
    }

    function search_nama($name){
		$this->db->like('name', $name, 'both');
		$this->db->order_by('name', 'ASC');
		$this->db->limit(10);
		return $this->db->get('sys_users')->result();
	}

    public function createID(){
		$this->db->select('RIGHT(.tbooking_no,4) as id', FALSE);
		$this->db->order_by('tbooking_no','DESC');
		$this->db->limit(1);
		$query = $this->db->get('t_booking');
		if($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->id) + 1;
		}else{
			$kode = 1;
		}

        $date = new \Datetime('now');

		$kodemax = str_pad($kode,4,"0", STR_PAD_LEFT);
		$kodejadi = $date.$kodemax;
		return $kodejadi;
	}
}
