<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<?php $this->load->view("header"); ?>
<div id="search" class="w80">
	<h4>Quellen</h4>
<br/>
<table class="table table-striped">
<tr class="active">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new Quelle </td>
    <!--<td>&nbsp;</td>-->
    <td>&nbsp;</td>
    <td style="text-align: right;">
        <a href="<?php echo site_url('quelle/insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </a>
    </td>
</tr>

<tr class="active">
    <td>quelle_id</td>
    <!--<td>link</td>-->
    <td>quellenname</td>
    <td>Datum</td>
    <td>&nbsp;</td>
</tr>
<?php foreach($quelle as $value): ?>
    <?php if($value['quelle_id'] == $quelle_index): ?>
    <tr class="success class_out"> 
        <td>
            <span><?php echo $value['quelle_id']; ?></span>
            <span class="glyphicon glyphicon-saved" aria-hidden="true" style="color:green">
            
        </td>
<?php else: ?>
     <tr class="class_out">
        <td><span><?php echo $value['quelle_id']; ?></span></td>
<?php endif; ?>
        <!--<td class="col-xs-2"><?php echo $value['link']; ?></td>-->
       
        <td class="col-xs-6"><?php echo $value['quellenname']; ?></td>
        <td class="col-xs-2"><span><?php echo $value['datum']; ?></span></td>
        <td style="text-align: right;">
            <a href="<?php echo site_url('quelle/edit/'.$value['quelle_id']) ?>">
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
		$quelle_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
//		alert($quelle_id);
		$.ajax({
        	url:"<?php echo site_url('quelle/delete_quelle_id'); ?>",
        	type:"POST",
        	data:{quelle_id:$quelle_id},
        	dataType:'json',
        	success:function(data) {
//      		alert(data);
        		alert("Delete "+data.message);
        		$(obj).parents('.class_out').remove();
	        },
	    });
		
	}
</script>
</div>
</body>
</html>