<?php
	class Penduduk extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->load->model('Agama_m');
			$this->load->model('Kk_m');
			$this->load->model('Klasifikasi_m');
			$this->load->model('Penduduk_m');
			$this->load->model('Dokumen_m');
			$this->load->library('session');

		}

		public function index() {
			$result['active'] = 'dashboard';
			//Data User header
			$nik  = $this->session->userdata('nik');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);

			//View Data
			$result['data'] = $this->Klasifikasi_m->countJenis();
			$result['data2'] = $this->Klasifikasi_m->countAllPenduduk();
			$result['data3'] = $this->Klasifikasi_m->selectKlasifikasi();
			$result['kk']	 = $this->Penduduk_m->selectwhere($nik);

			$this->load->view('templates/sidebar2', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('dashboard', $result);
		}

		public function detailKk(){

			$id = $this->uri->segment('3');
			$result['data'] 		= $this->Kk_m->selectPenduduk($id);
			$result['kepala'] 		= $this->Kk_m->selectKepala($id);
			$result['no_kk'] 	   	= $id;
			$result['active'] 	   	= 'kartukeluarga';
			$result['aksi'] 	   	= 'kk';
			$result['agama'] 		= $this->Agama_m->selectAgama();
			$result['klasifikasi'] 	= $this->Kk_m->selectKlasifikasi();
			//Data User
			$nik  = $this->session->userdata('nik');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);
			$result['kk']['no_kk'] = '';


			$this->load->view('templates/sidebar2', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('penduduk2/index', $result);
		}

		public function hapusPenduduk(){

			$id = $this->uri->segment('3');
			$aksi = $this->uri->segment('4');
			$this->Kk_m->hapusPenduduk($id);

			redirect('Penduduk/detailKk');		
		}

		public function sTambahPenduduk(){
			$i=rand(1,10000000);
			$namaFileAwal = $_FILES['foto']['name'];
			$ext = strtolower(pathinfo($namaFileAwal, PATHINFO_EXTENSION));
			$namaSementara = $_FILES['foto']['tmp_name'];
			$namaFile = "foto".$i.".".$ext;		

				// tentukan lokasi file akan dipindahkan
			$dirUpload = "store/foto/";

			if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'svg'){
					// pindahkan file
				$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
				$input['foto'] 						= $namaFile;
				$input['nik']   					= $this->input->post('nik');
				$input['nama'] 						= $this->input->post('nama');
				$input['tempat_lahir']   			= $this->input->post('tempat_lahir');
				$input['tanggal_lahir'] 			= $this->input->post('tanggal_lahir');
				$input['jk']   						= $this->input->post('jk');
				$input['golongan_darah'] 			= $this->input->post('golongan_darah');
				$input['pendidikan'] 				= $this->input->post('pendidikan');
				$input['pekerjaan']   				= $this->input->post('pekerjaan');
				$input['status_perkawinan'] 		= $this->input->post('status_perkawinan');
				$input['kewarganegaraan'] 			= $this->input->post('kewarganegaraan');
				$input['id_agama'] 					= $this->input->post('id_agama');
				$input['id_klasifikasi'] 			= $this->input->post('id_klasifikasi');
				$input['no_kk'] 					= $this->input->post('no_kk');

					//TABLE 2
				$input2['id_agama'] 				= $input['id_agama'];

				echo $input['no_kk'];
				$this->Kk_m->insertPenduduk($input,$input2);
				redirect('Penduduk/detailKk/'.$input['no_kk'].'');
			}
			else{
				redirect('Penduduk/detailKk/'.$input['no_kk'].'');
			}
		}

		public function editPenduduk(){

			$id = $this->uri->segment('3');
			$result['data'] 		= $this->Kk_m->selectwherePenduduk($id);
			$result['active'] 		= 'kartukeluarga';
			$result['klasifikasi'] 	= $this->Kk_m->selectKlasifikasi();
			$result['agama'] 		= $this->Agama_m->selectAgama();
			$result['aksi']			= 'kk';
			//Data User
			$nik  = $this->session->userdata('nik');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);
			$result['kk']	 = $this->Penduduk_m->selectwhere($nik);



			$this->load->view('templates/sidebar2', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('penduduk2/edit', $result);
			
		}

		public function sEditPenduduk(){
			$aksi = $this->uri->segment('3');
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
							//redirect('event/edit/'.$id, 'refresh');
					echo 'Gagal';
				}
			}

			$input['nik']   					= $this->input->post('nik');
			$input['nama'] 						= $this->input->post('nama');
			$input['tempat_lahir']   			= $this->input->post('tempat_lahir');
			$input['tanggal_lahir'] 			= $this->input->post('tanggal_lahir');
			$input['jk']   						= $this->input->post('jk');
			$input['golongan_darah'] 			= $this->input->post('golongan_darah');
			$input['pendidikan'] 				= $this->input->post('pendidikan');
			$input['pekerjaan']   				= $this->input->post('pekerjaan');
			$input['status_perkawinan'] 		= $this->input->post('status_perkawinan');
			$input['kewarganegaraan'] 			= $this->input->post('kewarganegaraan');
			$input['id_agama'] 					= $this->input->post('id_agama');
			$input['id_klasifikasi'] 			= $this->input->post('id_klasifikasi');
			$input['no_kk'] 					= $this->input->post('no_kk');

						//TABLE 2
			$id 								= $input['nik'];


			$this->Kk_m->updatePenduduk($input,$id);
			redirect('Penduduk/detailKk/'.$input['no_kk'].'');
			
		}

		public function sEditKepala(){

			
			$id  = $this->uri->segment('3');
			$input['kepala_keluarga']  = $this->uri->segment('4');
			$this->Kk_m->updateKepala($input,$id);
			redirect('Penduduk/detailKk/'.$id.'');
			
		}
	}
?>