<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fas extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("fas_model","fas");
		$this->load->model("fahrzeug_model","fahrzeug");
		$this->load->model("hersteller_model","h");
		$this->load->model("klasse_model","k");
		
		$this->load->model("sensor_model","sensor");
		$this->load->model("land_model","land");
		$this->load->model("quelle_model","quelle");
		$this->load->model("sensor_model","sensor");
		$this->load->model("bilder_model","bilder");
    }
    public function index() {
		$data['sensor'] = $this->sensor->all_sensor();
		
//		p($data);
        $data['fas'] = $this->fas->fas_all();
        $data['fastypes'] = $data['fastype'] = $this->fas->fas_type();
        $data['fasherstellers'] = $data['fashersteller'] = $this->fas->fas_hersteller();
        $data['entwicklung'] = $this->fas->fas_entwicklung();
        $data['serie'] = $this->fas->fas_serie();
        $data['waehrung'] = $this->fas->fas_waehrung();
//		$data['betriebsgrenze'] = $this->fas->betrieb_type();
		$data['quelle'] = $this->quelle->q_all();
		$data['film'] = $this->fas->film_all();
		$data['einheit'] = $this->fas->betrieb_einheit_all();
		$data['fahrzeugen'] = $this->fahrzeug->f_all();
//p($data['fahrzeugen']);
//		p($data['einheit']);die;
//p($data['film']);
//P($data['betriebsgrenze']);die;
//		$data['quelle'] = $this->fas->fas_quelle();
// p($data['quelle']);die;
        $this->load->view("fas/index",$data);
    }
    
    public function filter() {
    	$data['fas'] = $this->fas->fas_all();
        $data['fastypes'] = $this->fas->fas_type();
        $data['fasherstellers'] = $this->fas->fas_hersteller();
    	$data1 = $this->input->post();
//		p($data1);
		if($data1['fasbezeichnung']=="" && $data1['typ']=="" && $data1['hersteller']=="") {
			$this->f_list();
		} else {	
			if($data1['fasbezeichnung'] != "") {
				$array['FAS.fasbezeichnung'] = $data1['fasbezeichnung'];
//				p($array);die;
			} 
		
			if($data1['typ'] != '') {
				$types['typ'] = $data1['typ'];
				$result = $this->fas->type_get_one($types)[0]['fast_id'];
				$array['FAS.fast_id'] = $result;
			} 
			if($data1['hersteller'] != "") {
				$hersteller['herstellername'] = $data1['hersteller'];
		//			p($hersteller);
				$test = $this->fas->h_existiert2($hersteller)[0]['fash_id'];
				$array['FAS.fash_id'] = $test;
		//			$data['herstellername'] = $data1['hersteller'];
					
			}
//			p($array);
			$data['fas_result'] = $this->fas->filter($array);
//				p($data['fas_result']);
			$this->load->view("fas/filterlist",$data);
		}
    }
	
	

	
	
    public function fas_add(){
		$index = $this->input->post("index");
		$array = array(
			"fas_id" => $index,
		);
		$quelle = $this->fas->fbindung_s($array)[0];
		
		$quelle["message"] = "success";
		
		echo json_encode($quelle);
	}
	
	public function typeindex() {
		
		if($this->uri->segment(3)) {
            $data['t_index'] = $this->uri->segment(3);
        } else{
            $data['t_index'] = -1;
        }
		$data['fastype'] = $this->fas->fas_type(); 
		$data['fastypes'] = $this->fas->fas_type();
		$data['fasherstellers'] = $data['fashersteller'] = $this->fas->fas_hersteller();
		$data['fass'] = $this->fas->fas_all();
//		p($data);
		$this->load->view("fas/type_index.php",$data);
		
	}
	
	
	public function typeinsert(){
		 if( $this->input->post("typ")!=null) {
//             p($this->input->post());
            $array = array(
                'typ' => $this->input->post("typ")
                );
            $result = $this->db->get_where("FAS_Typ",$array)->result_array();
            if(count($result)) {
                error("Die FAS_Type Name schon  existiert !!!");
            } else{
                $sta = $this->fas->type_insert($array);
                if($sta) {
                $data['count'] = count($this->fas->type_select_d());
                // p(count($this->k->k_select_d()));die;
                $data['fastype'] = $this->fas->type_select_d();
// p($data);

				$data['fastypes'] = $this->fas->fas_type();
				$data['fasherstellers'] = $data['fashersteller'] = $this->fas->fas_hersteller();
				$data['fass'] = $this->fas->fas_all();
                // $this->load->view("header");
                $this->load->view("fas/type_insert.php",$data);
                } else{
                    error("insert failer");
                }
            }
        } else{
            $data['fastype'] = $this->fas->type_select_d();
            $data['count'] = 0;
			$data['fastypes'] = $this->fas->fas_type();
			$data['fasherstellers'] = $data['fashersteller'] = $this->fas->fas_hersteller();
			$data['fass'] = $this->fas->fas_all();
//			p($data);die;
            // $this->load->view("header");
            $this->load->view("fas/type_insert.php",$data);
        }
	}

	public function typeedit() {
		$id = $this->uri->segment(3);

        if($this->input->post("edit")) {
            $typ = $this->input->post("typ");
			$array = array(
                "typ" => $typ,
                );
			$result = $this->db->get_where("FAS_Typ",$array)->result_array();
            if(count($result)) {
                error("Die FAS_Type Name schon  existiert !!!");
            } else{
            
	            $sta = $this->fas->type_update($array,$id);
	            if($sta) {
	                success("fas/typeindex/$id","success update");
	            } else{
	                error("fehler bei update");
	            }
			}
        } else{
            if($id) {
                $array = array(
                "fast_id" => $id,
                );
                $data['result'] = $this->fas->type_get_one($array);
				$data['fastypes'] = $this->fas->fas_type();
		$data['fasherstellers'] = $data['fashersteller'] = $this->fas->fas_hersteller();
		$data['fass'] = $this->fas->fas_all();
                $this->load->view("fas/type_edit",$data);
            } 
        }
	}
	
	public function fas_hersteller_index() {
        $index = $this->uri->segment(3);
        if($index != -1) {
            $data['hst_index'] = $index;
        } else{
            $data['hst_index'] = -1;
        }
        $data['hersteller'] = $this->fas->hbinden_select();
//      p($data);
		$this->load->view("fas/hersteller_index",$data);
	}
	
	public function fas_hersteller_insert() {
		if($this->input->post("add")) {
            $herstellername = $this->input->post("herstellername");
			$land_id = $this->input->post("land_id");
            $array = array(
                "herstellername" => $herstellername,
                "land_id" => $land_id,
                );
            
            if(!count($this->fas->h_existiert2($array))){
                
                $array = array(
                    "land_id" => $land_id,
                    "herstellername" => $herstellername,
                    );
                $index = $this->fas->h_insert($array)["INDEX"];
                success("fas/fas_hersteller_index/$index","Add FAS_Hersteller Success!!");

            } else{
                error("Die FAS_Hersteller Name schon existiert");
            }
            
        } else{
            $data['land'] = $this->land->l_select();
            $this->load->view("fas/hersteller_insert",$data);
        }
		
	}
	
	public function fas_hersteller_edit() {
		if($this->input->post("update")) {
            $fash_id = $this->uri->segment(3);
            $fzhg_id = $this->input->post('fash_id');
            $land_id = $this->input->post("land_id");
            $herstellername = $this->input->post("herstellername");
//			p($this->input->post());die;
            $array = array(
                "herstellername" => $herstellername,
                );

            if(!$this->fas->h_existiert($herstellername,$land_id,$fash_id) ){
                $array = array(
                    "land_id" => $land_id,
                    "herstellername" => $herstellername,
                    );
                $index = $this->fas->h_update($array,$fash_id)[0]["fash_id"];
				
                success("fas/fas_hersteller_index/$index","Update FAS_Hersteller Success!!");
            } else{
                error("Die FAS_Hersteller Name schon existiert!!!update fehler!!");
            }


            // p($_POST);die;
        } else{
            $fash_id = $this->uri->segment(3);
            $array = array(
                'fash_id' => $fash_id,
                );
            $data['result'] = $this->fas->hbindung_s($array);
            $data['land'] = $this->land->l_select();

            // p($data);die;
            $this->load->view("fas/hersteller_edit",$data);	
        }
			
	}

	public function entwicklung() {

		if($this->uri->segment(3)) {
            $data['t_index'] = $this->uri->segment(3);
        } else{
            $data['t_index'] = -1;
        }
		$data['fasentwicklung'] = $this->fas->fas_entwicklung(); 
//		p($data);
		$this->load->view("fas/entwicklung_index",$data);
	}
	
	public function entwicklung_insert() {
		if( $this->input->post("entwicklung")!=null) {
            // p($this->input->post());die;
            $array = array(
                'entwicklung' => $this->input->post("entwicklung")
                );
            $result = $this->db->get_where("FAS_Entwicklung",$array)->result_array();
            if(count($result)) {
                error("Die FAS_Entwicklung Name schon  existiert !!!");
            } else{
                $sta = $this->fas->entwicklung_insert($array);
                if($sta) {
                $data['count'] = count($this->fas->entwicklung_select_d());
                // p(count($this->k->k_select_d()));die;
                $data['fasentwicklung'] = $this->fas->entwicklung_select_d();
// p($data);
                // $this->load->view("header");
                $this->load->view("fas/entwicklung_insert",$data);
                } else{
                    error("insert failer");
                }
            }
        } else{
            $data['fasentwicklung'] = $this->fas->fas_entwicklung();
            $data['count'] = 0;
//			p($data);die;
            // $this->load->view("header");
            $this->load->view("fas/entwicklung_insert",$data);
        }
		
	}
	
	public function entwicklung_edit() {
		$id = $this->uri->segment(3);

        if($this->input->post("edit")) {
            $entwicklung = $this->input->post("entwicklung");
			$array = array(
                "entwicklung" => $entwicklung,
                );
			$result = $this->db->get_where("FAS_Entwicklung",$array)->result_array();
            if(count($result)) {
                error("Die FAS_Entwicklung Name schon  existiert !!!");
            } else{
            
	            $sta = $this->fas->entwicklung_update($array,$id);
	            if($sta) {
	                success("fas/entwicklung/$id","success update");
	            } else{
	                error("fehler bei update");
	            }
			}
        } else{
            if($id) {
                $array = array(
                "fase_id" => $id,
                );
                $data['result'] = $this->fas->entwicklung_get_one($array);
                $this->load->view("fas/entwicklung_edit",$data);
            } 
        }
		
	}
	
	
	
	
	
	
	
	
	
	
	
	public function serie() {

		if($this->uri->segment(3)) {
            $data['t_index'] = $this->uri->segment(3);
        } else{
            $data['t_index'] = -1;
        }
		$data['fasserie'] = $this->fas->fas_serie(); 
		$this->load->view("fas/Serie_index",$data);
	}
	
	public function serie_insert() {
		if( $this->input->post("serie")!=null) {
            // p($this->input->post());die;
            $array = array(
                'serie' => $this->input->post("serie")
                );
            $result = $this->db->get_where("FAS_Serie",$array)->result_array();
            if(count($result)) {
                error("Die FAS_Serie Name schon  existiert !!!");
            } else{
                $sta = $this->fas->serie_insert($array);
                if($sta) {
                $data['count'] = count($this->fas->serie_select_d());
                // p(count($this->k->k_select_d()));die;
                $data['fasserie'] = $this->fas->serie_select_d();
// p($data);
                // $this->load->view("header");
                $this->load->view("fas/Serie_insert",$data);
                } else{
                    error("insert failer");
                }
            }
        } else{
            $data['fasserie'] = $this->fas->fas_serie();
            $data['count'] = 0;
//			p($data);die;
            // $this->load->view("header");
            $this->load->view("fas/Serie_insert",$data);
        }
		
	}
	
	public function serie_edit() {
		$id = $this->uri->segment(3);

        if($this->input->post("edit")) {
            $serie = $this->input->post("serie");
			$array = array(
                "serie" => $serie,
                );
			$result = $this->db->get_where("FAS_Serie",$array)->result_array();
            if(count($result)) {
                error("Die FAS_Serie Name schon  existiert !!!");
            } else{
            
	            $sta = $this->fas->serie_update($array,$id);
	            if($sta) {
	                success("fas/serie/$id","success update");
	            } else{
	                error("fehler bei update");
	            }
			}
        } else{
            if($id) {
                $array = array(
                "fass_id" => $id,
                );
                $data['result'] = $this->fas->serie_get_one($array);
                $this->load->view("fas/Serie_edit",$data);
            } 
        }
		
	}
	
	
	
	
	
	
	
	
	


public function waehrung() {

		if($this->uri->segment(3)) {
            $data['t_index'] = $this->uri->segment(3);
        } else{
            $data['t_index'] = -1;
        }
		$data['faswaehrung'] = $this->fas->fas_waehrung(); 
		$this->load->view("fas/waehrung_index",$data);
	}
	
	public function waehrung_insert() {
		if( $this->input->post("waehrung")!=null) {
            // p($this->input->post());die;
            $array = array(
                'waehrung' => $this->input->post("waehrung")
                );
            $result = $this->db->get_where("Waehrung",$array)->result_array();
            if(count($result)) {
                error("Die Waehrung Name schon  existiert !!!");
            } else{
                $sta = $this->fas->waehrung_insert($array);
                if($sta) {
                $data['count'] = count($this->fas->waehrung_select_d());
                // p(count($this->k->k_select_d()));die;
                $data['faswaehrung'] = $this->fas->waehrung_select_d();
// p($data);
                // $this->load->view("header");
                $this->load->view("fas/waehrung_insert",$data);
                } else{
                    error("insert failer");
                }
            }
        } else{
            $data['faswaehrung'] = $this->fas->fas_waehrung();
            $data['count'] = 0;
//			p($data);die;
            // $this->load->view("header");
            $this->load->view("fas/waehrung_insert",$data);
        }
		
	}
	
	public function waehrung_edit() {
		$id = $this->uri->segment(3);

        if($this->input->post("edit")) {
            $waehrung = $this->input->post("waehrung");
			$array = array(
                "waehrung" => $waehrung,
                );
			$result = $this->db->get_where("Waehrung",$array)->result_array();
            if(count($result)) {
                error("Die Waehrung Name schon  existiert !!!");
            } else{
            
	            $sta = $this->fas->waehrung_update($array,$id);
	            if($sta) {
	                success("fas/waehrung/$id","success update");
	            } else{
	                error("fehler bei update");
	            }
			}
        } else{
            if($id) {
                $array = array(
                "w_id" => $id,
                );
                $data['result'] = $this->fas->waehrung_get_one($array);
                $this->load->view("fas/waehrung_edit",$data);
            } 
        }
		
	}
	
	
	public function einheit_index() {

		if($this->uri->segment(3)) {
            $data['t_index'] = $this->uri->segment(3);
        } else{
            $data['t_index'] = -1;
        }
		$data['einheit'] = $this->fas->betrieb_einheit_all(); 
		$this->load->view("fas/einheit_index",$data);
	}

	public function einheit_edit() {
		$id = $this->uri->segment(3);

        if($this->input->post("edit")) {
            $einheit = $this->input->post("einheit");
			$array = array(
                "einheit" => $einheit,
                );
			$result = $this->db->get_where("FAS_Betriebsgrenze_Einheit",$array)->result_array();
            if(count($result)) {
                error("Die FAS_Betriebsgrenze_Einheit Name schon  existiert !!!");
            } else{
            
	            $sta = $this->fas->einheit_update($array,$id);
	            if($sta) {
	                success("fas/einheit_index/$id","success update");
	            } else{
	                error("fehler bei update");
	            }
			}
        } else{
            if($id) {
                $array = array(
                "einheit_id" => $id,
                );
                $data['result'] = $this->fas->einheit_get_one($array);
                $this->load->view("fas/einheit_edit",$data);
            } 
        }
		
	}
	
	public function einheit_insert() {
//		p($this->input->post("einheit"))；die;
		if( $this->input->post("einheit")!=null) {
			
            $array = array(
                'einheit' => $this->input->post("einheit")
                );
            $result = $this->db->get_where("FAS_Betriebsgrenze_Einheit",$array)->result_array();
//			p($result);die;
            if(count($result)) {
                error("Die FAS_Betriebsgrenze_Einheit Name schon  existiert !!!");
            } else{
                $sta = $this->fas->einheit_insert($array);
                if($sta) {
                $data['count'] = count($this->fas->einheit_select_d());
                // p(count($this->k->k_select_d()));die;
                $data['einheit'] = $this->fas->einheit_select_d();
// p($data);
                // $this->load->view("header");
                $this->load->view("fas/einheit_insert",$data);
                } else{
                    error("insert failer");
                }
            }
        } else{
            $data['einheit'] = $this->fas->betrieb_einheit_all();
            $data['count'] = 0;
//			p($data);die;
            // $this->load->view("header");
            $this->load->view("fas/einheit_insert",$data);
        }
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function speicher() {
//p($this->input->post());die;
		
		$data = $this->input->post();
//p($data);die;
   if($data['einheit_id'][0]==$data['einheit_id'][1]) {
   	
   		
	   if($this->uri->segment(3)!=0) {
	   		$fas['fas_id'] = $data['fas_id'];
	   }
        $fas['fast_id'] = $data['fast_id'];
		$fas['fash_id'] = $data['fash_id'];
		$fas['fase_id'] = $data['fase_id'];
        $fas['fass_id'] = $data['fass_id'];
        $fas['w_id'] = $data['w_id'];
		$fas['fasbezeichnung'] = trim($data['fasbezeichnung']);
		$fas['funktion'] = trim($data['funktion']);	
        $fas['serie_seit'] = $data['serie_seit'];	
		$fas['serie_bis'] = $data['serie_bis'];
        $fas['aenderung'] = $data['aenderung'];
        $fas['eingabe'] = $data['eingabe'];		
		
//      $sensor['s_id'] = $data['s_id'];
//		$this->load->view("fas/info",$data);

//		die;
        $flag_von = preg_match('/^\d\d\d\d$/is',$fas['serie_seit']);
		$flag_bis = preg_match('/^\d\d\d\d$/is',$fas['serie_bis']);

//		die;	
		$flag = $flag_von and $flag_bis;
		
        if($fas) {
            if($flag) {
//p($fas);
                $fas_id = $this->fas->add($fas);
//  p("11111111111");
//	p($fas_id);
	
	
     
				$betriebgrenze['einheit_id'] = $data['einheit_id'][0];
//				$betriebgrenze['fas_id'] = $fas_id;
                $betriebgrenze['von'] = $data['von'];
        		$betriebgrenze['bis'] = $data['bis'];		
				
				
//p($betriebgrenze);
                $this->fas->betriebgrenze_type_array_insert($betriebgrenze,$fas_id);
//p('2222222222222');
					   

                $quelle['fas_id'] = $fas_id;
				
				if(isset($data['quelle_id'])) {
					$quelle['quelle_id'] = $data['quelle_id'];
                	$this->quelle->array_fas_insert($quelle);
				} else{
					$this->db->delete("FAS2Quelle",array('fas_id'=>$quelle['fas_id']));
				}
               
//				p($quelle);
                
//p('3333333333333');die;
                $sensor['fas_id'] = $fas_id;
                $sensor['s_id'] = isset($data['sensor_id'])?$data['sensor_id']:null;
				if($sensor['s_id']) {
					$this->sensor->sensor_array_insert($sensor);
				} else{
					$this->db->delete("FAS2Sensor",array('fas_id'=>$sensor['fas_id']));
				}


				$fahrzeug['fas_id'] = $fas_id;
                $fahrzeug['fahrzeugen_id'] = isset($data['fahrzeugen_id'])?$data['fahrzeugen_id']:null;
				if($fahrzeug['fahrzeugen_id']) {
					$this->fahrzeug->FAS2Fahrzeug_array_insert($fahrzeug);
				} else{
					$this->db->delete("FAS2Fahrzeug",array('fas_id'=>$sensor['fas_id']));
				}
				
				$film['fas_id'] = $fas_id;
				if(isset($data['film_id'])) {
					$film['film_id'] = $data['film_id'];
                	$this->quelle->array_film_insert($film);
				} else{
					$this->db->delete("FAS2Film",array('fas_id'=>$film['fas_id']));
				}
				
				
				
				
				
				
				
				
				
                
//p('44444444444444');die;

//				p("111111111111111");
                success("fas/fasinfo/$fas_id","Date update success");
            } else{
                error("Bitte eine richtig formig Serie_seit und Serie_bis eingaben!Z.B 2016");
            }
            }  
        } else{
        	error("Bitte gleiche Einheit select!!!");
        }
    }



  public function fasinfo(){
  	$fas_id = $this->uri->segment(3);
  	$data = $this->fas->all_teil_such($fas_id);
	
//p($data['betriebsgrenze']);
	
//	if(count($data['betriebsgrenze'])==0) {
//		$this->fas->
//		$data['betriebsgrenze'] = array(
//			'von'=>'In Datenbank fehler diese Daten',
//			'bis' => 'In Datenbank fehler diese Daten',
//			'einheit' => 'null'
//					);
//	}
//	p($data);
//  	$data['fas'] = $this->fas->fas_all();
//		p($data['fas']);die;
//      $data['fastypes'] = $this->fas->fas_type();
//      $data['fasherstellers'] = $this->fas->fas_hersteller();  	
        
        
//      p($data);
//p($data['auto']);
        $this->load->view("fas/info",$data);
    }
    
   
	
	public function edit(){
		if($this->input->post()) {
//             p($this->input->post());die;
            $this->speicher();
        } else{
            $fas_id = $this->uri->segment(3);
        	$data['fas_id'] = $fas_id;
            $data['update'] = $this->fas->all_teil_such($fas_id);
//p($data);

            $data["quelle"] = $this->quelle->q_all();
            
            $data['mland'] = $this->land->m_select();
        	$data['serie'] = $this->fas->fas_serie();
            $data['waehrung'] = $this->fas->fas_waehrung();
            
            $data['entwicklung'] = $this->fas->fas_entwicklung();
			$data['einheit'] = $this->fas->betrieb_einheit_all();
			$data['film'] = $this->fas->film_all();
			$data['sensor'] = $this->sensor->all_sensor();
			
            // // p($data['hersteller']);die;
        	$data['fastypes'] = $this->fas->fas_type();
			$data['fasherstellers'] = $data['fashersteller'] = $this->fas->fas_hersteller();
			$data['fas'] = $this->fas->fas_all();
            $data["klasse"] = $this->k->k_select();
			
			
			$data['autos'] = $this->fahrzeug->f_all();
			
//			p($data['update']);
//p($data);
            $this->load->view("fas/edit",$data);
        }
	}

	
	
	public function f_list() {
		$index = $this->uri->segment(3);
		$order = $this->uri->segment(4);
		$this->load->library("pagination");
		$perpage = 20;
		$config['base_url'] = site_url("fas/f_list");
		$config['total_rows'] = count($this->fas->bind_table_fas_a());
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		
		$data["links"] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(3);
		$this->db->limit($perpage, $offset);
        if($index != -1) {
            $data['fas_index'] = $index;
        } else{
            $data['fas_index'] = -1;
        }
		
		switch($order) {
			case 1:
				$data["fas"] = $this->fas->bind_table_fas_a();
				break;
			case 2:
				$data["fas"] = $this->fas->bind_table_fas_d();
				break;
			case 3:
				$data["fas"] = $this->fas->bind_table_hersteller_a();
				break;
			case 4:
				$data["fas"] = $this->fas->bind_table_hersteller_d();
				break;
			case 5:
				$data["fas"] = $this->fas->bind_table_type_a();
				break;
			case 6:
				$data["fas"] = $this->fas->bind_table_type_d();
				break;
			case 7:
				$data["fas"] = $this->fas->bind_table_entwicklung_a();
				break;
			case 8:
				$data["fas"] = $this->fas->bind_table_entwicklung_d();
				break;
			case 9:
				$data["fas"] = $this->fas->bind_table_aenderung_a();
				break;
			case 10:
				$data["fas"] = $this->fas->bind_table_aenderung_d();
				break;
			case 11:
				$data["fas"] = $this->fas->bind_table_eingabe_a();
				break;
			case 12:
				$data["fas"] = $this->fas->bind_table_eingabe_d();
				break;
			case 13:
				$data["fas"] = $this->fas->bind_table_name_a();
				break;
			case 14:
				$data["fas"] = $this->fas->bind_table_name_d();
				break;
			default:
				$data["fas"] = $this->fas->bind_table_fas_a();
		}
		
		
//      $index = $this->uri->segment(3);
//      if($index != -1) {
//          $data['fahr_index'] = $index;
//      } else{
//          $data['fahr_index'] = -1;
//      }
		$data['fastypes'] = $this->fas->fas_type();
		$data['fasherstellers'] = $data['fashersteller'] = $this->fas->fas_hersteller();
		$data['fass'] = $this->fas->fas_all();
//      $data["fas"] = $this->fas->bind_table_fas_a();
//p(count($data['fas']));die;
//p($data['fas']);
//$data['fahrzeug'] = $this->fahrzeug->f_all();
//p(count($data["fastypes"]));
//p(count($data["fas"]));
        $this->load->view("fas/list",$data);
    }
	
	public function film_add() {
		$index = $this->input->post("index");
		$array = array(
			"film_id" => $index,
		);
		$quelle = $this->bilder->film_bindung_s($array)[0];
		
		$quelle["message"] = "success";
		
		echo json_encode($quelle);
	}
	
	public function fas_type_delete() {
		$fast_id = $this->input->post("fast_id");
		$this->fas->fas_type_delete_id($fast_id);
			$data['message'] = "success";
		echo json_encode($data);
	}
	
	public function delete_fase_id() {
		$fase_id = $this->input->post("fase_id");
		$this->fas->fas_entwicklung_delete_id($fase_id);
			$data['message'] = "success";
		echo json_encode($data);
	}
	
	
	public function delete_fass_id() {
		$fass_id = $this->input->post("fass_id");
		$this->fas->fas_serie_delete_id($fass_id);
		$data['message'] = "success";
		echo json_encode($data);
	}
	
	public function delete_w_id() {
		$w_id = $this->input->post("w_id");
		$this->fas->fas_wahrung_delete_id($w_id);
		$data['message'] = "success";
		echo json_encode($data);
	}
	
	public function delete_einheit_id() {
		$einheit_id = $this->input->post("einheit_id");
		$this->fas->fas_einheit_delete_id($einheit_id);
		$data['message'] = "success";
		echo json_encode($data);
	}
	
	public function delete_fas_id() {
		$fas_id = $this->input->post("fas_id");
		$this->fas->fas_fas_delete_id($fas_id);
		$data['message'] = 'success';
		echo json_encode($data);
	}
	
	
	
	
	
	
	
}


?>