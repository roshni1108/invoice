<?php
class Invoicem extends CI_Model 
{
	
	function saverecords($data)
	{
        $this->db->insert('Datatable',$data);
        return true;
	}
	
}