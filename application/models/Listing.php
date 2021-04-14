<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class listing extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	function manual_query($query){
		$data = $this->db->query($query);
		return $data;
	}

	function input_listing($nama_toko,$alamat_toko,$pembelian,$penjualan,$jenis,$harga_terendah,$harga_tertinggi,$tahun_listing,$bulan_listing,$minggu_listing,$id_user){
		$data = $this->db->query("INSERT INTO `listing` (`id_listing`, `nama_toko_listing`, `alamat_toko_listing`, `pembelian_listing`, `penjualan_listing`, `jenis_listing`, `harga_terendah_listing`, `harga_tertinggi_listing`, `tahun_listing`,`bulan_listing`,`minggu_listing`, `id_user`) VALUES (NULL, '".$nama_toko."', '".$alamat_toko."', ".$penjualan.", ".$pembelian.", '".$jenis."', ".$harga_terendah.", ".$harga_tertinggi.", '".$tahun_listing."','".$bulan_listing."','".$minggu_listing."', '".$id_user."')");
		
	}

	function edit_listing($coloumn,$new_val,$id){
		$data = $this->db->query("update listing set ".$coloumn." = '".$new_val."' where id_listing = ".$id);
	}
}