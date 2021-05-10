<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_group extends CI_Model
{
    private $table = 'r_moments';

    public function all()
    {
        return $this->db->get($this->table);
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, ['rmoment_id' => $id]);
    }

    public function save($set, int $id = null)
    {
        if($id){
            $this->db->update($this->table, $set, ['rmoment_id' => $id]);
        } else {
            $this->db->insert($this->table, $set);
        }
    }

    public function destroy(int $id)
    {
        $this->db->delete($this->table, ['rmoment_id' => $id]);
    }
}
