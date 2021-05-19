<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		// $this->satpam->jaga();
		$this->satpam->no_ajax();
		$this->load->library('form_validation');
		$this->load->helper('form');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header');
			$this->load->view('Login');
        } else {
			$this->load->model('M_sys_user');

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $result = $this->M_sys_user->CustomFind(['email' => $email]);
            if ($result->num_rows() < 1) {
                $this->session->set_flashdata('message', 'Akun tidak terdaftar');

                $this->load->view('template/header');
				$this->load->view('Login');
            } else {
				$user =  $result->row_array();
                if (password_verify($password, $user['password'])) {
                    $this->session->set_userdata('userId', $user['userId']);
                    $this->load->view('template/header');
					$this->load->view('template/navbar');
					$this->load->view('template/sidebar');
					$this->load->view('Main');
					$this->load->view('template/footer');
                } else {
                    $this->session->set_flashdata('message', 'Username atau Password tidak cocok');

                    $this->load->view('template/header');
					$this->load->view('Login');
                }
			}
		}
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }
}
