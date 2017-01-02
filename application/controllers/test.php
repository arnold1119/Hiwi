<?php
    header("content-type:text/html;charset=utf8");
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Test extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("bilder_model","bilder");
    }

    public function index() {
    	$this->load->view("formtest.php");
    }
	
	
	public function send() {
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['file_name'] = $ . mt_rand(1000,9999);

		//载入上传类
		$this->load->library('upload', $config);
		//执行上传
		$status = $this->upload->do_upload("thumb_bilder");
	
		$wrong = $this->upload->display_errors();

		if($wrong){
			p($this->upload->data());
		}
		//返回信息
		$info = $this->upload->data();
		
		p($info);die;
	}



}


?>