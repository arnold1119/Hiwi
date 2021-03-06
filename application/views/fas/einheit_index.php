<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<?php $this->load->view("header"); ?>
<div id="search" class="w900">
	<h4>FAS Betriebsgrenze Einheit</h4>
<br>
<table class="table table-striped">
<tr class="row active">
    <td class="col-xs-3"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td class="col-xs-7">Add new FAS Betriebsgrenze Einheit </td>
    <td class="col-xs-2">
        <a href="<?php echo site_url('fas/einheit_insert'); ?>">
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
    <?php if($value['einheit_id'] == $t_index): ?>
    <tr class="row success"> 
        <td class="col-xs-3">
            <span><?php echo $value['einheit_id']; ?></span>
            <span class="glyphicon glyphicon-saved" aria-hidden="true" style="color:green">
            	
			</span>
        </td>
<?php else: ?>
    <tr class="row class_out">
        <td class="col-xs-3"><span><?php echo $value['einheit_id']; ?></span></td>
<?php endif; ?>

        <td class="col-xs-7"><span><?php echo $value['einheit']; ?></span></td>

            


        <td class="col-xs-2">
<?php if($value['einheit_id'] != 0): ?>
            <a href="<?php echo site_url('fas/einheit_edit/'.$value['einheit_id']) ?>">
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
		$einheit_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
//		alert($einheit_id);
		$.ajax({
        	url:"<?php echo site_url('fas/delete_einheit_id'); ?>",
        	type:"POST",
        	data:{einheit_id:$einheit_id},
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