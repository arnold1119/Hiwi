<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<?php $this->load->view("header"); ?>
<div id="search" class="w900">
<h4>Sensor Position</h4>
<br>
<table class="table table-striped">
<tr class="active">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new Sensor Position </td>
    <td>
        <a href="<?php echo site_url('sensor/position_insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </a>
    </td>
</tr>

<?php foreach($position as $value): ?>
    <?php if($value['sp_id'] == $t_index): ?>
    <tr class="success"> 
        <td>
            <span><?php echo $value['sp_id']; ?></span>
            <span class="glyphicon glyphicon-saved" aria-hidden="true" style="color:green">
            	
			</span>
        </td>
<?php else: ?>
    <tr class="class_out">
        <td><span><?php echo $value['sp_id']; ?></span></td>
<?php endif; ?>

        <td><span><?php echo $value['position']; ?></span></td>

            


        <td>
<?php if($value['sp_id'] != 30): ?>
            <a href="<?php echo site_url('sensor/position_edit/'.$value['sp_id']) ?>">
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
		$sp_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
//		alert($sh_id);
		$.ajax({
        	url:"<?php echo site_url('sensor/sensor_position_delete'); ?>",
        	type:"POST",
        	data:{sp_id:$sp_id},
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