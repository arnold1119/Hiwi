<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
   

    <title>Fahrzeug</title>
<?php $this->load->view("header"); ?>


<form class="filter form-inline" method="post" action="<?php echo site_url('fas/filter') ?>">
    <div class="form-group">
	   
	    <input type="text" class="form-control" placeholder="Bezeichnung" name="fasbezeichnung" list="fas">
				
  	</div>
  	<div class="form-group">
	
	    <input type="text" class="form-control" placeholder="Type" name="typ" list="fastypefilter">
  	</div>
  	<div class="form-group">
	    
	    <input type="text" class="form-control"  placeholder="Hersteller Name" name="hersteller" list="fasherstellerfilter">
           
  	</div>
	  	<button type="submit" class="btn btn-default filter_button" style="font-weight: 600;">Filter >></button>
	  	
</form>
<datalist id="fas">
            <?php foreach($fas as $value): ?>
                <option value="<?php echo $value['fasbezeichnung']; ?>"></option>
            <?php endforeach; ?>
        </datalist>
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
<div id="search"><h1>FAS</h1><br />
	<?php foreach($fas_result as $key => $value): ?>

		<div class="listcard"><a href="<?php echo site_url('fas/fasinfo/'.$value['fas_id']); ?>" class='t'>
			
            <?php echo $value['fasbezeichnung'];?></a></br>
                                            
        </div>
	<?php endforeach;?>
</div>

</body>
</html>