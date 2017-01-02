<?php
    header("content-type:text/html;charset=utf8");
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class BIlder extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("bilder_model","bilder");
        
//      $this->load->library('session');
        
    }

    public function index() {
        $index = $this->uri->segment(3);
        if($index != -1) {
            $data['bilder_index'] = $index;
        } else{
            $data['bilder_index'] = -1;
        }

        $data["bild"] = $this->bilder->bilder_all();
        // p($data['quelle']);die;

        $this->load->view("bilder/index",$data);
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
    if( $this->input->post("add")!=null) {
			$bild = $this->input->post('bild');
            $pfad = $this->input->post("pfad");
                
            $array = array(
                "bild" => $bild,
                "pfad" => $pfad,
            );
            $result = $this->db->get_where("Sensor_Bild",$array)->result_array();
//			p($result);die;
            if(count($result)) {
                error("Die Sensor Bilder schon  existiert !!!");
            } else{
                $sta = $this->bilder->bilder_insert($array);
                if($sta) {
                $data['count'] = $sta;
                // p(count($this->k->k_select_d()));die;
//              $data['bild'] = $this->bilder->bilder_select_d();
// p($data);
                // $this->load->view("header");
                success("bilder/index/$sta","success insert");
//              $this->load->view("bilder/index/"$sta,$data);
                } else{
                    error("insert failer");
                }
            }
    } else{
            $data['bilder'] = $this->bilder->bilder_all();
            $data['count'] = 0;
//			p($data);die;
            // $this->load->view("header");
            $this->load->view("bilder/insert",$data);
    }
            
}

        public function edit() {
            if($this->input->post("update")) {
                // p($_POST);die;
                $sb_id = $this->uri->segment(3);
                $bild = $this->input->post('bild');
                $pfad = $this->input->post("pfad");

                $array = array(
                        "sb_id" => $sb_id,
                        "bild" => $bild,
                        "pfad" => $pfad,
                     
                        );

            
            $result = $this->db->get_where("Sensor_Bild",$array)->result_array();
//			p($result);die;
            if(count($result)) {
                error("Die Sensor Bilder schon  existiert !!!");
            } else{
                $sta = $this->bilder->bilder_update($array,$sb_id);
                if($sta) {
                $data['count'] = $sta;
                // p(count($this->k->k_select_d()));die;
//              $data['bild'] = $this->bilder->bilder_select_d();
// p($data);
                // $this->load->view("header");
                success("bilder/index/$sb_id","success update");
//              $this->load->view("bilder/index/"$sta,$data);
                } else{
                    error("insert failer");
                }
            }
                
                // p($_POST);die;
            } else{
                $sb_id = $this->uri->segment(3);
                $array = array(
                    'sb_id' => $sb_id,
                    );
                $data['result'] = $this->bilder->bilder_bindung_s($array);
                // p($data);die;
                // p($data);die;
                $this->load->view("bilder/edit",$data);
            }
        }

	public function auswahlen($dirs = "/var/www/edit/quellen/Bilder"){
		
		
//		echo "<br/>";
//		var_dump($dirs);
//		echo "test";
		$data['dirs'] = $dirs;
		$this->load->view("bilder/auswahlen",$data);
		
	}
	

	public function dir_open(){
		
		$dirs = $this->input->get("dirOpen");

		$this->auswahlen($dirs);
	}
	public function dir_delete() {
		$keywords = preg_split("/dir_delete/",$_SERVER['REQUEST_URI']);
		$dirs = $keywords[1];
		del_dir($dirs);
		echo "<script>alert('Der Ordner schon werdern gelost!');setTimeout(function(){
			location.replace(document.referrer);
		},1000);</script>";
	}
	public function txt_file_open($all){
//		p($all);
//		$dirs = $keywords[1];
//		var_dump($keywords);
//		$all = $this->input->get("s");
		
			$data["content"] = file_get_contents($all);
			$data['name'] = basename($all);
			$this->load->view('file/file_open_txt.php',$data);
		
			
		
		
	}
	public function txt_file_open_ajax(){
		$data['url'] = $this->input->post("url");
		$data["content"] = file_get_contents($data['url']);
		echo json_encode($data);
	}
	
	public function img_file_open($all){
		
		$result = preg_split("/www/",$all);
		$data["content"] = $result[1];
		$data['name'] = basename($all);
		$this->load->view('file/file_open_img.php',$data);
	}
	
	public function vedio_file_open($all) {
		$result = preg_split("/www/",$all);
		$data["content"] = $result[1];
		$data['name'] = basename($all);
//		p($_SESSION['term']);
//		p($data);

		$this->load->view('file/file_open_vedio.php',$data);
	}

	public function file_open() {
		$all = $this->input->get("fileOpen");
//echo htmlspecialchars($all);
		$result = preg_split("/www/",$all);
		$test = $result[1];
		$data["content"] = $test;
//		p($result);
//p($data['content']);
		$data['fname'] = dirname($test);
		$data['pfname'] = basename($test);
	
		$info = pathinfo($data['pfname']);
//		p($info);
//		
//		die;
//		p($data['fname']);
//		p($data['pfname']);
//		die;
//		if($info['extension'] != 'pdf') {
//			$this->txt_file_open($all);
//		} else 
		if($info['extension']=='pdf'){
			$this->load->view("file/file_open_pdf.php",$data);
		} else if($info['extension']=='jpg'||$info['extension']=='jpeg'||$info['extension']=='png') {
			$this->img_file_open($all);
		} else if($info['extension']=='mp4'||$info['extension']=='wmf') {
			$this->vedio_file_open($all);
		} else{
			$this->txt_file_open($all);
		}
		
	}
	
	public function file_delete(){
		$all = $this->input->get("fileDelete");
		unlink($all);
		
		echo "<script>alert('Der File schon wird gelost!');setTimeout(function(){
			location.replace(document.referrer);
		},1000);</script>";
	}
	
	
	
	public function bilder_upload() {
		$config['upload_path'] = './quellen/Bilder/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		

		//载入上传类
		$this->load->library('upload', $config);
		//执行上传
		$status = $this->upload->do_upload("thumb_bilder");
		if($status) {
			echo "<script>alert('Success zu upload');setTimeout(function(){
				location.replace(document.referrer);
			},300);</script>";
		} else {
//			p($this->upload->display_errors());
			echo "<script>alert('Error bei upload');setTimeout(function(){
				location.replace(document.referrer);
			},300);</script>";
		}
		
		
	}
	 
	public function link(){
		
		$link = $this->input->get("link");		
//		p($link);
		$bilder['session_value'] = $link;
		$speicher = $this->bilder->Session_bilder_update($bilder);
//		$result[0] = $this->bilder->Session_get_bilder();
//		p($result);
//		die;
//		$result = preg_split("/edit/",$link);
		if($speicher) {
	
			

			echo "<script>alert('Der Link gespeichert!!');setTimeout(function(){
				location.replace(document.referrer);
			},30);</script>";
		} else{
			echo "<script>alert('Fehler bei Speicher!!');setTimeout(function(){
				location.replace(document.referrer);
			},30);</script>";
		}
//		$result = preg_split("/quellen/",$result[1]);
//		$result = preg_split("/\//",$result[1]);
//		p($this->session->userdata('session_thumb_bilder'));

		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	



}


?>