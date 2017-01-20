<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
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
<datalist id="herstellerfilter">
<?php foreach($herstellerfilter as $value): ?> 
    <option value="<?php echo $value['herstellername']; ?>"></option>
<?php endforeach; ?>
	 
</datalist>
<datalist id="fahrzeug">
    <?php foreach($fahrzeugfilter as $value): ?> 
        <!--<option><?php echo $value['fahrzeugname'] ?></option>-->
        <option value="<?php echo $value['fahrzeugname']; ?>"></option>
    <?php endforeach; ?>
</datalist>

<div id="search"  class="w80">
	<h4>Hersteller</h4>
<br>
	
<?php echo $links; ?>
<table class="table table-striped">
<tr class="active">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new Hersteller </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
        <a href="<?php echo site_url('hersteller/insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            
            <button type="button" class="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:white"></span>
            </button>
        </a>
    </td>
</tr>
<tr class="active">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>HerstellerLand Edit</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
        <a href="<?php echo site_url('land/insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:white"></span>
            </button>
        </a>

        <a href="<?php echo site_url('land/index'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn">
                <span class="glyphicon glyphicon-list" aria-hidden="true" style="color:white"></span>
            </button>
        </a>
    </td>
</tr>
<tr class="active">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Fahrzeughersteller_Gruppe</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
        <a href="<?php echo site_url('hersteller/gruppe_insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:white"></span>
            </button>
        </a>

        <a href="<?php echo site_url('hersteller/gruppe_index'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn">
                <span class="glyphicon glyphicon-list" aria-hidden="true" style="color:white"></span>
            </button>
        </a>
    </td>
</tr>
<tr class="active">
    <td> fzh_id
    	<a href="<?php echo site_url('hersteller/h_list_fzha'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('hersteller/h_list_fzhd'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    
    </td>
    <td>fahrzueghersteller_gruppe
    	<a href="<?php echo site_url('hersteller/h_list_gruppea'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('hersteller/h_list_grupped'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    
    <td>land
    	<a href="<?php echo site_url('hersteller/f_list_land_a'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('hersteller/f_list_land_d'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>herstellername
    	
    	
    	<a href="<?php echo site_url('hersteller/h_list_ida'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('hersteller/h_list_idd'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>&nbsp;</td>
</tr>
<?php foreach($hersteller as $value): ?>
    
    <tr class="class_out">
        <td><span><?php echo $value['fzh_id']; ?></span></td>
        <td><span><?php echo $value['gruppenname']; ?></span></td>
        <td><span><?php echo $value['land']; ?></span></td>
        <td><span><?php echo $value['herstellername']; ?></span></td>
        
        <td>
            <a href="<?php echo site_url('hersteller/edit/'.$value['fzh_id']) ?>">
                <!-- <button type="btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button> -->
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
            </a>
<?php if($value['fzh_id']!=0): ?>
            <a href="javascript:" onclick="dele(this)">
                <!-- <button type="btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button> -->
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </a>
<?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>
</table>
<script type="text/javascript">
	function dele(obj) {
		$fzh_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
//		alert($fzh_id);
		$.ajax({
        	url:"<?php echo site_url('hersteller/delete_fzh_id'); ?>",
        	type:"POST",
        	data:{fzh_id:$fzh_id},
        	dataType:'json',
        	success:function(data) {
//      		alert(data);
        		alert("Delete "+data.message);
        		$(obj).parents('.class_out').remove();
	        },
	    });
		
	}
</script>
<?php echo $links; ?>
</body>
</html>