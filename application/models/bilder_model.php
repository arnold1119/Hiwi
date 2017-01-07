<?php
    header("content-type:text/html;charset=utf8");
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bilder_model extends CI_Model{

    public function bilder_all() {
        return $this->db->order_by("bild","")->get("Sensor_Bild")->result_array();
    }


    public function bilder_bindung_s($array) {
        return $this->db->get_where("Sensor_Bild",$array)->result_array();
    }


	public function film_bindung_s($array) {
        return $this->db->get_where("Film",$array)->result_array();
    }

    public function bilder_update($array,$index) {
        return $this->db->update("Sensor_Bild",$array,array('sb_id'=>$index));
    }


    public function bilder_insert($array) {
        if($this->db->insert("Sensor_Bild",$array)) {
            return $this->db->insert_id();
        } else{
            return FALSE;
        }
    }
	
	public function bilder_select_d() {
    	return $this->db->order_by('bild','asc')->get("Sensor_Bild")->result_array();
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
    public function fas_array_insert($array) {
        $data['fas_id'] = $array['fas_id'];
        foreach($array['quelle_id'] as $data['quelle_id']) {
            $this->fas_quelle_insert($data);
        }
    }
    
    public function Session_bilder($array) {
    	
    }
    
    
    public function Session_bilder_exits($array) {
    	
    }
    
//  public function Session_bilder_insert($array) {
//  	$this->db->insert("Session",$data);
//  }
    
    public function Session_bilder_update($array) {
    	return $this->db->update("Session",$array,array('session_name'=>'bilder'));
    }
    
    
    public function Session_get_bilder() {
    	$array['session_name'] = 'bilder';
    	return $this->db->get_where("Session",$array)->result_array();
    }
    public function Session_get_vorbilder() {
    	$array['session_name'] = 'vorbilder';
    	return $this->db->get_where("Session",$array)->result_array();
    }
    
    
    public function Session_bilder_null() {
    	$array['session_value'] = 'null';
    	return $this->db->update("Session",$array,array('session_name'=>'bilder'));
    }
    public function Session_vorbilder_null() {
    	$array['session_value'] = 'null';
    	return $this->db->update("Session",$array,array('session_name'=>'vorbilder'));
    }
    
    public function vorbilder_set($vorbilder) {
    	$array = array(
    		"session_value" => $vorbilder,
    	);
    	$this->db->update("Session",$array,array('session_name'=>'vorbilder'));
    }
    
    public function Session_all() {
    	return $this->db->get("Session")->result_array();
    }
    
    public function Session_file_update($array) {
    	return $this->db->update("Session",$array,array('session_name'=>'file'));
    }
    public function Session_get_file() {
    	$array['session_name'] = 'file';
    	return $this->db->get_where("Session",$array)->result_array();
    }
    public function Session_file_null() {
    	$array['session_value'] = 'null';
    	return $this->db->update("Session",$array,array('session_name'=>'file'));
    }
    public function Session_vorfile_null() {
    	$array['session_value'] = 'null';
    	return $this->db->update("Session",$array,array('session_name'=>'vorfile'));
    }
    
    public function vorfile_set($vorfile) {
    	$array = array(
    		"session_value" => $vorfile,
    	);
    	$this->db->update("Session",$array,array('session_name'=>'vorfile'));
    }
    
    public function Session_bilderid_null() {
    	$array['session_value'] = 'null';
    	return $this->db->update("Session",$array,array('session_name'=>'bilder_id'));
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    



}
