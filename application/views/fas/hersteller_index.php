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
    <td>Add new FAS_Hersteller </td>
    <td>&nbsp;</td>
    
    <td>
        <a href="<?php echo site_url('fas/fas_hersteller_insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:white"></span>
            </button>
        </a>
    </td>
</tr>
<tr class="active">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>HerstellerLand Edit</td>
    <td>&nbsp;</td>
    <td>
        <a href="<?php echo site_url('land/insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:white"></span>
            </button>
        </a>

        <a href="<?php echo site_url('land/index'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn">
                <span class="glyphicon glyphicon-list" aria-hidden="true" style="color:white"></span>
            </button>
        </a>
    </td>
</tr>
<tr class="active">
    <td>fash_id</span></td>
    <td>land</td>
    <td>herstellername</td>
    <td>&nbsp;</td>
</tr>
<?php foreach($hersteller as $value): ?>
    <?php if($value['fash_id'] == $hst_index): ?>
    <tr class="success"> 
        <td>
            <span><?php echo $value['fash_id']; ?></span>
            <span class="glyphicon glyphicon-saved" aria-hidden="true" style="color:green">
            
        </td>
<?php else: ?>
    <tr class="class_out">
        <td><span><?php echo $value['fash_id']; ?></span></td>
<?php endif; ?>
        <td><span><?php echo $value['land']; ?></span></td>
        <td><span><?php echo $value['herstellername']; ?></span></td>
        
        <td>
<?php if($value['fash_id']!=-1): ?>
            <a href="<?php echo site_url('fas/fas_hersteller_edit/'.$value['fash_id']) ?>">
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
		$fash_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
//		alert($fzh_id);
		$.ajax({
        	url:"<?php echo site_url('hersteller/delete_fash_id'); ?>",
        	type:"POST",
        	data:{fash_id:$fash_id},
        	dataType:'json',
        	success:function(data) {
//      		alert(data);
        		alert("Delete "+data.message);
        		$(obj).parents('.class_out').remove();
	        },
	    });
//		
	}
</script>
</body>
</html>