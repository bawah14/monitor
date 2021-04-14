<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class od extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	function manual_query($query){
		$data = $this->db->query($query);
		return $data;
	}

	function input_od($id_od,$id_pasar,$id_komoditi,$tanggal_od,$jumlah_od,$nama_pemasok,$alamat_pemasok,$telepon_pemasok,$satuan_od,$id_user,$foto_od){
		$data = $this->db->query("INSERT INTO `od` (`id_od`, `id_pasar`, `id_komoditi`, `tanggal_od`, `nama_pemasok`, `telepon_pemasok`, `alamat_pemasok`, `jumlah_od`, `satuan_od`, `pasar_od`, `foto_od`, `id_user`) VALUES (NULL, ".$id_pasar.", ".$id_komoditi.", '".$tanggal_od."', '".$nama_pemasok."', '".$telepon_pemasok."', '".$alamat_pemasok."', '".$jumlah_od."', '".$satuan_od."', '".$pasar_od."', '".$foto_od."', '".$id_user."')");
		
	}

	function edit_od($coloumn,$new_val,$id){
		$data = $this->db->query("update od set ".$coloumn." = '".$new_val."' where id_od = ".$id);
	}
}