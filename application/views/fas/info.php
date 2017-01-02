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

<div id="search">
<h4>
    FAS
    <a class="btn btn-default"  href='<?php echo site_url('fas/edit/'.$fas[0]['fas_id']); ?>'>Edit</a>
</h4>

<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Fasbezeichnung:</font><?php echo $fas[0]["fasbezeichnung"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Fastype:</font><?php echo $fas[0]["typ"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Herstellername:</font><?php echo $fas[0]["herstellername"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Herstellerland:</font><?php echo $fas[0]["land"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Entwicklung:</font><?php echo $fas[0]["entwicklung"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">serie_seit:</font><?php echo $fas[0]["serie_seit"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">serie_bis:</font><?php echo $fas[0]["serie_bis"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">serie:</font><?php echo $fas[0]["serie"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Betriebsgrenze unter Schranke:</font><?php echo $betriebsgrenze[0]["von"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Betriebsgrenze obere Schranke:</font><?php echo $betriebsgrenze[0]["bis"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Betriebsfrenze Type:</font><?php echo isset($fas[0]["betriebsgrenze"])?$fas[0]["betriebsgrenze"]:"Keine BetriebType in Databank"; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Betriebsgrenze SI Einheit:</font><?php echo $betriebsgrenze[0]["einheit"]; ?></p>
<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">Funktionsbeschreibung:</font><?php echo $fas[0]["funktion"]; ?></p>
<h4>Quelle</h4>
<?php foreach($quelle as $key=>$value): ?>
    <p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">link[<?php echo $key+1 ?>]:</font><a href='http://<?php echo $result[0]["link"]; ?>' target='_blank'><?php echo $value["link"]; ?></a> </p>
    <p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">quellenname:</font><?php echo $value["quellenname"]; ?> <time datetime='<?php echo $result[0]["quellenname"]; ?>'>[ <?php echo $value["datum"]; ?> ]</time></p>
<?php endforeach; ?>
	
<h4>Film</h4>
<?php foreach($film as $key=>$value): ?>
	<p class="text-left" style="text-indent: 15px"><font style="margin-right: 15px;">link[<?php echo $key+1 ?>]:</font><a href='http://<?php echo $result[0]["link"]; ?>' target='_blank'><?php echo $value["link"]; ?></a> </p>

<?php endforeach; ?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<h4>FAS&nbsp;&nbsp; Auto[<?php echo count($auto); ?>]</h4>
<?php foreach($auto as $key => $value): ?>
	<?php if($key%2==1):?>
		<div class="listcard1">
	<?php else: ?>
		<div class="listcard2">
	<?php endif; ?>
		<a href="<?php echo site_url('fahrzeug/fzginfo/'.$value['fz_id']); ?>" class='t'>
			
            <?php echo $value['herstellername'];?> -- (<?php echo $value['fahrzeugname'];?>,<?php echo $value['baujahr'];?>)&nbsp;&nbsp;<font style="color:rgb(160, 0, 0);">[Kosten: <?php echo $value['kosten'];?>]</font></a></br>
                                            
        </div>
	<?php endforeach;?>


  

</div>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<h4>FAS&nbsp;&nbsp; Sensor [<?php echo count($sensor); ?>]</h4>
<?php foreach($sensor as $key => $value): ?>
	<?php if($key%2==1):?>
	<div class="listcard1">
	<?php else: ?>
		<div class="listcard2">
	<?php endif; ?>
		<a href="<?php echo site_url('sensor/sensorinfo/'.$value['s_id']); ?>"  target="_blank" class='t'>
			
            <?php echo $value['sensorname'];?> </a></br>
                                            
        </div>
	<?php endforeach;?>


	</div>
</div>






</body>
</html>