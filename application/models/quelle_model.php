<?php
    header("content-type:text/html;charset=utf8");
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quelle_model extends CI_Model{

    public function q_all() {
        return $this->db->order_by("quellenname","")->get("Quelle")->result_array();
    }


    public function qbindung_s($array) {
        return $this->db->get_where("Quelle",$array)->result_array();
    }


    public function q_update($array,$index) {
        return $this->db->update("Quelle",$array,array('quelle_id'=>$index));
    }


    public function q_insert($array) {
        if($this->db->insert("Quelle",$array)) {
            return $this->db->insert_id();
        } else{
            return FALSE;
        }
    }
    public function fahrzeug_quelle_exits($data) {
        return $this->db->where($data)->get("Fahrzeug2Quelle")->result_array();
    }
    public function fahrzeug_quelle_insert($data) {
        if($this->fahrzeug_quelle_exits($data)) {
            return;
        } else{
            $this->db->insert("Fahrzeug2Quelle",$data);
        }
    }
    public function array_insert($array) {
        $data['fz_id'] = $array['fz_id'];
		$this->db->delete("Fahrzeug2Quelle",array('fz_id'=>$data['fz_id']));
        foreach($array['quelle_id'] as $data['quelle_id']) {
            $this->fahrzeug_quelle_insert($data);
        }
    }
	public function fas_quelle_exits($data) {
        return $this->db->where($data)->get("FAS2Quelle")->result_array();
    }
	public function fas_quelle_insert($data) {
        if($this->fas_quelle_exits($data)) {
            return;
        } else{
            $this->db->insert("FAS2Quelle",$data);
        }
    }
	
	public function array_fas_insert($array) {
        $data['fas_id'] = $array['fas_id'];
		$this->db->delete("FAS2Quelle",array('fas_id'=>$data['fas_id']));
        foreach($array['quelle_id'] as $data['quelle_id']) {
            $this->fas_quelle_insert($data);
        }
    }
	
	
	
	public function fas_film_exits($data) {
        return $this->db->where($data)->get("FAS2Film")->result_array();
    }
	public function fas_film_insert($data) {
        if($this->fas_film_exits($data)) {
            return;
        } else{
            $this->db->insert("FAS2Film",$data);
        }
    }
	
	public function array_film_insert($array) {
        $data['fas_id'] = $array['fas_id'];
		$this->db->delete("FAS2Film",array('fas_id'=>$data['fas_id']));
        foreach($array['film_id'] as $data['film_id']) {
            $this->fas_film_insert($data);
        }
    }
	
	
	public function quelle_delete($quelle_id) {
		$t = $this->db->delete("Quelle",array('quelle_id'=>$quelle_id));
		$array = array(
			"quelle_id" => 0,

		);
		$tt = $this->db->update("Fahrzeug2Quelle",$array,array('quelle_id'=>$quelle_id));
		$t3 = $this->db->update("FAS2Quelle",$array,array("quelle_id"=>$quelle_id));
		$t4 = $this->db->update("Sensor2Quelle",$array,array("quelle_id"=>$quelle_id));
		if($t && $tt && $t3 && $t4) {
			return true;
		}
		//$tt = $this->db->update("Fahrzeug",$array,array('fzk_id'=>$fzk_id));
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
   



}
