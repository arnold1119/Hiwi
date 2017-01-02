<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <style>
    	p.text-left font{color:rgb(160, 0, 0);}
    	.quelle_color{color: rgb(0, 0, 255);}
    </style>
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


<div id="search">
<h4>
    Sensor
    <a class="btn btn-default"  href='<?php echo site_url('sensor/edit/'.$sensor[0]['s_id']); ?>'>Edit</a>
</h4>

<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Sensorname:</font><?php echo $sensor[0]["sensorname"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">SensorType:</font><?php echo $sensor[0]["sensortyp"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">HerstellerLand:</font><?php echo $sensor[0]["land"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Herstellername:</font><?php echo $sensor[0]["sensorhersteller"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Sensor Position:</font><?php echo $sensor[0]["position"]; ?></p>
<h4>
    Merkmal   
</h4>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Sensor Merkmal Type:</font><?php echo $merkmals[0]["merkmalstyp"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">MIn:</font><?php echo $merkmals[0]["von"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Max:</font><?php echo $merkmals[0]["bis"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Sensor Merkmal Einheit:</font><?php echo $merkmals[0]["einheit"]; ?></p>
<!--<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Herstellername:</font><?php echo $sensor[0]["herstellername"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Herstellername:</font><?php echo $sensor[0]["herstellername"]; ?></p>-->

<!--<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Baujahr:</font><?php echo $fahrzeug[0]["baujahr"]; ?></p>-->
<h4>
   Quelle   
</h4>
<?php foreach($quelle as $key=>$value): ?>
    <p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">link[<?php echo $key+1 ?>]:</font><a href='http://<?php echo $result[0]["link"]; ?>' target='_blank'><?php echo $value["link"]; ?></a> </p>
    <p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">quellenname[<?php echo $key+1 ?>]:</font><?php echo $value["quellenname"]; ?> <time datetime='<?php echo $result[0]["quellenname"]; ?>'>[ <?php echo $value["datum"]; ?> ]</time></p>
    <!--<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">bild[<?php echo $key+1 ?>]:</font><a href='http://<?php echo $result[0]["link"]; ?>' target='_blank'><?php echo $value["link"]; ?></a> </p>
    <p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">link[<?php echo $key+1 ?>]:</font><a href='http://<?php echo $result[0]["link"]; ?>' target='_blank'><?php echo $value["link"]; ?></a> </p>
    <p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">link[<?php echo $key+1 ?>]:</font><a href='http://<?php echo $result[0]["link"]; ?>' target='_blank'><?php echo $value["link"]; ?></a> </p>
    <p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">link[<?php echo $key+1 ?>]:</font><a href='http://<?php echo $result[0]["link"]; ?>' target='_blank'><?php echo $value["link"]; ?></a> </p>-->
<?php endforeach; ?>
<h4>
    Bilder   
</h4>
<?php foreach($bild as $key=>$value): ?>
    <p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">bild[<?php echo $key+1 ?>]:</font><?php echo $value["bild"]; ?></p>
    <p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">pfad[<?php echo $key+1 ?>]:</font><?php echo $value["pfad"]; ?> </p>
    <!--<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">bild[<?php echo $key+1 ?>]:</font><a href='http://<?php echo $result[0]["link"]; ?>' target='_blank'><?php echo $value["link"]; ?></a> </p>
    <p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">link[<?php echo $key+1 ?>]:</font><a href='http://<?php echo $result[0]["link"]; ?>' target='_blank'><?php echo $value["link"]; ?></a> </p>
    <p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">link[<?php echo $key+1 ?>]:</font><a href='http://<?php echo $result[0]["link"]; ?>' target='_blank'><?php echo $value["link"]; ?></a> </p>
    <p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">link[<?php echo $key+1 ?>]:</font><a href='http://<?php echo $result[0]["link"]; ?>' target='_blank'><?php echo $value["link"]; ?></a> </p>-->
<?php endforeach; ?>


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<h4>Sensor FAS [<?php echo count($fas); ?>]</h4>
<?php foreach($fas as $key => $value): ?>
	<?php if($key%2==1):?>
	<div class="listcard1">
	<?php else: ?>
		<div class="listcard2">
	<?php endif; ?>
		<a href="<?php echo site_url('fas/fasinfo/'.$value['fas_id']); ?>" class='t'>
			
            <?php echo $value['fasbezeichnung'];?> </a></br>
                                            
        </div>
	<?php endforeach;?>


	</div> 
</div>
</body>
</html>