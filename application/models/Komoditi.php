<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class komoditi extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	function manual_query($query){
		$data = $this->db->query($query);
		return $data;
	}

	function input_komoditi($nama_komoditi,$keterangan_komoditi){
		$data = $this->db->query("INSERT INTO `komoditi` (`id_komoditi`, `nama_komoditi`, `keterangan_komoditi`, `status_komoditi`) VALUES (NULL, '".$nama_komoditi."', '".$keterangan_komoditi."', 1)");
		
	}

	function edit_komoditi($coloumn,$new_val,$id){
		$data = $this->db->query("update komoditi set ".$coloumn." = '".$new_val."' where id_komoditi = ".$id);
	}
}