<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('M_sys_users_admin');
        $this->load->helper('captcha');
    }

	public function index()
	{
		$this->satpam->no_ajax();
        $options = array(
            'img_path'  => './captcha/',
            'img_url'   => base_url('captcha'),
            'img_width' => '150',
            'img_height'=> '35',
            'expiration'=> 7200,
            'font_path' => base_url('system/fonts/texb.ttf'),
            'pool'      => '23456789abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ',
        
            # atur warna captcha
            'colors' => array(
                    'background' => array(242, 242, 242),
                    'border' => array(255, 255, 255),
                    'text' => array(0, 0, 0),
                    'grid' => array(255, 40, 40))
                    // 'grid' => array(255, 40, 255))
                    // 'grid' => array(40, 40, 255))
            );
        $cap = create_captcha($options);
        $data['image'] = $cap['image'];
        $this->session->set_userdata('mycaptcha', $cap['word']);
        $data['word'] = $this->session->userdata('mycaptcha');

        $this->load->view('template/header');
        $this->load->view('Login', $data);
	}

    public function check_login()
    {
        $this->load->library('form_validation');
		$this->load->helper('form');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('captcha', 'Captcha', 'required');
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

                    $captcha = $this->input->post('captcha');
                    if ($captcha === $this->session->userdata('mycaptcha')) {
                        $this->load->view('template/header');
                        $this->load->view('template/navbar');
                        $this->load->view('template/sidebar');
                        $this->load->view('Main');
                        $this->load->view('template/footer');
                    }else {
                        $this->session->set_flashdata('message', 'Captcha tidak sesuai!!!');
                        $this->index();
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
