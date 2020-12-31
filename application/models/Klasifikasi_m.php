<?php

class Klasifikasi_m extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function selectKlasifikasi(){
        $query = $this->db->query("SELECT A.nama_klasifikasi, A.status, A.id_klasifikasi, B.id_klasifikasi, B.jumlah FROM klasifikasi A LEFT JOIN (SELECT id_klasifikasi, COUNT(*) AS jumlah FROM penduduk GROUP BY id_klasifikasi) B ON A.id_klasifikasi = B.id_klasifikasi");
        $data = $query->result();

        return $data;
    }

     public function hapus_data($id_agama)
    {
         $this->db->where('id_klasifikasi', $id_agama);
         $this->db->delete('klasifikasi'); 
    }

    public function getId(){
        $query = $this->db->query("SELECT MAX(RIGHT(id_klasifikasi,1)) + 1 as id_new FROM klasifikasi");
        $data = $query->row_array();

        return $data;
    }

    public function insert($data){
        $this->db->insert('klasifikasi', $data);
    }

    public function selectwhere($id){
        $query = $this->db->get_where('klasifikasi', array('id_klasifikasi' => $id));

        return $query->row_array();
    }

    public function updateKlasifikasi($data, $id){
        $this->db->where("id_klasifikasi", $id);
        $this->db->update("klasifikasi", $data);
    }

    public function countJenis(){
        $query = $this->db->query("SELECT jk, COUNT(*) AS jumlah FROM penduduk GROUP BY jk");
        $data = $query->result();

        return $data;
    }

    public function countAllPenduduk(){
        $query = $this->db->query("SELECT jk, COUNT(*) AS jumlah FROM penduduk");
        $data = $query->row_array();

        return $data;
    }
}
?>