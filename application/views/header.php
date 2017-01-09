
    <!-- 新 Bootstrap 核心 CSS 文件 -->
<!-- Latest compiled and minified CSS -->
<!-- <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="<?php echo base_url('style/css/bootstrap.min.css') ?>">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="<?php echo base_url('style/js/jquery.min.js') ?>"></script>
<style type="text/css">
	.shadow .top{margin: 14px;}
	.shadow .right{letter-spacing: 4px;font-size: 18px;float: right;margin: 60px 20px 0px 0px;font: "Arial";color:rgb(51,51,51);}
</style>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="<?php echo base_url('style/js/bootstrap.min.js') ?>"></script>


    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('style/css/base.css'); ?>">
   	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('style/css/header.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/fahr.css'); ?>">
	
</head>
<body>
    <div id="logo" class="shadow">
        
        
        <img alt="" src="<?php echo base_url('style/image/iff-logo.svg') ?>" class="top"/>
        <div class="right">
            FAS Datenbank System
        </div>
        <ul  class="nav">
            <a href="<?php echo site_url('fahrzeug/f_list_ida'); ?>" class="ul_nav">Auto</a>
            <a href="<?php echo site_url('fas/f_list'); ?>" class="ul_nav">FAS</a>
            <a href="<?php echo site_url('sensor/f_list'); ?>" class="ul_nav">Sensor</a>
        </ul>
        
        
        <p class="indexChange" style="position: relative;display: none;"><?php echo $this->uri->segment(1); ?></p>
    
    
</div>
<script type="text/javascript">
	$(function(){
//		alert("");
	var indexChange = $(".indexChange").text();
//	alert(indexChange);
	var index_c = (indexChange=='fahrzeug')?0:((indexChange=='fas')?1:(indexChange=='sensor')?2:0);
//		alert(index_c);
$("#logo .nav a").eq(index_c).css("background-color","black");
		$("#logo .nav a").hover(function(){
			$(this).css("background-color","#4caf50");
		},function() {
			$("#logo .nav a").css("background-color","#606060");
		$("#logo .nav a").eq(index_c).css("background-color","black");
		});
		
		
	});
</script> 