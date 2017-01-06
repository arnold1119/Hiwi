<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
<div id="search" class="w900">
	<h4>Add FAS Entwicklung</h4>
<br>
<form action="<?php site_url('fas/entwicklung_insert') ?>" method="post">
    <table class="table table-striped">
<tr>
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle FAS_Entwicklung </h5></td>
    <td>
        <a href="<?php echo site_url('fas/entwicklung'); ?>">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        
                    </button>
                </a>
    </td>
</tr>
        <tr class="">
            <td>    
                <span><h4>Add neu FAS_Entwicklung Name</h4></span>
            </td>
            <td>
                <input type="text" name="entwicklung" placeholder="neue FAS_Entwicklung Name" autofocus required/>
            </td>
            <td>
                <input type="submit" value="add" class="btn btn-default" 
                name="add"/>
            </td>
        </tr>


    </table>
</form>
</div>
<script src="<?php echo base_url('style/js/klasse_ajax.js') ?>" type="text/javascript" ></script>
    
</body>
</html>