<?php
    header("content-type:text/html;charset=utf8");
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Fahrzeug_model extends CI_Model {


    public function add($data) {
        $array['fzh_id'] = $data['fzh_id'];
        $array['fzk_id'] = $data['fzk_id'];
        $array['baujahr'] = $data['baujahr'];
		$fahrzeug['eingabe'] = $data['eingabe'];
        $array['fahrzeugname'] = $data['fahrzeugname'];
        $flag = $this->fbingqung_s($array);
        if($flag) {
            return $flag[0]['fz_id'];
        } else{
            $this->db->insert("Fahrzeug",$data);
            return $this->db->insert_id();
        }   
    }
	
	public function filter($array) {
//		p($array)
		return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")
		->where($array)->get("Fahrzeug")->result_array();
	}

    public function delete($data) {
        $this->db->delete("Fahrzeug",$data);
    }

    public function fbingqung_s($array) {
        return $this->db->get_where("Fahrzeug",$array)->result_array();
    }
	public function update($data) {
        
        $array['baujahr'] = $data['baujahr'];
        $array['fahrzeugname'] = $data['fahrzeugname'];
		
        $flag = $this->fbingqung_s($array);
		$array['fzh_id'] = $data['fzh_id'];
        $array['fzk_id'] = $data['fzk_id'];
		$array['eingabe'] = $data['eingabe'];
		$array['aenderung'] = $data['aenderung'];
		$array['bilder'] = $data['bilder'];
        if(count($flag)) {
        	$array['eingabe'] = $flag[0]['eingabe'];
        	$this->db->update("Fahrzeug",$array,array("fahrzeugname"=>$array['fahrzeugname'],'baujahr'=>$array['baujahr']));
            return $flag[0]['fz_id'];
        } else{
            $this->db->insert("Fahrzeug",$data);
            return $this->db->insert_id();
        }   
    }
    
	
	public function edit_update($data) {
        
        $array['baujahr'] = $data['baujahr'];
        $array['fahrzeugname'] = $data['fahrzeugname'];
		$array['fz_id'] = $data['fz_id'];
        $flag = $this->fbingqung_s($array);
		
		$array['fzh_id'] = $data['fzh_id'];
        $array['fzk_id'] = $data['fzk_id'];
		$array['eingabe'] = $data['eingabe'];
		$array['aenderung'] = $data['aenderung'];
		$array['bilder'] = $data['bilder'];
//     	p($flag);
		if($flag) {
			$array['eingabe'] = $flag[0]['eingabe'];
      		$this->db->update("Fahrzeug",$array,array("fz_id"=>$array['fz_id']));
        	return $flag[0]['fz_id'];
		} else{
			$array['eingabe'] = $data['eingabe'];
      		$this->db->update("Fahrzeug",$array,array("fz_id"=>$array['fz_id']));
        	return $data['fz_id'];
		}
//     	p($flag); 
    }
	
	
    public function exit_id($array) {
        return $this->db->get_where("Fahrzeug",$array)->result_array();
    }


    public function check() {
        $data = $this->db->get("Fahrzeug")->result_array();

        p($data);
    }

    public function f_all() {
        return $this->db->order_by("fahrzeugname","asc")->get("Fahrzeug")->result_array();
    }
// ->join("Fahrzeug2Markt","Fahrzeug2Markt.fz_id=Fahrzeug.fz_id")->join("Markt","Fahrzeug2Markt.markt_id=Markt.markt_id")->order_by("fz_id","desc")
    public function all_table() {
        return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        join("Fahrzeug2Markt","Fahrzeug2Markt.fz_id=Fahrzeug.fz_id")->
        join("Markt","Fahrzeug2Markt.markt_id=Markt.markt_id")->
        join("Fahrzeug2Quelle","Fahrzeug2Quelle.fz_id=Fahrzeug.fz_id")->
        join("Quelle","Quelle.quelle_id=Fahrzeug2Quelle.quelle_id")->
        get("Fahrzeug")->result_array();
    }

    public function all_table_bind($index) {
        return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        join("Fahrzeug2Markt","Fahrzeug2Markt.fz_id=Fahrzeug.fz_id")->
        join("Markt","Fahrzeug2Markt.markt_id=Markt.markt_id")->
        join("Fahrzeug2Quelle","Fahrzeug2Quelle.fz_id=Fahrzeug.fz_id")->
        join("Quelle","Quelle.quelle_id=Fahrzeug2Quelle.quelle_id")->
        where(array("Fahrzeug.fz_id"=>$index))->get("Fahrzeug")->result_array();
    }


    public function bind_table_herstellername_a() {
        return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        order_by("herstellername","asc")->
        get("Fahrzeug")->result_array();
    }
public function bind_table_herstellername_d() {
        return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        order_by("herstellername","desc")->
        get("Fahrzeug")->result_array();
    }
public function bind_table_fahrzeug_klasse_a() {
        return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
                order_by("klasse","asc")->
        get("Fahrzeug")->result_array();
    }
public function bind_table_fahrzeug_klasse_d() {
        return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
                order_by("klasse","desc")->
        get("Fahrzeug")->result_array();
    }
public function bind_table_baujahr_a() {
        return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        order_by("baujahr","asc")->
        get("Fahrzeug")->result_array();
    }
public function bind_table_baujahr_d() {
        return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        order_by("baujahr","desc")->
        get("Fahrzeug")->result_array();
    }
public function bind_table_aenderung_a() {
        return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        order_by("aenderung","asc")->
        get("Fahrzeug")->result_array();
    }
public function bind_table_aenderung_d() {
        return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        order_by("aenderung","desc")->
        get("Fahrzeug")->result_array();
    }
public function bind_table_eingabe_a() {
        return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        order_by("eingabe","asc")->
        get("Fahrzeug")->result_array();
    }
public function bind_table_eingabe_d() {
        return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
                order_by("eingabe","desc")->
        get("Fahrzeug")->result_array();
    }
public function bind_table_fahrzeugname_a() {
        return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        order_by("fahrzeugname","asc")->
        get("Fahrzeug")->result_array();
    }
public function bind_table_fahrzeugname_d() {
        return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
                order_by("fahrzeugname","desc")->
        get("Fahrzeug")->result_array();
    }
public function bind_table_id_a() {
    return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
    join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
    join("Land","Land.land_id=Fahrzeughersteller.land_id")->
    join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
    order_by("fz_id","asc")->
    get("Fahrzeug")->result_array();
}
public function bind_table_id_d() {
    return $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
    join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
    join("Land","Land.land_id=Fahrzeughersteller.land_id")->
    join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
            order_by("fz_id","desc")->
    get("Fahrzeug")->result_array();
}



    public function all_teil_such($fz_id) {
        $result['fahrzeug'] = $this->db->join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
        join("Fahrzeugklasse",'Fahrzeugklasse.fzk_id=Fahrzeug.fzk_id')->
        join("Land","Land.land_id=Fahrzeughersteller.land_id")->
        join("Fahrzeughersteller_Gruppe","Fahrzeughersteller_Gruppe.fzhg_id=Fahrzeughersteller.fzhg_id")->
        where(array("fz_id"=>$fz_id))->get("Fahrzeug")->result_array();
        $result['markt'] = $this->db->join("Fahrzeug2Markt","Fahrzeug2Markt.markt_id=Markt.markt_id")->
        where(array("fz_id"=>$fz_id))->get('Markt')->result_array();

        $result['quelle'] = $this->db->join("Fahrzeug2Quelle","Fahrzeug2Quelle.quelle_id=Quelle.quelle_id")->
        where(array("fz_id"=>$fz_id))->get("Quelle")->result_array();
        $result['fas'] = $this->db->join("FAS2Fahrzeug","FAS2Fahrzeug.fas_id=FAS.fas_id")->
        join("Fahrzeug","Fahrzeug.fz_id=FAS2Fahrzeug.fz_id")->
        where(array("Fahrzeug.fz_id"=>$fz_id))->get("FAS")->result_array();
        return $result;
    }




	public function FAS2Fahrzeug_fas_exits($array) {
        return $this->db->where($array)->get("FAS2Fahrzeug")->result_array();
    }

    public function FAS2Fahrzeug_fas_insert($array) {
//      $array['kosten'] = isset($array['kosten'])?$array['kosten']:0;
    if($this->FAS2Fahrzeug_fas_exits($array)) {
        return;
    } else{
            $this->db->insert("FAS2Fahrzeug",$array);
        }
    }
	

    public function FAS2Fahrzeug_array_insert($array) {
        $data['fas_id'] = $array['fas_id'];
		$this->db->delete("FAS2Fahrzeug",array('fas_id'=>$array['fas_id']));
        foreach($array['fahrzeugen_id'] as $data['fz_id']) {
        	$data['kosten'] = 0;
            $this->FAS2Fahrzeug_fas_insert($data);
        }
    }
	
	public function Fahrzeug_delete_all($fz_id) {
		if($this->db->delete("Fahrzeug",array("fz_id"=>$fz_id))
		&&$this->db->delete("Fahrzeug2Markt",array("fz_id"=>$fz_id))
		&&$this->db->delete("Fahrzeug2Quelle",array("fz_id"=>$fz_id))) {
			return $data["message"] = "success";
		}
		return $data["message"] = "error";
	}

}