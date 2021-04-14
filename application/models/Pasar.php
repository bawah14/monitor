<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class pasar extends CI_Model
{
	
	function __construct()
	{
		# code...
	}
	function getdata(){
		$data = $this->db->query("select * from pasar");
		return $data->result_array();
	}
	function manual_query($query){
		$data = $this->db->query($query);
		return $data;
	}
	function input_pasar($nama_pasar,$keterangan_pasar){
		$data = $this->db->query("INSERT INTO `pasar` (`id_pasar`, `nama_pasar`, `keterangan_pasar`) VALUES (NULL, '".$nama_pasar."', '".$keterangan_pasar."')");

	}
}