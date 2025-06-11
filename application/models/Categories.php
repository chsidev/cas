<?php
class Categories extends CI_Model {
	protected $_name = 'category';
	public function add($name)
	{
		$row = array();
		$query = $this->db->query('SELECT * FROM '.$this->_name.' WHERE name="'.$name.'"');
		$row = $query->row_array();
		if(count($row)){
			return 'f';
		}else{
			$this->db->insert($this->_name,array('name'=>$name));
			return 's';
		}
	}
	public function update($old,$name)
	{
		$this->db->where('name',$old);
		$this->db->update($this->_name,array('name'=>$name));
		return 's';
	}
	public function getAll()
	{
		$query = $this->db->query('SELECT * FROM '.$this->_name.' ORDER BY name');
		return $query->result_array();
	}
	public function deleteById($id)
	{
		try{
			$this->db->where('id', $id);
			$this->db->delete($this->_name);
			return true;
			
		} catch(Exception $e) {
			return false;
		}
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