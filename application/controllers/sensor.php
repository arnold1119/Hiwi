<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sensor extends CI_Controller{
	public function __construct() {
        parent::__construct();
        $this->load->model("sensor_model","sensor");
		$this->load->model("quelle_model","quelle");
		$this->load->model("bilder_model","bilder");
		$this->load->model("land_model","land");
		$this->load->model("fas_model","fas");
	}
	
    public function index() {
//  	$array = array(
//			"quelle_id" => 594,
//		);
//		$quelle = $this->quelle->qbindung_s($array);
//		p($quelle);die;
        // $this->load->view("header");\
        $data['sensor'] = $this->sensor->all_sensor();
		$data['sensortypes'] = $data['sensortype'] = $this->sensor->sensor_type();

		$data['sensorherstellers'] = $data['sensorhersteller'] = $this->sensor->sensor_hersteller();
		$data['positions'] = $data['position'] = $this->sensor->sensor_position();
		$data['merkmaltype'] = $this->sensor->sensor_merkmal_typ();
		$data['einheit'] = $this->sensor->sensor_einheit();
		$data['quelle'] = $this->quelle->q_all();
		$data['bilder'] = $this->bilder->bilder_all();
//		$data['update'] = $this->
//		p($data['merkmaltype']);die;
//		p($data);die;
        $this->load->view("sensor/index",$data);
    }
	
	
	public function filter() {
		$data1 = $this->input->post();
		p($data1);
		$data1 = $this->input->post();
		$data['sensortypes'] = $this->sensor->sensor_type();

		$data['sensorherstellers'] = $this->sensor->sensor_hersteller();
		$data['positions'] = $this->sensor->sensor_position();
//		p($data1);die;
		if($data1['sensortyp']=="" && $data1['position']=="" && $data1['sensorhersteller']=="") {
			$this->f_list();
		} else {
					
			if($data1['sensortyp'] != "") {
				$types['sensortyp'] = $data1['sensortyp'];
		//			p($hersteller);
				$test1 = $this->sensor->type_get_one($types)[0]['st_id'];
				$array['Sensor.st_id'] = $test1;
		//			$data['herstellername'] = $data1['hersteller'];
		//			p($array);
			} 
		
			if($data1['position'] != "") {
				$postions['position'] = $data1['position'];
		//			p($hersteller);
				$test2 = $this->sensor->position_get_one($hersteller)[0]['sp_id'];
				$array['Sensor.sp_id'] = $test2;
		//			$data['herstellername'] = $data1['hersteller'];
		//			p($array);
			} 
			if($data1['sensorhersteller'] != "") {
				$hersteller['sensorhersteller'] = $data1['sensorhersteller'];
		//			p($hersteller);
				$test3 = $this->sensor->h_existiert2($hersteller)[0]['sh_id'];
				$array['Sensor.sh_id'] = $test3;
		//			$data['herstellername'] = $data1['hersteller'];
		//			p($array);
			}
		$data['sensor'] = $this->sensor->filter($array);
//			p($data);
		$this->load->view("sensor/filterlist",$data);
		}
	}
	
	
	public function f_list() {
        $index = $this->uri->segment(3);
		$order = $this->uri->segment(4);
		$this->load->library("pagination");
		$perpage = 20;
		$config['base_url'] = site_url("sensor/f_list");
		$config['total_rows'] = count($this->sensor->bind_table_name_a());
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		
		$data["links"] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(3);
		$this->db->limit($perpage, $offset);
        if($index != -1) {
            $data['sensor_index'] = $index;
        } else{
            $data['sensor_index'] = -1;
        }
		
		switch($order) {
			case 1:
				$data["sensor"] = $this->sensor->bind_table_name_a();
				break;
			case 2:
				$data["sensor"] = $this->sensor->bind_table_name_d();
				break;
			case 3:
				$data["sensor"] = $this->sensor->bind_table_hersteller_a();
				break;
			case 4:
				$data["sensor"] = $this->sensor->bind_table_hersteller_d();
				break;
			case 5:
				$data["sensor"] = $this->sensor->bind_table_type_a();
				break;
			case 6:
				$data["sensor"] = $this->sensor->bind_table_type_d();
				break;
			case 7:
				$data["sensor"] = $this->sensor->bind_table_land_a();
				break;
			case 8:
				$data["sensor"] = $this->sensor->bind_table_land_d();
				break;
			case 9:
				$data["sensor"] = $this->sensor->bind_table_aenderung_a();
				break;
			case 10:
				$data["sensor"] = $this->sensor->bind_table_aenderung_d();
				break;
			case 11:
				$data["sensor"] = $this->sensor->bind_table_eingabe_a();
				break;
			case 12:
				$data["sensor"] = $this->sensor->bind_table_eingabe_d();
				break;
			case 13:
				$data["sensor"] = $this->sensor->bind_table_position_a();
				break;
			case 14:
				$data["sensor"] = $this->sensor->bind_table_position_d();
				break;
			default:
				$data["sensor"] = $this->sensor->bind_table_name_a();
		}
        
//         p($data);
        // $data['fahrzeug'] = $this->fahrzeug->f_all();
        $this->load->view("sensor/list",$data);
    }
	
	
	
	public function edit(){
		
	    if($this->input->post()) {
		    $data = $this->input->post();

			if($data['sme_id'][0] ==$data['sme_id'][1]) {
				$merkmal['sme_id'] = $data['sme_id'][0];
			} else{
				error("Merkmal Einheit musst gleich!!");
			}
			$sensor2Quelle = array_key_exists('quelle_id',$data)? array_unique($data['quelle_id']):array(0);
			$sensor2Bild = array_key_exists('bild_id',$data)? array_unique($data['bild_id']):array(0);
		//		p($sensor2Quelle);
		//		p($sensor2Bild);
		//		p('$11111111 = (condition) ? a : b ;');
		//		die;
//		 p($data);die;
		    $sensor['st_id'] = $data['st_id'];
			$sensor['sensorname'] = trim($data['sensorname']);
		    $sensor['sp_id'] = $data['sp_id'];
		    $sensor['sh_id'] = $data['sh_id'];
		    $sensor['aenderung'] = $data['aenderung'];
		    $sensor['eingabe'] = $data['eingabe'];
		//      $sensor2Quelle = array_combine(array('quelle_id'), $sensor2Quelle);
		//		$sensor2Bild = array_combine(array('bild_id'), $sensor2Bild);
		//    	p($sensor2Quelle);
		//		p($sensor2Bild);
		    if($sensor) {
		            $s_id = $this->sensor->update($sensor);
		        
		//p($s_id);
		            $Quelle['s_id'] = $s_id;
		            $Quelle['quelle_id'] = $sensor2Quelle;
		//p($Quelle);
		            $this->sensor->quelle_array_update($Quelle);
		
		//p($merkmal['sme_id']);die;
		            $Bild['s_id'] = $s_id;
		            $Bild['bild_id'] = $sensor2Bild;
		
		            $this->sensor->bild_array_update($Bild);
		//p($Bild);
					$merkmal['sm_id'] = $data['smt_id'];
					$merkmal['smt_id'] = $data['smt_id'];
					$merkmal['sme_id'] = $data['sme_id'];
					$merkmal['von'] = $data['von'];
					$merkmal['bis'] = $data['bis'];
					$sm_id = $this->sensor->merkmal_add($merkmal);
		//p($sm_id);			
		
					$merkmal2sensor['sm_id'] = $sm_id;
					$merkmal2sensor['s_id']	= $s_id;
		//p($merkmal2sensor);
		            $this->sensor->merkmal2sensor_array_update($merkmal2sensor,$s_id);
					success("sensor/sensorinfo/$s_id","Date update success");
		   
		        } else{
		            error("Fehler bei Daten speichern!!");
	      	  }
	    } else{
            $s_id = $this->uri->segment(3);
			$data = $this->sensor->all_teil_such($s_id);
//p($data);
			$data['faslist'] = $this->fas->fas_all();
//p($data);		
        	$data['sensorlist'] = $this->sensor->all_sensor();
			$data['sensortype'] = $this->sensor->sensor_type();
//p($data['sensortype']);
			$data['sensorhersteller'] = $this->sensor->sensor_hersteller();
			$data['position'] = $this->sensor->sensor_position();
			$data['merkmaltype'] = $this->sensor->sensor_merkmal_typ();
			$data['einheit'] = $this->sensor->sensor_einheit();
			$data['quellelist'] = $this->quelle->q_all();
			$data['bilderlist'] = $this->bilder->bilder_all();
            
//p($data['sensor']);	p($data['quelle']);	p($data['bild']);
	
//          $data["quelle"] = $this->quelle->q_all();
//          $data['fas'] = $this->fas->fas_all();
//          $data['mland'] = $this->land->m_select();
//          // // p($data);die;
//          $data['hersteller'] = $this->h->h_select();
//          // // p($data['hersteller']);die;
//
//          $data["klasse"] = $this->k->k_select();
//p($data['merkmaltype']);
            $this->load->view("sensor/edit",$data);
        }
        
    }

	public function typeindex() {
		if($this->uri->segment(3)) {
            $data['st_index'] = $this->uri->segment(3);
        } else{
            $data['st_index'] = -1;
        }
		$data['sensortype'] = $this->sensor->sensor_type(); 
//		p($data);
		$this->load->view("sensor/st_index.php",$data);
		
	}
	
	
	public function typeinsert(){
		 if( $this->input->post("sensortyp")!=null) {
//             p($this->input->post());
            $array = array(
                'sensortyp' => $this->input->post("sensortyp")
                );
            $result = $this->db->get_where("Sensor_Typ",$array)->result_array();
            if(count($result)) {
                error("Die Sensor Type Name schon  existiert !!!");
            } else{
                $sta = $this->sensor->type_insert($array);
                if($sta) {
                $data['count'] = count($this->sensor->type_select_d());
                // p(count($this->k->k_select_d()));die;
                $data['sensortype'] = $this->sensor->type_select_d();
// p($data);
                // $this->load->view("header");
                $this->load->view("sensor/st_insert.php",$data);
                } else{
                    error("insert failer");
                }
            }
        } else{
            $data['sensortype'] = $this->sensor->sensor_type();
            $data['count'] = 0;
//			p($data);die;
            // $this->load->view("header");
            $this->load->view("sensor/st_insert.php",$data);
        }
	}
	public function typeedit() {
		$id = $this->uri->segment(3);

        if($this->input->post("edit")) {
            $typ = $this->input->post("sensortyp");
			$array = array(
                "sensortyp" => $typ,
                );
			$result = $this->db->get_where("Sensor_Typ",$array)->result_array();
            if(count($result)) {
                error("Die FAS_Type Name schon  existiert !!!");
            } else{
            
	            $sta = $this->sensor->type_update($array,$id);
	            if($sta) {
	                success("sensor/typeindex/$id","success update");
	            } else{
	                error("fehler bei update");
	            }
			}
        } else{
            if($id) {
                $array = array(
                "st_id" => $id,
                );
                $data['result'] = $this->sensor->type_get_one($array);
                $this->load->view("sensor/st_edit",$data);
            } 
        }
	}
	
	public function sensor_hersteller_index() {
        $index = $this->uri->segment(3);
        if($index != -1) {
            $data['hst_index'] = $index;
        } else{
            $data['hst_index'] = -1;
        }
        $data['hersteller'] = $this->sensor->hbinden_select();
//      p($data);
		$this->load->view("sensor/hersteller_index",$data);
	}
	
	
	public function sensor_hersteller_insert() {
		if($this->input->post("add")) {
            $herstellername = $this->input->post("sensorhersteller");
			$land_id = $this->input->post("land_id");
            $array = array(
                "sensorhersteller" => $herstellername,
                "land_id" => $land_id,
                );
            
            if(!count($this->sensor->h_existiert2($array))){
                
                $array = array(
                    "land_id" => $land_id,
                    "sensorhersteller" => $herstellername,
                    );
                $index = $this->sensor->h_insert($array)["INDEX"];
                success("sensor/sensor_hersteller_index/$index","Add Sensor Hersteller Success!!");

            } else{
                error("Die Sensor Hersteller Name schon existiert");
            }
            
        } else{
            $data['land'] = $this->land->l_select();
            $this->load->view("sensor/hersteller_insert",$data);
        }
		
	}
	public function sensor_hersteller_edit() {
		if($this->input->post("update")) {
            $sh_id = $this->uri->segment(3);
//          $fzhg_id = $this->input->post('sh_id');
            $land_id = $this->input->post("land_id");
            $herstellername = $this->input->post("sensorhersteller");
//			p($this->input->post());die;
            $array = array(
                "herstellername" => $herstellername,
                );

            if(!$this->sensor->h_existiert($herstellername,$land_id,$sh_id) ){
                $array = array(
                    "land_id" => $land_id,
                    "sensorhersteller" => $herstellername,
                    );
                $index = $this->sensor->h_update($array,$sh_id)[0]["sh_id"];
				
                success("sensor/sensor_hersteller_index/$index","Update Sensor Hersteller Success!!");
            } else{
                error("Die Sensor Hersteller Name schon existiert!!!update fehler!!");
            }


            // p($_POST);die;
        } else{
            $fash_id = $this->uri->segment(3);
            $array = array(
                'sh_id' => $fash_id,
                );
            $data['result'] = $this->sensor->hbindung_s($array);
            $data['land'] = $this->land->l_select();

            // p($data);die;
            $this->load->view("sensor/hersteller_edit",$data);	
        }
			
	}
	public function position_index() {

		if($this->uri->segment(3)) {
            $data['t_index'] = $this->uri->segment(3);
        } else{
            $data['t_index'] = -1;
        }
		$data['position'] = $this->sensor->sensor_position(); 
		$this->load->view("sensor/position_index",$data);
	}
	
	
	public function position_insert() {
		if( $this->input->post("position")!=null) {
            // p($this->input->post());die;
            $array = array(
                'position' => $this->input->post("position")
                );
            $result = $this->db->get_where("Sensor_Position",$array)->result_array();
            if(count($result)) {
                error("Die Sensor Position Name schon  existiert !!!");
            } else{
                $sta = $this->sensor->position_insert($array);
//				p($sta);
                if($sta) {
                $data['count'] = count($this->sensor->position_select_d());
                // p(count($this->k->k_select_d()));die;
                $data['position'] = $this->sensor->position_select_d();
// p($data);
                // $this->load->view("header");
                $this->load->view("sensor/position_insert",$data);
                } else{
                    error("insert failer");
                }
            }
        } else{
            $data['position'] = $this->sensor->sensor_position();
            $data['count'] = 0;
//			p($data);die;
            // $this->load->view("header");
            $this->load->view("sensor/position_insert",$data);
        }
		
	}
	
	public function position_edit() {
		$id = $this->uri->segment(3);

        if($this->input->post("edit")) {
            $position = $this->input->post("position");
			$array = array(
                "position" => $position,
                );
			$result = $this->db->get_where("Sensor_Position",$array)->result_array();
            if(count($result)) {
                error("Die Sensor_Position Name schon  existiert !!!");
            } else{
            
	            $sta = $this->sensor->position_update($array,$id);
	            if($sta) {
	                success("sensor/position_index/$id","success update");
	            } else{
	                error("fehler bei update");
	            }
			}
        } else{
            if($id) {
                $array = array(
                "sp_id" => $id,
                );
                $data['result'] = $this->sensor->position_get_one($array);
                $this->load->view("sensor/position_edit",$data);
            } 
        }
		
	}
	
	
	public function merkmal_type_index() {
		if($this->uri->segment(3)) {
            $data['t_index'] = $this->uri->segment(3);
        } else{
            $data['t_index'] = -1;
        }
		$data['merkmaltype'] = $this->sensor->sensor_merkmal_typ(); 
		$this->load->view("sensor/merkmal_type_index",$data);
	}
	
	
	public function merkmal_type_insert() {
		if( $this->input->post("merkmalstyp")!=null) {
            // p($this->input->post());die;
            $array = array(
                'merkmalstyp' => $this->input->post("merkmalstyp")
                );
            $result = $this->db->get_where("Sensor_Merkmal_Typ",$array)->result_array();
            if(count($result)) {
                error("Die Sensor Merkmal Type Name schon  existiert !!!");
            } else{
                $sta = $this->sensor->merkmal_type_insert($array);
                if($sta) {
                $data['count'] = count($this->sensor->merkmal_type_select_d());
                // p(count($this->k->k_select_d()));die;
                $data['merkmalstyp'] = $this->sensor->merkmal_type_select_d();
// p($data);
                // $this->load->view("header");
                $this->load->view("sensor/merkmal_type_insert",$data);
                } else{
                    error("insert failer");
                }
            }
        } else{
            $data['merkmalstyp'] = $this->sensor->sensor_merkmal_typ();
            $data['count'] = 0;
//			p($data);die;
            // $this->load->view("header");
            $this->load->view("sensor/merkmal_type_insert",$data);
        }
		
	}
	
	public function merkmal_type_edit() {
		$id = $this->uri->segment(3);

        if($this->input->post("edit")) {
            $merkmalstyp = $this->input->post("merkmalstyp");
			$array = array(
                "merkmalstyp" => $merkmalstyp,
                );
			$result = $this->db->get_where("Sensor_Merkmal_Typ",$array)->result_array();
            if(count($result)) {
                error("Die Sensor Merkmal Type schon  existiert !!!");
            } else{
            
	            $sta = $this->sensor->merkmal_type_update($array,$id);
	            if($sta) {
	                success("sensor/merkmal_type_index/$id","success update");
	            } else{
	                error("fehler bei update");
	            }
			}
        } else{
            if($id) {
                $array = array(
                "smt_id" => $id,
                );
                $data['result'] = $this->sensor->merkmal_type_get_one($array);
                $this->load->view("sensor/merkmal_type_edit",$data);
            } 
        }
		
	}
		
	public function einheit_index() {

		if($this->uri->segment(3)) {
            $data['t_index'] = $this->uri->segment(3);
        } else{
            $data['t_index'] = -1;
        }
		$data['einheit'] = $this->sensor->sensor_einheit(); 
		$this->load->view("sensor/einheit_index",$data);
	}
	
	public function einheit_insert() {
//		p($this->input->post("einheit"))；die;
		if( $this->input->post("einheit")!=null) {
			
            $array = array(
                'einheit' => $this->input->post("einheit")
                );
            $result = $this->db->get_where("Sensor_Merkmal_Einheit",$array)->result_array();
//			p($result);die;
            if(count($result)) {
                error("Die Sensor Einheit Name schon  existiert !!!");
            } else{
                $sta = $this->sensor->einheit_insert($array);
                if($sta) {
                $data['count'] = count($this->sensor->einheit_select_d());
                // p(count($this->k->k_select_d()));die;
                $data['einheit'] = $this->sensor->einheit_select_d();
// p($data);
                // $this->load->view("header");
                $this->load->view("sensor/einheit_index",$data);
                } else{
                    error("insert failer");
                }
            }
        } else{
            $data['einheit'] = $this->sensor->sensor_einheit();
            $data['count'] = 0;
//			p($data);die;
            // $this->load->view("header");
            $this->load->view("sensor/einheit_insert",$data);
        }
		
	}
	
	public function einheit_edit() {
		$id = $this->uri->segment(3);

        if($this->input->post("edit")) {

            $einheit = $this->input->post("einheit");
			$array = array(
                "einheit" => $einheit,
                );
			$result = $this->db->get_where("Sensor_Merkmal_Einheit",$array)->result_array();
            if(count($result)) {
                error("Die Sensor Einheit Name schon  existiert !!!");
            } else{
            
	            $sta = $this->sensor->einheit_update($array,$id);
	            if($sta) {
	                success("sensor/einheit_index/$id","success update");
	            } else{
	                error("fehler bei update");
	            }
			}
        } else{
            if($id) {
                $array = array(
                "sme_id" => $id,
                );
                $data['result'] = $this->sensor->einheit_get_one($array);
                $this->load->view("sensor/einheit_edit",$data);
            } 
        }
		
	}
	
	public function quelle_add(){
		$index = $this->input->post("index");
		$array = array(
			"quelle_id" => $index,
		);
		$quelle = $this->quelle->qbindung_s($array)[0];
		
		$quelle["message"] = "success";
		
		echo json_encode($quelle);
	}
	public function bilder_add() {
		$index = $this->input->post("index");
		$array = array(
			"sb_id" => $index,
		);
		$quelle = $this->bilder->bilder_bindung_s($array)[0];
		
		$quelle["message"] = "success";
		
		echo json_encode($quelle);
	}
	
	
	
	public function sensor_add() {
		$index = $this->input->post("index");
		$array = array(
			"s_id" => $index,
		);
		$quelle = $this->sensor->sbingqung_s($array)[0];
		
		$quelle["message"] = "success";
		
		echo json_encode($quelle);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function speicher() {
//p($this->input->post());
		
		$data = $this->input->post();
		if($data['sme_id'][0] ==$data['sme_id'][1]) {
			$merkmal['sme_id'] = $data['sme_id'][0];
		} else{
			error("Merkmal Einheit musst gleich!!");
		}
		$sensor2Quelle = array_key_exists('quelle_id',$data)? array_unique($data['quelle_id']):array(0);
		$sensor2Bild = array_key_exists('bild_id',$data)? array_unique($data['bild_id']):array(0);
		$sensor2Fas = array_key_exists('fas_id',$data)? array_unique($data['fas_id']):array(0);
		
//		p($sensor2Quelle);die;
//		p($sensor2Bild);
//		p('$11111111 = (condition) ? a : b ;');
//		die;
// p($data);
        $sensor['st_id'] = $data['st_id'];
		$sensor['sensorname'] = trim($data['sensorname']);
        $sensor['sp_id'] = $data['sp_id'];
        $sensor['sh_id'] = $data['sh_id'];
        $sensor['aenderung'] = $data['aenderung'];
        $sensor['eingabe'] = $data['eingabe'];
//      $sensor2Quelle = array_combine(array('quelle_id'), $sensor2Quelle);
//		$sensor2Bild = array_combine(array('bild_id'), $sensor2Bild);
//    	p($sensor2Quelle);
//		p($sensor2Bild);
        if($sensor) {
 			$s_id = $this->sensor->update($sensor);
	        
//	p($s_id);
	            $Quelle['s_id'] = $s_id;
	            $Quelle['quelle_id'] = $sensor2Quelle;
	//p($Quelle);
	            $this->sensor->quelle_array_update($Quelle);
	
//	p($merkmal['sme_id']);die;
	            $Bild['s_id'] = $s_id;
	            $Bild['bild_id'] = $sensor2Bild;
	
	            $this->sensor->bild_array_update($Bild);
	//p($Bild);
				$Fas['s_id'] = $s_id;
				$Fas['fas_id'] = $sensor2Fas;
//	p($Fas);die;
				$this->sensor->sensor_imsensor_array_insert($Fas);
	
//p($sensor);
				$merkmal2sensor['s_id']	= $s_id;
	            $sm_id = $this->sensor->merkmal2sensor_array_update($s_id);
//				p($sm_id);
					$merkmal['smt_id'] = $data['smt_id'];
					$merkmal['von'] = $data['von'];
					$merkmal['bis'] = $data['bis'];
				if($sm_id=="keine") {
					
					$sm_id = $this->sensor->merkmal_add($merkmal);
					$arr = array(
							"s_id" => $s_id,
							"sm_id" => $sm_id,
							);
					$this->sensor->merkmal2sensor_array_insert($arr);
					
				} else{
					
					$this->sensor->merkmal_update($merkmal,$sm_id);
				}
				
				
	//p($sm_id);			
	
//				$merkmal2sensor['sm_id'] = $sm_id;

				success("sensor/sensorinfo/$s_id","Date update success");
   
        } else{
            error("Fehler bei Daten speichern!!");
        }
		
	}

	public function sensorinfo(){
		
        $s_id = $this->uri->segment(3);
		
        $data = $this->sensor->all_teil_such($s_id);
//p($data);
		$data['sensortypes'] = $this->sensor->sensor_type();

		$data['sensorherstellers'] = $this->sensor->sensor_hersteller();
		$data['positions'] = $this->sensor->sensor_position();
//		$data['fas'] = $this->sensor->sensor_fas_all($s_id);
//		p($data['fas']);die;
        
// p($data);
        $this->load->view("sensor/info",$data);
    }
	
	public function sensor_type_delete() {
		$st_id = $this->input->post("st_id");
		$this->sensor->sensor_type_delete_id($st_id);
		$data['message'] = "success";
		echo json_encode($data);
	}

	public function sensor_hersteller_delete() {
		$sh_id = $this->input->post("sh_id");
		$this->sensor->sensor_hersteller_delete_id($sh_id);
		$data['message'] = "success";
		echo json_encode($data);
	}

	public function sensor_position_delete() {
		$sp_id = $this->input->post("sp_id");
		$this->sensor->sensor_position_delete_id($sp_id);
		$data['message'] = "success";
		echo json_encode($data);
	}

	public function sensor_merkmal_type_delete() {
		$smt_id = $this->input->post("smt_id");
		
		$this->sensor->sensor_merkmal_type_delete_id($smt_id);
		$data['message'] = 'success';
		echo json_encode($data);
	}
	
	public function sensor_merkmal_einheit_delete(){
		$sme_id = $this->input->post("sme_id");
		$this->sensor->sensor_merkmal_einheit_delete_id($sme_id);
		$data['message'] = 'success';
		
		echo json_encode($data);
	}

	public function sensor_delete() {
		$s_id = $this->input->post("s_id");
		$this->sensor->sensor_sensor_delete_id($s_id);
		$data['message'] = 'success';
		
		echo json_encode($data);
	}












































































}

?>