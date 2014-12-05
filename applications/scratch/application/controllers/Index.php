<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	private $data = array(
		'main_view' => 'categories/frontpage',
		'sidebar' => 'categories/sidebar',
		'page_title' => 'Scratch',
		'page_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
		'page_header_background' => '#5cb85c',
		'page_short' => '',
		'data' => '',
		'logged' => ''
		);
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CategoryModel', 'cat_model');
		$this->data['logged'] = $this->session->userdata('active_user_data');
		$this->session->set_userdata('url_to_go', current_url());
	}

	public function index()
	{
		$this->data['data'] = $this->cat_model->getCategories();
		$this->load->view('basepage', $this->data);
	}

	public function add()
	{
		if($logged->level === "1"){
			$this->data['form_action'] = 'index/add';
			$this->data['main_view'] = 'categories/form/frontpage';
			$this->data['sidebar'] = 'categories/form/sidebar';

			if($this->input->post('submit'))
			{
				if($this->cat_model->validate())
				{
					if($this->cat_model->insertCategory())
					{
						redirect(base_url('c/'.url_title($this->input->post('cat_title'), '-', TRUE)));
					}
				}
			}
			$this->load->view('basepage', $this->data);
		}else
		{
			redirect('/');
		}
	}

	public function edit($category_short)
	{
		if($logged->level === "1"){
			$this->data['form_action'] = 'index/edit/'.$category_short;
			$this->data['main_view'] = 'categories/form/frontpage';
			$this->data['sidebar'] = 'categories/form/sidebar';

			$data = $this->cat_model->getCategory($category_short);

			if(empty($data))
			{
				redirect('404');
			}else
			{
				foreach ($data as $key => $value) {
					$this->data['form_value'][$key] = $value;
				}

				if($this->input->post('submit'))
				{
					if($this->cat_model->validate())
					{
						if($this->cat_model->updateCategory($category_short))
						{
							redirect(base_url('c/'.url_title($this->input->post('cat_title'), '-', TRUE)));
						}
					}
				}
				$this->load->view('basepage', $this->data);
			}
		}else
		{
			redirect('/');
		}
	}

	public function remove($category_short)
	{
		if($logged->level === "1"){
			if($this->cat_model->deleteCategory($category_short))
				redirect(base_url());
		}else
		{
			redirect('/');
		}
	}

}

/* End of file Index.php */
/* Location: ./application/controllers/Index.php */