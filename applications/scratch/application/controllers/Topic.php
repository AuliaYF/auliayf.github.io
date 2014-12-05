<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topic extends CI_Controller {

	private $data = array(
		'main_view' => 'topic/frontpage',
		'sidebar' => 'topic/sidebar',
		'page_title' => '',
		'page_desc' => '',
		'page_header_background' => '',
		'page_short' => '',
		'data' => array(),
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

	public function index($category_short, $topic_short)
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

			$tp = $this->topic_model->getTopic($topic_short);
			if(empty($tp))
			{
				redirect('404');
			}else
			{
				$this->data['data'] = array(
					'topic' => $this->topic_model->getTopic($topic_short),
					'replies' => $this->topic_model->getReplies($tp->id)
					);
			}
		}
		// print_r($this->data['data']);
		$this->load->view('basepage', $this->data);
	}

	public function add($category_short)
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

			$this->data['form_action'] = 'c/'.$category_short.'/tp/add';
			$this->data['main_view'] = 'topics/form/frontpage';
			$this->data['sidebar'] = 'topics/form/sidebar';

			if($this->input->post('submit'))
			{
				if($this->topic_model->validate())
				{
					if($this->topic_model->insertTopic($category_short))
					{
						redirect(base_url('c/'.$category_short.'/tp/'.url_title($this->input->post('topic_title'), '-', TRUE)));
					}
				}
			}
		}
		$this->load->view('basepage', $this->data);
	}
}

/* End of file Topic.php */
/* Location: ./application/controllers/Topic.php */