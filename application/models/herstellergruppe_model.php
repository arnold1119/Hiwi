<?php  

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Herstellergruppe_model extends CI_Model{

    public function hg_select() {
        return $this->db->get("Fahrzeughersteller_Gruppe")->result_array();
    }
	
	public function hg_one($fzhg_id) {
		return $this->db->get_where("Fahrzeughersteller_Gruppe",array("fzhg_id"=>$fzhg_id))->result_array();
	}
	
	public function hbinden_select_gruppename_a() {
        return $this->db->order_by("gruppenname","asc")->get("Fahrzeughersteller_Gruppe")->result_array();
		
	}
	
	public function hbinden_select_gruppename_b() {
        return $this->db->order_by("gruppenname","desc")->get("Fahrzeughersteller_Gruppe")->result_array();
		
	}
	
	public function hbinden_select_fzhg_a() {
        return $this->db->order_by("fzhg_id","asc")->get("Fahrzeughersteller_Gruppe")->result_array();
		
	}
	
	public function hbinden_select_fzhg_d() {
        return $this->db->order_by("fzhg_id","desc")->get("Fahrzeughersteller_Gruppe")->result_array();
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
}


?>