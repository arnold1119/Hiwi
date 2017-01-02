<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Land extends CI_Controller {


    public function __construct() {
        parent::__construct();

        $this->load->model("land_model","land");
    }


    public function index() {
        $land_index = $this->uri->segment(3);

        if($land_index) {
            $data['land_index'] = $land_index;
        } else{
            $data['land_index'] = 0;
        }
        $data["land"] = $this->land->l_select();
        // p($data);die;
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