<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User_Authentication extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Load database
		$this->load->model('authenticate');
	}

	// Show login page
	public function index() {
		$this->load->view('layouts/header-script');
		$this->load->view('auth/login_form');
		$this->load->view('layouts/footer-script');
	}

	// Show registration page
	public function user_registration_show() {
		$this->load->view('layouts/header-script');
		$this->load->view('auth/registration_form');
		$this->load->view('layouts/footer-script');

	}

	// Validate and store registration data in database
	public function new_user_registration() {
		$this->load->view('layouts/header-script');
		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('userphone', 'userphone', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/registration_form');
		} else {
			$data = array(
				'user_name' => $this->input->post('username'),
				'user_email' => $this->input->post('email_value'),
				'user_password' => md5($this->input->post('password')),
				'user_phone' => $this->input->post('userphone')
				);
			$result = $this->authenticate->registration_insert($data);
			if ($result == TRUE) {
				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('auth/login_form', $data);
			} else {
				$data['message_display'] = 'Username already exist!';
				$this->load->view('auth/registration_form', $data);
			}
		}
		$this->load->view('layouts/footer-script');
	}

	// Check for user login process
	public function user_login_process() {
		$this->load->view('layouts/header-script');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('play-game/index');
			}else{
				$this->load->view('auth/login_form');
			}
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);
			$result = $this->authenticate->login($data);
			if ($result == TRUE) {

				$username = $this->input->post('username');
				$result = $this->authenticate->read_user_information($username);
				if ($result != false) {
					$session_data = array(
						'username' => $result[0]->user_name,
						'email' => $result[0]->user_email,
						);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					$this->load->view('play-game/index');
				}
			} else {
				$data = array(
					'error_message' => 'Invalid Username or Password'
					);
				$this->load->view('auth/login_form', $data);
				$this->load->view('layouts/footer-script');
			}
		}
	}

	// Logout from admin page
	public function logout() {
		$this->load->view('layouts/header-script');
		// Removing session data
		$sess_array = array(
			'username' => ''
			);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('auth/login_form', $data);
		$this->load->view('layouts/footer-script');
	}

}

?>