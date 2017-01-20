<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
   

    <title>Fahrzeug</title>
<?php $this->load->view("header"); ?>
<form class="filter form-inline" method="post" action="<?php echo site_url('fahrzeug/filter') ?>">
    <div class="form-group">
	   <input type="text" class="form-control"  placeholder="Hersteller Name" name="hersteller" list="herstellerfilter">
	    
			
  	</div>
  	<div class="form-group">
	<input type="text" class="form-control" placeholder="Fahrzeug Name" name="fahrzeugname" list="fahrzeug">
	    
  	</div>
  	<div class="form-group">
	    <input type="text" class="form-control" placeholder="Baujahr" name="baujahr">
	    
           
  	</div>
	  	<button type="submit" class="btn btn-default filter_button" style="font-weight: 600;">Filter >></button>
	  	
</form>

<div id="search">
<h1>Fahrzeug</h1>
    <form class="form-inline" action="<?php echo site_url('fahrzeug/speicher') ?>" method="post"  enctype="multipart/form-data">
    <input type="hidden" name="eingabe" value="<?php echo date("Y-m-d"); ?>">
    <input type="hidden" name="aenderung" value="<?php echo date("Y-m-d"); ?>">
<br>
        <div class="row text">
            <div class="col-xs-2">
                <label for="fahrzeugname"><span class="tt">Name</span></label>
            </div>
            <div class="col-xs-7">
                <input type="text" class="form-control " placeholder="fahrzeugname" list="fahrzeug" name="fahrzeugname" required id="fahrzeugname">
                	<datalist id="herstellerfilter">
                    <?php foreach($hersteller as $value): ?> 
                        <option value="<?php echo $value['herstellername']; ?>"></option>
                    <?php endforeach; ?>
                    	 
	                </datalist>
	                <datalist id="fahrzeug">
	                    <?php foreach($fahrzeug as $value): ?> 
	                        <!--<option><?php echo $value['fahrzeugname'] ?></option>-->
	                        <option value="<?php echo $value['fahrzeugname']; ?>"></option>
	                    <?php endforeach; ?>
	                </datalist>
            </div>
            <div class="col-xs-3">
                <a href="<?php echo site_url('fahrzeug/f_list_ida'); ?>">
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
        <div class="row text">
            <div class="col-xs-2">
                <label for="baujahr"><span>Baujahr(z. B. 2016)</span></label>
            </div>
            <div class="col-xs-7">
                <input type="text" class="form-control" id="baujahr" placeholder="year:z. B. 2016" name="baujahr" required>
            </div>
            <div class="col-xs-3">
                
            </div>
        </div>
                    
                
                   
<br />          
        <div class="row text">
            <div class="col-xs-2">
            <label for="klasse_select"><span>klasse&nbsp;&nbsp;</span></label>
            </div>
            <div class="col-xs-7">
            <select class="form-control" id="klasse_select" name="fzk_id">
                <?php foreach($klasse as $value): ?>
                    
                    <option value="<?php echo $value['fzk_id'] ?>">   
                        <span><?php echo $value["klasse"] ?></span>
                    </option>
                    
                <?php endforeach; ?>
            </select>
            
            </div>
            <div class="col-xs-3">
                <a href="<?php echo site_url('klasse/index'); ?>">
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
<div class="row text">
    <div class="col-xs-2">
        <label for="fzh"><span>Hersteller</span></label>
    </div>
    <div class="col-xs-7">
        <select class="form-control" id="fzh" name="fzh_id">
            <?php foreach($hersteller as $value): ?>
                <option value="<?php echo $value['fzh_id'] ?>">
                    <span><?php echo $value['herstellername'] ?></span>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-xs-3">
        <a href="<?php echo site_url('hersteller/index'); ?>">
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
<br />
<hr />
<div class="markt row">
            <div class="col-xs-2">
                <label><span>Markt</span></label>
            </div>
            <div class="col-xs-7">
                <div class="marktselect">
                    <select class="form-control" id="HerstellerLand">
                        <?php foreach($mland as $value): ?>
                            <option value="<?php echo $value['markt_id']; ?>"><?php echo $value['marktname']; ?></option>}
                        <?php endforeach; ?>
                        <option value="0" class="nullmarkt">null</option>}
                    </select>
                    <br> <br>
                </div>
                

            </div>
            <div class="col-xs-3">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                <button type="button" class="btn btn-default m_add">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
                
                <a href="<?php echo site_url('markt/index'); ?>">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    </button>
                </a>
            </div>
        </div>  
        <div class="row quelle markt_quelle">

		</div> 



<hr />

<!--//bilder 上传按钮开始-->
        <!--<div class="row text">
            <div class="col-xs-2">
            	<label for="fzh"><span>Bilder auf dem local</span></label>
                <span></span>
            </div>
            <div class="col-xs-7">
                <input type="file" name="thumb_bilder" size="20"/>
                <input type="hidden" name="alt_bilder" value='null'/>
            </div>
            
            <div class="col-xs-3">
            
            </div>
 
        </div>-->
<br/>
<div class="row text">
    <div class="col-xs-2">
    	<label for="fzh_auf_server"><span>Bilder auf dem Server</span></label>
        <span></span>
    </div>
    <div class="col-xs-7">
        <a href="<?php echo site_url('bilder/bilderauswahlen?u='.$url); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                auf dem Server auswählen
            </button>
             
        </a>
    <?php if($bilder_status==1):?>
        <span class="session_hidden"><?php echo $_SESSION['bilder']; ?></span>
        <img src="<?php echo '/quellen/Bilder/'.$_SESSION['bilder']; ?>" alt="" style="height: 50px;" class="session_hidden"/>
        <input type="hidden" name="bilder" class="session_hidden" value="<?php echo $_SESSION['bilder'] ; ?>"/>
    <?php else: ?>
    	<input type="hidden" name="bilder" value="null"/>
    	
    <?php endif; ?>
    	
    	<!--<button type="button" class="btn btn-default" onclick="bilder_del(this)">
    		<span class="glyphicon glyphicon-remove"></span>
             	Keine Bilder
        </button>-->

    </div>
    
    <div class="col-xs-3">
	    
		<button type="button" class="btn btn-default" onclick="bilder_del(this)">
    		<span class="glyphicon glyphicon-remove"></span>	
       	</button>
    	
    </div>
<script type="text/javascript">
	function bilder_del(obj) {
		var value = $("input[name='bilder']").val();
		$("img[class='session_hidden']").remove();
		$("span[class='session_hidden']").remove();
		$("input[name='bilder']").val('null');
//		alert(value);
	}
</script>



</div>
<hr>         
	
<div class="markt row">
            <div class="col-xs-2">
                <h4>Quelle</h4><br />
            </div>
            <div class="col-xs-7">
                
                

            </div>
            <div class="col-xs-3">
                   
                
            </div>
        </div>  
        
         
<script type="text/javascript">
	function del(obj,s) {
	if(s==markt) {
//		markt--;
	} else if(s==quelle){
//		count--;
	} else{
//		fasCou--;
	}
	$(obj).parents('.out').remove();
}

var count = 0;
var markt = 0;	
$(function() {
	

    $(".m_add").click(function(){
    markt++;
        var inner = $(this).parents('.markt').children(".col-xs-7");
        var value = inner.find("select option:selected");
        var index = value.val();
//         alert(index);
        $.ajax({
        	url:"<?php echo site_url('markt/markt_add'); ?>",
        	type:"POST",
        	data:{index:index},
        	dataType:'json',
        	success:function(data) {
//      		alert("1111");
        		var str = "<div class='out'><div class='col-xs-2'><input type='hidden' name='markt_id[]' value='"+index+"'>markt["+markt+"]</div><div class='col-xs-7'>"+data.marktname+"</div><div class='col-xs-3'><a href='javascript:' onclick='del(this,markt)'><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></a></div></div>";
//      		alert(str);
        		$(".markt_quelle").append(str);
        	},
        });
    });
    });

</script>

     
      
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
<br />
<script>


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


<hr>    


        <div class="row quelle fas">
            <div class="col-xs-2">
                <label><span>FAS</span></label>
            </div>

            <div class="col-xs-7">
                <div class="fasselect">
                    <select class="form-control" id="fas">
                        <?php foreach($fas as $value): ?>
                            <option value="<?php echo $value['fas_id']; ?>"><?php echo $value['fasbezeichnung']; ?></option>}
                        <?php endforeach; ?>
                        <option value="0" class="nullfas">null</option>}
                    </select>
                    <br> <br>
                </div>
                

            </div>
            <div class="col-xs-3">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                <button type="button" class="btn btn-default fas_add">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
                
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
<div class="row quelle fas_quelle">

</div>

<script>
var fasCou = 0;
    $(function() {
        $(".fas_add").click(function(){
            fasCou++;
//          alert(fasCou);
	        var inner = $(this).parents('.quelle').children(".col-xs-7");
	        var value = inner.find("select option:selected");
	        var index = value.val();
//	         alert(index);
	        $.ajax({
	        	url:"<?php echo site_url('fas/fas_add'); ?>",
	        	type:"POST",
	        	data:{index:index},
	        	dataType:'json',
	        	success:function(data) {
//	        		alert(data.fasbezeichnung);
	        		var str = "<div class='out'><div class='col-xs-2'><input type='hidden' name='fas_id[]' value='"+index+"'>fas["+fasCou+"]</div><div class='col-xs-7'>"+data.fasbezeichnung+"</div><div class='col-xs-3'><a href='javascript:' onclick='del(this,fas)'><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></a></div></div>";
//alert(str);
	        		$(".fas_quelle").append(str);
	        	},
	        });
        });

        
    });
</script> 

<hr>        
             
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
</div>
    
    

</body>
</html>