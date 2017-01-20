<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Alle HerstellerLand Gruppe Namen</title>

<?php echo  $this->load->view("header"); ?>
<div id="search"  class="w80">
	<h4>HerstellerLand Gruppe</h4>
<br>
<?php echo $links; ?>
<form action="<?php site_url('hersteller/gruppe_insert') ?>" method="post">
    <table class="table table-striped">
<tr  class="row text">
    <td class="col-xs-3"> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td class="col-xs-7"><h5>
    Add neues HerstellerLand_gruppe Name
    </h5></td>
    <td class="col-xs-2">
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
<tr class="row text active">
    <td> fzhg_id
    	<a href="<?php echo site_url('hersteller/h_list_gruppe_ida'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('hersteller/h_list_gruppe_idd'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    
    </td>
    <td>gruppenname
    	<a href="<?php echo site_url('hersteller/h_list_gruppename_a'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('hersteller/h_list_gruppename_d'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    
    
    <td>&nbsp;</td>
</tr>
<?php foreach($gruppes as $value): ?>
<?php if($value['gruppenname'] =="Keine Angabe"): ?>

    <tr  class="row text active"> 
        <td class="col-xs-3"><span><?php echo $value['fzhg_id']; ?></span></td>
<?php else: ?>
    <tr  class="row text class_out"> 
        <td class="col-xs-3"><span><?php echo $value['fzhg_id']; ?></span></td>
<?php endif; ?>
        <td class="col-xs-7"><span><?php echo $value['gruppenname']; ?></span></td>
        <td class="col-xs-2">
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
		<?php echo $links; ?>
</body>
</html>