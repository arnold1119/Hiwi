<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<?php $this->load->view("header"); ?>
<div id="search"  class="w80">
	<h4>Marktland</h4>
	
<br>
<table class="table table-striped">
<tr class="rox text active">
    <td class="col-xs-3"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td class="col-xs-7"> Add new MarktLand </td>
    <td class="col-xs-2"> 
        <a href="<?php echo site_url('markt/insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </a>
    </td>
</tr>

<?php foreach($mland as $value): ?>
    <?php if($value['markt_id'] == $ml_index): ?>
    <tr class="rox text success"> 
        <td class="col-xs-3">
            <span><?php echo $value['markt_id']; ?></span>
            <span class="glyphicon glyphicon-saved" aria-hidden="true" style="color:green">
            
        </td>
<?php else: ?>
    <tr class="rox text class_out">
        <td class="col-xs-3"><span><?php echo $value['markt_id']; ?></span></td>
<?php endif; ?>
        <td class="col-xs-7"><span><?php echo $value['marktname']; ?></span></td>
        <td class="col-xs-2">
        <?php if($value['marktname']!="null"): ?>

            <a href="<?php echo site_url('markt/edit/'.$value['markt_id']) ?>">
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
		$markt_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
//		alert($markt_id);
		$.ajax({
        	url:"<?php echo site_url('markt/delete_marktland_id'); ?>",
        	type:"POST",
        	data:{markt_id:$markt_id},
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