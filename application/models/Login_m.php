<?php

class Login_m extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function login_proses($u, $p){
        $pass = base64_encode($p);
        $this->db->query("START TRANSACTION;");
        $cek_login = $this->db->query("SELECT * FROM penduduk, hak_akses, hak_akses_user 
            WHERE penduduk.nik = hak_akses_user.nik 
            AND hak_akses.id_akses = hak_akses_user.id_akses
            AND penduduk.username = '$u'
            AND penduduk.password = '$pass'");
        $cek = $cek_login->row();
        if ($cek_login->num_rows() > 1) {

            //SET SESSION
            $user['nik'] = $cek->nik;
            $nik         = $cek->nik; 
            $this->session->set_userdata($user);
            date_default_timezone_set('Asia/Jakarta');
            $waktu = date("d-m-Y  H:i");

            $this->db->query("INSERT INTO online (nik, waktu) VALUES ('$nik', '$waktu')");
            $this->db->query("UPDATE penduduk SET status = 1 WHERE nik = '$nik'");
            $res = $this->db->query("COMMIT");
            if ($res) {
                redirect('Home/validasi');
                return TRUE;
            }
        }
        elseif($cek_login->num_rows() > 0)
        {
            //SET SESSION
            $user['nik']    = $cek->nik;
            $user['level']  = $cek->nama_akses;
            $nik         = $cek->nik; 
            $this->session->set_userdata($user);
            date_default_timezone_set('Asia/Jakarta');
            $waktu = date("d-m-Y  H:i");

            $this->db->query("INSERT INTO online (nik, waktu) VALUES ('$nik', '$waktu')");
            $this->db->query("UPDATE penduduk SET status = 1 WHERE nik = '$nik'");
            $res = $this->db->query("COMMIT");
            if ($res) {
                $level = $this->session->userdata('level');

                if ($level == 'penduduk') {
                    redirect('Penduduk/');
                }    
                return TRUE;
            }
        }
        else
        {
            return false;
        }

    }

    public function get_validasi(){

        $aa = $this->session->userdata('nik');
        $sesi = $this->db->query("SELECT * FROM penduduk, hak_akses, hak_akses_user 
            WHERE penduduk.nik = hak_akses_user.nik 
            AND hak_akses.id_akses = hak_akses_user.id_akses
            AND penduduk.nik = '$aa'");
        return $sesi->result();
    }

     public function selectAllLevel(){
        $query = $this->db->query("SELECT * from hak_akses");
        $data = $query->result();

        return $data;
    }
}
?>