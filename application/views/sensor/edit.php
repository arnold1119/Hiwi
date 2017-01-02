<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
   

    <title>Sensor Index</title>
<?php $this->load->view("header"); ?>
<div id="search" class="">

    <form class="form-inline" action="<?php echo site_url('sensor/speicher') ?>" method="post" class="">
<br>
<input type="hidden" name="eingabe" value="<?php echo $sensor[0]['eingabe']; ?>"/>
<input type="hidden" name="aenderung" value="<?php echo date('Y-m-d'); ?>"/>
<div class="row quelle">
    <div class="col-xs-2">
        <label for="merkmal"><span>Sensor</span></label>
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
        <a href="<?php echo site_url('sensor/f_list'); ?>">
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
<!-- fas name start -->
<div class="row text">
    <div class="col-xs-2">
        <label for="sensorname"><span class="tt">Sensor Name</span></label>
    </div>
    <div class="col-xs-7">
        <input type="text" class="form-control " placeholder="Sensor Name" list="sensor" name="sensorname" required value="<?php echo $sensor[0]['sensorname'] ?>">
        <datalist id="sensor">
            <?php foreach($sensorlist as $value): ?>
            
                <option value="<?php echo $value['sensorname']; ?>"><?php echo $value['s_id']; ?></option>
            <?php endforeach; ?>
        </datalist>
    </div>
    <div class="col-xs-3">
    	
    </div>
</div>
<br />
<!--<hr>-->
<!-- fas name end -->


<!-- fas Type start -->


<div class="row quelle">
    <div class="col-xs-2">
        <label><span>Sensor Type</span></label>
    </div>
    <div class="col-xs-7">
        <div class="sensortypeselect">
            <select class="form-control" id="sensortype" name="st_id">
                <?php foreach($sensortype as $value): ?>
                <?php if($value['st_id']!=$sensor[0]['st_id']): ?>
                    <option value="<?php echo $value['st_id']; ?>"><?php echo $value['sensortyp']; ?></option >
                <?php else: ?>
                    <option value="<?php echo $value['st_id']; ?>" selected><?php echo $value['sensortyp']; ?></option >
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
      
        <a href="<?php echo site_url('sensor/typeindex'); ?>">
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
        <label><span>Sensor Hersteller</span></label>
    </div>
    <div class="col-xs-7">
        <div class="sensorherstellerselect">
            <select class="form-control" id="sensorhersteller" name="sh_id">
                <?php foreach($sensorhersteller as $value): ?>
                <?php if($value['sh_id']!=$sensor[0]['sh_id']): ?>
                    <option value="<?php echo $value['sh_id']; ?>"><?php echo $value['sensorhersteller']; ?></option >
                <?php else: ?>
                    <option value="<?php echo $value['sh_id']; ?>" selected=""><?php echo $value['sensorhersteller']; ?></option >
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
        
            
        <a href="<?php echo site_url('sensor/sensor_hersteller_index'); ?>">
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
        <label><span>Sensor position</span></label>
    </div>
    <div class="col-xs-7">
        <div class="sensorpositionselect">
            <select class="form-control" id="sensorposition" name="sp_id">
                <?php foreach($position as $value): ?>
                <?php if($value['sp_id']!=$sensor[0]['sp_id']): ?>
                <option value="<?php echo $value['sp_id']; ?>"><?php echo $value['position']; ?></option >
                <?php else: ?>
                <option value="<?php echo $value['sp_id']; ?>" selected><?php echo $value['position']; ?></option >
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
        <a href="<?php echo site_url('sensor/position_index'); ?>">
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






<!-- function beschreibung start -->
<!--<div class="row text">
    <div class="col-xs-2">
        <label for="ub"><span class="tt">min Sensorreichweite</span></label>
    </div>
    <div class="col-xs-7">
        <input type="text" class="form-control " placeholder="Sensorreichweite z.B 34.0" name="von" id="ub" required>
        
    </div>
    <div class="col-xs-3">
    
    </div>
</div>
<hr>-->
	
<!--<div class="row text">
    <div class="col-xs-2">
        <label for="ob"><span class="tt">max Sensorreichweite</span></label>
    </div>
    <div class="col-xs-7">
        <input type="text" class="form-control " placeholder="Sensorreichweite z.B 100.0" name="bis" id="ob" required>
        
    </div>
    <div class="col-xs-3">
    
    </div>
</div>
<hr>-->
	







   




<hr>


	

<div class="row quelle">
    <div class="col-xs-2">
        <label for="merkmal"><span>Merkmal</span></label>
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
        <label for="sensormerkmaltype"><span><p class="text-right">Sensor Merkmal Type</p></span></label>
    </div>
    <div class="col-xs-7">
        <div class="sensormerkmaltypeselect">
            <select class="form-control" id="sensormerkmaltype" name="smt_id">
                <?php foreach($merkmaltype as $value): ?>
                <?php if($value['smt_id']!=$merkmals[0]['smt_id']): ?>
                <option value="<?php echo $value['smt_id']; ?>"><?php echo $value['merkmalstyp']; ?></option >
                <?php else: ?>
                <option value="<?php echo $value['smt_id']; ?>" selected><?php echo $value['merkmalstyp']; ?></option >
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
        <a href="<?php echo site_url('sensor/merkmal_type_index'); ?>">
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
        <label for="ub"><span class="tt"><p class="text-right">Min</p></span></label>
    </div>
    
    <div class="col-xs-4">
        <input type="text" class="form-control " placeholder="z.B 34.0" name="von" id="ub" required value="<?php echo $merkmals[0]['von'];?>">
        
    </div>
    <div class="col-xs-2">
    	
    	<div>
            <select class="form-control" id="einheit1" name="sme_id[]" style="width: 120px;">
                <?php foreach($einheit as $value): ?>
                <?php if($value['sme_id']!=$merkmals[0]['sme_id']): ?>
                <option value="<?php echo $value['sme_id']; ?>"><?php echo $value['einheit']; ?></option >
                <?php else: ?>
                <option value="<?php echo $value['sme_id']; ?>" selected=""><?php echo $value['einheit']; ?></option >
                <?php endif; ?>
                
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
        <a href="<?php echo site_url('sensor/einheit_index'); ?>">
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
        <input type="text" class="form-control " placeholder="z.B 100.0" name="bis" id="ob" required value="<?php echo $merkmals[0]['bis'];?>">
        
    </div>
    <div class="col-xs-2">
    	<div>
            <select class="form-control" id="einheit2" name="sme_id[]" style="width: 120px;">
                <?php foreach($einheit as $value): ?>
                <?php if($value['sme_id']!=$merkmals[0]['sme_id']): ?>
                <option value="<?php echo $value['sme_id']; ?>"><?php echo $value['einheit']; ?></option >
                <?php else: ?>
                <option value="<?php echo $value['sme_id']; ?>" selected=""><?php echo $value['einheit']; ?></option >
                <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <br> <br>
        </div>
    </div>
</div>

<hr>
 <div class="row quelle">
    <div class="col-xs-2">
        <label><span>Quelle</span></label>
    </div>
    <div class="col-xs-7">
    </div>
    <div class="col-xs-3">
          
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
                <?php foreach($quellelist as $value): ?>
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
	<?php foreach($quelle as $key => $value): ?>
	<div class='out'>
		<div class='col-xs-2'>
			<input type='hidden' name='quelle_id[]' value="<?php echo $value['quelle_id']; ?>">quelle[<?php echo $key+1;?>]
		</div>
		<div class='col-xs-7'><?php echo $value['quellenname'] ?></div>
		<div class='col-xs-3'>
			<a href='javascript:' onclick='del(this)'>
				<button type='button' class='btn btn-default'>
					<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
				</button>
			</a>
		</div>
	</div>
	<?php endforeach; ?>
</div>
<br />
<script>
function del(obj,s) {
	if(s==bilder) {
		bilder--;
	} else{
		count--;
	}
	$(obj).parents('.out').remove();
}
var count = <?php echo count($quelle);?>;
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


<div class="row quelle">
    <div class="col-xs-2">
        <label><span>Bilder</span></label>
    </div>
    <div class="col-xs-7">
        <div class="quelleselect">
            <select class="form-control" id="quelle">
                <?php foreach($bilderlist as $value): ?>
                    <option value="<?php echo $value['sb_id']; ?>"><?php echo $value['bild']; ?></option>}
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
        <button type="button" class="btn btn-default qb_add">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        
        <a href="<?php echo site_url('bilder/index'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            </button>
        </a>
    </div>
</div>

<div class="row quelle bilder_quelle">
   <?php foreach($bild as $key => $value): ?>
	<div class='out'>
		<div class='col-xs-2'>
			<input type='hidden' name='bild_id[]' value="<?php echo $value['sb_id']; ?>">bild[<?php echo $key+1;?>]
		</div>
		<div class='col-xs-7'><?php echo $value['bild'] ?></div>
		<div class='col-xs-3'>
			<a href='javascript:' onclick='del(this)'>
				<button type='button' class='btn btn-default'>
					<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
				</button>
			</a>
		</div>
	</div>
	<?php endforeach; ?>
</div>
<script>
var bilder = <?php echo count($bild); ?>;
$(function() {
	
	
    $(".qb_add").click(function(){
    	bilder++;
        var inner = $(this).parents('.quelle').children(".col-xs-7");
        var value = inner.find("select option:selected");
        var index = value.val();
//         alert(index);
        $.ajax({
        	url:"<?php echo site_url('sensor/bilder_add'); ?>",
        	type:"POST",
        	data:{index:index},
        	dataType:'json',
        	success:function(data) {
        		var str = "<div class='out'><div class='col-xs-2'><input type='hidden' name='bild_id[]' value='"+index+"'>bild["+bilder+"]</div><div class='col-xs-7'>"+data.bild+"</div><div class='col-xs-3'><a name='cb[]'  onclick='del(this,bilder)' ><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></a></div></div>";
//      		alert(str);
        		$(".bilder_quelle").append(str);
        	},
        });
    });

    
});


</script>
<hr />


 <div class="quelle row fas">
            <div class="col-xs-2">
                <label><span>Fas</span></label>
            </div>

                
             
            <div class="col-xs-7">
           
                <div class="fasselect">
                    <select class="form-control" id="fas">
                        <?php foreach($faslist as $value): ?>
                            <option value="<?php echo $value['fas_id']; ?>"><?php echo $value['fasbezeichnung']; ?></option>
                            
                            
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
        <div class="row quelle fas_quelle">
			<?php foreach($fas as $key => $value): ?>

			<div class='out'>
				<div class='col-xs-2'>
						<input type='hidden' name='fas_id[]' value="<?php echo $value['fas_id']; ?>">fas[<?php echo $key+1;?>]
				</div>
				<div class='col-xs-7'><?php echo $value['fasbezeichnung'] ?></div>
				<div class='col-xs-3'>
					<a href='javascript:' onclick='del(this,fas)'>
						<button type='button' class='btn btn-default'>
							<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
						</button>
					</a>
				</div>
			</div>

			<?php endforeach; ?>
		</div>
<script>
var fasCou = <?php echo count($fas); ?>;
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

<hr />	
 <div class="row button">
            <div class="col-xs-2"></div>
            
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
