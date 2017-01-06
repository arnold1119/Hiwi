<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<?php $this->load->view("header"); ?>
<div id="search" class="w900">
	<h4>FAS Waehrung</h4>
<br>
<table class="table table-striped">
<tr class="row active">
    <td class="col-xs-3"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td class="col-xs-7">Add new FAS Waehrung </td>
    <td class="col-xs-2">
        <a href="<?php echo site_url('fas/waehrung_insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </a>
    </td>
</tr>

<?php foreach($faswaehrung as $value): ?>
    <?php if($value['w_id'] == $t_index): ?>
    <tr class="row info"> 
        <td class="col-xs-3">
            <span><?php echo $value['w_id']; ?></span>
            <span class="glyphicon glyphicon-saved" aria-hidden="true" style="color:green">
            	
			</span>
        </td>
<?php else: ?>
    <tr class="row class_out">
        <td class="col-xs-3"><span><?php echo $value['w_id']; ?></span></td>
<?php endif; ?>

        <td class="col-xs-7"><span><?php echo $value['waehrung']; ?></span></td>

            


        <td class="col-xs-2">
<?php if($value['w_id'] != 0): ?>
            <a href="<?php echo site_url('fas/waehrung_edit/'.$value['w_id']) ?>">
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
		$w_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
		alert($w_id);
		$.ajax({
        	url:"<?php echo site_url('fas/delete_w_id'); ?>",
        	type:"POST",
        	data:{w_id:$w_id},
        	dataType:'json',
        	success:function(data) {
//      		alert(data);
        		alert("Delete "+data.message);
        		$(obj).parents('.class_out').remove();
	        },
	    });
		
	}
</script>

</body>
</html>