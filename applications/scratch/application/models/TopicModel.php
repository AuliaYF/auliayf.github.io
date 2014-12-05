<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TopicModel extends CI_Model {

	public $db_table = 'topics';
	public $db_replies_table = 'topic_replies';

	public function __construct()
	{
		parent::__construct();
	}

	public function insertTopic($category_short)
	{
		$time = unix_to_human(gmt_to_local(human_to_unix(unix_to_human(time(), TRUE, 'eu')), 'UP5', TRUE), TRUE, 'eu');
		$topics = array(
			'category_id' => $this->_getCategory($category_short)->id,
			'title' => $this->input->post('topic_title'),
			'short' => url_title($this->input->post('topic_title'), '-', TRUE),
			'date_created' => $time,
			'date_modified' => $time,
			'starter' => $this->session->userdata('active_user_data')->id
			);

		$this->db->insert($this->db_table, $topics);

		if($this->db->affected_rows() > 0)
		{
			$topic_replies = array(
				'topic_id' => $this->getTopic(url_title($this->input->post('topic_title'), '-', TRUE))->id,
				'content' => $this->input->post('topic_content'),
				'date_created' => $time,
				'date_modified' => $time,
				'starter' => $this->session->userdata('active_user_data')->id
				);

			$this->db->insert($this->db_replies_table, $topic_replies);

			if($this->db->affected_rows() > 0)
				return TRUE;
			return FALSE;
		}
		return FALSE;
	}

	public function getTopics($category_short)
	{
		return $this->db->where('category_id', $this->_getCategory($category_short)->id)->order_by('date_modified', 'DESC')->get($this->db_table)->result();
	}

	public function getReplies($topic_id)
	{
		return $this->db->get_where($this->db_replies_table, array('topic_id' => $topic_id))->result();
	}

	public function getTopic($topic_short)
	{
		return $this->db->get_where($this->db_table, array('short' => $topic_short))->row();
	}

	function _getCategory($category_short){
		return $this->db->get_where('categories', array('short' => $category_short))->row();
	}

	public function load_form_rules(){
		$form_rules = array(
			array(
				'field' => 'topic_title',
				'label' => 'Title',
				'rules' => 'required|max_length[255]|is_unique['.$this->db_table.'.title]')
			);
		return $form_rules;
	}

	public function validate(){
		$form = $this->load_form_rules();
		$this->form_validation->set_rules($form);

		if($this->form_validation->run())
		{
			return TRUE;
		}
		return FALSE;
	}
}

/* End of file TopicModel.php */
/* Location: ./application/models/TopicModel.php */