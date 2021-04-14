<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class keterangan extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	function manual_query($query){
		$data = $this->db->query($query);
		return $data;
	}

	function input_keterangan($id_pasar,$kategori_keterangan,$isi_keterangan,$tanggal_keterangan){
		$data = $this->db->query("INSERT INTO `keterangan` (`id_keterangan`, `id_pasar`, `kategori_keterangan`, `isi_keterangan`, `tanggal_keterangan`) VALUES (NULL, '".$id_pasar."', '".$kategori_keterangan."',  '".$isi_keterangan."',  '".$tanggal_keterangan."')");
		
	}
}