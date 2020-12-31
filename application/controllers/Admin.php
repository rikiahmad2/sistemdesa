<?php
	class Admin extends CI_Controller {
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
			//Data User
			$nik  = $this->session->userdata('nik');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);
			$result['data'] = $this->Klasifikasi_m->countJenis();
			$result['data2'] = $this->Klasifikasi_m->countAllPenduduk();
			$result['data3'] = $this->Klasifikasi_m->selectKlasifikasi();

			$this->load->view('templates/sidebar', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('dashboard', $result);
		}

		//AGAMA
		public function agama(){

			$result['data'] = $this->Agama_m->selectAgama();
			$result['active'] = 'agama';
			//Data User
			$nik  = $this->session->userdata('nik');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);


			$this->load->view('templates/sidebar', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('agama/index', $result);
		}

		public function submit_tambah(){

			$input['id_agama']   = $this->input->post('id_agama');
			$input['nama_agama'] = $this->input->post('nama_agama');
			$input['status'] = '1';
			
			$this->Agama_m->insert($input);
			redirect('Admin/agama');
		}

		public function hapus(){

			$id = $this->uri->segment('3');
			$this->Agama_m->hapus_data($id);
			redirect('Admin/agama');
			
		}

		public function edit_agama(){

			$id = $this->uri->segment('3');
			$result['data'] = $this->Agama_m->selectwhere($id);
			$result['active'] = 'agama';
			//Data User
			$nik  = $this->session->userdata('nik');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);


			$this->load->view('templates/sidebar', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('agama/edit', $result);
			
		}

		public function sEditAgama(){

			$id = $this->uri->segment('3');
			$input['nama_agama'] = $this->input->post('nama_agama');
			$this->Agama_m->updateAgama($input,$id);
			redirect('Admin/agama');
			
		}
		//END AGAMA MANAGE


		//PENDUDUK (KK)
		public function kartukeluarga(){

			$result['data'] = $this->Kk_m->selectKk();
			$result['id']   = $this->Kk_m->getId();
			$result['active'] = 'kartukeluarga';
			//Data User
			$nik  = $this->session->userdata('nik');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);


			$this->load->view('templates/sidebar', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('kartukeluarga/index', $result);
		}

		public function sKartuKeluarga(){

			$input['id_kk']   		= $this->input->post('id_kk');
			$input['no_kk'] 		= $this->input->post('no_kk');
			$input['rt']   			= $this->input->post('rt');
			$input['rw'] 			= $this->input->post('rw');
			$input['alamat']   		= $this->input->post('alamat');
			$input['desa'] 			= $this->input->post('desa');
			$input['kecamatan'] 	= $this->input->post('kecamatan');
			$input['kabupaten']   	= $this->input->post('kabupaten');
			$input['kode_pos'] 		= $this->input->post('kode_pos');
			$input['provinsi'] 		= $this->input->post('provinsi');
			
			$this->Kk_m->insert($input);
			redirect('Admin/kartukeluarga');
		}

		public function hapusKk(){

			$id = $this->uri->segment('3');
			$this->Kk_m->hapus_data($id);
			redirect('Admin/kartukeluarga');
			
		}

		public function editKk(){

			$id = $this->uri->segment('3');
			$result['data'] = $this->Kk_m->selectwhere($id);
			$result['active'] = 'kartukeluarga';
			//Data User
			$nik  = $this->session->userdata('nik');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);


			$this->load->view('templates/sidebar', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('kartukeluarga/edit', $result);
			
		}

		public function sEditKepala(){

			
			$id  = $this->uri->segment('3');
			$input['kepala_keluarga']  = $this->uri->segment('4');
			$this->Kk_m->updateKepala($input,$id);
			redirect('Admin/detailKk/'.$id.'');
			
		}

		public function sEditKk(){

			
			$id  					= $this->input->post('kkLama');
			$input['no_kk'] 		= $this->input->post('no_kk');
			$input['rt']   			= $this->input->post('rt');
			$input['rw'] 			= $this->input->post('rw');
			$input['alamat']   		= $this->input->post('alamat');
			$input['desa'] 			= $this->input->post('desa');
			$input['kecamatan'] 	= $this->input->post('kecamatan');
			$input['kabupaten']   	= $this->input->post('kabupaten');
			$input['kode_pos'] 		= $this->input->post('kode_pos');
			$input['provinsi'] 		= $this->input->post('provinsi');

			$this->Kk_m->updateKk($input,$id);
			redirect('Admin/kartukeluarga');
			
		}
		//END KK

		//PENDUDUK (DETAIL KK)
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


			$this->load->view('templates/sidebar', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('kartukeluarga/detail', $result);
		}
		

		
		public function hapusPenduduk(){

			$id = $this->uri->segment('3');
			$aksi = $this->uri->segment('4');
			$this->Kk_m->hapusPenduduk($id);

			if($aksi == 'kk'){
				redirect('Admin/kartukeluarga');
			}
			else{
				redirect('Admin/dataPenduduk/');
			}
			
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
				redirect('Admin/detailKk/'.$input['no_kk'].'');
			}
			else{
				redirect('Admin/detailKk/'.$input['no_kk'].'');
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



			$this->load->view('templates/sidebar', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('kartukeluarga/edit_detail', $result);
			
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
			if($aksi == 'kk'){
				redirect('Admin/detailKk/'.$input['no_kk'].'');
			}
			else{
				redirect('Admin/dataPenduduk/');
			}
			
		}
		//END PENDUDUK DETAIL

		//KLASIFIKASI PENDUDUK
		public function klasifikasi(){
			//Data User
			$nik  = $this->session->userdata('nik');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);

			$result['data'] = $this->Klasifikasi_m->selectKlasifikasi();
			$result['id'] = $this->Klasifikasi_m->getId();
			$result['active'] = 'klasifikasi';


			$this->load->view('templates/sidebar', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('klasifikasi/index', $result);
		}

		public function hapusKlasifikasi(){

			$id = $this->uri->segment('3');
			$this->Klasifikasi_m->hapus_data($id);
			redirect('Admin/klasifikasi');
			
		}

		public function sKlasifikasi(){

			$input['id_klasifikasi']   = $this->input->post('id_klasifikasi');
			$input['nama_klasifikasi'] = $this->input->post('nama_klasifikasi');
			$input['status'] = '1';
			
			$this->Klasifikasi_m->insert($input);
			redirect('Admin/klasifikasi');
		}

		public function editKlasifikasi(){

			$id = $this->uri->segment('3');
			$result['data'] = $this->Klasifikasi_m->selectwhere($id);
			$result['active'] = 'agama';
			//Data User
			$nik  = $this->session->userdata('nik');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);


			$this->load->view('templates/sidebar', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('klasifikasi/edit', $result);
			
		}

		public function sEditKlasifikasi(){

			$id = $this->uri->segment('3');
			$input['nama_klasifikasi'] = $this->input->post('nama_klasifikasi');
			$this->Klasifikasi_m->updateKlasifikasi($input,$id);
			redirect('Admin/klasifikasi');
			
		}

		public function detailKlasifikasi(){

			$id = $this->uri->segment('3');
			$result['data2'] 		= $this->Klasifikasi_m->selectwhere($id);
			$result['data'] 		= $this->Dokumen_m->selectKlasifikasiDokumen($id);
			$result['data3'] 		= $this->Dokumen_m->selectAllDokumen();
			$result['active'] 	   	= 'klasifikasi';
			//Data User
			$nik  = $this->session->userdata('nik');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);


			$this->load->view('templates/sidebar', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('klasifikasi/detail', $result);
		}

		public function sDokumenKlasifikasi(){

			$input['id_dokumen']   			= $this->input->post('id_dokumen');
			$input['id_klasifikasi'] 		= $this->input->post('id_klasifikasi');
			
			$this->Dokumen_m->insert($input);
			redirect('Admin/detailKlasifikasi/'.$input['id_klasifikasi'].'');
		}

		public function hapusDokumenKlasifikasi(){

			$id_klasifikasi = $this->uri->segment('4');
			$id_dokumen = $this->uri->segment('3');
			$this->Dokumen_m->hapus_data($id_dokumen, $id_klasifikasi);
			redirect('Admin/detailKlasifikasi/'.$id_klasifikasi.'');
			
		}
		//END KLASIFIKASI

		public function dataPenduduk(){
			//Data User
			$nik  = $this->session->userdata('nik');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);

			$result['data'] 		= $this->Penduduk_m->selectPenduduk();
			$result['active'] 		= 'penduduk';
			$result['aksi'] 	   	= '';


			$this->load->view('templates/sidebar', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('penduduk/index', $result);
		}

		//DOCUMENT
		public function dokumen(){

			$result['data'] = $this->Dokumen_m->selectAllDokumen();
			$result['id'] = $this->Dokumen_m->getId();
			$result['active'] = 'dokumen';
			//Data User
			$nik  = $this->session->userdata('nik');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);


			$this->load->view('templates/sidebar', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('dokumen/index', $result);
		}

		public function sDokumen(){

			$input['id_dokumen']   = $this->input->post('id_dokumen');
			$input['nama_dokumen'] = $this->input->post('nama_dokumen');
			$input['status'] = '1';
			
			$this->Dokumen_m->insertDokumen($input);
			redirect('Admin/dokumen');
		}

		public function editDokumen(){

			$id = $this->uri->segment('3');
			$result['data'] = $this->Dokumen_m->selectwhere($id);
			$result['active'] = 'agama';
			//Data User
			$nik  = $this->session->userdata('nik');
			$data['data'] = $this->Kk_m->selectwherePenduduk($nik);


			$this->load->view('templates/sidebar', $result);
			$this->load->view('templates/header', $data);
			$this->load->view('dokumen/edit', $result);
			
		}

		public function sEditDokumen(){

			$id = $this->uri->segment('3');
			$input['nama_dokumen'] = $this->input->post('nama_dokumen');
			$this->Dokumen_m->updateDokumen($input,$id);
			redirect('Admin/dokumen');
			
		}

		public function hapusDokumen(){

			$id = $this->uri->segment('3');
			$this->Dokumen_m->hapusDokumen($id);
			redirect('Admin/dokumen');
			
		}
	}	
?>