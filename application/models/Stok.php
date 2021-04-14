<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class stok extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	function manual_query($query){
		$data = $this->db->query($query);
		return $data;
	}
	function input_stok($id_pasar,$id_komoditi,$stok){
		$data = $this->db->query("INSERT INTO `stok` ( `id_pasar`, `id_komoditi`, `jumlah_stok`, `keterangan_stok`, `tanggal_stok`, `nama_stok`, `asal_stok`) VALUES ( '$id_pasar' , '$id_komoditi',$stok,'',  CURRENT_TIMESTAMP ,'','')");
	}
	function input_stok_manual($id_pasar,$id_komoditi,$stok,$tanggal){
		$data = $this->db->query("INSERT INTO `stok` ( `id_pasar`, `id_komoditi`, `jumlah_stok`, `keterangan_stok`, `tanggal_stok`, `nama_stok`, `asal_stok`) VALUES ( '$id_pasar' , '$id_komoditi',$stok,'',  '".$tanggal."' ,'','')");
	}
}