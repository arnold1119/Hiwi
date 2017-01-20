<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Land extends CI_Controller {


    public function __construct() {
        parent::__construct();

        $this->load->model("land_model","land");
        $this->load->model("fahrzeug_model",'fahrzeug');
        $this->load->model("hersteller_model",'hst');
    }


    public function index() {
        $this->l_list_ida();
    }


	public function l_list_ida() {
		$data['fahrzeugfilter'] = $this->fahrzeug->f_all(); 
		$data['herstellerfilter'] = $this->hst->h_select();
		$data['land'] = $this->land->hbinden_select_landid_a();
	    $index = $this->uri->segment(3);
	    if($index != -1) {
	        $data['hst_index'] = $index;
	    } else{
	        $data['hst_index'] = -1;
	    }
		$this->load->library("pagination");
		$perpage = 20;
		
	    
	//	$config['anchor_class'] = "page_page";
		$config['base_url'] = site_url("hersteller/l_list_ida");
		$config['total_rows'] = count($this->land->hbinden_select_landid_a());
	//		p($config['total_rows']);
	//		p(count($this->fahrzeug->bind_table_herstellername_a()));
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		
		$data["links"] = $this->pagination->create_links();
	
		$offset = $this->uri->segment(3);
		$this->db->limit($perpage, $offset);
		
		$data['seite_all'] = floor($config['total_rows']/$perpage);
	//	p($data['seite_all']);
		$data['land'] = $this->land->hbinden_select_landid_a();
	    $this->load->view("land/index",$data);
	}
	
	public function l_list_idd() {
		$data['fahrzeugfilter'] = $this->fahrzeug->f_all(); 
		$data['herstellerfilter'] = $this->hst->h_select();
		$data['land'] = $this->land->hbinden_select_landid_d();
	    $index = $this->uri->segment(3);
	    if($index != -1) {
	        $data['hst_index'] = $index;
	    } else{
	        $data['hst_index'] = -1;
	    }
		$this->load->library("pagination");
		$perpage = 20;
		
	    
	//	$config['anchor_class'] = "page_page";
		$config['base_url'] = site_url("hersteller/l_list_idd");
		$config['total_rows'] = count($this->land->hbinden_select_landid_d());
	//		p($config['total_rows']);
	//		p(count($this->fahrzeug->bind_table_herstellername_a()));
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		
		$data["links"] = $this->pagination->create_links();
	
		$offset = $this->uri->segment(3);
		$this->db->limit($perpage, $offset);
		
		$data['seite_all'] = floor($config['total_rows']/$perpage);
	//	p($data['seite_all']);
		$data['land'] = $this->land->hbinden_select_landid_d();
	    $this->load->view("land/index",$data);
	}
	
	public function h_list_landname_a() {
		$data['fahrzeugfilter'] = $this->fahrzeug->f_all(); 
		$data['herstellerfilter'] = $this->hst->h_select();
		$data['land'] = $this->land->hbinden_select_landname_a();
	    $index = $this->uri->segment(3);
	    if($index != -1) {
	        $data['hst_index'] = $index;
	    } else{
	        $data['hst_index'] = -1;
	    }
		$this->load->library("pagination");
		$perpage = 20;
		
	    
	//	$config['anchor_class'] = "page_page";
		$config['base_url'] = site_url("hersteller/h_list_landname_a");
		$config['total_rows'] = count($this->land->hbinden_select_landname_a());
	//		p($config['total_rows']);
	//		p(count($this->fahrzeug->bind_table_herstellername_a()));
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		
		$data["links"] = $this->pagination->create_links();
	
		$offset = $this->uri->segment(3);
		$this->db->limit($perpage, $offset);
		
		$data['seite_all'] = floor($config['total_rows']/$perpage);
	//	p($data['seite_all']);
		$data['land'] = $this->land->hbinden_select_landname_a();
	    $this->load->view("land/index",$data);
	}
	public function h_list_landname_d() {
		$data['fahrzeugfilter'] = $this->fahrzeug->f_all(); 
		$data['herstellerfilter'] = $this->hst->h_select();
		$data['land'] = $this->land->hbinden_select_landname_d();
	    $index = $this->uri->segment(3);
	    if($index != -1) {
	        $data['hst_index'] = $index;
	    } else{
	        $data['hst_index'] = -1;
	    }
		$this->load->library("pagination");
		$perpage = 20;
		
	    
	//	$config['anchor_class'] = "page_page";
		$config['base_url'] = site_url("hersteller/h_list_landname_d");
		$config['total_rows'] = count($this->land->hbinden_select_landname_d());
	//		p($config['total_rows']);
	//		p(count($this->fahrzeug->bind_table_herstellername_a()));
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		
		$data["links"] = $this->pagination->create_links();
	
		$offset = $this->uri->segment(3);
		$this->db->limit($perpage, $offset);
		
		$data['seite_all'] = floor($config['total_rows']/$perpage);
	//	p($data['seite_all']);
		$data['land'] = $this->land->hbinden_select_landname_d();
	    $this->load->view("land/index",$data);
	}

    public function insert() {

        if($this->input->post("add")) {
            // P($_POST);die;
            $land = $this->input->post("land");
            if($land=="null") {
                error("DAD Herstellername kann nicht Null sein");
            }else{
                // $markt_id = $this->input->post("markt_id");
                $array = array(
                    "land" => $land,
                    );
                $result = $this->land->l_exists($array);
                // p(count($result));die;
                if(!count($result)) {
                    $ml_index = $this->land->l_insert($array);
                    // p($ml_index);die;
                    if($ml_index != 0) {
                        success("land/index/$ml_index","Success add neue herstellername!!");
                    } else{

                        error("insert fehler");
                    }

                    
                } else{
                    error("!!!Die  MarktLand schon  existiert !!!");
                }
            }
            

        } else{
            $data["land"] = $this->land->l_select();
            $data["count"] = -1;
            $this->load->view("land/insert",$data);

        }
        
    }



    public function edit() {
        $land_id = $this->uri->segment(3);

        $array = array(
            "land_id" => $land_id,
        );

        if($this->input->post("edit")) {
            $land = $this->input->post("land");
            $array = array(
                "land" => $land,
                );
            $result = $this->land->l_exists($array);
            if(Count($result)) {
                error("!!!!Dar Neue HerstellerLandName schon exists!!!");
            } else{
                $this->land->l_update($array, $land_id);
                success("land/index/$land_id", "success zu update den HerstellerLandName!!");
            }

        } else{
            $array = array(
                "land_id" => $land_id,
                );
            $data['land'] = $this->land->lbingdung_select($array);
            // p($data);die;
            
            $this->load->view("land/edit",$data);
            // p($data);die;
            // p($data);die;
            
        }
    }
	
	public function delete_land_id() {
		$land_id = $this->input->post("land_id");
		if($this->land->delete_land_id($land_id)) {
			$data["message"] = "success";
		} else{
			$data['message'] = "error";
		}
		
		
		echo json_encode($data);
	}
	
}





















?>