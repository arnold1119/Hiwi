<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<?php $this->load->view("header"); ?>
<div id="search"   class="w80">

	
	<h4>Hersteller Land</h4>
<br>
<table class="table table-striped">
<tr  class="row text active">
    <td class="col-xs-3"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td class="col-xs-7">Add new HerstellerLand </td>
    <td class="col-xs-2">
        <a href="<?php echo site_url('land/insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </a>
    </td>
</tr>

<?php foreach($land as $value): ?>
    <?php if($value['land_id'] == $land_index): ?>
    <tr  class="row text uccess"> 
        <td class="col-xs-3">
            <span><?php echo $value['land_id']; ?></span>
            <span class="glyphicon glyphicon-saved" aria-hidden="true" style="color:green">
            
        </td>
<?php elseif($value['land'] =="null"): ?>

    <tr  class="row text danger"> 
        <td class="col-xs-3"><span><?php echo $value['land_id']; ?></span></td>
<?php else: ?>
    <tr  class="row text class_out"> 
        <td class="col-xs-3"><span><?php echo $value['land_id']; ?></span></td>
<?php endif; ?>
        <td class="col-xs-7"><span><?php echo $value['land']; ?></span></td>
        <td class="col-xs-2">
<?php if($value['land_id'] != 0): ?>
            <a href="<?php echo site_url('land/edit/'.$value['land_id']) ?>">
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

<?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>
</table>
<script type="text/javascript">
	function dele(obj) {
		$land_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
		alert($land_id);
		$.ajax({
        	url:"<?php echo site_url('land/delete_land_id'); ?>",
        	type:"POST",
        	data:{land_id:$land_id},
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