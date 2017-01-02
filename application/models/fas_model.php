<?php
    header("content-type:text/html;charset=utf8");
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fas_model extends CI_Model{
    public function fas_all() {
        return $this->db->order_by("fasbezeichnung")->get("FAS")->result_array();
    }

    public function fas_type() {
        return $this->db->order_by("typ")->get("FAS_Typ")->result_array();
    }

    public function fas_hersteller() {
        return $this->db->order_by("herstellername")->get("FAS_Hersteller")->result_array();
    }

    public function fas_entwicklung() {
        return $this->db->order_by("entwicklung")->get("FAS_Entwicklung")->result_array();
    }

    public function fas_serie() {
        return $this->db->get("FAS_Serie")->result_array();
    }

    public function fas_waehrung() {
        return $this->db->get("Waehrung")->result_array();
    }
	public function filter($array) {
		return $this->db
//		->join("FAS_Typ","FAS.fast_id=FAS_Typ.fast_id")
//		->join("FAS_Hersteller","FAS_Hersteller.fash_id=FAS.fash_id")
		->where($array)->get("FAS")->result_array();
	}

    // public function fas_seit_distinct() {
    //     return $this->db->get
    // }

    public function concat_fahrzeug() {
        $this->db->join("FAS2Fahrzeug","FAS2Fahrzeug.fas_id=FAS.fas_id");
    }

    public function fas_fahrzeug_exits($array) {
        return $this->db->where($array)->get("FAS2Fahrzeug")->result_array();
    }

    public function fas_fahrzeug_insert($array) {
        $array['kosten'] = isset($array['kosten'])?$array['kosten']:0;
        if($this->fas_fahrzeug_exits($array)) {
            return;
        } else{
            $this->db->insert("FAS2Fahrzeug",$array);
        }
    }

    public function array_insert($array) {
        $data['fz_id'] = $array['fz_id'];
		$this->db->delete("FAS2Fahrzeug",array('fz_id'=>$data['fz_id']));
        foreach($array['fas_id'] as $data['fas_id']) {
            $this->fas_fahrzeug_insert($data);
        }
    }


    public function fas_fahrzeug_verbind($array) {
        $this->db->where($array)->join("FAS2Fahrzeug","FAS.fas_id=FAS2Fahrzeug.fas_id")
        ->where($array)->get("FAS")->result_array();
    }


		
		
		public function fas_quelle() {
			return $this->db->get("FAS2Quelle")
				->result_array();
		}

	
		public function type_insert($array) {
			return $this->db->insert("FAS_Typ",$array);
		}

		public function type_select_d() {
        	return $this->db->order_by('typ','asc')->get("FAS_Typ")->result_array();
    	}
		
		public function type_update($array,$id) {
        	return $this->db->update("FAS_Typ",$array,array('fast_id'=>$id));
    	}
    	
		public function type_get_one($array) {
        	return $this->db->where($array)->get("FAS_Typ")->result_array();
    	}
		
		
		public function hbinden_select() {
	        $data = $this->db->join("Land","FAS_Hersteller.land_id=Land.land_id")
	        ->get("FAS_Hersteller")->result_array();
	        return $data;
	    }

	    
	    public function hbindung_s($array) {
	        $data = $this->db->join("Land","FAS_Hersteller.land_id=Land.land_id")
	        ->get_where("FAS_Hersteller",$array)->result_array();
	        return $data;
	    }
		
		
		public function h_existiert($herstellername,$land_id,$fash_id) {
			$array2 = array(
				"fash_id" => $fash_id,
			);
	        $flag1 = ($land_id == $this->db->get_where("FAS_Hersteller",$array2)->result_array()[0]['land_id']);
			$flag2 = ($herstellername == $this->db->get_where("FAS_Hersteller",$array2)->result_array()[0]['herstellername']);
			return $flag2 and $flag1;
//			$flag2 = $this->db->get_where("")
	    }

		public function h_existiert2($array) {
			return $this->db->get_where("FAS_Hersteller",$array)->result_array();
		}

		public function h_update($array,$index) {
			return $this->db->update("FAS_Hersteller",$array,array("fash_id"=>$index));
//			$flag2 = $this->db->get_where("")
	    }
		
		public function h_insert($array){
	        if($data = $this->db->insert("FAS_Hersteller",$array)) {
	            $array = $this->db->order_by("herstellername","asc")->get("FAS_Hersteller")->result_array();
	            $array['INDEX'] = $this->db->insert_id();
				
				return $array;
	        } else{
	            return false;
	        }
	        
	    }
		
		
		public function entwicklung_get_one($array) {
        	return $this->db->where($array)->get("FAS_Entwicklung")->result_array();
    	}
		public function entwicklung_update($array,$id) {
        	return $this->db->update("FAS_Entwicklung",$array,array('fase_id'=>$id));
    	}
		
		public function entwicklung_insert($array) {
			return $this->db->insert("FAS_Entwicklung",$array);
		}
		public function entwicklung_select_d() {
        	return $this->db->order_by('entwicklung','asc')->get("FAS_Entwicklung")->result_array();
    	}
		
		
		
		public function serie_get_one($array) {
        	return $this->db->where($array)->get("FAS_Serie")->result_array();
    	}
		public function serie_update($array,$id) {
        	return $this->db->update("FAS_Serie",$array,array('fass_id'=>$id));
    	}
		
		public function serie_insert($array) {
			return $this->db->insert("FAS_Serie",$array);
		}
		public function serie_select_d() {
        	return $this->db->order_by('serie','asc')->get("FAS_Serie")->result_array();
    	}
		
		
		
		
		public function waehrung_get_one($array) {
        	return $this->db->where($array)->get("Waehrung")->result_array();
    	}
		public function waehrung_update($array,$id) {
        	return $this->db->update("Waehrung",$array,array('w_id'=>$id));
    	}
		
		public function waehrung_insert($array) {
			return $this->db->insert("Waehrung",$array);
		}
		public function waehrung_select_d() {
        	return $this->db->order_by('waehrung','asc')->get("Waehrung")->result_array();
    	}
		
		
		
		public function fas_bingqung_s($array) {
	        return $this->db->get_where("FAS",$array)->result_array();
	    }
		
		
		public function add($data) {
			$fas['fasbezeichnung'] = trim($data['fasbezeichnung']);
//			$fas['fas_id'] = $data['fas_id'];
	        $fas['fast_id'] = $data['fast_id'];
			$fas['fash_id'] = $data['fash_id'];
			$fas['fase_id'] = $data['fase_id'];
	        $fas['fass_id'] = $data['fass_id'];
	        $fas['w_id'] = $data['w_id'];

			$fas['funktion'] = trim($data['funktion']);	
	        $fas['serie_seit'] = $data['serie_seit'];	
			$fas['serie_bis'] = $data['serie_bis'];
	        $fas['aenderung'] = $data['aenderung'];
	        $fas['eingabe'] = $data['eingabe'];	
			
			$flag = $this->fas_bingqung_s($fas);
//p($flag);   
	        if($flag) {
	            return $flag[0]['fas_id'];
	        } else{
	            $this->db->insert("FAS",$fas,$fas);
	            return $this->db->insert_id();;
	        }   
	    }
		
		
		
		
		
		
		public function betriebgrenze_type_exists($fas_id) {
			$array = array("fas_id"=>$fas_id);
	        return $this->db->get_where("FAS_Betriebsgrenze",$array)->result_array();
	    }
	
	    public function betriebgrenze_type_insert($array,$fas_id) {
	        if($result = $this->betriebgrenze_type_exists($fas_id)) {
	            $this->db->update("FAS_Betriebsgrenze",$array,array("fas_id"=>$fas_id));
	        } else{
	        	$array['fas_id'] = $fas_id;
	            $this->db->insert("FAS_Betriebsgrenze",$array);
	        }
	    }
	
	
	    public function betriebgrenze_type_array_insert($array,$fas_id) {
	        
	            $this->betriebgrenze_type_insert($array,$fas_id);
	        
	
	    }
		
		
		
		
		public function all_teil_such($id) {
//			p($fas_id);die;
//		return $this->db->where(array('fas_id'=>$fas_id))->get("FAS")->result_array();
        $result['fas'] = $this->db->join("FAS_Hersteller","FAS_Hersteller.fash_id=FAS.fash_id")->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->
//      join("FAS_Betriebsgrenze","FAS_Betriebsgrenze.fas_id=FAS.fas_id")->
//      join("FAS_Betriebsgrenze_Einheit","FAS_Betriebsgrenze_Einheit.einheit_id=FAS_Betriebsgrenze.einheit_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        where(array("FAS.fas_id"=>$id))->get("FAS")->result_array();
        
		$result['betriebsgrenze'] = $this->db->join("FAS_Betriebsgrenze_Einheit","FAS_Betriebsgrenze_Einheit.einheit_id=FAS_Betriebsgrenze.einheit_id")->
		where(array("FAS_Betriebsgrenze.fas_id"=>$id))->limit(1)->
		get("FAS_Betriebsgrenze")->result_array();

//		p($result['betriebsgrenze']);
//		p(count($result['betriebsgrenze']));
		if(!count($result['betriebsgrenze'])) {
			$neudaten['fas_id'] = $id;
			$neudaten['von'] = -9999;
			$neudaten['bis'] = 9999;
			$neudaten['einheit_id'] = 0;
			$this->db->insert("FAS_Betriebsgrenze",$neudaten);
		}

		$result['betriebsgrenze'] = $this->db->join("FAS_Betriebsgrenze_Einheit","FAS_Betriebsgrenze_Einheit.einheit_id=FAS_Betriebsgrenze.einheit_id")->
		where(array("FAS_Betriebsgrenze.fas_id"=>$id))->limit(1)->
		get("FAS_Betriebsgrenze")->result_array();
		
		
		$result['sensor'] = $this->db->join("Sensor","Sensor.s_id=FAS2Sensor.s_id")->
        where(array("FAS2Sensor.fas_id"=>$id))->get("FAS2Sensor")->result_array();

    	$result['quelle'] = $this->db->join("FAS2Quelle","FAS2Quelle.quelle_id=Quelle.quelle_id")->
        where(array("fas_id"=>$id))->get("Quelle")->result_array();
		
		$result['film'] = $this->db->join("Film","Film.film_id=FAS2Film.film_id")->
		where(array("fas_id"=>$id))->get("FAS2Film")->result_array();
		
		
		
		$result['auto'] = $this->db->join("FAS2Fahrzeug","Fahrzeug.fz_id=FAS2Fahrzeug.fz_id")->
		join("Fahrzeughersteller","Fahrzeughersteller.fzh_id=Fahrzeug.fzh_id")->
		where(array("fas_id"=>$id))->
		get("Fahrzeug")->result_array();
		
        return $result;
    }
		
		
		
	public function bind_table_fas_a() {
        return $this->db->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->order_by("FAS_id",'asc')->
        get("FAS")->result_array();
    }
	
	public function bind_table_fas_d() {
        return $this->db->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->order_by("FAS_id",'desc')->
        get("FAS")->result_array();
    }
	
	
	public function bind_table_hersteller_a() {
        return $this->db->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->order_by("herstellername",'asc')->
        get("FAS")->result_array();
    }
	
	public function bind_table_hersteller_d() {
        return $this->db->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->order_by("herstellername",'desc')->
        get("FAS")->result_array();
    }
	
	
	public function bind_table_type_a() {
        return $this->db->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->order_by("typ",'asc')->
        get("FAS")->result_array();
    }
	
	public function bind_table_type_d() {
        return $this->db->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->order_by("typ",'desc')->
        get("FAS")->result_array();
    }
	
	public function bind_table_entwicklung_a() {
        return $this->db->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->order_by("entwicklung",'asc')->
        get("FAS")->result_array();
    }
	
	public function bind_table_entwicklung_d() {
        return $this->db->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->order_by("entwicklung",'desc')->
        get("FAS")->result_array();
    }
	public function bind_table_aenderung_a() {
        return $this->db->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->order_by("aenderung",'asc')->
        get("FAS")->result_array();
    }
	
	public function bind_table_aenderung_d() {
        return $this->db->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->order_by("aenderung",'desc')->
        get("FAS")->result_array();
    }	
			
	public function bind_table_eingabe_a() {
        return $this->db->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->order_by("eingabe",'asc')->
        get("FAS")->result_array();
    }
	
	public function bind_table_eingabe_d() {
        return $this->db->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->order_by("eingabe",'desc')->
        get("FAS")->result_array();
    }		
	
	public function bind_table_name_a() {
        return $this->db->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->order_by("fasbezeichnung",'asc')->
        get("FAS")->result_array();
    }
	
	public function bind_table_name_d() {
        return $this->db->
        join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
        join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
        join("Land","Land.land_id=FAS_Hersteller.land_id")->
        join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
        join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
        join("Waehrung","Waehrung.w_id=FAS.w_id")->order_by("fasbezeichnung",'desc')->
        get("FAS")->result_array();
    }	
			
			
		
		
//	public function bind_table() {
//      return $this->db->
//      join("FAS2Type","FAS.fas_id=FAS2Type.fas_id")->
//      join("FAS_Typ",'FAS_Typ.fast_id=FAS.fast_id')->
//      join("FAS_Hersteller","FAS.fash_id=FAS_Hersteller.fash_id")->
//      join("Land","Land.land_id=FAS_Hersteller.land_id")->
//      join("FAS_Entwicklung","FAS_Entwicklung.fase_id=FAS.fase_id")->
//      join("FAS_Serie","FAS_Serie.fass_id=FAS.fass_id")->
//      join("Waehrung","Waehrung.w_id=FAS.w_id")->
//      get("FAS")->result_array();
//  }
	
	
	public function fbindung_s($array) {
        return $this->db->get_where("FAS",$array)->result_array();
    }
		
		
		
		
		
//Flim start
	public function film_all() {
		return $this->db->order_by("link")->get("Film")->result_array();
	}


//Film end
		
	public function betrieb_einheit_all() {
		return $this->db->order_by("einheit",'asc')->get("FAS_Betriebsgrenze_Einheit")->result_array();
	}
		
		
	public function einheit_update($array,$id) {
    	return $this->db->update("FAS_Betriebsgrenze_Einheit",$array,array('einheit_id'=>$id));
	}	
		
	public function einheit_get_one($array) {
    	return $this->db->where($array)->get("FAS_Betriebsgrenze_Einheit")->result_array();
	}	
		
	public function einheit_insert($array) {
		return $this->db->insert("FAS_Betriebsgrenze_Einheit",$array);
	}
	public function einheit_select_d() {
    	return $this->db->order_by('einheit','asc')->get("FAS_Betriebsgrenze_Einheit")->result_array();
	}
	
	
	public function Fahrzeug_fas_delete_all($fz_id) {
		if($this->db->delete("FAS2Fahrzeug",array("fz_id"=>$fz_id))) {
			return $data["message"] = "success";
		}
		return $data['message'] = "error";
	}
	
	public function fas_type_delete_id($fast_id) {
		if($this->db->delete("FAS_Typ",array("fast_id"=>$fast_id))) {
//			$this->db->update("FAS_Typ",$array,array('fast_id'=>$id))
			$array = array(
				'fast_id' => 1,
			);
			$this->db->update("FAS",$array,array('fast_id'=>$fast_id));
			return $data['message'] = "success";
		}
		return $data['message'] = 'error';
	}
	
	
	public function fas_entwicklung_delete_id($fase_id) {
		if($this->db->delete("FAS_Entwicklung",array("fase_id"=>$fase_id))) {
//			$this->db->update("FAS_Typ",$array,array('fast_id'=>$id))
			$array = array(
				'fase_id' => 0,
			);
			$this->db->update("FAS",$array,array('fase_id'=>$fase_id));
			return $data['message'] = "success";
		}
		return $data['message'] = 'error';
	}
		
		
	public function fas_serie_delete_id($fass_id) {
		if($this->db->delete("FAS_Serie",array("fass_id"=>$fass_id))) {
			$array = array(
				"fass_id" => 0,
			);
			$this->db->update("FAS",$array,array("fass_id"=>$fass_id));
			return $data['message'] = 'success';
		}
		return $data['message'] = 'error';
	}
	
	public function fas_wahrung_delete_id($w_id) {
		if($this->db->delete("Waehrung",array("w_id"=>$w_id))) {
			$array = array(
				"w_id" => 0,
			);
			$this->db->update("FAS",$array,array("w_id"=>$w_id));
			return $data['message'] = "success";
		}
		return $data['message'] = 'error';
	}	

	public function fas_einheit_delete_id($einheit_id) {
		if($this->db->delete("FAS_Betriebsgrenze_Einheit",array("einheit_id"=>$einheit_id))) {
			$array = array(
				"einheit_id" => 0,
			);
			$this->db->update("FAS_Betriebsgrenze",$array,array("einheit_id"=>$einheit_id));
			return $data['message'] = "success";
		}
		return $data['message'] = 'error';
	}
	
	
	public function fas_fas_delete_id($fas_id) {
		$t0 = $this->db->delete("FAS",array("fas_id"=>$fas_id));
		$t1 = $this->db->delete("FAS2Fahrzeug",array("fas_id"=>$fas_id));
		$t2 = $this->db->delete("FAS2Film",array("fas_id"=>$fas_id));
		$t3 = $this->db->delete("FAS2Quelle",array("fas_id"=>$fas_id));
		$t4 = $this->db->delete("FAS2Sensor",array("fas_id"=>$fas_id));
		$t5 = $this->db->delete("FAS_Betriebsgrenze",array("fas_id"=>$fas_id));
		if($t0&&$t1&&$t2&&$t3&&$t4&&$t5) {
			return $data['message'] = "success";
		}
		
		return $data['message'] = 'error';
	}	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		





































}
    

?>