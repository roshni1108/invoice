<?php
class Invoice_modal extends CI_Model 
{
	
	function saverecords($data)
	{
        $this->db->insert('Datatable',$data);
        return true;
	}
	
}