<?php
class City extends CI_Model {
	// protected $_name = 'city';
	protected $_name = 'city2';
	public function getAll()
	{
		$query = $this->db->query('SELECT * FROM '.$this->_name.' ORDER BY country,state,name');
		return $query->result_array();
	}
	public function getCountry()
	{
		$query = $this->db->query('SELECT DISTINCT(country) as name FROM '.$this->_name.' ORDER BY name');
		return $query->result_array();
	}
	public function getByCountry($country)
	{
		$query = $this->db->query('SELECT * FROM '.$this->_name.' WHERE country="'.$country.'" ORDER BY state, name');
		return $query->result_array();
	}
	public function insert_entry($pn,$entry)
	{
		$this->db->insert($this->_name, array('pn'=>$pn,'pk'=>$entry['pk'],'addr'=>$entry['addr']));
	}
	public function update_entry($pn,$entry)
	{
		$this->title    = $_POST['title'];
		$this->content  = $_POST['content'];
		$this->date     = time();

		$this->db->update('entries', $this, array('id' => $_POST['id']));
	}
}