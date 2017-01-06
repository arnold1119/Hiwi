<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fahrzeug extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model("klasse_model","k");
        $this->load->model("hersteller_model","h");
        $this->load->model("land_model","land");
        $this->load->model("quelle_model","quelle");
        $this->load->model("fahrzeug_model","fahrzeug");
        $this->load->model("fas_model","fas");
        $this->load->model("bilder_model",'bilder');
//      $this->load->library('session');
        
    }
	
    public function index() {
    	
		
//      p($_SERVER);
//      
//      p('../..'.$_SERVER['PHP_SELF']);
//      die;
		$data['url'] = uri_string();
        $data['fahrzeug'] = $this->fahrzeug->f_all(); 
		$data['hersteller'] = $this->h->h_select();
//         p($data);die;
        $data["quelle"] = $this->quelle->q_all();
        $data['fas'] = $this->fas->fas_all();
        $data['mland'] = $this->land->m_select();
        
//      p($this->session->userdata('session_thumb_bilder'));
		$bilder = $this->bilder->Session_get_bilder()[0];
//		$data['bilder_status'] = $this->bilder->Session_get_bilder()[0];
//		$data['sessions'] = $this->bilder->Session_all();
//		p($data['bilder_status']);
//		p($data['sessions']);
	
		if($bilder['session_value'] != 'null') {
			$link = $bilder['session_value'];
			$data['bilder_status'] = 1;
//			$data['info'] = pathinfo($link);
//			$result = preg_split("/www/",$link);
//			p($link);
//			p($result);
	      	$data['session_value'] = $bilder['session_value'];
	        $data['result'] = $link;
		} else{
			$data['bilder_status'] = 0;
			
		}
		
		
        // p($data['hersteller']);die;

        $data["klasse"] = $this->k->k_select();
        $this->load->view("fahrzeug",$data);

    }
	public function filter() {
		$data1 = $this->input->post();
		$data['fahrzeugs'] = $this->fahrzeug->f_all(); 
		$data['herstellers'] = $this->h->h_select();
//		p($data1);die;
		if($data1['fahrzeugname']=="" && $data1['baujahr']=="" && $data1['hersteller']=="") {
			$this->f_list_ida();
		} else {
					
			if($data1['fahrzeugname'] != "") {
				$array['fahrzeugname'] = $data1['fahrzeugname'];
				
			} 
		
			if($data1['baujahr'] != '') {
				$array['baujahr'] = $data1['baujahr'];
				
			} 
			if($data1['hersteller'] != "") {
				$hersteller['herstellername'] = $data1['hersteller'];
		//			p($hersteller);
					p($this->h->h_existiert($hersteller));die;
				$test = $this->h->h_existiert($hersteller)[0]['fzh_id'];
				$array['Fahrzeug.fzh_id'] = $test;
		//			$data['herstellername'] = $data1['hersteller'];
		//			p($array);
			}
		$data['fahrzeug'] = $this->fahrzeug->filter($array);
//			p($data['fahrzeug']);
		$this->load->view("fahrzeug/filterlist",$data);
		}
	}

    public function fzginfo(){
        $fz_id = $this->uri->segment(3);
        

        $data = $this->fahrzeug->all_teil_such($fz_id);
//		p($data);die;
		$data['fahrzeugs'] = $this->fahrzeug->f_all(); 
		$data['herstellers'] = $this->h->h_select();
// p($data);die;
        $this->load->view("fahrzeug/info",$data);
    }


    public function speicher() {
    	$data = $this->input->post();
//		p($data);
////		die;
		$fahrzeug['fzh_id'] = $data['fzh_id'];
		$fahrzeug['fahrzeugname'] = trim($data['fahrzeugname']);
		$fahrzeug['bilder'] = $data['bilder'];
		
		if($fahrzeug['bilder']!="null") {
//			p($fahrzeug['bilder']);

			$result = preg_split("/Bilder\//",$fahrzeug['bilder']);
			$fahrzeug['bilder'] = $result[1];
		} 
		
//		p($fahrzeug['bilder']);
		
//		die;
//		$bilders = array(
//			'fahrzeugname' => $fahrzeug['fahrzeugname'],
//			'baujahr' => $data['baujahr'],
//		);
//		$result_b = $this->db->where($bilders)->get("Fahrzeug")->result_array();
//		$bilder_result = $result_b[0]['bilder'];
//		p($_SERVER['DOCUMENT_ROOT']);
// 		if($bilder_result != "null" && $bilder_result != null) {
// 			p($_SERVER['DOCUMENT_ROOT']."/uploads/".$bilder_result);
//			unlink($_SERVER['DOCUMENT_ROOT']."/uploads/".$bilder_result);
// 		}
		
	
//  	$config['upload_path'] = './uploads/';
//		$config['allowed_types'] = 'gif|jpg|png|jpeg';
//		$config['max_size'] = '10000';
//		$config['file_name'] = $fahrzeug['fahrzeugname'].$data['baujahr'];
//
//		//载入上传类
//		$this->load->library('upload', $config);
//		//执行上传
//		$status = $this->upload->do_upload("thumb_bilder");
//		if(!$status) {
//			$fahrzeug['bilder'] = $data['alt_bilder'];
////			$wrong = $this->upload->display_errors();
//
////			if($wrong){
////				error($wrong);
////			}
//		} else{
//			
//			//返回信息
//			
//			$info = $this->upload->data();	
//			$fahrzeug['bilder'] = $info['file_name'];
////			p($info);		
//		}
		
		
//      p($fahrzeug['bilder']);
		
		
		
// 	p($data);
        
//		var $array = array(
//			"fahrzeugname" => $fahrzeug['fahrzeugname'],
//		);
//		$$this->fahrzeug->exit_id($array);
        $fahrzeug['fzk_id'] = $data['fzk_id'];
        $fahrzeug['baujahr'] = $data['baujahr'];
        $fahrzeug['aenderung'] = $data['aenderung'];
        $fahrzeug['eingabe'] = $data['eingabe'];
//  p($fahrzeug);
        $flag = preg_match('/^\d\d\d\d$/is',$fahrzeug['baujahr']);
        if($fahrzeug) {
            if($flag) {
                $fz_id = $this->fahrzeug->update($fahrzeug);
                
                if($fz_id) {
                	$this->bilder->Session_bilder_null();
                	$this->bilder->Session_vorbilder_null();
                }
                $markt['fz_id'] = $fz_id;
				
				if(isset($data['markt_id'])) {
					$markt['markt_id'] = $data['markt_id'];
                	$this->land->m_array_insert($markt);
				} else{
					$this->db->delete("Fahrzeug2Markt",array('fz_id'=>$markt['fz_id']));
				}
                
                $quelle['fz_id'] = $fz_id;
				if(isset($data['quelle_id'])) {
					$quelle['quelle_id'] = $data['quelle_id'];
                	$this->quelle->array_insert($quelle);
				} else{
					$this->db->delete("Fahrzeug2Quelle",array('fz_id'=>$quelle['fz_id']));
				}
                $fas['fz_id'] = $fz_id;
                if(isset($data['fas_id'])) {
                	$fas['fas_id'] = $data['fas_id'];
					$this->fas->array_insert($fas);
                } else{
                	$this->db->delete("FAS2Fahrzeug",array('fz_id'=>$fas['fz_id']));
                }
                success("fahrzeug/fzginfo/$fz_id","Date update success");
            } else{
                error("Bitte eine richtig formig Baujahr eingaben!Z.B 2016");
            }
        }
    }


public function f_list_ida() {
	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
	$data['hersteller'] = $this->h->h_select();
	$this->load->library("pagination");
	$perpage = 20;
	
    
//	$config['anchor_class'] = "page_page";
	$config['base_url'] = site_url("fahrzeug/f_list_ida");
	$config['total_rows'] = count($this->fahrzeug->bind_table_herstellername_a());
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
	$data["fahrzeugs"] = $this->fahrzeug->bind_table_id_a();
    $this->load->view("fahrzeug/list",$data);
}
	
public function f_list_idd() {
	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
	$data['hersteller'] = $this->h->h_select();

	$this->load->library("pagination");
	$perpage = 20;
	$config['base_url'] = site_url("fahrzeug/f_list_idd");
	$config['total_rows'] = count($this->fahrzeug->bind_table_herstellername_a());
	$config['per_page'] = $perpage;
	$config['uri_segment'] = 3;
	
	$this->pagination->initialize($config);
	
	$data["links"] = $this->pagination->create_links();

	$offset = $this->uri->segment(3);
	$this->db->limit($perpage, $offset);	
	$data["fahrzeugs"] = $this->fahrzeug->bind_table_id_d();
    $this->load->view("fahrzeug/list",$data);
}

public function f_list_hd() {
	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
	$data['hersteller'] = $this->h->h_select();
	$this->load->library("pagination");
	$perpage = 20;
	$config['base_url'] = site_url("fahrzeug/f_list_hd");
	$config['total_rows'] = count($this->fahrzeug->bind_table_herstellername_a());

	$config['per_page'] = $perpage;
	$config['uri_segment'] = 3;
	
	$this->pagination->initialize($config);
	
	$data["links"] = $this->pagination->create_links();
	$offset = $this->uri->segment(3);
	$this->db->limit($perpage, $offset);
	$data["fahrzeugs"] = $this->fahrzeug->bind_table_herstellername_d();
    $this->load->view("fahrzeug/list",$data);
}
public function f_list_ha() {
	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
	$data['hersteller'] = $this->h->h_select();
	$this->load->library("pagination");
	$perpage = 20;
	$config['base_url'] = site_url("fahrzeug/f_list_ha");
	$config['total_rows'] = count($this->fahrzeug->bind_table_herstellername_a());
	$config['per_page'] = $perpage;
	$config['uri_segment'] = 3;
	
	$this->pagination->initialize($config);
	
	$data["links"] = $this->pagination->create_links();

	$offset = $this->uri->segment(3);
	$this->db->limit($perpage, $offset);
	$data["fahrzeugs"] = $this->fahrzeug->bind_table_herstellername_a();
    $this->load->view("fahrzeug/list",$data);
}

public function f_list_kd() {
	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
	$data['hersteller'] = $this->h->h_select();
	$this->load->library("pagination");
	$perpage = 20;
	$config['base_url'] = site_url("fahrzeug/f_list_kd");
	$config['total_rows'] = count($this->fahrzeug->bind_table_herstellername_a());
	$config['per_page'] = $perpage;
	$config['uri_segment'] = 3;
	
	$this->pagination->initialize($config);
	
	$data["links"] = $this->pagination->create_links();

	$offset = $this->uri->segment(3);
	$this->db->limit($perpage, $offset);
	$data["fahrzeugs"] = $this->fahrzeug->bind_table_fahrzeug_klasse_d();
    $this->load->view("fahrzeug/list",$data);
}
public function f_list_ka() {
	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
	$data['hersteller'] = $this->h->h_select();
	$this->load->library("pagination");
	$perpage = 20;
	$config['base_url'] = site_url("fahrzeug/f_list_ka");
	$config['total_rows'] = count($this->fahrzeug->bind_table_herstellername_a());
	$config['per_page'] = $perpage;
	$config['uri_segment'] = 3;
	
	$this->pagination->initialize($config);
	
	$data["links"] = $this->pagination->create_links();

	$offset = $this->uri->segment(3);
	$this->db->limit($perpage, $offset);
	$data["fahrzeugs"] = $this->fahrzeug->bind_table_fahrzeug_klasse_a();
    $this->load->view("fahrzeug/list",$data);
}


public function f_list_bd() {
	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
	$data['hersteller'] = $this->h->h_select();
	$this->load->library("pagination");
	$perpage = 20;
	$config['base_url'] = site_url("fahrzeug/f_list_bd");
	$config['total_rows'] = count($this->fahrzeug->bind_table_herstellername_a());
	$config['per_page'] = $perpage;
	$config['uri_segment'] = 3;
	
	$this->pagination->initialize($config);
	
	$data["links"] = $this->pagination->create_links();

	$offset = $this->uri->segment(3);
	$this->db->limit($perpage, $offset);
	$data["fahrzeugs"] = $this->fahrzeug->bind_table_baujahr_d();
    $this->load->view("fahrzeug/list",$data);
}
public function f_list_ba() {
	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
	$data['hersteller'] = $this->h->h_select();
	$this->load->library("pagination");
	$perpage = 20;
	$config['base_url'] = site_url("fahrzeug/f_list_ba");
	$config['total_rows'] = count($this->fahrzeug->bind_table_herstellername_a());
	$config['per_page'] = $perpage;
	$config['uri_segment'] = 3;
	
	$this->pagination->initialize($config);
	
	$data["links"] = $this->pagination->create_links();

	$offset = $this->uri->segment(3);
	$this->db->limit($perpage, $offset);
	$data["fahrzeugs"] = $this->fahrzeug->bind_table_baujahr_a();
    $this->load->view("fahrzeug/list",$data);
}
public function f_list_ad() {
	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
	$data['hersteller'] = $this->h->h_select();
	$this->load->library("pagination");
	$perpage = 20;
	$config['base_url'] = site_url("fahrzeug/f_list_ad");
	$config['total_rows'] = count($this->fahrzeug->bind_table_herstellername_a());
	$config['per_page'] = $perpage;
	$config['uri_segment'] = 3;
	
	$this->pagination->initialize($config);
	
	$data["links"] = $this->pagination->create_links();

	$offset = $this->uri->segment(3);
	$this->db->limit($perpage, $offset);
	$data["fahrzeugs"] = $this->fahrzeug->bind_table_aenderung_d();
    $this->load->view("fahrzeug/list",$data);
}
public function f_list_aa() {
	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
	$data['hersteller'] = $this->h->h_select();
	$this->load->library("pagination");
	$perpage = 20;
	$config['base_url'] = site_url("fahrzeug/f_list_aa");
	$config['total_rows'] = count($this->fahrzeug->bind_table_herstellername_a());
	$config['per_page'] = $perpage;
	$config['uri_segment'] = 3;
	
	$this->pagination->initialize($config);
	
	$data["links"] = $this->pagination->create_links();

	$offset = $this->uri->segment(3);
	$this->db->limit($perpage, $offset);
	$data["fahrzeugs"] = $this->fahrzeug->bind_table_aenderung_a();
    $this->load->view("fahrzeug/list",$data);
}
public function f_list_ea() {
	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
	$data['hersteller'] = $this->h->h_select();
	$this->load->library("pagination");
	$perpage = 20;
	$config['base_url'] = site_url("fahrzeug/f_list_ea");
	$config['total_rows'] = count($this->fahrzeug->bind_table_herstellername_a());
	$config['per_page'] = $perpage;
	$config['uri_segment'] = 3;
	
	$this->pagination->initialize($config);
	
	$data["links"] = $this->pagination->create_links();

	$offset = $this->uri->segment(3);
	$this->db->limit($perpage, $offset);
	$data["fahrzeugs"] = $this->fahrzeug->bind_table_eingabe_a();
    $this->load->view("fahrzeug/list",$data);
}
public function f_list_ed() {
	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
	$data['hersteller'] = $this->h->h_select();
	$this->load->library("pagination");
	$perpage = 20;
	$config['base_url'] = site_url("fahrzeug/f_list_ed");
	$config['total_rows'] = count($this->fahrzeug->bind_table_herstellername_a());
	$config['per_page'] = $perpage;
	$config['uri_segment'] = 3;
	
	$this->pagination->initialize($config);
	
	$data["links"] = $this->pagination->create_links();

	$offset = $this->uri->segment(3);
	$this->db->limit($perpage, $offset);
	$data["fahrzeugs"] = $this->fahrzeug->bind_table_eingabe_d();
    $this->load->view("fahrzeug/list",$data);
}
public function f_list_fd() {
	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
	$data['hersteller'] = $this->h->h_select();
	$this->load->library("pagination");
	$perpage = 20;
	$config['base_url'] = site_url("fahrzeug/f_list_fd");
	$config['total_rows'] = count($this->fahrzeug->bind_table_herstellername_a());
	$config['per_page'] = $perpage;
	$config['uri_segment'] = 3;
	
	$this->pagination->initialize($config);
	
	$data["links"] = $this->pagination->create_links();

	$offset = $this->uri->segment(3);
	$this->db->limit($perpage, $offset);
	$data["fahrzeugs"] = $this->fahrzeug->bind_table_fahrzeugname_d();
    $this->load->view("fahrzeug/list",$data);
}
public function f_list_fa() {
	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
	$data['hersteller'] = $this->h->h_select();
	$this->load->library("pagination");
	$perpage = 20;
	$config['base_url'] = site_url("fahrzeug/f_list_fa");
	$config['total_rows'] = count($this->fahrzeug->bind_table_herstellername_a());
	$config['per_page'] = $perpage;
	$config['uri_segment'] = 3;
	
	$this->pagination->initialize($config);
	
	$data["links"] = $this->pagination->create_links();

	$offset = $this->uri->segment(3);
	$this->db->limit($perpage, $offset);
	$data["fahrzeugs"] = $this->fahrzeug->bind_table_fahrzeugname_a();
    $this->load->view("fahrzeug/list",$data);
}









    public function edit(){
    if($this->input->post()) {
    	$fahrzeug['fz_id'] = $fz_id = $this->uri->segment(3);
		
    	$data = $this->input->post();
//  	p($data);
//  	die;
    	
		
		$fahrzeug['bilder'] = $data['bilder'];	
		$fahrzeug['fzh_id'] = $data['fzh_id'];
		$fahrzeug['fahrzeugname'] = trim($data['fahrzeugname']);

//  	$config['upload_path'] = '/quellen/Bilder/';
//		$config['allowed_types'] = 'gif|jpg|png|jpeg';
//		$config['max_size'] = '10000';
//		$config['file_name'] = $fahrzeug['fahrzeugname'].$data['baujahr'];
//
//		//载入上传类
//		$this->load->library('upload', $config);
//		//执行上传
//		$status = $this->upload->do_upload("thumb_bilder");
//		if(!$status) {
//			$fahrzeug['bilder'] = $data['alt_bilder'];
////			$wrong = $this->upload->display_errors();
//
////			if($wrong){
////				error($wrong);
////			}
//		} else{
//			
//			//返回信息
//			
//			$info = $this->upload->data();	
//			$fahrzeug['bilder'] = $info['file_name'];
////			p($info);		
//		}
		
		
//      p($fahrzeug['bilder']);
		
		
		
// 	p($data);
        
//		var $array = array(
//			"fahrzeugname" => $fahrzeug['fahrzeugname'],
//		);
//		$$this->fahrzeug->exit_id($array);
        $fahrzeug['fzk_id'] = $data['fzk_id'];
        $fahrzeug['baujahr'] = $data['baujahr'];
        $fahrzeug['aenderung'] = $data['aenderung'];
        $fahrzeug['eingabe'] = $data['eingabe'];
//  p($fahrzeug);
        $flag = preg_match('/^\d\d\d\d$/is',$fahrzeug['baujahr']);
        if($fahrzeug) {
            if($flag) {
                $this->fahrzeug->edit_update($fahrzeug);
            
//p($fz_id);	

                $markt['fz_id'] = $fz_id;
				
				if(isset($data['markt_id'])) {
					$markt['markt_id'] = $data['markt_id'];
                	$this->land->m_array_insert($markt);
				} else{
					$this->db->delete("Fahrzeug2Markt",array('fz_id'=>$markt['fz_id']));
				}
                


                $quelle['fz_id'] = $fz_id;
				if(isset($data['quelle_id'])) {
					$quelle['quelle_id'] = $data['quelle_id'];
                	$this->quelle->array_insert($quelle);
				} else{
					$this->db->delete("Fahrzeug2Quelle",array('fz_id'=>$quelle['fz_id']));
				}
                


                $fas['fz_id'] = $fz_id;
                 
                if(isset($data['fas_id'])) {
                	$fas['fas_id'] = $data['fas_id'];
					$this->fas->array_insert($fas);
                } else{
                	$this->db->delete("FAS2Fahrzeug",array('fz_id'=>$fas['fz_id']));
                }
				 
                
//p("222");die;
                success("fahrzeug/fzginfo/$fz_id","Date update success");
            } else{
                error("Bitte eine richtig formig Baujahr eingaben!Z.B 2016");
            }
            
        }
        

    
      } else{
//    	p($_SERVER);
//    		$data['pathinfo'] = $_SERVER['PATH_INFO'];

			$data['url'] = uri_string();
			
            $fz_id = $this->uri->segment(3);
            $data['bilder_status'] = $this->bilder->Session_get_bilder()[0];
			$data['sessions'] = $this->bilder->Session_all();
//          $result = $this->fahrzeug->fahrzeug_bilder_get($fz_id);
//		p($result);
//		die;
        	$data['fahrzeug'] = $this->fahrzeug->f_all(); 
			$data['hersteller'] = $this->h->h_select();
            $data['update'] = $this->fahrzeug->all_teil_such($fz_id);

            $data["quelle"] = $this->quelle->q_all();
            $data['fas'] = $this->fas->fas_all();
            $data['mland'] = $this->land->m_select();
            
			
            $data["klasse"] = $this->k->k_select();
            
//          p($data['pathinfo']);
//          die;
//     		p($data['update']['fahrzeug']);
//     		p($data['sessions']);

            $this->load->view("fahrzeug/edit",$data);
        }
        
    }


	public function fahrzeug_add() {
		$index = $this->input->post("index");
		$array = array(
			"fz_id" => $index,
		);
		$quelle = $this->fahrzeug->fbingqung_s($array)[0];
		
		$quelle["message"] = "success";
		
		echo json_encode($quelle);
	}
	
	public function test_test() {
//		$index = $this->input->post("index");
//		$array = array(
//			"quelle_id" => $index,
//		);
//		$quelle = $this->quelle->qbindung_s($array)[0];
//		
//		$quelle["message"] = "success";
//		
//		echo json_encode($quelle);
//		
//		$(".qq_add").click(function(){
//  	count++;
//      var inner = $(this).parents('.quelle').children(".col-xs-7");
//      var value = inner.find("select option:selected");
//      var index = value.val();
////         alert(index);
//      $.ajax({
//      	url:"<?php echo site_url('sensor/quelle_add'); ",
//      	type:"POST",
//      	data:{index:index},
//      	dataType:'json',
//      	success:function(data) {
//      		var str = "<div class='out'><div class='col-xs-2'><input type='hidden' name='quelle_id[]' value='"+index+"'>quelle["+count+"]</div><div class='col-xs-7'>"+data.quellenname+"</div><div class='col-xs-3'><a href='javascript:' onclick='del(this,quelle)'><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></a></div></div>";
////      		alert(str);
//      		$(".quelle_quelle").append(str);
//	        	},
//	        });
//	    });
	}	
	public function delete_all() {
		$fz_id = $this->input->post("fz_id");
		$data1 = $this->fahrzeug->Fahrzeug_delete_all($fz_id);
		$data2 = $this->fas->Fahrzeug_fas_delete_all($fz_id);
		
			$data["message"] = "success";
		
//		$data["message"] = $message;
		echo json_encode($data);
	}


    
}


?>