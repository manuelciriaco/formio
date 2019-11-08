<?php
class Answers extends CI_Model {

    function getAnswers($id){
        $sql = "SELECT * FROM gpc_forms WHERE id_form  = ? ";
        $query = $this->db->query($sql, array($id));
        return $query->result();
    }

}
?>