<?php  

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Klasse extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('klasse_model',"k");
		$this->load->model("fahrzeug_model","fahrzeug");
		$this->load->model("hersteller_model","h");
		
    }

    public function index() {
        if($this->uri->segment(3)) {
            $data['k_index'] = $this->uri->segment(3);
        } else{
            $data['k_index'] = -1;
        }
		$data['fahrzeug'] = $this->fahrzeug->f_all(); 
		$data['hersteller'] = $this->h->h_select();
        $data['klasse'] = $this->k->k_select();
        // p($data);die;
        // $this->load->view("header");
//      p($data['klasse']);
        $this->load->view("klasse/index",$data);
    }


    public function insert() {
        // $this->output->enable_profiler(TRUE);
        $data['fahrzeug'] = $this->fahrzeug->f_all(); 
		$data['hersteller'] = $this->h->h_select();
        if( $this->input->post("klasse")!=null) {
            // p($this->input->post());die;
            $array = array(
                'klasse' => $this->input->post("klasse")
                );
            $result = $this->db->get_where("Fahrzeugklasse",$array)->result_array();
            if(count($result)) {
                error("Die Klasse Name schon  existiert !!!");
            } else{
                $sta = $this->k->k_insert($array);
                if($sta) {
                $data['count'] = count($this->k->k_select_d());
                // p(count($this->k->k_select_d()));die;
                $data['klasse'] = $this->k->k_select_d();
// p($data);
                // $this->load->view("header");
                $this->load->view("klasse/insert",$data);
                } else{
                    error("insert failer");
                }
            }
        } else{
            $data['klasse'] = $this->k->k_select();
            $data['count'] = 0;
            // $this->load->view("header");
            $this->load->view("klasse/insert",$data);
        }
        
    }


    public function edit(){
        $id = $this->uri->segment(3);
$data['fahrzeug'] = $this->fahrzeug->f_all(); 
		$data['hersteller'] = $this->h->h_select();
        if($this->input->post("edit")) {
            $klasse = $this->input->post("klasse");
            $array = array(
                "klasse" => $klasse,
                );
            $sta = $this->k->k_update($array,$id);
            if($sta) {
                success("klasse/index/$id","success update");
            } else{
                error("fehler bei update");
            }
        } else{
            if($id) {
                $array = array(
                "fzk_id" => $id,
                );
                $data['result'] = $this->k->k_get_one($array);
                $this->load->view("klasse/edit",$data);
            } 
        }
        
    }
	
	public function delete_all(){
		$fzk_id = $this->input->post("fzk_id");
		if($this->k->k_delete($fzk_id)) {
			$data['message'] = 'success';
		}
		echo json_encode($data);
	}

}


?>