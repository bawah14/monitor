<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class grup_komoditi extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	function manual_query($query){
		$data = $this->db->query($query);
		return $data;
	}

	function input_grup_komoditi($nama_komoditi,$keterangan_komoditi){
		$data = $this->db->query("INSERT INTO `grup_komoditi` (`id_grup_komoditi`, `nama_grup_komoditi`, `keterangan_grup_komoditi`) VALUES (NULL, '".$nama_komoditi."', '".$keterangan_komoditi."')");
		
	}

}