<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Content-type:text/html;charset=utf8");

class Land_model extends CI_Model{
    
    public function l_select() {
        return $this->db->get("Land")->result_array();
    }
	
	
	public function hbinden_select_landid_a() {
		return $this->db->order_by("land_id",'asc')->get("Land")->result_array();
	}
	
	public function hbinden_select_landid_d() {
		return $this->db->order_by("land_id",'desc')->get("Land")->result_array();
	}
	
	public function hbinden_select_landname_a() {
		return $this->db->order_by("land",'asc')->get("Land")->result_array();		
	}
	public function hbinden_select_landname_d() {
		return $this->db->order_by("land",'desc')->get("Land")->result_array();		
	}

    public function m_select() {
        return $this->db->order_by("marktname")->get("Markt")->result_array();
    }


    public function m_exists($array) {
        return $this->db->get_where("Markt",$array)->result_array();
    }
    public function fahrzeug_markt_exists($array) {
        return $this->db->get_where("Fahrzeug2Markt",$array)->result_array();
    }
    public function m_insert($array) {
        if($this->db->insert("Markt",$array)) {
            return $this->db->insert_id();
        }

        return false;
    }

    public function fahrzeug_markt_insert($array) {
        if($this->fahrzeug_markt_exists($array)) {
            return;
        } else{
            $this->db->insert("Fahrzeug2Markt",$array);
        }
    }


    public function m_array_insert($array) {
        $data['fz_id'] = $array['fz_id'];
        $this->db->delete("Fahrzeug2Markt",array('fz_id'=>$data['fz_id']));
        foreach($array['markt_id'] as $data['markt_id']) {
            $this->fahrzeug_markt_insert($data);
        }

    }


    public function m_update($array,$markt_id) {
        return $this->db->update("Markt", $array,array("markt_id"=>$markt_id));
    }

    public function lbingdung_select($array) {
        return $this->db->get_where("Land",$array)->result_array();
    }

    public function l_exists($array) {
        return $this->db->get_where("Land",$array)->result_array();
    }

    public function l_insert($array) {
        if($this->db->insert("Land",$array)) {
            return $this->db->insert_id();
        }

        return FALSE;
    }


    public function l_update($array,$index){
        return $this->db->update("Land",$array,array("land_id"=>$index));
    }

    public function marktland_delete($markt_id) {
		$t = $this->db->delete("Markt",array('markt_id'=>$markt_id));
		$array = array(
			"markt_id" => 0,

		);
		$tt = $this->db->update("Fahrzeug2Markt",$array,array('markt_id'=>$markt_id));
		if($t && $tt) {
			return true;
		}
		//$tt = $this->db->update("Fahrzeug",$array,array('fzk_id'=>$fzk_id));
	}
	
	
	public function delete_land_id($land_id) {
		$array = array(
			"land_id" => 0,
		);
		
		if($this->db->delete("Land",array('land_id'=>$land_id))) {
			$flag1 = $this->db->update("Fahrzeughersteller",$array,array("land_id"=>$land_id));
			$flag2 = $this->db->update("FAS_Hersteller",$array,array("land_id"=>$land_id));
			$flag3 = $this->db->update("Sensor_Hersteller",$array,array("land_id"=>$land_id));
			if($flag1 and $flag2 and $flag3) {
				return true;
			}
			return false;
		}
		
		return false;
	}
	


}



?>