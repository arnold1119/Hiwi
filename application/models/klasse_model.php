<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("content-type:text/html;charset=utf8");
class Klasse_model extends CI_Model {
    public function k_insert($sql) {
    
            return $this->db->insert("Fahrzeugklasse",$sql);
    }
    

    public function k_select() {
        return $this->db->order_by("klasse","")->get("Fahrzeugklasse")->result_array();
        // return $this->db->order_by('fzk_id','desc')->get("fahrzeugklasse")->result_array(); 
    }

    public function k_select_d() {
        return $this->db->order_by('fzk_id','desc')->get("Fahrzeugklasse")->result_array();
    }

    public function k_get_one($array) {
        return $this->db->where($array)->get("Fahrzeugklasse")->result_array();
    }

    public function k_update($array,$id) {
        return $this->db->update("Fahrzeugklasse",$array,array('fzk_id'=>$id));
    }
	
	public function k_delete($fzk_id) {
		$t = $this->db->delete("Fahrzeugklasse",array('fzk_id'=>$fzk_id));
		$array = array(
			"fzk_id" => 0,
		);
		$tt = $this->db->update("Fahrzeug",$array,array('fzk_id'=>$fzk_id));
		if($t && $tt) {
			return true;
		}
	}

}



?>