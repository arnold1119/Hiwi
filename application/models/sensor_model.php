<?php
    header("content-type:text/html;charset=utf8");
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Sensor_model extends CI_Model {
	public function add($data) {
        $sensor['st_id'] = $data['st_id'];
		$sensor['sensorname'] = trim($data['sensorname']);
        $sensor['sp_id'] = $data['sp_id'];
        $sensor['sh_id'] = $data['sh_id'];
        $sensor['aenderung'] = $data['aenderung'];
        $sensor['eingabe'] = $data['eingabe'];
        $flag = $this->sbingqung_s($sensor);
        if($flag) {
            return $flag[0]['s_id'];
        } else{
            $this->db->insert("Sensor",$data);
            return $this->db->insert_id();
        }   
    }
	
	public function filter($array) {
//		p($array)
		return $this->db->
		join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")->
		join("Sensor_Typ","Sensor_Typ.st_id=Sensor.st_id")->
		join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
		where($array)->get("Sensor")->result_array();
	}
	public function sbingqung_s($array) {
        return $this->db->get_where("Sensor",$array)->result_array();
    }
	public function update($data) {
        $sensor['st_id'] = $data['st_id'];
		$sensor['sensorname'] = trim($data['sensorname']);
        $sensor['sp_id'] = $data['sp_id'];
        $sensor['sh_id'] = $data['sh_id'];
        
        $sensor['eingabe'] = $data['eingabe'];
        $flag = $this->sbingqung_s($sensor);
		$sensor['aenderung'] = $data['aenderung'];
        if($flag) {
        	$sensor['eingabe'] = $flag[0]['eingabe'];
        	$this->db->update("Sensor",$sensor,array("s_id"=>$flag[0]['s_id']));
            return $flag[0]['s_id'];
        } else{
            $this->db->insert("Sensor",$data);
            return $this->db->insert_id();
        }   
    }
	
	public function merkmal_add($data) {
      
        $flag = $this->merkmal_bingqung_s($data);
        if($flag) {
            return $flag[0]['sm_id'];
        } else{
            $this->db->insert("Sensor_Merkmal",$data);
            return $this->db->insert_id();
        }   
    }
	public function merkmal_update($array,$sm_id) {
      
        return $this->db->update("Sensor_Merkmal",$array,array('sm_id'=>$sm_id));
    }
	
	
	public function merkmal_bingqung_s($array) {
        return $this->db->get_where("Sensor_Merkmal",$array)->result_array();
    }
	
	
    public function merkmal2sensor_update($s_id) {
        if($result = $this->merkmal2sensor_exits($s_id)) {
            return $result[0]['sm_id'];
        } else{
            return "keine";
			
        }
    }
	
	
    public function merkmal2sensor_array_update($s_id) {
      
            return $this->merkmal2sensor_update($s_id);
    }
	
	public function merkmal2sensor_exits($s_id) {
		$array = array("s_id"=>$s_id);
        return $this->db->where($array)->get("Sensor_Merkmal2Sensor")->result_array();
    }
	

    public function merkmal2sensor_insert($array) {
    	$a = array('s_id'=>$array['s_id']);
        if($this->merkmal2sensor_exits($array['s_id'])) {
            $this->db->where($a)->update('Sensor_Merkmal2Sensor',$array);
        } else{
            $this->db->insert("Sensor_Merkmal2Sensor",$array);
        }
    }

    public function merkmal2sensor_array_insert($array) {
      
            $this->merkmal2sensor_insert($array);
        
    }
	
	public function sensor2quelle_exists($array) {
        return $this->db->get_where("Sensor2Quelle",$array)->result_array();
    }

    public function sensor2quelle_insert($array) {
        if($this->sensor2quelle_exists($array)) {
            return;
        } else{
            $this->db->insert("Sensor2Quelle",$array);
        }
    }

    public function quelle_array_insert($array) {
        $data['s_id'] = $array['s_id'];
        foreach($array['quelle_id'] as $data['quelle_id']) {
            $this->sensor2quelle_insert($data);
        }

    }
		public function sensor2quelle_update($array) {
        if($this->sensor2quelle_exists($array)) {
            return;
        } else{
            $this->db->insert("Sensor2Quelle",$array);
        }
    }

    public function quelle_array_update($array) {
        $data['s_id'] = $array['s_id'];
		$this->db->delete("Sensor2Quelle",array('s_id'=>$data['s_id']));
        foreach($array['quelle_id'] as $data['quelle_id']) {
            $this->sensor2quelle_update($data);
        }
    }
	public function sensor2bild_exists($array) {
        return $this->db->get_where("Sensor2Bild",$array)->result_array();
    }

    public function sensor2bild_insert($array) {
        if($this->sensor2bild_exists($array)) {
            return;
        } else{
            $this->db->insert("Sensor2Bild",$array);
        }
    }

    public function bild_array_insert($array) {
        $data['s_id'] = $array['s_id'];
		$this->db->delete("Sensor2Bild",array('s_id'=>$data['s_id']));
        foreach($array['bild_id'] as $data['sb_id']) {
            $this->sensor2bild_insert($data);
        }
    }
		public function sensor2bild_update($array) {
        if($this->sensor2bild_exists($array)) {
            return;
        } else{
            $this->db->insert("Sensor2Bild",$array);
        }
    }

    public function bild_array_update($array) {
        $data['s_id'] = $array['s_id'];
		$this->db->delete("Sensor2Bild",array('s_id'=>$data['s_id']));
        foreach($array['bild_id'] as $data['sb_id']) {
            $this->sensor2bild_update($data);
        }
    }
	public function all_sensor() {
		return $this->db->group_by("sensorname")->get("Sensor")->result_array();
	}

    public function sensor_type() {
        return $this->db->order_by("sensortyp")->get("Sensor_Typ")->result_array();
    }

    public function sensor_hersteller() {
        return $this->db->order_by("sensorhersteller")->get("Sensor_Hersteller")->result_array();
    }

    public function sensor_position() {
        return $this->db->order_by("position")->get("Sensor_Position")->result_array();
    }

    public function sensor_merkmal_typ() {
        return $this->db->order_by("merkmalstyp")->get("Sensor_Merkmal_Typ")->result_array();
    }

    public function fas_waehrung() {
        return $this->db->get("Waehrung")->result_array();
    }
	
	public function sensor_fas_exits($array) {
        return $this->db->where($array)->get("FAS2Sensor")->result_array();
    }

    public function sensor_fas_insert($array) {
//      $array['kosten'] = isset($array['kosten'])?$array['kosten']:0;
    if($this->sensor_fas_exits($array)) {
        return;
    } else{
            $this->db->insert("FAS2Sensor",$array);
        }
    }
	

    public function sensor_array_insert($array) {
        $data['fas_id'] = $array['fas_id'];
		$this->db->delete("FAS2Sensor",array('fas_id'=>$array['fas_id']));
        foreach($array['s_id'] as $data['s_id']) {
            $this->sensor_fas_insert($data);
        }
    }
	
	

  
	

    public function sensor_imsensor_array_insert($array) {
        $data['s_id'] = $array['s_id'];
		$this->db->delete("FAS2Sensor",array('s_id'=>$array['s_id']));
        foreach($array['fas_id'] as $data['fas_id']) {
            $this->sensor_fas_insert($data);
        }
    }
	public function sensor_einheit() {
        return $this->db->order_by("einheit")->get("Sensor_Merkmal_Einheit")->result_array();
    }
	public function bind_table_name_a() {
        return $this->db->
        join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
        join("Sensor_Typ",'Sensor_Typ.st_id=Sensor.st_id')->
        join("Land","Land.land_id=Sensor_Hersteller.land_id")->
        join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")->
        order_by("Sensor.sensorname","asc")->
        get("Sensor")->result_array();
    }
	public function bind_table_name_d() {
        return $this->db->join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
        join("Sensor_Typ",'Sensor_Typ.st_id=Sensor.st_id')->
        join("Land","Land.land_id=Sensor_Hersteller.land_id")->
        join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")
        ->order_by("Sensor.sensorname","desc")
        ->get("Sensor")->result_array();
    }
	
	
	public function bind_table_hersteller_a() {
        return $this->db->join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
        join("Sensor_Typ",'Sensor_Typ.st_id=Sensor.st_id')->
        join("Land","Land.land_id=Sensor_Hersteller.land_id")->
        join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")
        ->order_by("Sensor_Hersteller.sensorhersteller","asc")
        ->get("Sensor")->result_array();
    }
	public function bind_table_hersteller_d() {
        return $this->db->join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
        join("Sensor_Typ",'Sensor_Typ.st_id=Sensor.st_id')->
        join("Land","Land.land_id=Sensor_Hersteller.land_id")->
        join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")
        ->order_by("Sensor_Hersteller.sensorhersteller","desc")
        ->get("Sensor")->result_array();
    }
    
    
    
	public function bind_table_type_a() {
        return $this->db->join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
        join("Sensor_Typ",'Sensor_Typ.st_id=Sensor.st_id')->
        join("Land","Land.land_id=Sensor_Hersteller.land_id")->
        join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")
        ->order_by("Sensor_Typ.sensortyp","asc")
        ->get("Sensor")->result_array();
    }
	public function bind_table_type_d() {
        return $this->db->join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
        join("Sensor_Typ",'Sensor_Typ.st_id=Sensor.st_id')->
        join("Land","Land.land_id=Sensor_Hersteller.land_id")->
        join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")
        ->order_by("Sensor_Typ.sensortyp","desc")
        ->get("Sensor")->result_array();
    }
    
    
    
    
	public function bind_table_land_a() {
        return $this->db->join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
        join("Sensor_Typ",'Sensor_Typ.st_id=Sensor.st_id')->
        join("Land","Land.land_id=Sensor_Hersteller.land_id")->
        join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")
        ->order_by("Land.land","asc")
        ->get("Sensor")->result_array();
    }
	public function bind_table_land_d() {
        return $this->db->join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
        join("Sensor_Typ",'Sensor_Typ.st_id=Sensor.st_id')->
        join("Land","Land.land_id=Sensor_Hersteller.land_id")->
        join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")
        ->order_by("Land.land","desc")
        ->get("Sensor")->result_array();
    }
	
	
	
	public function bind_table_aenderung_a() {
        return $this->db->join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
        join("Sensor_Typ",'Sensor_Typ.st_id=Sensor.st_id')->
        join("Land","Land.land_id=Sensor_Hersteller.land_id")->
        join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")
        ->order_by("Sensor.aenderung","asc")
        ->get("Sensor")->result_array();
    }
	public function bind_table_aenderung_d() {
        return $this->db->join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
        join("Sensor_Typ",'Sensor_Typ.st_id=Sensor.st_id')->
        join("Land","Land.land_id=Sensor_Hersteller.land_id")->
        join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")
        ->order_by("Sensor.aenderung","desc")
        ->get("Sensor")->result_array();
    }
	
	
	
	public function bind_table_eingabe_a() {
        return $this->db->join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
        join("Sensor_Typ",'Sensor_Typ.st_id=Sensor.st_id')->
        join("Land","Land.land_id=Sensor_Hersteller.land_id")->
        join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")
        ->order_by("Sensor.eingabe","asc")
        ->get("Sensor")->result_array();
    }
	public function bind_table_eingabe_d() {
        return $this->db->join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
        join("Sensor_Typ",'Sensor_Typ.st_id=Sensor.st_id')->
        join("Land","Land.land_id=Sensor_Hersteller.land_id")->
        join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")
        ->order_by("Sensor.eingabe","desc")
        ->get("Sensor")->result_array();
    }
	
	
	public function bind_table_position_a() {
        return $this->db->join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
        join("Sensor_Typ",'Sensor_Typ.st_id=Sensor.st_id')->
        join("Land","Land.land_id=Sensor_Hersteller.land_id")->
        join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")
        ->order_by("Sensor_Position.position","asc")
        ->get("Sensor")->result_array();
    }
	public function bind_table_position_d() {
        return $this->db->join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
        join("Sensor_Typ",'Sensor_Typ.st_id=Sensor.st_id')->
        join("Land","Land.land_id=Sensor_Hersteller.land_id")->
        join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")
        ->order_by("Sensor_Position.position","desc")
        ->get("Sensor")->result_array();
    }
	
    public function all_teil_such($s_id) {
       $result['sensor'] = $this->db->
       join("Sensor_Hersteller","Sensor_Hersteller.sh_id=Sensor.sh_id")->
       join("Land","Land.land_id=Sensor_Hersteller.land_id")->
	   join("Sensor_Typ","Sensor_Typ.st_id=Sensor.st_id")->
	   join("Sensor_Position","Sensor_Position.sp_id=Sensor.sp_id")->
//	   join("Sensor_Merkmal2Sensor","Sensor_Merkmal2Sensor.s_id=Sensor.s_id")->
//	   join("Sensor_Merkmal","Sensor_Merkmal.sm_id=Sensor_Merkmal2Sensor.sm_id")->
//	   join("Sensor_Merkmal_Einheit","Sensor_Merkmal_Einheit.sme_id=Sensor_Merkmal.sme_id")->
//	   join("Sensor_Merkmal_Typ","Sensor_Merkmal_Typ.smt_id=Sensor_Merkmal.smt_id")->
       get_where("Sensor",array('Sensor.s_id'=>$s_id))->result_array();
	   
	   
	   $result['merkmals'] = $this->db->
	   join("Sensor_Merkmal2Sensor","Sensor_Merkmal2Sensor.s_id=Sensor.s_id")->
	   join("Sensor_Merkmal","Sensor_Merkmal.sm_id=Sensor_Merkmal2Sensor.sm_id")->
	   join("Sensor_Merkmal_Einheit","Sensor_Merkmal_Einheit.sme_id=Sensor_Merkmal.sme_id")->
	   join("Sensor_Merkmal_Typ","Sensor_Merkmal_Typ.smt_id=Sensor_Merkmal.smt_id")->
       get_where("Sensor",array('Sensor.s_id'=>$s_id))->result_array();
//p($result['merkmals'] );    
//	   if(count($result['merkmals'])==0) {
//	   		$result['merkmals'] = $this->db->
//	   		get_where("Sensor",array('Sensor.s_id'=>$s_id))->result_array();
//	   		
//	   }

	    if(!isset($result['merkmals'][0]['sm_id'])) {
			$sm_index = $this->db->
				order_by("sm_id","desc")->limit(1)->
		   		get("Sensor_Merkmal2Sensor")->result_array();
		   	$sm_index = $sm_index[0]['sm_id']+1;
			$array = array(
				'sm_id' => $sm_index,
				's_id' => $s_id,
			);
	   		$this->merkmal2sensor_array_insert($array);
			$array_merkmals = array(
				'sm_id' => $sm_index,
				'sme_id' => 0,
				'smt_id' => 0,
				'von' => 0.0,
				'bis' => 0.0,
			);
			$this->merkmal_add($array_merkmals);
	   		$result['merkmals'] = $this->db->
	   		join("Sensor_Merkmal2Sensor","Sensor_Merkmal2Sensor.s_id=Sensor.s_id")->
	   		join("Sensor_Merkmal","Sensor_Merkmal.sm_id=Sensor_Merkmal2Sensor.sm_id")->
	   		join("Sensor_Merkmal_Einheit","Sensor_Merkmal_Einheit.sme_id=Sensor_Merkmal.sme_id")->
	   		join("Sensor_Merkmal_Typ","Sensor_Merkmal_Typ.smt_id=Sensor_Merkmal.smt_id")->
	   		get_where("Sensor",array('Sensor.s_id'=>$s_id))->result_array();  
	    } 
	   
       $result['quelle'] = $this->db
	   ->join("Sensor2Quelle","Sensor2Quelle.s_id=Sensor.s_id")
	   ->join("Quelle","Quelle.quelle_id=Sensor2Quelle.quelle_id")
       ->get_where("Sensor",array('Sensor.s_id'=>$s_id))->result_array();
       $result['bild'] = $this->db->join("Sensor2Bild","Sensor2Bild.s_id=Sensor.s_id")
	   ->join("Sensor_Bild","Sensor_Bild.sb_id=Sensor2Bild.sb_id")
	   ->get_where("Sensor",array('Sensor.s_id'=>$s_id))->result_array();
	   $result['fas'] = $this->db->join("FAS","FAS.fas_id=FAS2Sensor.fas_id")->
        where(array("FAS2Sensor.s_id"=>$s_id))->get("FAS2Sensor")->result_array();
        return $result;
    }
    
    public function sensor_fas_all($s_id) {
    	$array = array("s_id"=>$s_id);
    	$fas_ids = $this->db->where($array)->get("FAS2Sensor")->result_array();
    	return $fas_ids;
    }
	
	
	public function type_insert($array) {
		return $this->db->insert("Sensor_Typ",$array);
	}
	
	public function type_select_d() {
    	return $this->db->order_by('sensortyp','asc')->get("Sensor_Typ")->result_array();
	}
	
	public function type_get_one($array) {
    	return $this->db->where($array)->get("Sensor_Typ")->result_array();
	}

	public function type_update($array,$id) {
    	return $this->db->update("Sensor_Typ",$array,array('st_id'=>$id));
	}
	
	public function hbinden_select() {
        $data = $this->db->join("Land","Sensor_Hersteller.land_id=Land.land_id")
        ->get("Sensor_Hersteller")->result_array();
        return $data;
    }
	public function h_existiert2($array) {
		return $this->db->get_where("Sensor_Hersteller",$array)->result_array();
	}
	
	public function h_insert($array){
        if($data = $this->db->insert("Sensor_Hersteller",$array)) {
            $array = $this->db->order_by("sensorhersteller","asc")->get("Sensor_Hersteller")->result_array();
            $array['INDEX'] = $this->db->insert_id();
			
			return $array;
        } else{
            return false;
        }
        
    }
	
	
	public function h_existiert($sensorhersteller,$land_id,$sh_id) {
		$array2 = array(
			"sh_id" => $sh_id,
		);
        $flag1 = ($land_id == $this->db->get_where("Sensor_Hersteller",$array2)->result_array()[0]['land_id']);
		$flag2 = ($sensorhersteller == $this->db->get_where("Sensor_Hersteller",$array2)->result_array()[0]['sensorhersteller']);
		return $flag2 and $flag1;
//			$flag2 = $this->db->get_where("")
    }
    public function h_update($array,$index) {
		return $this->db->update("Sensor_Hersteller",$array,array("sh_id"=>$index));
//			$flag2 = $this->db->get_where("")
    }
	
	 public function hbindung_s($array) {
        $data = $this->db->join("Land","Sensor_Hersteller.land_id=Land.land_id")
        ->get_where("Sensor_Hersteller",$array)->result_array();
        return $data;
    }
	
//	 public function sensor_position() {
//      return $this->db->get("Sensor_Position")->result_array();
//  }
//	
	public function position_insert($array) {
		return $this->db->insert("Sensor_Position",$array);
	}
	public function position_select_d() {
    	return $this->db->order_by('position','asc')->get("Sensor_Position")->result_array();
	}
	public function position_get_one($array) {
    	return $this->db->where($array)->get("Sensor_Position")->result_array();
	}
	public function position_update($array,$id) {
    	return $this->db->update("Sensor_Position",$array,array('sp_id'=>$id));
	}
	
	
//	public function sensor_merkmal_all() {
//		return $this->db->join("Sensor_Merkmal_Einheit","Sensor_Merkmal_Einheit.sme_id=Sensor_Merkmal.sme_id")
//		->join("Sensor_Merkmal_Typ","Sensor_Merkmal_Typ.smt_id = Sensor_Merkmal.smt_id")
//		->join("Sensor","Sensor.s_id=Sensor_Merkmal2Sensor.s_id")
//		->join("Sensor_Merkmal2Sensor","Sensor_Merkmal2Sensor.sm_id=Sensor_Merkmal.sm_id")
//		->get("Sensor_Merkmal")->result_array();
//	}
//	
//	public function sensor_merkmal_bindung($array) {
//		return $this->db->join("Sensor_Merkmal_Einheit","Sensor_Merkmal_Einheit.sme_id=Sensor_Merkmal.sme_id")
//		->join("Sensor_Merkmal_Typ","Sensor_Merkmal_Typ.smt_id = Sensor_Merkmal.smt_id")
//		->where($array)->get("Sensor_Merkmal")->result_array();
//	}
//	
	
	
	public function merkmal_type_insert($array) {
		return $this->db->insert("Sensor_Merkmal_Typ",$array);
	}
	public function merkmal_type_select_d() {
    	return $this->db->order_by('merkmalstyp','asc')->get("Sensor_Merkmal_Typ")->result_array();
	}
	public function merkmal_type_get_one($array) {
    	return $this->db->where($array)->get("Sensor_Merkmal_Typ")->result_array();
	}
	public function merkmal_type_update($array,$id) {
    	return $this->db->update("Sensor_Merkmal_Typ",$array,array('smt_id'=>$id));
	}
	public function einheit_insert($array) {
		return $this->db->insert("Sensor_Merkmal_Einheit",$array);
	}
	public function einheit_select_d() {
    	return $this->db->order_by('einheit','asc')->get("Sensor_Merkmal_Einheit")->result_array();
	}
	public function einheit_get_one($array) {
    	return $this->db->where($array)->get("Sensor_Merkmal_Einheit")->result_array();
	}
	public function einheit_update($array,$id) {
    	return $this->db->update("Sensor_Merkmal_Einheit",$array,array('sme_id'=>$id));
	}
	
	
	public function sensor_type_delete_id($st_id) {
		if($this->db->delete("Sensor_Typ",array("st_id"=>$st_id))) {
			$array = array(
				"st_id" => 0,
			);
			$this->db->update("Sensor",$array,array("st_id"=>$st_id));
			return $data['message'] = "success";
		}
		return $data['message'] = 'error';
	}
	
	public function sensor_hersteller_delete_id($sh_id) {
		if($this->db->delete("Sensor_Hersteller",array('sh_id'=>$sh_id))) {
			$array = array(
				"sh_id" => 0,
			);
			$this->db->update("Sensor",$array,array('sh_id'=>$sh_id));
			return $data['message'] = "success";
		}
		return $data['message'] = 'error'; 
	}
	
	public function sensor_position_delete_id($sp_id) {
		if($this->db->delete("Sensor_Position",array("sp_id"=>$sp_id))) {
			$array = array(
				"sp_id" => 30,
			);
			$this->db->update("Sensor",$array,array("sp_id"=>$sp_id));
			return $data['message'] = "success";
		}
		return $data['message'] = "error";
	}
	
	
	public function sensor_merkmal_type_delete_id($smt_id){
		if($this->db->delete("Sensor_Merkmal_Typ",array('smt_id'=>$smt_id))) {
			$array = array(
				"smt_id" => 0,
			);
			$this->db->update("Sensor_Merkmal",$array,array('smt_id'=>$smt_id));
			return $data['message'] = 'success';
		}
		return $data['message'] = 'error';
	}
	
	public function sensor_merkmal_einheit_delete_id($sme_id) {
		if($this->db->delete("Sensor_Merkmal_Einheit",array('sme_id'=>$sme_id))) {
			$array = array(
				"sme_id" => 0,
			);
			$this->db->update("Sensor_Merkmal",$array,array('sme_id'=>$sme_id));
			return $data['message'] = 'success';
		}
		return $data['message'] = 'error';
	}
	
	public function sensor_sensor_delete_id($s_id) {
		$t0 = $this->db->delete("Sensor",array("s_id"=>$s_id));
		$t1 = $this->db->delete("Sensor2Bild",array("s_id"=>$s_id));
		$t2 = $this->db->delete("Sensor2Quelle",array("s_id"=>$s_id));
		$t3 = $this->db->delete("FAS2Sensor",array("s_id"=>$s_id));
		$t4 = $this->db->delete("Sensor_Merkmal2Sensor",array("s_id"=>$s_id));
		
		
		if($t0&&$t1&&$t2&&$t3&&$t4) {
			return $data['message'] = "success";
		}
		
		return $data['message'] = 'error';
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

}


?>