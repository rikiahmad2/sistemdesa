<?php

class Dokumen_m extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function selectAllDokumen(){
        $query = $this->db->query("SELECT * FROM dokumen");
        $data = $query->result();

        return $data;
    }

     public function selectKlasifikasiDokumen($id){
        $query = $this->db->query("SELECT * FROM klasifikasi , dokumen, klasifikasi_dokumen
                                        WHERE klasifikasi.id_klasifikasi = klasifikasi_dokumen.id_klasifikasi
                                        AND dokumen.id_dokumen = klasifikasi_dokumen.id_dokumen
                                        AND klasifikasi.id_klasifikasi = '".$id."'");
        $data = $query->result();

        return $data;
    }

    public function insert($data){
        $this->db->insert('klasifikasi_dokumen', $data);
    }

     public function hapus_data($id_dokumen,$id_klasifikasi)
    {
         $this->db->where('id_dokumen', $id_dokumen);
         $this->db->where('id_klasifikasi', $id_klasifikasi);
         $this->db->delete('klasifikasi_dokumen'); 
    }

     public function selectwhere($id){
        $query = $this->db->get_where('dokumen', array('id_dokumen' => $id));

        return $query->row_array();
    }

    public function updateDokumen($data, $id){
        $this->db->where("id_dokumen", $id);
        $this->db->update("dokumen", $data);
    }

    public function hapusDokumen($id)
    {
         $this->db->where('id_dokumen', $id);
         $this->db->delete('dokumen'); 
    }

    public function getId(){
        $query = $this->db->query("SELECT MAX(RIGHT(id_dokumen,1)) + 1 as id_new FROM dokumen");
        $data = $query->row_array();

        return $data;
    }

    public function insertDokumen($data){
        $this->db->insert('dokumen', $data);
    }
}
?>