<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CategoryModel extends CI_Model {

	public $db_table = 'categories';

	public function __construct()
	{
		parent::__construct();
	}

	public function insertCategory()
	{
		$data = array(
			'title' => $this->input->post('cat_title'),
			'desc' => $this->input->post('cat_desc'),
			'header_background' => $this->input->post('header_background'),
			'short' => url_title($this->input->post('cat_title'), '-', TRUE)
			);
		$this->db->insert($this->db_table, $data);

		if($this->db->affected_rows() > 0)
			return TRUE;
		return FALSE;
	}

	public function updateCategory($category_short)
	{
		$data = array(
			'title' => $this->input->post('cat_title'),
			'desc' => $this->input->post('cat_desc'),
			'header_background' => $this->input->post('header_background'),
			'short' => url_title($this->input->post('cat_title'), '-', TRUE)
			);
		$this->db->where('short', $category_short)->update($this->db_table, $data);

		if($this->db->affected_rows() > 0)
			return TRUE;
		return FALSE;
	}

	public function deleteCategory($category_short)
	{
		$this->db->delete($this->db_table, array('short' => $category_short));

		if($this->db->affected_rows() > 0)
			return TRUE;
		return FALSE;
	}

	public function getCategory($category_short)
	{
		return $this->db->get_where($this->db_table, array('short' => $category_short))->row();
	}

	public function getCategories()
	{
		return $this->db->get($this->db_table)->result();
	}

	public function load_form_rules(){
		$form_rules = array(
			array(
				'field' => 'cat_title',
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

/* End of file CategoryModel.php */
/* Location: ./application/models/CategoryModel.php */