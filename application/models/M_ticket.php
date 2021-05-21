<?php

class M_ticket extends CI_Model{
	var $table = 'r_ticket';
	// var $view = 'v_kpi';
	var $column_order = array('rticket_id','rticket_harga','rvarianticket_id','rmoment_id','mdestinasi_id','rjadwal_id'); //set column field database for datatable orderable
	var $column_search = array('rticket_harga'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('rticket_id' => 'asc'); // default order 

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($rticket_id)
	{
		$this->db->from('v_combo_kpi');
		$this->db->where('rticket_id',$rticket_id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save_ticket($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($tkpi_id)
	{
		$this->db->where('tkpi_id', $tkpi_id);
		$this->db->delete($this->table);
	}

	public function createID(){
		$this->db->select('RIGHT(r_ticket.rticket_id,4) as id', FALSE);
		$this->db->order_by('rticket_id','DESC');
		$this->db->limit(1);
		$query = $this->db->get('r_ticket');
		if($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->id) + 1;
		}else{
			$kode = 1;
		}

		$kodemax = str_pad($kode,4,"0", STR_PAD_LEFT);
		$kodejadi = "TKT".$kodemax;
		return $kodejadi;
	}

    public function get_type(){
		$query = $this->db->get('r_varianticket');
		return $query;
	}

    public function get_group(){
		$query = $this->db->get('r_moments');
		return $query;
	}

	public function cek_ticket($id, $type, $group, $wisata){
		$this->db->where('rticket_id', $id);
		$this->db->where('rvarianticket_id',$type);
		$this->db->where('rmoment_id',$group);
		$this->db->where('mdestinasi_id',$wisata);
		$query = $this->db->get('r_ticket');
		return $query->num_rows();
	}

	function search_destinasi($mdestinasi_nama){
		$this->db->like('mdestinasi_nama', $mdestinasi_nama, 'both');
		$this->db->order_by('mdestinasi_nama', 'ASC');
		$this->db->limit(10);
		return $this->db->get('m_destinasi')->result();
	}

	// // function getIndikator($rgroup_id){
	// // 	$query = $this->db->get_where('m_indikator',array('rgroup_id'=>$rgroup_id));
	// // 	return $query;
	// // }

	// function getIndikator($sysuser_id){
	// 	$query = $this->db->get_where('v_target',array('sysuser_id'=>$sysuser_id));
	// 	return $query;
	// }

	// public function save_batch($data){
	// 	return $this->db->insert_batch('t_kpi', $data);
	// }

	// function getDataTarget($mindikator_id,$sysuser_id){
	// 	$query = $this->db->get_where('v_target',array('mindikator_id'=>$mindikator_id, 'sysuser_id'=>$sysuser_id));
	// 	return $query;
	// }

	// function getDataTBobot($mindikator_id,$sysuser_id){
	// 	$query = $this->db->get_where('v_tbobot',array('mindikator_id'=>$mindikator_id, 'sysuser_id'=>$sysuser_id));
	// 	return $query;
	// }
}
?>