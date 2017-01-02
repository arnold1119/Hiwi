<?php
    header("content-type:text/html;charset=utf8");
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Quelle extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("quelle_model","quelle");
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
                if($index) {
                    success("quelle/index/$index","Add Quelle Success!!");
                } else{
                    error("insert feler");
                }
                
                
                
            } else{
                $this->load->view("quelle/insert");
            }
            // $this->load->view("hersteller/insert");
        }

        public function edit() {
            if($this->input->post("update")) {
                // p($_POST);die;
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
                $quelle_id = $this->uri->segment(3);
                $array = array(
                    'quelle_id' => $quelle_id,
                    );
                $data['result'] = $this->quelle->qbindung_s($array);
                // p($data);die;
                // p($data);die;
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