<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
<div id="search"  class="w80">
	<h4>Add new Marktland</h4>
<br>
<form action="<?php site_url('klasse/insert') ?>" method="post">
    <table class="table table-striped">
<tr class="rox text">
    <td class="col-xs-3">  <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td class="col-xs-7"> <h5>Zeigen Alle MarktLand </h5></td>
    <td class="col-xs-2"> 
        <a href="<?php echo site_url('markt/index'); ?>">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        
                    </button>
                </a>
    </td>
</tr>
        <tr class="rox text active">
          <td class="col-xs-3">  
                <span><h4>Add neu MarktLand Name</h4></span>
            </td>
            <td class="col-xs-7">
                <input type="text" name="marktname" placeholder="neue Marktland Name" autofocus required/>
            </td>
            <td class="col-xs-2">
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