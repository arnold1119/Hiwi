<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Markt extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model("land_model","land");
    }

    public function index() {
        if($this->uri->segment(3)) {
            $data['ml_index'] = $this->uri->segment(3);
        } else{
            $data['ml_index'] = -1;
        }

        $data["mland"] = $this->land->m_select();
        $this->load->view("markt/index",$data);
    }


    public function insert() {
        if($this->input->post("add")) {
            $marktname = $this->input->post("marktname");
            // $markt_id = $this->input->post("markt_id");
            $array = array(
                "marktname" => $marktname,
                );
            $result = $this->land->m_exists($array);
            // p(count($result));die;
            if(!count($result)) {
                $ml_index = $this->land->m_insert($array);
                // p($ml_index);die;
                if($ml_index != 0) {
                    success("markt/index/$ml_index","Success add neue Marktname!!");
                } else{

                    error("insert fehler");
                }

                
            } else{
                error("!!!Die  MarktLand schon  existiert !!!");
            }

        } else{
            $data["mland"] = $this->land->m_select();
            $data["count"] = -1;
            $this->load->view("markt/insert",$data);
        }
    }



    public function edit() {
        $markt_id = $this->uri->segment(3);

        $array = array(
                        "markt_id" => $markt_id,
                        );

        if($this->input->post("edit")) {
            $marktname = $this->input->post("marktname");
            $array = array(
                "marktname" => $marktname,
                );
            $result = $this->land->m_exists($array);
            if(Count($result)) {
                error("!!!!Dar Neue Marktname schon exists!!!");
            } else{
                $this->land->m_update($array, $markt_id);
                success("markt/index/$markt_id", "success zu update den Marktname!!");
            }

        } else{
            
            $data['result'] = $this->land->m_exists($array);
            // p($data);die;
            $this->load->view("markt/edit",$data);
        }
    }
	
	
	
	public function markt_add(){
		$index = $this->input->post("index");
		$array = array(
			"markt_id" => $index,
		);
		$quelle = $this->land->m_exists($array)[0];
		
		$quelle["message"] = "success";
		
		echo json_encode($quelle);
	}
	
	
	public function delete_marktland_id() {
    	$markt_id = $this->input->post("markt_id");
		if($this->land->marktland_delete($markt_id)) {
			$data['message'] = 'success';
		}
		echo json_encode($data);
    }
	
	
	
	
	
	
	
}



?>