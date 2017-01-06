<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
<div id="search" class="w900">
	<h4>Add FAS Waehrung</h4>
<br>
<form action="<?php site_url('fas/waehrung_insert') ?>" method="post">
    <table class="table table-striped">
<tr>
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle FAS_Waehrunge </h5></td>
    <td>
        <a href="<?php echo site_url('fas/waehrung'); ?>">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        
                    </button>
                </a>
    </td>
</tr>
        <tr class="active">
            <td>    
                <span><h4>Neue FAS_Waehrung Name</h4></span>
            </td>
            <td>
                <input type="text" name="waehrung" placeholder="neue FAS_Waehrung Name" autofocus required/>
            </td>
            <td>
                <input type="submit" value="add" class="btn btn-default"  style="width: 80px;"
                name="add" />
            </td>
        </tr>


    </table>
</form>
</div>
<script src="<?php echo base_url('style/js/klasse_ajax.js') ?>" type="text/javascript" ></script>
    
</body>
</html>