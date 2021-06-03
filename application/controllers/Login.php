<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('M_sys_users_admin');
        $this->load->library(array('form_validation', 'Recaptcha'));
    }

	public function index()
	{
		$this->satpam->no_ajax();
        $data['captcha'] = $this->recaptcha->getWidget();

        $this->load->view('template/header');
        $this->load->view('Login', $data);
	}

    public function check_login()
    {
        $this->load->library('form_validation');
		$this->load->helper('form');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $result = $this->M_sys_users_admin->CustomFind(['email' => $email]);
            if ($result->num_rows() < 1) {
                $this->session->set_flashdata('message', 'Akun tidak terdaftar');

                $this->load->view('template/header');
				$this->load->view('Login');
            } else {
				$user =  $result->row_array();
                if (password_verify($password, $user['password'])) {
                    $this->session->set_userdata('userId', $user['userId']);
                    $this->session->set_userdata('mdestinasi_id', $user['mdestinasi_id']);

                    $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
                    $userIp=$this->input->ip_address(); 
                    $secret='6LeZMgsbAAAAAC6xRLqUX6AVcTI_CpL1PQrAtwZa';
                    
                    $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp), true);
                    if($response['success'] == false)
                    {
                        $this->index();
                    }else{
                        $this->load->view('template/header');
                        $this->load->view('template/navbar');
                        $this->load->view('template/sidebar');
                        $this->load->view('Main');
                        $this->load->view('template/footer');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Username atau Password tidak cocok!!!');
                    $this->index();
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
