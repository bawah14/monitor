<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class harga extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	function manual_query($query){
		$data = $this->db->query($query);
		return $data;
	}

	function input_harga($id_pasar,$id_komoditi,$harga){
		$data = $this->db->query("INSERT INTO `harga` ( `harga_harga`, `id_komoditi`, `id_pasar`) VALUES ( $harga, '$id_komoditi', '$id_pasar');");
	}
	function input_harga_manual($id_pasar,$id_komoditi,$harga,$tanggal){
		$data = $this->db->query("INSERT INTO `harga` ( `harga_harga`, `id_komoditi`, `id_pasar`, `tanggal_harga`) VALUES ( $harga, '$id_komoditi', '$id_pasar','$tanggal');");
	}
}