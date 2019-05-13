<?php 

/**
 * 
 */
class User extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->model('User_model');	
	}

	public function profile(){
		if (!$this->User_model->is_login()) {
			redirect('login','refresh');
		}

		$data['user'] = $this->User_model->get_user('id',$_SESSION['id']);
		$data['judul'] = 'Profile User';

		$this->load->view('template/header',$data);
		$this->load->view('user/profile',$data);
		$this->load->view('template/footer',$data);
	}
}

?>