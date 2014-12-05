<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	private $data = array(
		'main_view' => 'topics/frontpage',
		'sidebar' => 'topics/sidebar',
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
		$this->load->model('CategoryModel', 'cat_model');
		$this->load->model('TopicModel', 'topic_model');
		$this->load->model('UserModel', 'user_model');
		$this->data['logged'] = $this->session->userdata('active_user_data');
		$this->session->set_userdata('url_to_go', current_url());
	}

	public function index($category_short)
	{
		$category = $this->cat_model->getCategory($category_short);

		if(empty($category))
		{
			redirect('404');
		}else
		{
			$this->data['page_title'] = $category->title;
			$this->data['page_desc'] = $category->desc;
			$this->data['page_header_background'] = $category->header_background;
			$this->data['page_short'] = $category->short;

			$this->data['data'] = $this->topic_model->getTopics($category_short);
		}

		// var_dump($this->data['data']);
		$this->load->view('basepage', $this->data);
	}
}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */