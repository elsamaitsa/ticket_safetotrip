<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('M_sys_user_token');
        $this->load->model('M_sys_users_admin');
        $this->load->library(['form_validation', 'Recaptcha']);
    }

	public function index()
	{
		$this->satpam->no_ajax();
        $data['captcha'] = $this->recaptcha->getWidget();
        $data['error_message'] = $this->session->flashdata('error_message');
        $data['sukses'] = $this->session->flashdata('success_message');

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
                $this->session->set_flashdata('error_message', 'Akun tidak terdaftar');
                $this->index();
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
                    $this->session->set_flashdata('error_message', 'Username atau Password tidak cocok!!!');
                    $this->index();
                }
			}
		}
    }

    public function reset_password()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->index();
        }else {
            $email = $this->input->post('email');
            $user = $this->M_sys_users_admin->CustomFind(['email' => $email])->row_array();

            if($user){
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => date('Y-m-d H:i'),
                ];
                $this->M_sys_user_token->save($user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('success_message', 'Silahkan cek email untuk ganti password!');
                $this->index();
                
            }else{
                $this->session->set_flashdata('error_message', 'Email tidak terdaftar');
                $this->index();
            }
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'bengkelaplikasi1620@gmail.com',
            'smtp_pass' => 'b4pl1010620',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);

        $this->email->from('bengkelaplikasi1620@gmail.com', 'Admin Ticketing');
        $this->email->to($this->input->post('email'));

        if ($type == 'forgot') {
            $this->email->subject('Ganti Password');
            $this->email->message(
                'Klik link ini untuk mengganti password : 
                <a href="' . base_url() . 'Login/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Ganti Password</a>'
            );
        }

        if ($this->email->send(false)) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        
        $user = $this->M_sys_users_admin->CustomFind(['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->M_sys_user_token->CustomFind(['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('error_message', 'Gagal reset password, token sudah tidak berlaku');
                $this->index();
            }
        } else {
            $this->session->set_flashdata('error_message', 'Gagal Reset Password karena email tidak sesuai');
            $this->index();
        }
    }

    public function changePassword()
    {
        $this->load->library('form_validation');

        if (!$this->session->userdata('reset_email')) {
            $this->session->set_flashdata('error_message', 'Gagal Reset Password');
            $this->index();
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['error_message'] = $this->session->flashdata('error_message');
            $this->load->view('template/header');
            $this->load->view('v_ChangePassword', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->select('userId');
            $this->db->where('email', $email);
            $user = $this->M_sys_users_admin->all()->row_array()['userId'];
            
            $set = [
                'password' => $password
            ];
            $this->M_sys_users_admin->save($set, $user);

            $this->session->unset_userdata('reset_email');
            $this->M_sys_user_token->destroy($email);

            $this->session->set_flashdata('success_message', 'Password Berhasil Dirubah, Silahkan Login');
            $this->index();
        }
    }

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }
}
