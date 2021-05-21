<?php
defined('BASEPATH') or die('Tidak Boleh Akses Langsung');

class M_t_ticket extends CI_model
{
    private $table = 't_ticket';
    private $table_jadwal = 'r_jadwal';

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
        date_default_timezone_set("Asia/Jakarta");
        $daftar_hari = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        );

        $date_now = date("Y-m-d");
        $day_now = $daftar_hari[date("l")];
        $time_now = date("H:i:s");

        $this->db->select('rjadwal_end_time');
        $this->db->where('rjadwal_hari', $day_now);
        $jadwal_tutup = $this->db->get($this->table_jadwal)->row_array()['rjadwal_end_time'];

        $this->db->select('tticket_id');
        $this->db->join('t_booking', 't_booking.tbooking_no = t_ticket.tbooking_no');
        $this->db->where('tbooking_date_visited <=', $date_now);
        $this->db->where('tticket_status', 'dipesan');
        $data_ticket = $this->db->get($this->table)->result_array();

        if ($data_ticket != null && $time_now >= $jadwal_tutup) {
            foreach ($data_ticket as $value) {
                $updateArray[] = array(
                    'tticket_id' => $value['tticket_id'],
                    'tticket_status' => 'hangus',
                );
            }
            $this->db->update_batch($this->table, $updateArray, 'tticket_id');
        }
    }

    public function Detail($tticket_id)
    {
        $this->db->select('t_booking.tbooking_no,
                           t_ticket.tticket_status,
                           t_booking.tbooking_date_booking,
                           t_booking.tbooking_date_visited');
        $this->db->join('t_booking', 't_booking.tbooking_no = t_ticket.tbooking_no');
        $this->db->where('tticket_id', $tticket_id);
        $sql = $this->db->get($this->table);
        return $sql->row_array();
    }
}
