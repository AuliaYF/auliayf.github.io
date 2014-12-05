<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {

	public $db_table = 'users';
	public $db_details_table = 'user_details';

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * updateUser
	 * @param $user_id
	 * @return TRUE/FALSE
	 */
	public function updateUser($user_id) {
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->encrypt->encode($this->input->post('password'))
			);
		$this->db->where('id', $user_id)->update($this->db_table, $data);
		if($this->db->affected_rows() > 0)
		{
			$data = array(
				'name_first' => $this->input->post('name_first'),
				'name_last' => $this->input->post('name_last'),
				'email' => $this->input->post('email'),
				'welcome_title' => $this->input->post('welcome_title'),
				'welcome_content' => $this->input->post('welcome_content'),
				'header_background' => $this->input->post('header_background')
				);
			$this->db->where('user_id', $user_id)->update($this->db_details_table, $data);

			if($this->db->affected_rows() > 0)
			{
				return TRUE;
			}else
			{
				return FALSE;
			}
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getUser($user_id)
	{
		return $this->db->select('username, password, email, name_first, name_last, header_background, welcome_title, welcome_content')->join($this->db_details_table, $this->db_details_table.'.user_id = '.$this->db_table.'.id')->where($this->db_table.'.id', $user_id)->get($this->db_table)->row();
	}

	public function getUserData($param)
	{
		return $this->db->get_where($this->db_table, $param);
	}

	public function getUserLevel($user_id)
	{
		return $this->db->get_where($this->db_table, array('id' => $user_id))->row()->level;
	}

	public function load_form_rules(){
		$form_rules = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|max_length[30]'),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'),
			);
		return $form_rules;
	}

	public function validate(){
		$form = $this->load_form_rules();
		$this->form_validation->set_rules($form);

		if($this->form_validation->run()){
			return TRUE;
		}
		return FALSE;
	}

	public function load_form_edit_rules(){
		$form_rules = array(
			array(
				'field' => 'name_first',
				'label' => 'First Name',
				'rules' => 'required|max_length[25]'
				),
			array(
				'field' => 'name_last',
				'label' => 'Last Name',
				'rules' => 'max_length[25]'
				),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email'
				),
			array(
				'field' => 'welcome_title',
				'label' => 'Welcome Title',
				'rules' => 'required|max_length[255]'
				),
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|max_length[30]'),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'),
			);
		return $form_rules;
	}

	public function validate_edit(){
		$form = $this->load_form_edit_rules();
		$this->form_validation->set_rules($form);

		if($this->form_validation->run()){
			return TRUE;
		}
		return FALSE;
	}
}

/* End of file UserModel.php */
/* Location: ./application/models/UserModel.php */