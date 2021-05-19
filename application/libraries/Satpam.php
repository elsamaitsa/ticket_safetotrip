<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Satpam
{
    /**
     * Codeigniter super-object
     * 
     * @var $CI
     */
    protected $CI;

    /**
     * Fungsi yang di panggil pertamakali
     * 
     * Digunakan untuk meng-assign CI super-object
     */
    public function __construct()
    {
        $this->CI = &get_instance();
    }

    /**
     * Kerahkan satpam
     * 
     * Beri perintah pada satpam untuk berjaga terhadap user yang belum login
     * 
     * Disarankan di panggil pada awal controller untuk keamanan.
     * 
     * @return void
     */
    public function jaga()
    {
        // Jika user sudah login
        if (
            $this->CI->session->userdata('userId')
        ) {
            return;
        } else {
            if ($this->CI->input->is_ajax_request()) redirect('login', 'auto', 403);
            redirect('login');
        }
    }

    /**
     * Request harus dengan ajax
     * 
     * @return void
     */
    public function ajax()
    {
        if (!$this->CI->input->is_ajax_request()) { // Harus lewat ajax
            $this->CI->output->set_status_header(403);
            exit;
        }
    }

    /**
     * Request tidak boleh dengan ajax
     * 
     * @return void
     */
    public function no_ajax()
    {
        if ($this->CI->input->is_ajax_request()) { // Tidak boleh lewat ajax
            $this->CI->output->set_status_header(403);
            exit;
        }
    }
}
