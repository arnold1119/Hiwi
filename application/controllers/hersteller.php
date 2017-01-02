<?php

class Hersteller extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model("hersteller_model",'hst');
        $this->load->model("land_model","land");
        $this->load->model("herstellergruppe_model","hstg");
		$this->load->model("fahrzeug_model","fahrzeug");
	
    }


    public function index() {
    	$data['fahrzeugfilter'] = $this->fahrzeug->f_all(); 
		$data['herstellerfilter'] = $this->hst->h_select();
        $index = $this->uri->segment(3);
        if($index != -1) {
            $data['hst_index'] = $index;
        } else{
            $data['hst_index'] = -1;
        }
        $data['hersteller'] = $this->hst->hbinden_select();
//         p($data['hersteller']);
        $this->load->view("hersteller/index",$data);
    }

/**
 * [insert insert into fahrzeughersteller ]
 * @return [type] [description]
 */
    public function insert() {
// 如果是在insert点击按钮则执行if里面的方法
// 1、在增加数据的时候 第一步要判断herstellername是否已经存在 
//    如果存在名字不存在 则运用model里面的h_insert方法，
//    成功的话跳转到hersteller/index这个页面 同时第三个参数传递第几条
//    可以在index页面进行标记；
//    如果存在的话就用error() 函数函数返回
//    
//    如果不是点击post按钮的话 那就显示要做的内容
    $data['fahrzeugfilter'] = $this->fahrzeug->f_all(); 
		$data['herstellerfilter'] = $this->hst->h_select();
        if($this->input->post("add")) {
            $herstellername = $this->input->post("herstellername");
            $array = array(
                "herstellername" => $herstellername,
                );
            
            if(!count($this->hst->h_existiert($array))){
                $fzhg_id = $this->input->post('fzhg_id');
                $land_id = $this->input->post("land_id");
                $herstellername = $this->input->post("herstellername");
                $array = array(
                    "fzhg_id" => $fzhg_id,
                    "land_id" => $land_id,
                    "herstellername" => $herstellername,
                    );
                $index = $this->hst->h_insert($array)[0]["fzh_id"];
                success("hersteller/index/$index","Add Hersteller Success!!");

            } else{
                error("Die hersteller Name schon existiert");
            }
            
        } else{
            $data['land'] = $this->land->l_select();
            $data["gruppename"] = $this->hstg->hg_select();
            $this->load->view("hersteller/insert",$data);
        }
        // $this->load->view("hersteller/insert");
    }

    public function edit() {

// 对herstellername 进行update 首先判断是不是点击了post那个按钮
// 1、 显示没点击按钮的时候，如果是没点击按钮 那么通过segment(3) 来通过
//     与结果比对 如果是 那么selected 否则正常显示

// 2、 如果点击了按钮的时候
//     ----先要对所进行update的herstellername进行筛选，如果确定是唯一的名字那么
//         是可以更新 否则不能更新



$data['fahrzeugfilter'] = $this->fahrzeug->f_all(); 
		$data['herstellerfilter'] = $this->hst->h_select();
        if($this->input->post("update")) {
        	
            $fzh_id = $this->uri->segment(3);
            $fzhg_id = $this->input->post('fzhg_id');
            $land_id = $this->input->post("land_id");
            $herstellername = $this->input->post("herstellername");
            $array = array(
                "herstellername" => $herstellername,
                );

            if(!count($this->hst->h_existiert($array)) ){
                $array = array(
                    "fzhg_id" => $fzhg_id,
                    "land_id" => $land_id,
                    "herstellername" => $herstellername,
                    );
                $index = $this->hst->h_insert($array)[0]["fzh_id"];
                success("hersteller/index/$index","Add Hersteller Success!!");
            } else{
                error("Die hersteller Name schon existiert!!!update fehler!!");
            }


            // p($_POST);die;
        } else{
            $fzh_id = $this->uri->segment(3);
            $array = array(
                'fzh_id' => $fzh_id,
                );
            $data['result'] = $this->hst->hbindung_s($array);
            $data['land'] = $this->land->l_select();
            $data['gruppename'] = $this->hstg->hg_select();
            // p($data);die;
            $this->load->view("hersteller/edit",$data);
        }
    }
	
	public function hersteller_delete_all() {
		$fzh_id = $this->input->post("fzh_id");
		if($this->hst->h_delete($fzh_id)) {
			$data['message'] = 'success';
		}
		echo json_encode($data);
	}
	public function delete_fzh_id(){
		$fzh_id = $this->input->post("fzh_id");
		if($this->hst->h_delete($fzh_id)) {
			$data['message'] = 'success';
		}
		echo json_encode($data);
	}
	
	public function gruppe_index() {
		$data['gruppes'] = $this->hstg->hg_select();
//		p($data);
		$this->load->view("hersteller/gruppe_index",$data);
	}
	
	public function gruppe_insert() {
//		$data['gruppes'] = $this->hstg->hg_select();
		if($this->input->post()) {
			
			$array['gruppenname'] = $this->input->post('gruppenname');
//			p($array);die;
//			p($array);
//			die;
			$result = $this->hst->fahrzeug_HerstellerLand_gruppe_insert($array);
			if($result) {
				$data['index'] = $result;
				$data['gruppes'] = $this->hstg->hg_select();
				$this->load->view("hersteller/gruppe_index",$data);
			} else{
				error("Darf nicht gleiche Gruppenname","");
			}
		} else{
			$this->load->view("hersteller/gruppe_insert");	
		}

	}
	
	public function gruppe_edit() {
		if($this->input->post()) {
			$data['gruppes'] = $this->hstg->hg_select();

			$this->load->view("hersteller/gruppe_index",$data);
		} else{
			$data['fzhg_id'] = $this->uri->segment(3);
			$data['result'] = $this->hstg->hg_one($data['fzhg_id']);

			$this->load->view("hersteller/gruppe_edit",$data);
		}
		
	}
	
	public function delete_all(){
		$fzhg_id = $this->input->post("fzhg_id");
		$data['message'] = $this->hst->delete_all($fzhg_id);
		echo json_encode($data);
	}
	
	public function delete_fash_id(){
		$fash_id = $this->input->post("fash_id");
		if($this->hst->fash_delete($fash_id)) {
			$data['message'] = 'success';
		}
		echo json_encode($data);
	}
	
	
	




}