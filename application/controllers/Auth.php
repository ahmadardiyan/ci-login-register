<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}

	public function login(){

		if (isset($_SESSION['login'])) {
			redirect('profile','refresh');
		}

		// echo "email : ";
		// var_dump($this->input->post('email'));
		// echo "password : ";
		// var_dump($this->input->post('password'));

		$this->form_validation->set_rules('email' , 'Email' , 'required|callback_checkEmail|callback_checkRole');
		$this->form_validation->set_rules('password' , 'Password' , 'required|callback_checkPassword');

		if ($this->form_validation->run()===FALSE) {
			$data['judul'] = 'Login CI Web';

			$this->load->view('template/header',$data);
			$this->load->view('auth/login');
			$this->load->view('template/footer');
		} else {
			$user = $this->User_model->get_user('email',$this->input->post('email'));

			$_SESSION['id'] = $user['id'];
			$_SESSION['login'] = TRUE;

			redirect('profile','refresh');
		}
	}

	public function checkEmail($email){
		if (!$this->User_model->get_user('email',$email)) {
			$this->form_validation->set_message('checkEmail','Email belum terdaftar!');
			return false;
		}
		return true;
	}

	public function checkPassword($password){
		$user = $this->User_model->get_user('email',$this->input->post('email'));

		if (!$this->User_model->checkPassword($user['email'],$password)) {
			$this->form_validation->set_message('checkPassword','Password yang dimasukkan salah!');
			return false;
		}
		return true;
	}

	public function checkRole($email){
		$user = $this->User_model->get_user('email',$this->input->post('email'));

		if ($user['role'] != 1) {
			$this->form_validation->set_message('checkRole','Email belum diverifikasi!');
			return false;
		}
		return true;
	}



	public function logout(){
		unset($_SESSION['id'],$_SESSION['login']);
		redirect('login','refresh');
	}

	public function registrasi(){
		$data['judul'] = 'Registrasi CI Web';
		
		$this->form_validation->set_rules('email' , 'Email' , 'required|is_unique[users.email]');
		$this->form_validation->set_rules('password' , 'Password' , 'required');
		$this->form_validation->set_rules('confrimpassword' , 'Konfirmasi Password' , 'required|matches[password]');
		$this->form_validation->set_rules('checkbox' , 'Checkbox' , 'required');

		// $data['user'] = $this->Auth_model->registrasi();
		if ($this->form_validation->run()===FALSE){
			$this->load->view('template/header',$data);
			$this->load->view('auth/registrasi');
			$this->load->view('template/footer');
		} else {
			$this->User_model->insert_data(); //menyimpan data
			$this->send_email_verification($this->input->post('email'), $_SESSION['token']); //verifikasi email
			redirect('login');
		}
	}

	public function send_email_verification($email,$token){
		$this->load->library('email'); //mengaktifkan library email
		$this->email->from('ahmadardiyanto23@gmail.com','Ahmad Ardiyanto');
		$this->email->to($email);
		$this->email->subject('Verifikasi Email CI Web');
		$this->email->message("
			Klik untuk verifikasi pendaftaran <a href='http://localhost/ci-login-registrasi/verify_register/$email/$token'>Verifikasi Email</a>");
		$this->email->set_mailtype('html');
		$this->email->send();
	}

	public function verify_register($email,$token){
		$user = $this->User_model->get_user('email',$email);

		if (!$user) {
			die("Email tidak ditemukan");
		}//cek email

		if($user['token'] !== $token){
			die("Token tidak sesuai");
		}//cek token

		$this->User_model->update_role($user['id'],1);//update role bedasarkan id

		$_SESSION['id'] = $user['id']; //set session
		$_SESSION['login'] =  true;

		redirect('profile');//redirect profile
	}

	public function forgotPassword(){
		
		$this->form_validation->set_rules('email' , 'Email' , 'required|callback_checkEmail|callback_checkRole');

		if ($this->form_validation->run()===FALSE){
			$data['judul'] = 'Lupa Password';

			$this->load->view('template/header',$data);
			$this->load->view('auth/forgot_password');
			$this->load->view('template/footer');
		// $user = $this->User_model->get_user
		} else {
			$user = $this->User_model->get_user('email',$this->input->post('email'));
			// var_dump($user['email']);
			// var_dump($user['token']);
			// die();

			$this->sendEmailNewPassword($user['email'],$user['token']);
			redirect('login');
		}
	}

	public function sendEmailNewPassword($email,$token){
		$this->load->library('email');
		$this->email->from('ahmadardiyanto23@gmail.com','Ahmad Ardiyanto');
		$this->email->subject('Pebaruan Password');
		$this->email->to($email);
		$this->email->message("
			Klik untun pebaruan password <a href='http://localhost/ci-login-registrasi/newPassword/$email/$token'>Perbarui Password</a>
			");
		$this->email->set_mailtype('html');
		$this->email->send();
	}

	public function newPassword($email,$token){
		$user = $this->User_model->get_user('email',$email);

		if (!$user) {
			die("Email tidak ditemukan");
		}//cek email

		if($user['token'] !== $token){
			die("Token tidak sesuai");
		}//cek token

		$this->form_validation->set_rules('password' , 'Password' , 'required');
		$this->form_validation->set_rules('confrimpassword' , 'Konfirmasi Password' , 'required|matches[password]');

		if ($this->form_validation->run() === FALSE) {
			$data['judul'] = 'Perbarui Password';
			$this->load->view('template/header',$data);
			$this->load->view('auth/input_new_password');
			$this->load->view('template/footer');
		} else {

		$this->User_model->updatePassword($user['id']);//update password

		redirect('profile'); //redirect profile
		}
	}
}

