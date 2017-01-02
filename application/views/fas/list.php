<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
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
            <?php foreach($fass as $value): ?>
                <option value="<?php echo $value['fasbezeichnung']; ?>"></option>
            <?php endforeach; ?>
        </datalist>
        
        
<!--<div id="search" class="w900">-->
	<div id="search">
		<br>
<?php echo $links; ?>

<table class="table table-striped">
<tr class="active">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new Fas </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
        <a href="<?php echo site_url('fas'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:white"></span>
            </button>
        </a>
    </td>
</tr>
<tr class="title_line">
    <td>FAS_id
    	<a href="<?php echo site_url('fas/f_list/0/1'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fas/f_list/0/2'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Herstellername
    	<a href="<?php echo site_url('fas/f_list/0/3'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fas/f_list/0/4'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Type
    	<a href="<?php echo site_url('fas/f_list/0/5'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    	</a>
    	<a href="<?php echo site_url('fas/f_list/0/6'); ?>">	
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Entwicklung
    	<a href="<?php echo site_url('fas/f_list/0/7'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fas/f_list/0/8'); ?>">
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Aenderung
    	<a href="<?php echo site_url('fas/f_list/0/9'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fas/f_list/0/10'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Eingabe
    	<a href="<?php echo site_url('fas/f_list/0/11'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fas/f_list/0/12'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>FASName
    	<a href="<?php echo site_url('fas/f_list/0/13'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fas/f_list/0/14'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>&nbsp;</td>
</tr>
<?php foreach($fas as $value): ?>
    <tr class="class_out">
        <td><span><?php echo $value['fas_id']; ?></span></td>
        <td><span><?php echo $value['herstellername']; ?></span></td>
        <td><span><?php echo $value['typ']; ?></span></td>
        <td><span><?php echo $value['entwicklung']; ?></span></td>
        <td><span><?php echo $value['aenderung']; ?></span></td>
        <td><span><?php echo $value['eingabe']; ?></span></td>
        <td><span><?php echo $value['fasbezeichnung']; ?></span></td>
        <td>
        	
        	<a href="<?php echo site_url('fas/fasinfo/'.$value['fas_id']); ?>">
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
            </a>
            
            <a href="javascript:" onclick="dele(this)">
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </a>
       
        </td>
    </tr>
<?php endforeach; ?>
</table>
</div>
<script type="text/javascript">
	function dele(obj) {
		$fas_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
		alert($fas_id);
		$.ajax({
        	url:"<?php echo site_url('fas/delete_fas_id'); ?>",
        	type:"POST",
        	data:{fas_id:$fas_id},
        	dataType:'json',
        	success:function(data) {
        		alert("Delete "+data.message);
        		$(obj).parents('.class_out').remove();
	        },
	    });
		
	}
</script>
<?php echo $links; ?>
</body>
</html>