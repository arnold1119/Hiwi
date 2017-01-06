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

<div id="search"  class="w80">
	<h4>Klasse</h4>
<br>
<table class="table table-striped">
<tr class="active">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new Klasse </td>
    <td>
        <a href="<?php echo site_url('klasse/insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </a>
        
        
    </td> 
</tr>
<tr class="title_line">
	<td>klass_id
		<a href="<?php echo site_url('fahrzeug/f_list_fa'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list_fd'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
	</td>
	<td>Klass Name
		<a href="<?php echo site_url('fahrzeug/f_list_fa'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list_fd'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
	</td>
	<td>&nbsp;</td>
</tr>
<?php foreach($klasse as $value): ?>
    <?php if($value['fzk_id'] == $k_index): ?>
    <tr class="success"> 
        <td>
            <span><?php echo $value['fzk_id']; ?></span>
            <span class="glyphicon glyphicon-saved" aria-hidden="true" style="color:green">
            
        </td>
<?php else: ?>
    <tr class="class_out">
        <td><span><?php echo $value['fzk_id']; ?></span></td>
<?php endif; ?>
        <td><span><?php echo $value['klasse']; ?></span></td>
        <?php if($value['fzk_id']!=0): ?>
        <td>
            <a href="<?php echo site_url('klasse/edit/'.$value['fzk_id']) ?>">
                <!-- <button type="btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button> -->
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
            </a>
            <a href="javascript:" onclick="dele(this)">
                <!-- <button type="btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button> -->
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </a>
        </td> 
        <?php else:?>
        	<td>&nbsp;</td>
        <?php endif; ?>
    </tr>  
<?php endforeach; ?>
</table>

<script type="text/javascript">
	function dele(obj) {
		$fzk_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
//		alert($fzk_id);
		$.ajax({
        	url:"<?php echo site_url('klasse/delete_all'); ?>",
        	type:"POST",
        	data:{fzk_id:$fzk_id},
        	dataType:'json',
        	success:function(data) {
//      		alert(data);
        		alert("Delete "+data.message);
        		$(obj).parents('.class_out').remove();
	        },
	    });
		
	}
</script>


</body>
</html>