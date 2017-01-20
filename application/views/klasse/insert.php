<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
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
	<h4>Neue Fahrzeugklasse hinzufügen</h4>
<br>
<form action="<?php site_url('klasse/insert') ?>" method="post">
    <table class="table table-striped">
<tr>
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle Fahrzeugklasse </h5></td>
    <td>
        <a href="<?php echo site_url('klasse/index'); ?>">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        
                    </button>
                </a>
    </td>
</tr>
        <tr class="">
            <td>    
                <span><h4>Neue Fahrzeugklasse Name</h4></span>
            </td>
            <td>
                <input type="text" name="klasse" placeholder="Neue Fahrzeugklasse Name" autofocus required/>
            </td>
            <td>
                <input type="submit" value="add" class="btn btn-default"
                name="add"/>
            </td>
        </tr>


    </table>
</form>
</div>
<script src="<?php echo base_url('style/js/klasse_ajax.js') ?>" type="text/javascript" ></script>
    
</body>
</html>