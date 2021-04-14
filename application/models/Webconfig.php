<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class webconfig extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	function manual_query($query){
		$data = $this->db->query($query);
		return $data;
	}

}