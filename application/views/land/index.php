<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<?php $this->load->view("header"); ?>
<div id="klasse"   class="w80">
<br>
<table class="table table-striped">
<tr class="active">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new HerstellerLand </td>
    <td>
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
    <tr class="success"> 
        <td>
            <span><?php echo $value['land_id']; ?></span>
            <span class="glyphicon glyphicon-saved" aria-hidden="true" style="color:green">
            
        </td>
<?php elseif($value['land'] =="null"): ?>

    <tr class="danger"> 
        <td><span><?php echo $value['land_id']; ?></span></td>
<?php else: ?>
    <tr class="class_out"> 
        <td><span><?php echo $value['land_id']; ?></span></td>
<?php endif; ?>
        <td><span><?php echo $value['land']; ?></span></td>
        <td>
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