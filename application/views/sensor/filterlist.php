<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
   

    <title>Fahrzeug</title>
<?php $this->load->view("header"); ?>


<form class="filter form-inline" method="post" action="<?php echo site_url('sensor/filter') ?>">
<div class="form-group">
   <input type="text" class="form-control" placeholder="Type" name="sensortyp" list="sensortypefilter">
    
			
</div>
<div class="form-group">

    <input type="text" class="form-control" placeholder="Position" name="position" list="positionfilter">
</div>
<div class="form-group">
    
    <input type="text" class="form-control"  placeholder="Hersteller Name" name="sensorhersteller" list="sensorherstellerfilter">
       
</div>
  	<button type="submit" class="btn btn-default filter_button" style="font-weight: 600;">Filter >></button>
  	
</form>
<datalist id="sensortypefilter">
    <?php foreach($sensortypes as $value): ?> 
        <option value="<?php echo $value['sensortyp']; ?>"></option>
    <?php endforeach; ?>
</datalist>

<datalist id="positionfilter">
    <?php foreach($positions as $value): ?> 
        <option value="<?php echo $value['position']; ?>"></option>
    <?php endforeach; ?>
</datalist>
<datalist id="sensorherstellerfilter">
    <?php foreach($sensorherstellers as $value): ?>
        <option value="<?php echo $value['sensorhersteller']; ?>"></option>
    <?php endforeach; ?>
</datalist>
<div id="search"><h1>Sensor</h1><br />
	<?php foreach($sensor as $key => $value): ?>

		<div class="listcard"><a href="<?php echo site_url('sensor/sensorinfo/'.$value['s_id']); ?>" class='t'>
			
            <?php echo $value['sensorname'];?></a></br>
                                            
        </div>
	<?php endforeach;?>
</div>

</body>
</html>