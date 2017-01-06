<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<style type="text/css" media="screen">
    /*select{width:500px;}*/
</style>
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
<?php foreach($herstellerfilter as $value): ?> 
    <option value="<?php echo $value['herstellername']; ?>"></option>
<?php endforeach; ?>
	 
</datalist>
<datalist id="fahrzeug">
    <?php foreach($fahrzeugfilter as $value): ?> 
        <!--<option><?php echo $value['fahrzeugname'] ?></option>-->
        <option value="<?php echo $value['fahrzeugname']; ?>"></option>
    <?php endforeach; ?>
</datalist>
<div id="search"  class="w80">
	<h4>Add neue Hersteller</h4>
<br>
<form action="<?php echo site_url('hersteller/insert/'); ?>" method="post">
<table class="table table-striped">
    <tr class="active">
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle Hersteller </h5></td>
    <td>
        <a href="<?php echo site_url('hersteller/index'); ?>">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        
                    </button>
                </a>
    </td>
    </tr>

  
    <tr class=""row text"">
        <td class="col-xs-3"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
        <td class="col-xs-7">HerstellerLand List</td>
        <td class="col-xs-1">
            <a href="<?php echo site_url('Land/index'); ?>">
                <!-- <button type="btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button> -->
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-list" aria-hidden="true" style=""></span>
                </button>
            </a>
        </td>
    </tr>
</table>


<hr>

<div class="row text">
    <div class="col-xs-3">
        <label for="fahrzeugname"><span>fahrzueghersteller_gruppe</span></label>
    </div>
    <div class="col-xs-7">
        <select class="form-control" id="exampleInputEmail2" name="fzhg_id">
            <?php foreach($gruppename as $value): ?>
                <option value="<?php echo $value['fzhg_id'] ?>">
                    <span><?php echo $value['gruppenname'] ?></span>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-xs-1">
    
    </div>
</div>
<br>


<div class="row text">
    <div class="col-xs-3">
        <label for="fahrzeugname"><span>land</span></label>
    </div>
    <div class="col-xs-7">
        <select class="form-control" id="exampleInputEmail2" name="land_id">
            <?php foreach($land as $value): ?>
                <option value="<?php echo $value['land_id'] ?>">
                    <span><?php echo $value['land'] ?></span>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-xs-2">
    
    </div>
</div>
<br>
<div class="row text">
    <div class="col-xs-3">
        <label for="fahrzeugname"><span>herstellername</span></label>
    </div>
    <div class="col-xs-7">
        <input type="text" class="form-control" placeholder="herstellername" name="herstellername" required>
        <!-- <select class="form-control" >
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select> -->
    </div>
    <div class="col-xs-1">
        <input type="submit" value="add" name="add"  style="width: 70px;"/>
    </div>
</div>



    </table>
</form>
</div>
<script src="<?php echo base_url('style/js/klasse_ajax.js') ?>" type="text/javascript" ></script>
    
</body>
</html>