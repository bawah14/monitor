<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class router extends CI_Controller {

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
	public function index($page)
	{
		if ($this->session->has_userdata('username')) {
			# code...
			$data['data'] = "kosong";
			if (method_exists($this,$page)) {
				$data['data'] = $this->{$page}();
			}else{
				$data['data']="";
			}
			$data['page'] = $page;
			$this->load->view('base',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function grafik(){
		$req=false;
		$this->load->model('grup_komoditi');
		$this->load->model('komoditi');
		$temp=$this->grup_komoditi->manual_query('select * from grup_komoditi order by nama_grup_komoditi asc');
		foreach ($temp->result() as $key => $value) {
			# code...
			$tempres = $this->komoditi->manual_query('select * from komoditi where id_grup_komoditi = '.$value->id_grup_komoditi.' order by nama_komoditi asc');
			if ($tempres->num_rows()>0) {
				$data['komoditi'][$value->nama_grup_komoditi]=$tempres->result(); 
			}
		}
		$this->load->model('pasar');
		$query = "select * from pasar order by nama_pasar asc";
		$data['pasar'] = $this->pasar->manual_query($query)->result();

		if ($req) {
			$data['data'] = $data;
			$data['page'] = 'grafik';
			$this->load->view('base',$data);
		}else return $data;
	}

	public function input_harga(){
		$this->load->model('harga');
		$query = "select * from harga where tanggal_harga=now()";
		$data['harga'] = $this->harga->manual_query($query)->result();
		$this->load->model('grup_komoditi');
		$this->load->model('komoditi');
		$temp=$this->grup_komoditi->manual_query('select * from grup_komoditi order by nama_grup_komoditi asc');
		foreach ($temp->result() as $key => $value) {
			# code...
			$tempres = $this->komoditi->manual_query('select * from komoditi where id_grup_komoditi = '.$value->id_grup_komoditi.' order by nama_komoditi asc');
			if ($tempres->num_rows()>0) {
				# code...
				$data['komoditi'][$value->nama_grup_komoditi]=$tempres->result(); 
			}
		}
		$this->load->model('pasar');
		$query = "select * from pasar";
		$data['pasar'] = $this->pasar->manual_query($query)->result();
		return $data;
	}
	public function input_ketersediaan(){
		$this->load->model('komoditi');
		$data['komoditi'] = $this->komoditi->manual_query('select * from komoditi where status_komoditi = 3')->result();
		$this->load->model('pasar');
		$data['pasar'] = $this->pasar->manual_query('select * from pasar order by nama_pasar')->result();
		$this->load->model("webconfig");
		$data['webconfig'] = $this->webconfig->manual_query('select * from webconfig')->result();
		$this->load->model("ketersediaan");
		foreach ($data['komoditi'] as $key => $value) {
			# code...
			$data["ketersediaan"][$value->nama_komoditi] = $this->ketersediaan->manual_query('select * from ketersediaan where id_komoditi = '.$value->id_komoditi." and week(tanggal_input) = week(current_date) and pasar_ketersediaan = ".$_SESSION['id_pasar'])->result();
		}

		
		return $data;
	}
	public function proses_input_ketersediaan($nama_komoditi = "",$id_komoditi = 0,$jumlah_pedagang = 0){
		$this->load->model("webconfig");
		$data['nama_komoditi'] = $this->uri->segment('4');
		$data['id_komoditi'] = $this->uri->segment('5');
		$data['jumlah_pedagang'] = $this->uri->segment('6');
		$data['webconfig'] = $this->webconfig->manual_query('select * from webconfig')->result();
		return $data;
	}
	public function input_od(){
		$this->load->model('komoditi');
		$data['komoditi'] = $this->komoditi->manual_query('select * from komoditi where status_komoditi = 4')->result();
		$this->load->model('pasar');
		$data['pasar'] = $this->pasar->manual_query('select * from pasar order by nama_pasar')->result();
		return $data;
	}
	public function kelola_ketersediaan(){
		$this->load->model('pasar');
		$this->load->model('komoditi');
		$this->load->model('ketersediaan');
		$this->load->model('webconfig');
		// $this->load->model('pasar');
		$data['komoditi'] = $this->komoditi->manual_query('select * from komoditi where status_komoditi = 3 order by nama_komoditi')->result();
		$data['pasar'] = $this->pasar->manual_query('select * from pasar order by nama_pasar')->result();
		$data['ketersediaan'] = null;
		$data['webconfig'] = $this->webconfig->manual_query('select * from webconfig')->result();
		if (isset($_GET['pasar']) && isset($_GET['minggu']) && isset($_GET['bulan']) && isset($_GET['tahun'])) {
			# code...
			$data['ketersediaan'] = $this->ketersediaan->manual_query('select * from ketersediaan where pasar_ketersediaan = "'.$_GET['pasar'].'" and minggu_ketersediaan = '.$_GET['minggu']." and bulan_ketersediaan = ".$_GET['bulan']." and tahun_ketersediaan = ".$_GET['tahun'])->result();
			$data['query'] = 'select * from ketersediaan where pasar_ketersediaan = "'.$_GET['pasar'].'" and minggu_ketersediaan = '.$_GET['minggu']." and bulan_ketersediaan = ".$_GET['bulan']." and tahun_ketersediaan = ".$_GET['tahun'];
		}
				// $this->ketersediaan->manual_query('select * from ketersediaan');
		return $data;
	}
	public function laporan_ketersediaan(){
		// $this->load->model('pasar');
		$this->load->model('komoditi');
		$this->load->model('ketersediaan');
		// $this->load->model('pasar');
		$data['komoditi'] = $this->komoditi->manual_query('select * from komoditi where status_komoditi = 3 order by nama_komoditi')->result();
		// $data['pasar'] = $this->pasar->manual_query('select * from pasar order by nama_pasar')->result();
		$data['ketersediaan'] = null;

		if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
			# code...
			foreach ($data['komoditi'] as $key => $value) {
				# code...
				for ($i=1; $i < 6 ; $i++) { 
					# code...
					$data["perminggu"][$value->nama_komoditi][$i] = $this->ketersediaan->manual_query('select sum(jumlah_ketersediaan) as total from ketersediaan where id_komoditi = '.$value->id_komoditi.' and minggu_ketersediaan = '.$i." and bulan_ketersediaan = ".$_GET['bulan']." and tahun_ketersediaan = ".$_GET['tahun'])->result();
				}
				$data["perbulan"][$value->nama_komoditi] = $this->ketersediaan->manual_query('select sum(jumlah_ketersediaan) as total from ketersediaan where id_komoditi = '.$value->id_komoditi." and bulan_ketersediaan = ".$_GET['bulan']." and tahun_ketersediaan = ".$_GET['tahun'])->result();
			}
			// $data['ketersediaan'] = $this->ketersediaan->manual_query('select * from ketersediaan where pasar_ketersediaan = "'.$_GET['pasar'].'" and minggu_ketersediaan = '.$_GET['minggu']." and bulan_ketersediaan = ".$_GET['bulan']." and tahun_ketersediaan = ".$_GET['tahun'])->result();
				// $this->ketersediaan->manual_query('select * from ketersediaan');
		return $data;
	}}
	public function input_stok(){
		$this->load->model('stok');
		$query = "select * from stok where tanggal_stok=now()";
		$data['stok'] = $this->stok->manual_query($query)->result();
		$this->load->model('komoditi');
		$this->load->model('grup_komoditi');
		$this->load->model('komoditi');
		$temp=$this->grup_komoditi->manual_query('select * from grup_komoditi order by nama_grup_komoditi asc');
		foreach ($temp->result() as $key => $value) {
			# code...
			$tempres = $this->komoditi->manual_query('select * from komoditi where id_grup_komoditi = '.$value->id_grup_komoditi.' order by nama_komoditi asc');
			if ($tempres->num_rows()>0) {
				# code...
				$data['komoditi'][$value->nama_grup_komoditi]=$tempres->result(); 
			}		}

		$this->load->model('pasar');
		$query = "select * from pasar";
		$data['pasar'] = $this->pasar->manual_query($query)->result();
		return $data;
	}

	public function input_manual(){
		$this->load->model('grup_komoditi');
		$this->load->model('komoditi');
		$this->load->model('pasar');
		$temp=$this->grup_komoditi->manual_query('select * from grup_komoditi order by nama_grup_komoditi asc');
		foreach ($temp->result() as $key => $value) {
			# code...
			$tempres = $this->komoditi->manual_query('select * from komoditi where id_grup_komoditi = '.$value->id_grup_komoditi.' order by nama_komoditi asc');
			if ($tempres->num_rows()>0) {
				# code...
				$data['komoditi'][$value->nama_grup_komoditi]=$tempres->result(); 
			}
		}
		$data['pasar'] = $this->pasar->manual_query('select * from pasar')->result();
		return $data;
			
	}


	public function input_listing(){
		$this->load->model("listing");
		$data['listing'] = $this->listing->manual_query("select * from listing where id_user = '".$this->session->userdata('username')."' order by tahun_listing desc");
		return $data;
	}

	public function hapus_listing($id){
		$this->load->model("listing");
		$data['listing'] = $this->listing->manual_query("delete from listing where id_listing = ".$id);
		$data['pesan'] = "data berhasil dihapus";
		redirect(base_url("index.php/router/index/input_listing?pesan=data dihapus"));
	}
	public function handlerinputharga(){
		$this->load->model('harga');
		$this->harga->manual_query("delete from harga where id_pasar=".$this->input->post('pasar')." and date(tanggal_harga) = current_date");
		foreach ($this->input->post() as $key => $value) {
			if (strpos($key, "kd")!==false) {
				$key = explode('kd', $key);
				if ($value!="") {
					$harga = str_replace(array('.', ','), '' , $value);
					$harga = (int ) $harga;
					// echo $harga;
					$this->harga->input_harga($this->input->post('pasar'),$key[1],$harga);
				}
			}
		}
		redirect(base_url("?pesan=data berhasil disimpan"));
	}

	public function handlerinputlisting(){
		$this->load->model('listing');
		$this->listing->input_listing($this->input->post('nama_toko_listing'),$this->input->post('alamat_toko_listing'),$this->input->post('pembelian_listing'),$this->input->post('penjualan_listing'),$this->input->post('jenis_listing'),$this->input->post('harga_terendah_listing'),$this->input->post('harga_tertinggi_listing'),$this->input->post('tahun_listing'),$this->input->post('bulan_listing'),$this->input->post('minggu_listing'),$this->session->userdata('username'));
		redirect(base_url("index.php/router/index/input_listing"));
	}
	public function handlerinputstok(){
		$this->load->model('stok');
		$this->stok->manual_query("delete from stok where id_pasar=".$this->input->post('pasar')." and week(date(tanggal_stok)) = week(current_date)");
		foreach ($this->input->post() as $key => $value) {
			if (strpos($key, "kd")!==false) {
				$key = explode('kd', $key);
				if ($value!=""||$value!=0) {
					# code...
					$this->stok->input_stok($this->input->post('pasar'),$key[1],$value);
				}
			}
		}
		redirect(base_url());	
	}
	public function validasi_harga(){
		$req = false;
		$role = explode("otoriter", $this->session->userdata('role'))[1];
		$this->load->model('harga');
		$this->load->model("pasar");
		$query = "select * from pasar order by nama_pasar asc";
		$data['allpasar'] = $this->pasar->manual_query($query);
		$this->load->model("komoditi");
		$query = "select * from komoditi where status_komoditi=1 order by nama_komoditi asc";
		$data['allkomoditi'] = $this->komoditi->manual_query($query);
		foreach ($data['allkomoditi']->result() as $value) {
			foreach ($data['allpasar']->result() as  $val) {
				$query = 'select * from harga inner join pasar on harga.id_pasar = pasar.id_pasar inner join komoditi on harga.id_komoditi=komoditi.id_komoditi where  harga.id_pasar = '.$val->id_pasar.' and harga.id_komoditi = '.$value->id_komoditi.' ';
				if ( $this->input->post('date')) {
					# code...
					$query.=" and date(tanggal_harga) = CAST('". $this->input->post('date')."' AS DATE)";
					$data['date']= $this->input->post('date');
					$req = true;
					$data['query'] = $query;
				}else{
					$query.=" and date(tanggal_harga) = curdate()";

				}
				$query.= "order by tanggal_harga desc limit 1";
				$res = $this->harga->manual_query($query);
				if ($res->num_rows()==0) {
					$data['harga'][$val->id_pasar][$value->id_komoditi] = 0;
				}else{
					$data['harga'][$val->id_pasar][$value->id_komoditi] = $res->row()->harga_harga;
				}
			}
		}	
		if ($req) {
			# code...
			$data['data'] = $data;
			$data['page'] = 'validasi_harga';
			$this->load->view('base',$data);
		}else{

			return $data;
		}
	}

	public function validasi_harga_new(){
		$req = false;
		$role = explode("otoriter", $this->session->userdata('role'))[1];
		$this->load->model('harga');
		$this->load->model("pasar");
		$query = "select * from pasar order by nama_pasar asc";
		$data['allpasar'] = $this->pasar->manual_query($query);
		$this->load->model("komoditi");
		$query = "select * from komoditi where status_komoditi=1 order by nama_komoditi asc";
		$data['allkomoditi'] = $this->komoditi->manual_query($query);
		foreach ($data['allkomoditi']->result() as $value) {
			$query = 'select * from harga inner join pasar on harga.id_pasar = pasar.id_pasar inner join komoditi on harga.id_komoditi=komoditi.id_komoditi where harga.id_komoditi = '.$value->id_komoditi.' ';
			if ( $this->input->post('date')) {
				# code...
				$query.=" and date(tanggal_harga) = CAST('". $this->input->post('date')."' AS DATE)";
				$data['date']= $this->input->post('date');
				$req = true;
				$data['query'] = $query;
			}else{
				$query.=" and date(tanggal_harga) = curdate()";

			}
			$query.= "order by pasar.nama_pasar asc ";
			$res = $this->harga->manual_query($query);
			$data['harga'][$value->id_komoditi] = $res->result();
			$data['query'][$value->id_komoditi] = $query;
			
		}	
		if ($req) {
			# code...
			$data['data'] = $data;
			$data['page'] = 'validasi_harga_new';
			$this->load->view('base',$data);
		}else{

			return $data;
		}
	}

	public function lihat_harga(){
		$req = false;
		// $role = explode("otoriter", $this->session->userdata('role'))[1];
		$this->load->model('harga');
		$this->load->model("pasar");
		$query = "select * from pasar order by nama_pasar asc";
		$data['allpasar'] = $this->pasar->manual_query($query);
		$this->load->model("komoditi");
		$query = "select * from komoditi where status_komoditi=1 order by nama_komoditi asc";
		$data['allkomoditi'] = $this->komoditi->manual_query($query);
		foreach ($data['allkomoditi']->result() as $value) {
			$query = 'select * from harga inner join pasar on harga.id_pasar = pasar.id_pasar inner join komoditi on harga.id_komoditi=komoditi.id_komoditi where harga.id_komoditi = '.$value->id_komoditi.' ';
			if ( $this->input->post('date')) {
				# code...
				$query.=" and date(tanggal_harga) = CAST('". $this->input->post('date')."' AS DATE)";
				$data['date']= $this->input->post('date');
				$req = true;
				$data['query'] = $query;
			}else{
				$query.=" and date(tanggal_harga) = curdate()";
			}
			$query.= " and status_harga > 0 order by pasar.nama_pasar asc ";
			$res = $this->harga->manual_query($query);
			$data['harga'][$value->id_komoditi] = $res->result();
			$data['query'][$value->id_komoditi] = $query;
			
		}	
		if ($req) {
			# code...
			$data['data'] = $data;
			$data['page'] = 'lihat_harga';
			$this->load->view('base',$data);
		}else{

			return $data;
		}
	}

	public function validasi_stok(){
		$req = false;

		$role = explode("otoriter", $this->session->userdata('role'))[1];
		$this->load->model('stok');
		// $data['harga'] = $this->harga->manual_query($query);
		$this->load->model("pasar");
		$query = "select * from pasar order by nama_pasar asc";
		$data['allpasar'] = $this->pasar->manual_query($query);
		$this->load->model("komoditi");
		$query = "select * from komoditi where status_komoditi=1 order by nama_komoditi asc";
		$data['allkomoditi'] = $this->komoditi->manual_query($query);
		foreach ($data['allkomoditi']->result() as $value) {
			foreach ($data['allpasar']->result() as  $val) {
				$query = 'select * from stok inner join pasar on stok.id_pasar = pasar.id_pasar inner join komoditi on stok.id_komoditi=komoditi.id_komoditi where stok.id_pasar = '.$val->id_pasar.' and stok.id_komoditi = '.$value->id_komoditi.' ';
				if ($this->input->post('date')) {
					# code...
					$query.=" and week(date(tanggal_stok)) = week(CAST('".$this->input->post('date')."' AS DATE))";
					$data['date']= $this->input->post('date');
					$req = true;
				}else{
					$query.=" and week(date(tanggal_stok)) = week(curdate())";

				}
				$query.= "order by tanggal_stok desc limit 1";
				$res = $this->stok->manual_query($query);
				if ($res->num_rows()==0) {
					$data['harga'][$val->id_pasar][$value->id_komoditi] = 0;
				}else{
					$data['harga'][$val->id_pasar][$value->id_komoditi] = $res->row()->jumlah_stok;
				}
			}
		}		
		if ($req) {
			$data['data'] = $data;
			$data['page'] = 'validasi_stok';
			$this->load->view('base',$data);
		}else{

			return $data;
		}
		return $data;
	}

	public function kelola_user(){
		$this->load->model('user');
		$data['user'] = $this->user->manual_query('select * from user where not(role_user = "admin")');
		$this->load->model('pasar');
		$data['pasar'] = $this->pasar->manual_query('select * from pasar');
		return $data;
	}
	public function kelola_pasar(){
		$this->load->model('pasar');
		$data['pasar'] = $this->pasar->manual_query('select * from pasar');
		return $data;
	}
	public function kelola_komoditi(){
		$this->load->model('komoditi');
		$this->load->model('grup_komoditi');
		$data['komoditi'] = $this->komoditi->manual_query('select * from komoditi');
		$data['grup_komoditi'] = $this->grup_komoditi->manual_query('select * from grup_komoditi');

		return $data;	
	}
	public function kelola_grup_komoditi(){
		$this->load->model("grup_komoditi");
		$data['grup_komoditi'] = $this->grup_komoditi->manual_query("select * from grup_komoditi");
		return $data;
	}
	public function kelola_keterangan(){
		if (isset($_GET['date'])) {
			# code...
			$data['date'] = $_GET['date'];

		}else{
			
			$data['date'] = date("Y-m-d");			
		}
		$this->load->model('keterangan');
		$data['keterangan'] = $this->keterangan->manual_query("select * from keterangan where tanggal_keterangan = '".$data['date']."'")->result();
		// $data['q'] = "select * from keterangan where tanggal_keterangan = '".$data['date']."'";
		$this->load->model("pasar");
		$query = "select * from pasar order by nama_pasar asc";
		$data['pasar'] = $this->pasar->manual_query($query)->result();
		$this->load->model("komoditi");
		$query = "select * from komoditi where status_komoditi=1 order by nama_komoditi asc";
		$data['komoditi'] = $this->komoditi->manual_query($query)->result();
		return $data;
	}
	public function handlerdatepicker($date){
		$this->session->set_flashdata("date", $date);
	}
	public function handlerinputketerangan(){
		// var_dump($this->input->post());
		$this->load->model("keterangan");
		$this->keterangan->input_keterangan($this->input->post("pasar"),$this->input->post("kategori"),$this->input->post("keterangan"),$this->input->post("tanggal"));
		redirect(base_url("index.php/router/index/kelola_keterangan?date=".$this->input->post("tanggal")));
	}
	public function handlerinputuser(){
		$this->load->model('user');
		$nama_user = $this->input->post('nama_user');
		$email_user = $this->input->post('email_user');
		$password_user = $this->input->post('password_user');
		$role_user=$this->input->post('role_user');
		$pasar_user=$this->input->post('pasar_user');
		$this->user->input_user($nama_user,$email_user,$password_user,$role_user,$pasar_user);
		redirect(base_url());
	}

	public function handlerinputpasar(){
		$this->load->model('pasar');
		$nama_pasar = $this->input->post('nama_pasar');
		$keterangan_pasar = $this->input->post('keterangan_pasar');
		$this->pasar->input_pasar($nama_pasar,$keterangan_pasar);
		redirect(base_url());
	}

	public function handlerinputkomoditi(){
		$this->load->model('komoditi');
		$nama_komoditi = $this->input->post('nama_komoditi');
		$keterangan_komoditi = $this->input->post('keterangan_komoditi');
		// $role_user=$this->input->post('role_user');
		$this->komoditi->input_komoditi($nama_komoditi,$keterangan_komoditi);
		redirect(base_url());
	}
	public function handlerinputgrupkomoditi(){
		$this->load->model('grup_komoditi');
		$nama_komoditi = $this->input->post('nama_grup_komoditi');
		$keterangan_komoditi = $this->input->post('keterangan_grup_komoditi');
		// $role_user=$this->input->post('role_user');
		$this->grup_komoditi->input_grup_komoditi($nama_komoditi,$keterangan_komoditi);
		redirect(base_url());
	}
	public function handlerdelete($table,$id){
		$this->load->model($table);
		$this->{$table}->manual_query("delete from $table where id_$table = ".$id);
		redirect(base_url());
	}

	public function handlervalidasi($table){
		$this->load->model($table);
		$role = explode("otoriter", $this->session->userdata('role'));
		$this->{$table}->manual_query('update harga set status_'.$table.' = '.$role[1].' where date(tanggal_harga) = cast("'.$_GET['tanggal'].'" as date)');
		// echo 'update harga set status_'.$table.' = '.$role[1].' where  tanggal_harga = "'.$_GET['tanggal'].'"';
		// die();
		redirect(base_url());
	}

	public function handlerexporttable($date){
		// $data = $this->validasi_harga();
		// $req = false;
		$role = explode("otoriter", $this->session->userdata('role'))[1];
		$this->load->model('harga');
		// $data['harga'] = $this->harga->manual_query($query);
		$this->load->model("pasar");
		$query = "select * from pasar order by nama_pasar asc";
		$data['allpasar'] = $this->pasar->manual_query($query);
		$this->load->model("komoditi");
		$query = "select * from komoditi where status_komoditi=1 order by nama_komoditi asc";
		$data['allkomoditi'] = $this->komoditi->manual_query($query);
		foreach ($data['allkomoditi']->result() as $value) {
			foreach ($data['allpasar']->result() as  $val) {
				$query = 'select * from harga inner join pasar on harga.id_pasar = pasar.id_pasar inner join komoditi on harga.id_komoditi=komoditi.id_komoditi where  harga.id_pasar = '.$val->id_pasar.' and harga.id_komoditi = '.$value->id_komoditi.' ';
				if ( isset($date)) {
					# code...
					$query.=" and date(tanggal_harga) = CAST('". $date."' AS DATE)";
					$data['date']= $date;
					// $req = true;
					$data['query'] = $query;
				}else{
					$query.=" and date(tanggal_harga) = curdate()";

				}
				$query.= "order by tanggal_harga desc limit 1";
				$res = $this->harga->manual_query($query);
				// var_dump(size($res->result());
				// echo $query.$res->num_rows." sadsa "."<br>";
				if ($res->num_rows()==0) {
					# code...
					// echo "<br><br>";

					$data['harga'][$val->id_pasar][$value->id_komoditi] = 0;
				}else{
					// echo "<br><br>";
					$data['harga'][$val->id_pasar][$value->id_komoditi] = $res->row()->harga_harga;
				}
			}
		}
		$data['data'] = $data;
		$this->load->view('table-export',$data);
	}

	public function handlerexportharian($date){
		// $data = $this->validasi_harga();
		// $req = false;
		$role = explode("otoriter", $this->session->userdata('role'))[1];
		$this->load->model('harga');
		// $data['harga'] = $this->harga->manual_query($query);
		$this->load->model("pasar");
		$query = "select * from pasar order by nama_pasar asc";
		$data['allpasar'] = $this->pasar->manual_query($query);
		$this->load->model("komoditi");
		$query = "select * from komoditi where status_komoditi=1 order by nama_komoditi asc";
		$data['allkomoditi'] = $this->komoditi->manual_query($query);
		foreach ($data['allkomoditi']->result() as $value) {
			foreach ($data['allpasar']->result() as  $val) {
				$query = 'select * from harga inner join pasar on harga.id_pasar = pasar.id_pasar inner join komoditi on harga.id_komoditi=komoditi.id_komoditi where  harga.id_pasar = '.$val->id_pasar.' and harga.id_komoditi = '.$value->id_komoditi.' ';
				if ( isset($date)) {
					# code...
					$query.=" and date(tanggal_harga) = CAST('". $date."' AS DATE)";
					$data['date']= $date;
					// $req = true;
					$data['query'] = $query;
				}else{
					$query.=" and date(tanggal_harga) = curdate()";

				}
				$query.= "order by tanggal_harga desc limit 1";
				$res = $this->harga->manual_query($query);
				if ($res->num_rows()==0) {
					# code...
					// echo "<br><br>";

					$data['harga'][$val->id_pasar][$value->id_komoditi] = 0;
				}else{
					// echo "<br><br>";
					$data['harga'][$val->id_pasar][$value->id_komoditi] = $res->row()->harga_harga;
				}
			}
		}
		$data['data'] = $data;
		$this->load->view('export-harian',$data);
	}

	public function handlerexportlaporan($date){
		// $data = $this->validasi_harga();
		// $req = false;
		$role = explode("otoriter", $this->session->userdata('role'))[1];
		$this->load->model('harga');
		// $data['harga'] = $this->harga->manual_query($query);
		$this->load->model("pasar");
		$query = "select * from pasar where nama_pasar in ('Tambahrejo','Pucang Anom','Pabean','Wonokromo','Genteng Baru','Kembang','Balongsari','Kendangsari') order by nama_pasar asc";
		$data['allpasar'] = $this->pasar->manual_query($query);
		// var_dump($data['allpasar']->result());die();
		$this->load->model("komoditi");
		$query = "select * from komoditi where status_komoditi=1 order by nama_komoditi asc";
		$data['allkomoditi'] = $this->komoditi->manual_query($query);
		foreach ($data['allkomoditi']->result() as $value) {
			foreach ($data['allpasar']->result() as  $val) {
				$query = 'select * from harga inner join pasar on harga.id_pasar = pasar.id_pasar inner join komoditi on harga.id_komoditi=komoditi.id_komoditi where harga.id_pasar = '.$val->id_pasar.' and harga.id_komoditi = '.$value->id_komoditi.' and status_harga > 0';
				if ( isset($date)) {
					# code...
					$query.=" and date(tanggal_harga) = CAST('". $date."' AS DATE)";
					$data['date']= $date;
					// $req = true;
					$data['query'] = $query;
				}else{
					$query.=" and date(tanggal_harga) = curdate()";

				}
				$query.= "order by tanggal_harga desc limit 1";
				$res = $this->harga->manual_query($query);
				if ($res->num_rows()==0) {
					$data['harga'][$val->id_pasar][$value->id_komoditi] = 0;
				}else{
					$data['harga'][$val->id_pasar][$value->id_komoditi] = $res->row()->harga_harga;
				}
			}
		}
		// print_r($data['harga']);die();
		$data['data'] = $data;
		$this->load->view('export-harian',$data);
	}

	public function handlerexporttablestok($date){
		$role = explode("otoriter", $this->session->userdata('role'))[1];
		$this->load->model('harga');
		$this->load->model("pasar");
		$query = "select * from pasar order by nama_pasar asc";
		$data['allpasar'] = $this->pasar->manual_query($query);
		$this->load->model("komoditi");
		$query = "select * from komoditi where status_komoditi=1 order by nama_komoditi asc";
		$data['allkomoditi'] = $this->komoditi->manual_query($query);
		foreach ($data['allkomoditi']->result() as $value) {
			foreach ($data['allpasar']->result() as  $val) {
				$query = 'select * from stok inner join pasar on stok.id_pasar = pasar.id_pasar inner join komoditi on stok.id_komoditi=komoditi.id_komoditi where  stok.id_pasar = '.$val->id_pasar.' and stok.id_komoditi = '.$value->id_komoditi.' ';
				if ( isset($date)) {
					# code...
					$query.=" and date(tanggal_stok) = CAST('". $date."' AS DATE)";
					$data['date']= $date;
					// $req = true;
					$data['query'] = $query;
				}else{
					$query.=" and date(tanggal_stok) = curdate()";

				}
				$query.= "order by tanggal_harga desc limit 1";
				$res = $this->harga->manual_query($query);
				if ($res->num_rows()==0) {
					$data['harga'][$val->id_pasar][$value->id_komoditi] = 0;
				}else{
					$data['harga'][$val->id_pasar][$value->id_komoditi] = $res->row()->harga_harga;
				}
			}
		}
		$data['data'] = $data;
		$this->load->view('table-export',$data);
	}
	public function handlereditlisting(){
		$this->load->model('listing');
		foreach ($this->input->post() as $key => $value) {
			# code...
			if ($key!="id") {
				# code...
				$this->listing->edit_listing($key,$value,$this->input->post('id'));
			}
		}
		redirect(base_url("index.php/router/index/input_listing"));
	}
	public function handlereditkomoditi(){
		$this->load->model('komoditi');
		foreach ($this->input->post() as $key => $value) {
			# code...
			if ($key!="id") {
				# code...
				$this->komoditi->edit_komoditi($key,$value,$this->input->post('id'));
			}
		}
		redirect(base_url("index.php/router/index/kelola_komoditi"));
	}

	public function handlerinputmanual(){
		$this->load->model($this->input->post('tipe'));
		$query = "delete from ".$this->input->post('tipe')." where id_pasar=".$this->input->post('pasar');
		if ($this->input->post('tipe')=="stok") {
			# code...
			$query.= " and week(date(tanggal_stok)) = week(cast('".$this->input->post('date')."' as date))";
		}else{
			$query.= " and date(tanggal_harga) = cast('".$this->input->post('date')."' as date)";

		}
		$this->{$this->input->post('tipe')}->manual_query($query);
		$func="input_".$this->input->post('tipe')."_manual";
		foreach ($this->input->post() as $key => $value) {
			if (strpos($key, "kd")!==false) {
				$key = explode('kd', $key);
				if ($value!="") {
					$harga = str_replace(array('.', ','), '' , $value);
					$harga = (int ) $harga;
					$this->{$this->input->post('tipe')}->{$func}($this->input->post('pasar'),$key[1],$harga,$this->input->post('date'));
				}
			}
		}
		redirect(base_url());	
	}

	public function handlerinputketersediaan(){
		// print_r($_POST);
		// die();
		$this->load->model('ketersediaan');
		if (!isset($_POST['tanggal'])) {
			# code...
			$tanggal = date('Y-m-d');
		}else{
			$tanggal = $_POST['tanggal'];
			
		}
		if (!isset($_POST['pasar'])) {
			# code...
			$pasar = $_SESSION['id_pasar'];
		}else{
			$pasar = $_POST['pasar'];
		}
		$minggu = $_POST['minggu'];
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$this->ketersediaan->manual_query('delete from ketersediaan where tanggal_ketersediaan = '.$tanggal.' and pasar_ketersediaan = '.$pasar);
		foreach ($_POST as $key => $value) {
			$id_komoditi = explode("-", $key); 
			if ($id_komoditi[0] == "kd") {
				foreach ($value as $k => $v) {
					if ($v!='' && $_POST['nama-'.$id_komoditi[1]][$k]!='' && $pasar !=0) {
						$this->ketersediaan->input_ketersediaan($id_komoditi[1],$tanggal,$v,1,$_POST['nama-'.$id_komoditi[1]][$k],$pasar,$_SESSION['id'],$_POST['asal-'.$id_komoditi[1]][$k],$minggu,$bulan,$tahun);
					}
				}
			}
		}
		redirect(base_url("/index.php/router/index/input_ketersediaan"));
	}

	public function handlerexportketersediaan(){
		$data['tanggal'] = $_GET['tanggal'];
		$data['pasar'] = $_GET['pasar'];
		$this->load->model('komoditi');
		$this->load->model('ketersediaan');
		$data['komoditi'] = $this->komoditi->manual_query('select * from komoditi where status_komoditi = 3')->result();
		foreach ($data['komoditi'] as $key => $value) {
			# code...
			$data['ketersediaan'][$value->nama_komoditi] = $this->ketersediaan->manual_query('select * from ketersediaan where pasar_ketersediaan = "'.$_GET['pasar'].'" and week(tanggal_ketersediaan) = week("'.$_GET['tanggal'].'") and id_komoditi = '.$value->id_komoditi);
		}
		$this->load->view('export-ketersediaan',$data);
	}
	public function grafik_ketersediaan(){
		// $this->load->model('pasar');
		$this->load->model('komoditi');
		$this->load->model('ketersediaan');
		// $this->load->model('pasar');
		$data['komoditi'] = $this->komoditi->manual_query('select * from komoditi where status_komoditi = 3 order by nama_komoditi')->result();
		// $data['pasar'] = $this->pasar->manual_query('select * from pasar order by nama_pasar')->result();
		$data['ketersediaan'] = null;
		if (isset($_GET['bulan']) && isset($_GET['tahun']) && isset($_GET['bulan'] )) {
			for ($i=1; $i < 6 ; $i++){
				$data["perminggu"][$i] = $this->ketersediaan->manual_query('sele00ct sum(jumlah_ketersediaan) as total from ketersediaan where id_komoditi = '.$_GET['komoditi'].' and minggu_ketersediaan = '.$i." and bulan_ketersediaan = ".$_GET['bulan']." and tahun_ketersediaan = ".$_GET['tahun'])->result();		}
			}
		return $data;
	}

	public function hapus_ketersediaan($id){
		$this->load->model('ketersediaan');
		$this->ketersediaan->manual_query("delete from ketersediaan where id_ketersediaan = ".$id);
		$this->index("input_ketersediaan");
	}
}
