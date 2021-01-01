<?php

class Penduduk_m extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function selectPenduduk(){
        $query = $this->db->query("SELECT * FROM Penduduk");
        $data = $query->result();

        return $data;
    }

   public function selectwhere($id){
        $query = $this->db->get_where('penduduk', array('nik' => $id));

        return $query->row_array();
    }

    public function selectOnlinePenduduk(){
        $query = $this->db->query("SELECT * FROM Penduduk where status = '1'");
        $data = $query->result();

        return $data;
    }

     public function selectOfflinePenduduk(){
        $query = $this->db->query("SELECT * FROM Penduduk where status = '0'");
        $data = $query->result();

        return $data;
    }

     public function logout($data, $id){
        $this->db->where("nik", $id);
        $this->db->update("penduduk", $data);
    }

    public function pesan(){
        $query = $this->db->query("SELECT * FROM pesan, penduduk WHERE pesan.nik = penduduk.nik");
        $data = $query->result();

        return $data;
    }

     public function kirim_pesan($data){
        $this->db->insert('pesan', $data);
    }
}
?>