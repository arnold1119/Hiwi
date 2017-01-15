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
<div id="search">

<h4 class="relativ">
    Fahrzeug
    <a class="btn btn-default"  href='<?php echo site_url('fahrzeug/edit/'.$fahrzeug[0]['fz_id']); ?>'>Edit</a>
    <?php if($fahrzeug[0]['bilder']!="null" && $fahrzeug[0]['bilder']!=null): ?>
    	<!--<?php echo $fahrzeug[0]['bilder']; ?>-->
    	<img src="<?php echo base_url('/quellen/Bilder/'.$fahrzeug[0]['bilder']) ?>" alt="" style='height: 250px;right:15%' class='absolute'/>
    
    	
    <?php endif; ?>
</h4>


<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Fahrzeugname:</font><?php echo $fahrzeug[0]["fahrzeugname"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Klasse:</font><?php echo $fahrzeug[0]["klasse"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Land:</font><?php echo $fahrzeug[0]["land"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Herstellername:</font><?php echo $fahrzeug[0]["herstellername"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Fahrzeug HerstellerLand Gruppe:</font><?php echo $fahrzeug[0]["gruppenname"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Baujahr:</font><?php echo $fahrzeug[0]["baujahr"]; ?></p>

<?php foreach($markt as $key=>$value): ?>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Marktland[<?php echo $key+1; ?>]:</font>

    <?php echo $value["marktname"]; ?>
</p>
<?php endforeach; ?>
<?php foreach($quelle as $key=>$value): ?>
	<!--<?php p($value['link']); ?>-->
    <p class="text-left" style="text-indent: 15px">
    	<font style="margin-right: 15px;">link[<?php echo $key+1 ?>]:</font>
    	<a href='http://<?php echo $value['link']; ?>' target='_blank' class="quelle_color"><?php echo $value["link"]; ?></a> </p>
    <p class="text-left quelle_color" style="text-indent: 15px"><font style="margin-right: 15px;">quellenname:</font><?php echo $value["quellenname"]; ?> <time datetime='<?php echo $result[0]["quellenname"]; ?>'>[ <?php echo $value["datum"]; ?> ]</time></p>
<?php endforeach; ?>


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<h4>Auto&nbsp;&nbsp; FAS [<?php echo count($fas); ?>]</h4>
<?php foreach($fas as $key => $value): ?>
	<?php if($key%2==1):?>
		<div class="listcard1">
	<?php else: ?>
		<div class="listcard2">
	<?php endif; ?>
		<a href="<?php echo site_url('fas/fasinfo/'.$value['fas_id']); ?>" class='t'>
			
            <?php echo $value['fasbezeichnung'];?> -- (<?php echo $value['fahrzeugname'];?>,<?php echo $value['serie_seit'];?>)&nbsp;&nbsp;<font style="color:rgb(160, 0, 0);">[Kosten: <?php echo $value['kosten'];?>]</font></a></br>
                                            
        </div>
	<?php endforeach;?>


  
</div>
</div>

</body>
</html>