<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

	private $data = array(
		'main_view' => 'setting/frontpage',
		'sidebar' => 'setting/sidebar',
		'page_title' => '',
		'page_desc' => '',
		'page_header_background' => '',
		'page_short' => '',
		'data' => '',
		'logged' => '',
		'isError' => FALSE
		);

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'user_model');

		$this->data['logged'] = $this->session->userdata('active_user_data');
		$this->session->set_userdata('url_to_go', current_url());
	}

	public function index()
	{
		$data = $this->user_model->getUser($this->data['logged']->id);

		if(empty($data))
		{
			redirect('404');
		}else
		{
			$this->data['form_action'] = 'setting';
			$this->data['page_title'] = $data->name_first.' '.$data->name_last;
			$this->data['page_desc'] = $data->email;
			$this->data['page_header_background'] = $data->header_background;
			$this->data['data'] = $data;

			foreach($data as $key => $val)
			{
				$this->data['form_value'][$key] = $val;
			}

			if($this->input->post('submit'))
			{
				if($this->user_model->validate_edit())
				{
					if($this->user_model->updateUser($this->data['logged']->id))
					{
						$query = $this->user_model->getUserData(array('id' => $this->data['logged']->id));
						if($query->num_rows() > 0){
							foreach($query->result() as $row)
							{
								$this->session->set_userdata('active_user_data', $row);
							}
							redirect('user/'.$this->data['logged']->id);
						}
					}
				}else
				{
					$this->data['isError'] = TRUE;
				}
			}
		}
		$this->load->view('basepage', $this->data);
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */