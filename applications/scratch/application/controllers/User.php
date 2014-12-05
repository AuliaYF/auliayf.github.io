<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	private $data = array(
		'main_view' => 'user/frontpage',
		'sidebar' => 'user/sidebar',
		'page_title' => '',
		'page_desc' => '',
		'page_header_background' => '',
		'page_short' => '',
		'data' => '',
		'logged' => ''
		);

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'user_model');

		$this->data['logged'] = $this->session->userdata('active_user_data');
		$this->session->set_userdata('url_to_go', current_url());
	}

	public function index($user_id)
	{
		$data = $this->user_model->getUser($user_id);

		if(empty($data))
		{
			redirect('404');
		}else
		{
			$this->data['page_title'] = $data->name_first.' '.$data->name_last;
			$this->data['page_desc'] = $data->email;
			$this->data['page_header_background'] = $data->header_background;
			$this->data['data'] = $data;
		}
		$this->load->view('basepage', $this->data);
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */