<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if ($this->session->has_userdata('username')) {
			# code...
			$data['page'] = "home_".$this->session->userdata('role');
			$data['data']="";
			// if (strpos($this->session->userdata('role'), "otoriter")) {
			// 	# code...
			// 	$data = 
			// }
			if (method_exists($this,"home_".$this->session->userdata('role'))) {
				$data['data'] = $this->{"home_".$this->session->userdata('role')}();
			}else{
				$data['data']="";
			}
			if (strpos($this->session->userdata('role'), "otoriter")!==false) {
				# code...
				$data['page']="home_otoriter";
			}
			$this->load->view('base',$data);
		}else{
			$this->load->view('login');
		}
	}
	public function getpasar($test){
		$this->load->model('pasar');
		$data = $this->pasar->getdata();
		var_dump($data);
		echo $test;
	}
	public function handlerlogin(){
		$this->load->model('user');

		$result = $this->user->check_login($this->input->post('username'),$this->input->post('password'));
		
		if ($result->num_rows()==0) {
			# code..
			redirect(base_url());
		}else{
			foreach ($result->result() as $res) {
				# code...\
				$newdata = array(
					'id' => $res->id_user,
		        	'username'  => $res->email_user,
		        	'role' => $res->role_user,
		        	'logged_in' => TRUE,
		        	'id_pasar'=> $res->id_pasar
				);
			}
			$this->session->set_userdata($newdata);	
			redirect(base_url());
		}
		
	}

	public function handlerlogout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
