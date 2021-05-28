<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sys_user extends CI_Model
{
    private $table = 'sys_users';

    public function all()
    {
        return $this->db->get($this->table);
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, ['userId' => $id]);
    }

    public function CustomFind(array $attr)
    {
        return $this->db->get_where($this->table, $attr);
    }

    public function save($set, int $id = null)
    {
        if($id){
            $this->db->update($this->table, $set, ['userId' => $id]);
        } else {
            $this->db->insert($this->table, $set);
        }
    }

    public function destroy(int $id)
    {
        $this->db->delete($this->table, ['userId' => $id]);
    }
}
