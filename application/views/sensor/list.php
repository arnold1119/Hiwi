<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<?php $this->load->view("header"); ?><br>
<div id="search" class="w900">
<?php echo $links; ?>
<table class="table table-striped">
<tr class="active">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new Sensor </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
        <a href="<?php echo site_url('sensor'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:white"></span>
            </button>
        </a>
        
    </td>
</tr>
<tr class="title_line">
    <td><span>S_id</span></td>
    <td>Sensorname
    	<a href="<?php echo site_url('sensor/f_list/0/1'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('sensor/f_list/0/2'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Sensorhersteller
    	<a href="<?php echo site_url('sensor/f_list/0/3'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('sensor/f_list/0/4'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Sensortyp
    	<a href="<?php echo site_url('sensor/f_list/0/5'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('sensor/f_list/0/6'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Land
    	<a href="<?php echo site_url('sensor/f_list/0/7'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('sensor/f_list/0/8'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Aenderung
    	<a href="<?php echo site_url('sensor/f_list/0/9'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('sensor/f_list/0/10'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Eingabe
    	<a href="<?php echo site_url('sensor/f_list/0/11'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('sensor/f_list/0/12'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Position
    	<a href="<?php echo site_url('sensor/f_list/0/13'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('sensor/f_list/0/14'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>&nbsp;</td>
</tr>
<?php foreach($sensor as $value): ?>
    <?php if($value['s_id'] == $sensor_index): ?>
    <tr class="success"> 
        <td>
            <span><?php echo $value['s_id']; ?></span>
            <span class="glyphicon glyphicon-saved" aria-hidden="true" style="color:green">
            
        </td>
    <?php else: ?>
    <tr class="class_out">
        <td><span><?php echo $value['s_id']; ?></span></td>
<?php endif; ?>
        <td><span><?php echo $value['sensorname']; ?></span></td>
        <td><span><?php echo $value['sensorhersteller']; ?></span></td>
        <td><span><?php echo $value['sensortyp']; ?></span></td>
        <td><span><?php echo $value['land']; ?></span></td>
        <td><span><?php echo $value['aenderung']; ?></span></td>
        <td><span><?php echo $value['eingabe']; ?></span></td>
        <td><span><?php echo $value['position']; ?></span></td>
        
        <td>
            <a href="<?php echo site_url('sensor/sensorinfo/'.$value['s_id']) ?>">
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
    </tr>
<?php endforeach; ?>
</table>

<script type="text/javascript">
	function dele(obj) {
		$s_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
		alert($s_id);
		$.ajax({
        	url:"<?php echo site_url('sensor/sensor_delete'); ?>",
        	type:"POST",
        	data:{s_id:$s_id},
        	dataType:'json',
        	success:function(data) {
        		alert("Delete "+data.message);
        		$(obj).parents('.class_out').remove();
	        },
	  	});
		
	}
</script>

<?php echo $links; ?>
</div>
</body>
</html>