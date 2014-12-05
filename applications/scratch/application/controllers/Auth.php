<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'user_model');
	}

	public function login()
	{
		if(!$this->session->userdata('active_user_data')){
			if($this->input->post('submit'))
			{
				$username = $this->input->post('username');
				$pass = $this->input->post('password');
				$query = $this->user_model->getUserData(array('username' => $username));
				if($query->num_rows() > 0){
					$dbPass = $this->encrypt->decode($query->row()->password);
					if($dbPass === $pass){
						foreach($query->result() as $row)
						{
							$this->session->set_userdata('active_user_data', $row);
						}
						redirect($this->session->userdata('url_to_go'), 'refresh');
					}else{
						echo 'Wrong Password';
					}
				}else{
					echo 'Username does not exist.';
				}
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('active_user_data');
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */