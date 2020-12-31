<?php

class Kk_m extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function selectKk(){
        $query = $this->db->query("SELECT A.no_kk, A.rt, A.rw, B.jumlah, B.nama FROM kk A LEFT JOIN (SELECT nama, no_kk, COUNT(*) AS jumlah FROM penduduk GROUP BY no_kk) B ON A.no_kk = B.no_kk");
        $data = $query->result();

        return $data;
    }

    public function insert($data){
        $this->db->insert('kk', $data);
    }

    public function getId(){
        $query = $this->db->query("SELECT MAX(id_kk) + 1 as id_new FROM kk");
        $data = $query->row_array();

        return $data;
    }

    public function hapus_data($id)
    {
         $this->db->where('no_kk', $id);
         $this->db->delete('kk'); 
    }

    public function selectwhere($id){
        $query = $this->db->get_where('kk', array('no_kk' => $id));

        return $query->row_array();
    }

    public function updateKk($data, $id){
        $this->db->where("no_kk", $id);
        $this->db->update("kk", $data);
    }

    public function updateKepala($data, $id){
        $this->db->where("no_kk", $id);
        $this->db->update("kk", $data);
    }

    public function selectPenduduk($id){
        $query = $this->db->query("SELECT A.kepala_keluarga, B.no_kk, B.nik, B.nama, B.jk, B.tempat_lahir, B.tanggal_lahir FROM kk A LEFT JOIN penduduk B ON A.no_kk = B.no_kk WHERE B.no_kk = ".$id."");
        $data = $query->result();

        return $data;
    }

    public function selectKepala($id){
        $query = $this->db->get_where('penduduk', array('no_kk' => $id));

        return $query->row_array();
    }

    public function insertPenduduk($data,$data2){
        //$this->db->insert('agama', $data2);
        $this->db->insert('penduduk', $data);

    }

    public function selectKlasifikasi(){
        $query = $this->db->query("SELECT * FROM klasifikasi");
        $data = $query->result();

        return $data;
    }

    public function hapusPenduduk($id){
        $query = $this->db->get_where('penduduk', array('nik' => $id));
        $data = $query->row();
        if($data->foto != "") unlink("store/foto/$data->foto");
        $this->db->delete('penduduk', array('nik' => $id));
    }

    public function selectwherePenduduk($id){
        $query = $this->db->get_where('penduduk', array('nik' => $id));
        return $query->row_array();
    }

    public function updatePenduduk($data, $id){
        $this->db->where("nik", $id);
        $this->db->update("penduduk", $data);
    }
}
?>