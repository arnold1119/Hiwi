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
<form action="<?php site_url('fas/typeinsert') ?>" method="post">
    <table class="table table-striped">
<tr>
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle FAS_Type </h5></td>
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
        <tr class="danger">
            <td>    
                <span><h4>Add neu FAS_Type Name</h4></span>
            </td>
            <td>
                <input type="text" name="typ" placeholder="neue FAS_Type Name" autofocus required/>
            </td>
            <td>
                <input type="submit" value="add" class="btn btn-danger"  style="width: 80px;"
                name="add"/>
            </td>
        </tr>

<?php foreach($fastype as $value): ?>
    <?php if($count == $value['fast_id']): ?>
        <tr class="success">
    <?php else: ?>
        <tr>
    <?php endif; ?>
    
        <td><span><?php echo $value['fast_id']; ?></span></td>
        <td><span><?php echo $value['typ']; ?></span></td>
        <td>
            <a href="<?php echo site_url('fas/typeedit/'.$value['fast_id']); ?>">
                <!-- <button type="btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button> -->
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
    </table>
</form>
</div>
<script src="<?php echo base_url('style/js/klasse_ajax.js') ?>" type="text/javascript" ></script>
    
</body>
</html>