<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Alle HerstellerLand Gruppe Namen</title>

<?php echo  $this->load->view("header"); ?>
<div id="klasse"   class="w80">
<br>
<form action="<?php site_url('hersteller/gruppe_insert') ?>" method="post">
    <table class="table table-striped">
<tr>
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>
    Add neues HerstellerLand_gruppe Name
    </h5></td>
    <td>
        <a href="<?php echo site_url('hersteller/gruppe_insert'); ?>">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true" ></span>
                        
                    </button>
                </a>
    </td>
</tr>

<?php foreach($gruppes as $value): ?>
<?php if($value['gruppenname'] =="Keine Angabe"): ?>

    <tr class="active"> 
        <td><span><?php echo $value['fzhg_id']; ?></span></td>
<?php else: ?>
    <tr class="class_out"> 
        <td><span><?php echo $value['fzhg_id']; ?></span></td>
<?php endif; ?>
        <td><span><?php echo $value['gruppenname']; ?></span></td>
        <td>
			<?php if($value['gruppenname']!="Keine Angabe" and $value['gruppenname']!='null'): ?>
            <a href="<?php echo site_url('hersteller/gruppe_edit/'.$value['fzhg_id']) ?>">
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
</form>
</div>

<script type="text/javascript">
	function dele(obj) {
		$fzhg_id = $(obj).parents('tr').children('td').eq(0).find('span').html();
//		alert($fzk_id);
		$.ajax({
        	url:"<?php echo site_url('hersteller/delete_all'); ?>",
        	type:"POST",
        	data:{fzhg_id:$fzhg_id},
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