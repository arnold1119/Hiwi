<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<?php $this->load->view("header"); ?>
<div id="search" class="w900">
<br>
<table class="table table-striped">
<tr class="active">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new Sensor Type </td>
    <td>
        <a href="<?php echo site_url('sensor/typeinsert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </a>
    </td>
</tr>

<?php foreach($sensortype as $value): ?>
    <?php if($value['st_id'] == $st_index): ?>
    <tr class="success"> 
        <td>
            <span><?php echo $value['st_id']; ?></span>
            <span class="glyphicon glyphicon-saved" aria-hidden="true" style="color:green">
            	
			</span>
        </td>
<?php else: ?>
    <tr class="class_out">
        <td><span><?php echo $value['st_id']; ?></span></td>
<?php endif; ?>
        <td><span><?php echo $value['sensortyp']; ?></span></td>
        <td>
<?php if($value['st_id'] != 0): ?>
            <a href="<?php echo site_url('sensor/typeedit/'.$value['st_id']) ?>">
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
		$st_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
//		alert($st_id);
		$.ajax({
        	url:"<?php echo site_url('sensor/sensor_type_delete'); ?>",
        	type:"POST",
        	data:{st_id:$st_id},
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