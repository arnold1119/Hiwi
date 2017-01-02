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
<div id="search">

	
	
<!--<div id="klasse" class="w900">-->
<br>
<?php echo $links; ?>


<script>
	function linkTo() {
		alert($("input.seite_num").value());
	}
</script>
<table class="table table-striped">
<tr class="active">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new Fahrzeug </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
    <td>
        <a href="<?php echo site_url('fahrzeug'); ?>">
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
    <td>Fz_id
    	
    	<a href="<?php echo site_url('fahrzeug/f_list_ida'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list_idd'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    
    </td>
    <td>Herstellername
    	<a href="<?php echo site_url('fahrzeug/f_list_ha'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list_hd'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Fahrzeug Klasse
    	<a href="<?php echo site_url('fahrzeug/f_list_ka'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list_kd'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Baujahr
    	<a href="<?php echo site_url('fahrzeug/f_list_ba'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list_bd'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Aenderung
    	<a href="<?php echo site_url('fahrzeug/f_list_aa'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list_ad'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Eingabe
    	<a href="<?php echo site_url('fahrzeug/f_list_ea'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list_ed'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Fahrzeugname
    	<a href="<?php echo site_url('fahrzeug/f_list_fa'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list_fd'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
  
    <td>&nbsp;</td>
</tr>
<?php foreach($fahrzeugs as $value): ?>
    
    <tr class="class_out">
        <td class="class_in"><span><?php echo $value['fz_id']; ?></span></td>

        <td><span><?php echo $value['herstellername']; ?></span></td>
        <td><span><?php echo $value['klasse']; ?></span></td>
        <td><span><?php echo $value['baujahr']; ?></span></td>
        <td><span><?php echo $value['aenderung']; ?></span></td>
        <td><span><?php echo $value['eingabe']; ?></span></td>
        <td>
        	<span>
        		<?php echo $value['fahrzeugname']; ?>
        		<?php if($value['bilder'] != null && $value['bilder'] != "null"): ?>
        			<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
        		<?php endif; ?>	
        	</span>
        </td>
        
        <td>
            <a href="<?php echo site_url('fahrzeug/fzginfo/'.$value['fz_id']) ?>">
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


<script type="text/javascript">
	function dele(obj) {
		$fz_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
//		alert()
		$.ajax({
        	url:"<?php echo site_url('fahrzeug/delete_all'); ?>",
        	type:"POST",
        	data:{fz_id:$fz_id},
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