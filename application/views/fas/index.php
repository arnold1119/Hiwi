<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
   

    <title>Fas</title>
<?php $this->load->view("header"); ?>
<form class="filter form-inline" method="post" action="<?php echo site_url('fas/filter') ?>">
	<div class="form-group">
	    
	    <input type="text" class="form-control"  placeholder="Hersteller Name" name="hersteller" list="fasherstellerfilter">
           
  	</div>
    <div class="form-group">
	   
	    <input type="text" class="form-control" placeholder="Bezeichnung" name="fasbezeichnung" list="fas">
				
  	</div>
  	<div class="form-group">
	
	    <input type="text" class="form-control" placeholder="Type" name="typ" list="fastypefilter">
  	</div>
  	
	  	<button type="submit" class="btn btn-default filter_button" style="font-weight: 600;">Filter >></button>
	  	
</form>

<div id="search" class="">
<h1>FAS</h1>
    <form class="form-inline" action="<?php echo site_url('fas/speicher') ?>" method="post" class="">

<input type="hidden" name="eingabe" value="<?php echo date('Y-m-d'); ?>"/>
<input type="hidden" name="aenderung" value="<?php echo date('Y-m-d'); ?>"/>
<!-- fas name start -->
<br />


<datalist id="fasherstellerfilter">
    <?php foreach($fasherstellers as $value): ?> 
        <option value="<?php echo $value['herstellername']; ?>"></option>
    <?php endforeach; ?>
</datalist>

<datalist id="fastypefilter">
    <?php foreach($fastypes as $value): ?> 
        <option value="<?php echo $value['typ']; ?>"></option>
    <?php endforeach; ?>
</datalist>
<datalist id="fas">
            <?php foreach($fas as $value): ?>
                <option value="<?php echo $value['fasbezeichnung']; ?>"></option>
            <?php endforeach; ?>
        </datalist>
<br />

<div class="row text">
    <div class="col-xs-2">
        <label for="fasname"><span class="tt">FAS Name</span></label>
    </div>
    <div class="col-xs-7">
        <input type="text" class="form-control " placeholder="fasName" list="fas" name="fasbezeichnung" id="fasname" required>
        
    </div>
    <div class="col-xs-3">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
      
        <a href="<?php echo site_url('fas/f_list'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            </button>
        </a>
    </div>
</div>
<br />
<!-- fas name end -->


<!-- fas Type start -->

<div class="row quelle">
    <div class="col-xs-2">
        <label><span>FAS Type</span></label>
    </div>
    <div class="col-xs-7">
        <div class="fastypeselect">
            <select class="form-control" id="fastype" name="fast_id">
            	
                <?php foreach($fastype as $value): ?>
                <?php if($value['fast_id']!=1): ?>
                    <option value="<?php echo $value['fast_id']; ?>"><?php echo $value['typ']; ?></option >
                <?php else: ?>
                    <option value="<?php echo $value['fast_id']; ?>" selected><?php echo $value['typ']; ?></option >
                <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <br> <br>
        </div>
        

    </div>
    <div class="col-xs-3">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
      
        <a href="<?php echo site_url('fas/typeindex'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            </button>
        </a>
    </div>
</div>
<!-- fas type end        -->
    
<!-- fas Hersteller start -->
<div class="row quelle">
    <div class="col-xs-2">
        <label><span>FAS Hersteller</span></label>
    </div>
    <div class="col-xs-7">
        <div class="fasherstellerselect">
            <select class="form-control" id="fashersteller" name="fash_id">
                <?php foreach($fashersteller as $value): ?>
                <option value="<?php echo $value['fash_id']; ?>">   
                <?php echo $value['herstellername']; ?></option >
                <?php endforeach; ?>
            </select>
            <br> <br>
        </div>
        

    </div>
    <div class="col-xs-3">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
        <!--<button type="button" class="btn btn-default q_add">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default q_minus">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </button>-->
        
            
        <a href="<?php echo site_url('fas/fas_hersteller_index'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            </button>
        </a>
        <a href="<?php echo site_url('land/index'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span>HerstellerLand List</span>
                
            </button>
        </a>
    </div>
</div>




<!-- fas hersteller end -->

  


<!-- fas entwicklung start -->
<div class="row quelle">
    <div class="col-xs-2">
        <label><span>FAS Entwicklung</span></label>
    </div>
    <div class="col-xs-7">
        <div class="fasentwicklungselect">
            <select class="form-control" id="fasentwicklng" name="fase_id">
                <?php foreach($entwicklung as $value): ?>
                <?php if($value['fase_id']!=7): ?>
                <option value="<?php echo $value['fase_id']; ?>">   
                <?php echo $value['entwicklung']; ?></option >
                <?php else: ?>
                <option value="<?php echo $value['fase_id']; ?>" selected>   
                <?php echo $value['entwicklung']; ?></option >
                <?php endif; ?>
                
                <?php endforeach; ?>
            </select>
            <br> <br>
        </div>
        

    </div>
    <div class="col-xs-3">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
        <!--<button type="button" class="btn btn-default q_add">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default q_minus">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </button>-->
        <a href="<?php echo site_url('fas/entwicklung'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            </button>
        </a>
    </div>
</div>

<!-- fas entwicklung end -->


<!-- fas serie start -->
<div class="row quelle">
    <div class="col-xs-2">
        <label><span>FAS Serie</span></label>
    </div>
    <div class="col-xs-7">
        <div class="fasserieselect">
            <select class="form-control" id="fasserie" name="fass_id">
                <?php foreach($serie as $value): ?>
                <option value="<?php echo $value['fass_id']; ?>">   
                <?php echo $value['serie']; ?></option >
                <?php endforeach; ?>
            </select>
            <br> <br>
        </div>
        

    </div>
    <div class="col-xs-3">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
        <!--<button type="button" class="btn btn-default q_add">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default q_minus">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </button>-->
        <a href="<?php echo site_url('fas/serie'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            </button>
        </a>
    </div>
</div>
<!-- fas serie end -->





<!-- Serie seit start -->
<div class="row text">
    <div class="col-xs-2">
        <label for="serieseit"><span class="tt">Serie seit z.B 2016</span></label>
    </div>
    <div class="col-xs-7">
        <input type="text" class="form-control " placeholder="Serie seit z.B 2016" name="serie_seit" id="serieseit" required>
        
    </div>
    <div class="col-xs-3">
    
    </div>
</div>
<br />
<!-- Serie seit end -->


<!-- Serie bis start -->
<div class="row text">
    <div class="col-xs-2">
        <label for="seriebis"><span class="tt">Serie bis z.B 2006</span></label>
    </div>
    <div class="col-xs-7">
        <input type="text" class="form-control " placeholder="Serie bis z.B 2016" name="serie_bis" id="seriebis" required>
        
    </div>
    <div class="col-xs-3">
    
    </div>
</div>
<br />

<div class="row text">
    <div class="col-xs-2">
        <label for="functionsbeschreibung"><span class="tt">Functionsbeschreibung</span></label>
    </div>
    <div class="col-xs-7">
        <!--<input type="text" class="form-control " placeholder="Serie bis z.B 2016" name="">-->
        	<textarea name="funktion" style="resize:none;width:450px;height:120px;"  id="functionsbeschreibung"></textarea>
        
    </div>
    <div class="col-xs-3">
    
    </div>
</div>

<!-- Serie bis end -->
<br />

<!-- fas waehrung start -->
<div class="row quelle">
    <div class="col-xs-2">
        <label><span>FAS Waehrung</span></label>
    </div>
    <div class="col-xs-7">
        <div class="faswaehrungselect">
            <select class="form-control" id="faswaehrung" name="w_id">
                <?php foreach($waehrung as $value): ?>
                <?php if($value['w_id']!=6): ?>
                <option value="<?php echo $value['w_id']; ?>">   
                <?php echo $value['waehrung']; ?></option >
                <?php else: ?>
                <option value="<?php echo $value['w_id']; ?>" selected>   
                <?php echo $value['waehrung']; ?></option >
                <?php endif; ?>
                
                <?php endforeach; ?>
            </select>
            <br> <br>
        </div>
        

    </div>
    <div class="col-xs-3">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
        <!--<button type="button" class="btn btn-default q_add">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default q_minus">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </button>-->
        <a href="<?php echo site_url('fas/waehrung'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            </button>
        </a>
    </div>
</div>

<!-- fas waehrung end -->


<hr>




<div class="row quelle">
    <div class="col-xs-2">
        <label for="betriebgrenze"><span>Betriebsgrenze</span></label>
    </div>
    <div class="col-xs-7">
       

    </div>
    
    <div class="col-xs-3">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
        <!--<button type="button" class="btn btn-default q_add">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default q_minus">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </button>-->
        <!--<a href="<?php echo site_url('sensor/merkmal_index'); ?>">
          
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            </button>
        </a>-->
    </div>
</div>
<br />



<div class="row text">
    <div class="col-xs-2">
        <label for="ub"><span class="tt"><p class="text-right">Min</p></span></label>
    </div>
    
    <div class="col-xs-4">
        <input type="text" class="form-control " placeholder="z.B 34.0" name="von" id="ub" required>
        
    </div>
    <div class="col-xs-2">
    	
    	<div>
            <select class="form-control" id="einheit1" name="einheit_id[]" style="width: 120px;">
                <?php foreach($einheit as $value): ?>
                <option value="<?php echo $value['einheit_id']; ?>">   
                <?php echo $value['einheit']; ?></option >
                <?php endforeach; ?>
            </select>
            <br> <br>
        </div>
    	
    </div>  
    <div class="col-xs-1">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
        <!--<button type="button" class="btn btn-default q_add">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default q_minus">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </button>-->
        <a href="<?php echo site_url('fas/einheit_index'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            </button>
        </a>
    </div>
</div>



<div class="row text">
    <div class="col-xs-2">
        <label for="ob"><span class="tt"><p>Max</p></span></span></label>
    </div>
    <div class="col-xs-4">
        <input type="text" class="form-control " placeholder="z.B 100.0" name="bis" id="ob" required>
        
    </div>
    <div class="col-xs-2">
    	<div>
            <select class="form-control" id="einheit2" name="einheit_id[]" style="width: 120px;">
                <?php foreach($einheit as $value): ?>
                <option value="<?php echo $value['einheit_id']; ?>">   
                <?php echo $value['einheit']; ?></option >
                <?php endforeach; ?>
            </select>
            <br> <br>
        </div>
    </div>
</div>




<hr>
<!-- fas quelle start -->
 <div class="row quelle">
    <div class="col-xs-2">
        <label for=""><span>Quelle</span></label>
    </div>
    <div class="col-xs-7">
       

    </div>
    
    <div class="col-xs-3">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
        <!--<button type="button" class="btn btn-default q_add">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default q_minus">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </button>-->
        <!--<a href="<?php echo site_url('sensor/merkmal_index'); ?>">
          
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            </button>
        </a>-->
    </div>
</div>  
<br />     
<div class="row quelle">
    <div class="col-xs-2">
        <label><span>Quelle</span></label>
    </div>
    <div class="col-xs-7">
        <div class="quelleselect">
            <select class="form-control" id="quelle">
                <?php foreach($quelle as $value): ?>
                    <option value="<?php echo $value['quelle_id']; ?>"><?php echo $value['quellenname']; ?></option>}
                <?php endforeach; ?>
                <option value="0" class="nullquelle">null</option>}
            </select>
            <br> <br>
        </div>
        

    </div>
    <div class="col-xs-3">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
        <button type="button" class="btn btn-default qq_add">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        
        <a href="<?php echo site_url('quelle/index'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            </button>
        </a>
    </div>
</div>
<div class="row quelle quelle_quelle">

</div>

<script>
function del(obj,s) {

	$(obj).parents('.out').remove();
}
var count = 0;
$(function() {
	
	
    $(".qq_add").click(function(){
    	count++;
        var inner = $(this).parents('.quelle').children(".col-xs-7");
        var value = inner.find("select option:selected");
        var index = value.val();
//         alert(index);
        $.ajax({
        	url:"<?php echo site_url('sensor/quelle_add'); ?>",
        	type:"POST",
        	data:{index:index},
        	dataType:'json',
        	success:function(data) {
        		var str = "<div class='out'><div class='col-xs-2'><input type='hidden' name='quelle_id[]' value='"+index+"'>quelle["+count+"]</div><div class='col-xs-7'>"+data.quellenname+"</div><div class='col-xs-3'><a href='javascript:' onclick='del(this,quelle)'><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></a></div></div>";
//      		alert(str);
        		$(".quelle_quelle").append(str);
        	},
        });
    });

    
});
</script>

<!-- fas quelle end -->




<div class="quelle row film">
    <div class="col-xs-2">
        <label for="filmtitle"><span>Film</span></label>
    </div>
    <div class="col-xs-7">
        <div class="filmselect">
            <select class="form-control" id="filmtitle">
                <?php foreach($film as $value): ?>
                
                <option value="<?php echo $value['film_id']; ?>" selected>   
                <?php echo $value['link']; ?></option >
                
                <?php endforeach; ?>
            </select>
            <br> <br>
        </div>
        

    </div>
    <div class="col-xs-3">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
        <button type="button" class="btn btn-default qf_add">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        
        <a href="<?php echo site_url('film/index'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            </button>
        </a>
    </div>
</div>
<div class="row quelle film_quelle">

</div>

<script>
var film = 0;
$(function() {
	
	
    $(".qf_add").click(function(){
    	film++;
        var inner = $(this).parents('.quelle').children(".col-xs-7");
        var value = inner.find("select option:selected");
        var index = value.val();
//         alert(index);
        $.ajax({
        	url:"<?php echo site_url('fas/film_add'); ?>",
        	type:"POST",
        	data:{index:index},
        	dataType:'json',
        	success:function(data) {
//      		alert(data.message);
        		var str = "<div class='out'><div class='col-xs-2'><input type='hidden' name='film_id[]' value='"+index+"'>Film["+film+"]</div><div class='col-xs-7'>"+data.link+"</div><div class='col-xs-3'><a name='cb[]'  onclick='del(this,film)' ><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></a></div></div>";
//      		alert(str);
        		$(".film_quelle").append(str);
        	},
        });
    });

    
});


</script>

<div class="quelle row auto">
    <div class="col-xs-2">
        <label for="sensortitle"><span>Auto</span></label>
    </div>
    <div class="col-xs-7">
        <div class="sensorselect">
            <select class="form-control" id="sensortitle"">
                <?php foreach($fahrzeugen as $value): ?>
                
                <option value="<?php echo $value['fz_id']; ?>" selected>   
                <?php echo $value['fahrzeugname']; ?></option >
                
                <?php endforeach; ?>
            </select>
            <br> <br>
        </div>
        

    </div>
    <div class="col-xs-3">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
        <button type="button" class="btn btn-default autoq_add">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        
        <a href="<?php echo site_url('fahrzeug/index'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            </button>
        </a>
    </div>
</div>	
<div class="row quelle auto_quelle">

</div>

<script>
var fahrzeugen = 0;
$(function() {
	
	
    $(".autoq_add").click(function(){
    	fahrzeugen++;
        var inner = $(this).parents('.quelle').children(".col-xs-7");
        var value = inner.find("select option:selected");
        var index = value.val();
		
		
		$.ajax({
        	url:"<?php echo site_url('fahrzeug/fahrzeug_add'); ?>",
        	type:"POST",
        	data:{index:index},
        	dataType:'json',
        	success:function(data) {
//      		alert(data.message);
        		var str = "<div class='out'><div class='col-xs-2'><input type='hidden' name='fahrzeugen_id[]' value='"+index+"'>Auto["+fahrzeugen+"]</div><div class='col-xs-7'>"+data.fahrzeugname+"</div><div class='col-xs-3'><a name='cb[]'  onclick='del(this,fahrzeugen)' ><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></a></div></div>";
//      		alert(str);
        		$(".auto_quelle").append(str);
        	},
        });

    });

    
});


</script>









































<div class="quelle row sensor">
    <div class="col-xs-2">
        <label for="sensortitle"><span>Sensor</span></label>
    </div>
    <div class="col-xs-7">
        <div class="sensorselect">
            <select class="form-control" id="sensortitle"">
                <?php foreach($sensor as $value): ?>
                
                <option value="<?php echo $value['s_id']; ?>" selected>   
                <?php echo $value['sensorname']; ?></option >
                
                <?php endforeach; ?>
            </select>
            <br> <br>
        </div>
        

    </div>
    <div class="col-xs-3">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
        <button type="button" class="btn btn-default sq_add">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        
        <a href="<?php echo site_url('sensor/index'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            </button>
        </a>
    </div>
</div>	
<div class="row quelle sensor_quelle">

</div>

<script>
var sensor = 0;
$(function() {
	
	
    $(".sq_add").click(function(){
    	sensor++;
        var inner = $(this).parents('.quelle').children(".col-xs-7");
        var value = inner.find("select option:selected");
        var index = value.val();
//         alert(index);
        $.ajax({
        	url:"<?php echo site_url('sensor/sensor_add'); ?>",
        	type:"POST",
        	data:{index:index},
        	dataType:'json',
        	success:function(data) {
//      		alert(data.message);
        		var str = "<div class='out'><div class='col-xs-2'><input type='hidden' name='sensor_id[]' value='"+index+"'>Sensor["+sensor+"]</div><div class='col-xs-7'>"+data.sensorname+"</div><div class='col-xs-3'><a name='cb[]'  onclick='del(this,sensor)' ><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></a></div></div>";
//      		alert(str);
        		$(".sensor_quelle").append(str);
        	},
        });
    });

    
});


</script>

<hr />
 <div class="row button">
            <div class="col-xs-2">
            
            </div>
            <div class="col-xs-7">
            
            </div>
            <div class="col-xs-3">
                <input class="btn  btn-large btn-default" type="submit" value="speicher" name="true">
                <!-- <input class="btn btn-large btn-default" type="submit" value="speicher" formaction="" name="true"> -->
                <!-- <input class="btn btn-default" type="submit" value="Submit"> -->
            </div>
        </div>
<hr>

</form>
</body>
</html>