<?php

class Agama_m extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function selectAgama(){
        $query = $this->db->query("SELECT A.*,B.jumlah FROM agama A LEFT JOIN (SELECT id_agama, COUNT(*) AS jumlah FROM penduduk GROUP BY id_agama) B ON A.id_agama = B.id_agama");
        $data = $query->result();

        return $data;
    }

    public function insert($data){
        $this->db->insert('agama', $data);
    }

    public function hapus_data($id_agama)
    {
         $this->db->where('id_agama', $id_agama);
         $this->db->delete('agama'); 
    }

    public function selectwhere($id){
        $query = $this->db->get_where('agama', array('id_agama' => $id));

        return $query->row_array();
    }

    public function updateAgama($data, $id){
        $this->db->where("id_agama", $id);
        $this->db->update("agama", $data);
    }
}
?>