<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ErrorNotFound extends CI_Controller {

	private $data = array(
		'main_view' => 'error404',
		'sidebar' => 'sidebar',
		'page_title' => 'Scratch',
		'page_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
		'page_header_background' => '#B71C1C',
		'page_short' => '',
		'data' => '',
		'logged' => ''
		);
	public function __construct()
	{
		parent::__construct();

		$this->data['logged'] = $this->session->userdata('active_user_data');
		$this->session->set_userdata('url_to_go', current_url());
	}

	public function index()
	{
		$this->load->view('basepage', $this->data);
	}
}

/* End of file ErrorNotFound.php */
/* Location: ./application/controllers/ErrorNotFound.php */