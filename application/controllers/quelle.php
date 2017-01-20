<?php
    header("content-type:text/html;charset=utf8");
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Quelle extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("quelle_model","quelle");
        $this->load->model("bilder_model",'bilder');
    }

    public function index() {
        $index = $this->uri->segment(3);
        if($index != -1) {
            $data['quelle_index'] = $index;
        } else{
            $data['quelle_index'] = -1;
        }

        $data["quelle"] = $this->quelle->q_all();
        // p($data['quelle']);die;

        $this->load->view("quelle/index",$data);
    }


        public function insert() {
    // 如果是在insert点击按钮则执行if里面的方法
    // 1、在增加数据的时候 第一步要判断herstellername是否已经存在 
    //    如果存在名字不存在 则运用model里面的h_insert方法，
    //    成功的话跳转到hersteller/index这个页面 同时第三个参数传递第几条
    //    可以在index页面进行标记；
    //    如果存在的话就用error() 函数函数返回
    //    
    //    如果不是点击post按钮的话 那就显示要做的内容
    //    
            if($this->input->post("add")) {
//             p($this->input->post());
//             die;
                $link = $this->input->post('link');
                $quellenname = $this->input->post("quellenname");
                $datum = $this->input->post("datum");
                $array = array(
                    "link" => $link,
                    "quellenname" => $quellenname,
                    "datum" => $datum,
                    );
                $index = $this->quelle->q_insert($array);
//				p($index);die;
				if($index != "Daten schon eixts") {
					if($index) {
	                	$this->bilder->Session_file_null();
	                	$this->bilder->Session_vorfile_null();
	                    $this->index();
	                } else{
	                    error("insert feler");
	                }
				} else{
					error($index);
				}
                
                
                
                
            } else{
            	
//			$file = $this->bilder->Session_get_file()[0];
            $_SESSION['quellenname'] = $this->input->get("quelle");
            
//          p(urldecode($this->input->get("quelle")));
            $t = pathinfo($this->input->get("quelle"));
//          p($t);
            if($t['basename']!=null) {
            	if($t['extension']=='mp4') {
	            	$data['type'] = 1;
	            } elseif($t['extension']=='png'||$t['extension']=='gif'||$t['extension']=='jpg'||$t['extension']=='jpeg'){
	            	$data['type'] = 2;
	            } else{
	            	$data['type'] = 0;
	            }
            }
            
            	
	        if($_SESSION['quellenname']) {
				
				$data['status'] = 1;
				
			} else{
				
				$data['status'] = 0;
				
			}
            	
            	$data['url'] = uri_string();
            	
	
                $this->load->view("quelle/insert",$data);
            }
            // $this->load->view("hersteller/insert");
        }

        public function edit() {
            if($this->input->post("update")) {
//                 p($_POST);die;
                $quelle_id = $this->uri->segment(3);
                $link = $this->input->post('link');
                $quellenname = $this->input->post("quellenname");
                $datum = $this->input->post("datum");

                $array = array(
                        "quelle_id" => $quelle_id,
                        "link" => $link,
                        "quellenname" => $quellenname,
                        "datum" => $datum
                        );

            
                if($this->quelle->q_update($array,$quelle_id)) {
                    success("quelle/index/$quelle_id","Update Quelle Success!!");
                } else{
                    error("update feher!!!");
                }
                
                // p($_POST);die;
            } else{
            	
            	
//				$data['sessions'] = $this->bilder->Session_all();
            	$data['url'] = uri_string();
//          	$quelle_id = preg_split('/edit\//',$data['url'])[1];
            	
                $quelle_id = $this->uri->segment(3);
//              p($quelle_id);
                $array = array(
                    'quelle_id' => $quelle_id,
                );
                    
//                  p($array);
                $data['result'] = $this->quelle->qbindung_s($array);
                $quellenname = $data['result'][0]['quellenname'];
                $link = $data['result'][0]['link'];
               
                $quelle_get = $this->input->get('quelle');
//              $link_get = $this->input->get("link");
                
                if($quelle_get) {
                	$quellenname = $quelle_get;
                	$link = "fasdb.iffhz.ing.tu-bs.de/quellen/Dokumente";
                }
                
                if($quellenname=="null") {
	            	$data['status'] = 0;
	            } else{
	            	$data['status'] = 1;
	            	$_SESSION['link'] = $link;
	            	$_SESSION['quellenname'] = $quellenname;
	            }
//              p($data['result']);
//              die;
                $this->load->view("quelle/edit",$data);
            }
        }
        
		
		public function delete_quelle_id() {
    	$quelle_id = $this->input->post("quelle_id");
		if($this->quelle->quelle_delete($quelle_id)) {
			$data['message'] = 'success';
		}
		echo json_encode($data);
    }



}


?>