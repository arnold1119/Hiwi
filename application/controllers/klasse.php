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
//		$data['fahrzeug'] = $this->fahrzeug->f_all(); 
//		$data['hersteller'] = $this->h->h_select();
//      $data['klasse'] = $this->k->k_select();
//      $this->load->view("klasse/index",$data);
		$this->id_a();
    }
    
    public function id_a() {
    	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
		$data['hersteller'] = $this->h->h_select();
        $data['klasse'] = $this->k->k_select_ida();
		
//	    $index = $this->uri->segment(3);
//	    if($index != -1) {
//	        $data['hst_index'] = $index;
//	    } else{
//	        $data['hst_index'] = -1;
//	    }
		$this->load->library("pagination");
		$perpage = 20;
		
	    
	//	$config['anchor_class'] = "page_page";
		$config['base_url'] = site_url("hersteller/id_a");
		$config['total_rows'] = count($this->k->k_select_ida());
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
        $data['klasse'] = $this->k->k_select_ida();
		
	    $this->load->view("klasse/index",$data);    
   	}
   	 public function id_d() {
    	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
		$data['herstellerfilter'] = $this->h->h_select();
        $data['klasse'] = $this->k->k_select_idd();
		
//	    $index = $this->uri->segment(3);
//	    if($index != -1) {
//	        $data['hst_index'] = $index;
//	    } else{
//	        $data['hst_index'] = -1;
//	    }
		$this->load->library("pagination");
		$perpage = 20;
		
	    
	//	$config['anchor_class'] = "page_page";
		$config['base_url'] = site_url("hersteller/id_d");
		$config['total_rows'] = count($this->k->k_select_idd());
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
        $data['klasse'] = $this->k->k_select_idd();
		
	    $this->load->view("klasse/index",$data); 
    }
    public function name_a() {
    	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
		$data['hersteller'] = $this->h->h_select();
        $data['klasse'] = $this->k->k_select_namea();
		
//	    $index = $this->uri->segment(3);
//	    if($index != -1) {
//	        $data['hst_index'] = $index;
//	    } else{
//	        $data['hst_index'] = -1;
//	    }
		$this->load->library("pagination");
		$perpage = 20;
		
	    
	//	$config['anchor_class'] = "page_page";
		$config['base_url'] = site_url("hersteller/name_a");
		$config['total_rows'] = count($this->k->k_select_namea());
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
        $data['klasse'] = $this->k->k_select_namea();
		
	    $this->load->view("klasse/index",$data); 
    }
   
    public function name_d() {
    	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
		$data['hersteller'] = $this->h->h_select();
        $data['klasse'] = $this->k->k_select_named();
		
//	    $index = $this->uri->segment(3);
//	    if($index != -1) {
//	        $data['hst_index'] = $index;
//	    } else{
//	        $data['hst_index'] = -1;
//	    }
		$this->load->library("pagination");
		$perpage = 20;
		
	    
	//	$config['anchor_class'] = "page_page";
		$config['base_url'] = site_url("hersteller/name_d");
		$config['total_rows'] = count($this->k->k_select_named());
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
        $data['klasse'] = $this->k->k_select_named();
		
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