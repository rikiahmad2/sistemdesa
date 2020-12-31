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
}
?>