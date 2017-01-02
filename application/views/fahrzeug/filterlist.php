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
<datalist id="herstellerfilter">
                    <?php foreach($herstellers as $value): ?> 
                        <option value="<?php echo $value['herstellername']; ?>"></option>
                    <?php endforeach; ?>
                    	 
	                </datalist>
	                <datalist id="fahrzeug">
	                    <?php foreach($fahrzeugs as $value): ?> 
	                        <!--<option><?php echo $value['fahrzeugname'] ?></option>-->
	                        <option value="<?php echo $value['fahrzeugname']; ?>"></option>
	                    <?php endforeach; ?>
	                </datalist>
<div id="search"><h1>Auto</h1><br />
	<?php foreach($fahrzeug as $key => $value): ?>

		<div class="listcard"><a href="<?php echo site_url('fahrzeug/fzginfo/'.$value['fz_id']); ?>" class='t'>
			
            <?php echo $value['herstellername'];?> -- <?php echo $value['fahrzeugname'];?> (<?php echo $value['baujahr'];?>)</a></br>
                                            
        </div>
	<?php endforeach;?>
</div>

</body>
</html>