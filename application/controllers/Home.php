<?php
	class Home extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->load->model('Login_m');
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
				echo 'ini akses penduduk';
			}

		}

		public function logout(){
			$this->session->sess_destroy();
			redirect('Home/');
		}
}
?>