<?php
	class Home extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->load->model('Login_m');
			$this->load->model('Kk_m');
			$this->load->model('Penduduk_m');
		}

		public function index() {

			$nik = $this->session->userdata('nik');
			if(isset($nik)){
				$level = $this->session->userdata('level');

				if($level == 'penduduk'){
					redirect('Penduduk/');
				}
				else{
					redirect('Admin/', 'refresh');
				}
			}
			else{
				$this->load->view('index');
			}
		}

		public function submit_login() {

			$u = $this->input->post('val-username');
			$p = $this->input->post('val-password');

			$isLoggin = $this->Login_m->login_proses($u,$p);

			if($isLoggin == false){
				redirect('Home/', 'refresh');
			}
		}

		public function validasi(){

			$result['sesi'] 	 = $this->Login_m->get_validasi();
			$level 				 = $this->Login_m->selectAllLevel();

			$arr = array();
			foreach ($level as $key) {
				$arr[] =  $key->nama_akses;
			}
			$result['level'] = $arr;

			$this->load->view('validasi', $result);
		}

		public function dashboard(){

			$id_akses = $this->uri->segment('3');

			if($id_akses == 'akses04'){
				redirect('Admin/');
			}
			else if($id_akses == 'akses01'){
				$user['level'] = 'penduduk';
				$this->session->set_userdata($user); 
				redirect('Penduduk/');
			}

		}

		public function profile(){

			$result['active'] = 'dashboard';
			//Data User
			$nik  = $this->session->userdata('nik');
			$level  = $this->session->userdata('level');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);
			$data['aksi'] = 'penduduk';


			if($level == 'penduduk'){
				//JIKA LEVEL PENDUDUK
				$result['kk']	 = $this->Penduduk_m->selectwhere($nik);
				$this->load->view('templates/sidebar2', $result);
			}
			else{
				//JIKA LEVEL LAINNYA
				$this->load->view('templates/sidebar', $result);
			}
			$this->load->view('templates/header', $data);
			$this->load->view('profile', $data);

		}

		public function logout(){
			$this->session->sess_destroy();
			redirect('Home/');
		}

		public function sEditProfile(){

			$input['foto'] = $this->input->post("fotoLama");
			if($_FILES['foto']['name'] != ""){
				$i=rand(1,10000000);
				$namaFileAwal = $_FILES['foto']['name'];
				$ext = strtolower(pathinfo($namaFileAwal, PATHINFO_EXTENSION));
				$namaSementara = $_FILES['foto']['tmp_name'];
				$namaFile = "foto".$i.".".$ext;		

						// tentukan lokasi file akan dipindahkan
				$dirUpload = "store/foto/";
				if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg'  || $ext == 'svg'){
					$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
					unlink("store/foto/$input[foto]");
					$input['foto'] = $namaFile;
				}

				else{
					echo 'Gagal Format File Salah';
				}
			}

			$input['nik']   					= $this->input->post('nik');
			$input['username'] 					= $this->input->post('username_baru');
			$input['password']   				= base64_encode($this->input->post('password_baru'));
			$input['about'] 					= $this->input->post('tentang');

			//TABLE 2
			$id 								= $input['nik'];


			$this->Kk_m->updatePenduduk($input,$id);
			redirect('Home/');
			
		}
	}
?>