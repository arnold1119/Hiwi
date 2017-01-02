<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
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
<div id="search" class="w900">
<br>
<form action="<?php echo site_url('fas/typeedit/'.$result[0]['fast_id']); ?>" method="post">

    <table class="table table-striped">
<tr>
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle Fastype </h5></td>
    <td>
        <a href="<?php echo site_url('fas/typeindex'); ?>">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        
                    </button>
                </a>
    </td>
</tr>

<tr class="info">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new Fastype </td>
    <td>
        <a href="<?php echo site_url('fas/typeinsert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-info">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:white"></span>
            </button>
        </a>
    </td>
</tr>

        <tr class="danger">
            <td>    
                <span>fast_id&nbsp;&nbsp;<?php echo $result[0]['fast_id']; ?></span>
            </td>
            <td>
                <input type="text" name="typ" autofocus value="<?php echo $result[0]['typ'] ?>" />
            </td>
            <td>
                <input type="submit" value="edit" class="btn btn-danger"  style="width: 80px;"
                name="edit"/>
            </td>
        </tr>

    </table>
</form>
</div>
<script src="<?php echo base_url('style/js/klasse_ajax.js') ?>" type="text/javascript" ></script>
    
</body>
</html>