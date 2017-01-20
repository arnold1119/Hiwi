<?php  header("content-type:text/html;charset=utf8");
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hersteller_model extends CI_Model {
/**
 * [h_select ] alle Info in Fahrzeughersteller
 * @return [array] [description]
 */
    public function h_select() {
        return $this->db->order_by("herstellername")->get("Fahrzeughersteller")->result_array();
    }


    public function hbinden_select() {
        $data = $this->db->join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        join("Land","Fahrzeughersteller.land_id=Land.land_id")->get("Fahrzeughersteller")->result_array();
        return $data;
    }
    public function hbinden_select_hersteller_a() {
        $data = $this->db->join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        join("Land","Fahrzeughersteller.land_id=Land.land_id")->order_by("herstellername","asc")->get("Fahrzeughersteller")->result_array();
        return $data;
    }
    public function hbinden_select_hersteller_b() {
        $data = $this->db->join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        join("Land","Fahrzeughersteller.land_id=Land.land_id")->order_by("herstellername","desc")->get("Fahrzeughersteller")->result_array();
        return $data;
    }
	public function hbinden_select_hersteller_fzhb(){
		$data = $this->db->join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        join("Land","Fahrzeughersteller.land_id=Land.land_id")->order_by("fzh_id","desc")->get("Fahrzeughersteller")->result_array();
        return $data;
	}
	public function hbinden_select_hersteller_fzha(){
		$data = $this->db->join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        join("Land","Fahrzeughersteller.land_id=Land.land_id")->order_by("fzh_id","asc")->get("Fahrzeughersteller")->result_array();
        return $data;
	}
	
	public function hbinden_select_gruppe_a() {
		$data = $this->db->join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        join("Land","Fahrzeughersteller.land_id=Land.land_id")->order_by("gruppenname","asc")->get("Fahrzeughersteller")->result_array();
        return $data;
	}
	
	public function hbinden_select_gruppe_d() {
		$data = $this->db->join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        join("Land","Fahrzeughersteller.land_id=Land.land_id")->order_by("gruppenname","desc")->get("Fahrzeughersteller")->result_array();
        return $data;
	}
	
	public function hbinden_select_land_a() {
		$data = $this->db->join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        join("Land","Fahrzeughersteller.land_id=Land.land_id")->order_by("land","asc")->get("Fahrzeughersteller")->result_array();
        return $data;
	}
	
	public function hbinden_select_land_d() {
		$data = $this->db->join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        join("Land","Fahrzeughersteller.land_id=Land.land_id")->order_by("land","desc")->get("Fahrzeughersteller")->result_array();
        return $data;
	}

/**
 * verbing Fahrzeughersteller , fahrzeughersteller_gruppe und land
 * @param  [array] $array [array('fzh_id'=>$fzh_id)]
 * @return [$array]        [description]
 */
    public function hbindung_s($array) {
        $data = $this->db->join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        join("Land","Fahrzeughersteller.land_id=Land.land_id")->
        get_where("Fahrzeughersteller",$array)->result_array();
        return $data;
    }
/**
 * [h_insert insert into fahrzeughersteller eine List Data]
 * @param  [type] $array [description]$array = array(
  *                  "fzhg_id" => $fzhg_id,
  *                  "land_id" => $land_id,
  *                  "herstellername" => $herstellername,
  *                  );
 * @return [type]        [desc Array]
 */
    public function h_insert($array){
        if($this->db->insert("Fahrzeughersteller",$array)) {
            return $this->db->order_by("fzh_id","desc")->get("Fahrzeughersteller")->result_array();
        } else{
            return false;
        }
        
    }

/**
 * [entscheiden ob fahrzeugherstellerName]
 * @param  [type] $array [array("herstellername" => $herstellername)]
 * @return [type] $array [existiert order nicht]
 */
    public function h_existiert($array) {
    	$array1 = "/^".$array['herstellername']."/is";
    	p($array1);
        $result = $this->db->get_where("Fahrzeughersteller",$array)->result_array();
        $neu = array();
        foreach($result as $key => $value) {
        	$herstellername = $value['herstellername'];
			if(preg_match($array1, $herstellername)) {
				$neu[$key]['fzh_id'] = $value['fzh_id'];
				$neu[$key]['fzhg_id'] = $value['fzhg_id'];
				$neu[$key]['land_id'] = $value['land_id'];
				$neu[$key]['herstellername'] = $value['herstellername'];  
			}
        }
//      return $result;
		p($neu);
    }
    
    public function fahrzeug_HerstellerLand_gruppe_exits($array) {
        return $this->db->where($array)->get("Fahrzeughersteller_Gruppe")->result_array();
    }

    public function fahrzeug_HerstellerLand_gruppe_insert($array) {
        if($this->fahrzeug_HerstellerLand_gruppe_exits($array)) {
            return;
        } else{
            $this->db->insert("Fahrzeughersteller_Gruppe",$array);
			return $this->db->insert_id();
        }
    }

    public function HerstellerLand_gruppe_insert($array) {
        $data['fzhg_id'] = $array['fzhg_id'];
		$this->db->delete("Fahrzeughersteller_Gruppe",array('fzhg_id'=>$data['fzhg_id']));
        foreach($array['gruppenname'] as $data['gruppenname']) {
            $this->fahrzeug_HerstellerLand_gruppe_insert($data);
        }
    }
    
	public function delete_all($fzhg_id) {
		$array = array(
			'fzhg_id' => $fzhg_id,
		);
		if($this->db->delete("Fahrzeughersteller_Gruppe",$array)) {
			$news = array(
				"fzhg_id" => 0,
			);
			if($this->db->update("Fahrzeughersteller",$news,$array)) {
				return "success";
			} else{
				return "false";
			}
		} else{
			return "false";
		}
		
	}
	
	
	public function h_delete($fzh_id) {
		$t = $this->db->delete("Fahrzeughersteller",array('fzh_id'=>$fzh_id));
		$array = array(
			"fzh_id" => 0,

		);
		$tt = $this->db->update("Fahrzeug",$array,array('fzh_id'=>$fzh_id));
		if($t && $tt) {
			return true;
		}
		//$tt = $this->db->update("Fahrzeug",$array,array('fzk_id'=>$fzk_id));
	}
	
	public function fash_delete($fash_id){
		$t = $this->db->delete("FAS_Hersteller",array('fash_id'=>$fash_id));
		$array = array(
			"fash_id" => -1,
		);
		$tt = $this->db->update("FAS",$array,array('fash_id'=>$fash_id));
		if($t && $tt) {
			return true;
		}
	}


}

?>