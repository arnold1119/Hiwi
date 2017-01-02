<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<?php $this->load->view("header"); ?>
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
<table class="table table-striped">
<tr class="info">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new FAS_Type </td>
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

<?php foreach($fastype as $value): ?>
    <?php if($value['fast_id'] == $t_index): ?>
    <tr class="success"> 
        <td>
            <span><?php echo $value['fast_id']; ?></span>
            <span class="glyphicon glyphicon-saved" aria-hidden="true" style="color:green">
            	
			</span>
        </td>
<?php else: ?>
    <tr class="class_out">
        <td><span><?php echo $value['fast_id']; ?></span></td>
<?php endif; ?>
        <td><span><?php echo $value['typ']; ?></span></td>
<?php if($value['fast_id']!=1): ?>
        <td>
            <a href="<?php echo site_url('fas/typeedit/'.$value['fast_id']) ?>">
                <!-- <button type="btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button> -->
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
            </a>
            <a href="javascript:" onclick="dele(this)">
                <!-- <button type="btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button> -->
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </a>
        </td>
<?php endif; ?>
    </tr>
<?php endforeach; ?>
</table>
<script type="text/javascript">
	function dele(obj) {
		$fast_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
		alert($fast_id);
		$.ajax({
        	url:"<?php echo site_url('fas/fas_type_delete'); ?>",
        	type:"POST",
        	data:{fast_id:$fast_id},
        	dataType:'json',
        	success:function(data) {
        		alert("Delete "+data.message);
        		$(obj).parents('.class_out').remove();
	        },
	  });
		
	}
</script>
</body>
</html>