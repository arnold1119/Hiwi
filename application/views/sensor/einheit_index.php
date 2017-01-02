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
    <td>Add new Sensor Einheit </td>
    <td>
        <a href="<?php echo site_url('sensor/einheit_insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </a>
    </td>
</tr>

<?php foreach($einheit as $value): ?>
   
  
    <tr class="class_out">
        <td><span><?php echo $value['sme_id']; ?></span></td>


        <td><span><?php echo $value['einheit']; ?></span></td>

            


        <td>
<?php if($value['sme_id'] != 0): ?>
            <a href="<?php echo site_url('sensor/einheit_edit/'.$value['sme_id']) ?>">
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
		$sme_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
//		alert($sme_id);
		$.ajax({
        	url:"<?php echo site_url('sensor/sensor_merkmal_einheit_delete'); ?>",
        	type:"POST",
        	data:{sme_id:$sme_id},
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