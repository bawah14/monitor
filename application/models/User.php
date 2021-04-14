<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class user extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	function check_login($email,$password){
		$data = $this->db->query("select * from user where email_user = '".$email."' and password_user = md5('".$password."')");
		return $data;
	}
	function manual_query($query){
		$data = $this->db->query($query);
		return $data;
	}
	function input_user($nama_user,$email_user,$password_user,$role_user,$pasar_user){
		$data = $this->db->query("INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `password_user`, `role_user`,`id_pasar`) VALUES (NULL, '".$nama_user."', '".$email_user."', '".md5($password_user)."', '".$role_user."','".$pasar_user."')");
	}
}