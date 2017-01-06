<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
<div id="search" class="w900">
	<h4>Update Sensor Type</h4>
	
<br>
<form action="<?php echo site_url('sensor/typeedit/'.$result[0]['st_id']); ?>" method="post">

    <table class="table table-striped">
<tr class="row">
    <td class="col-xs-3"> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td class="col-xs-7"><h5>Zeigen Alle Sensor Type </h5></td>
    <td class="col-xs-2">
        <a href="<?php echo site_url('sensor/typeindex'); ?>">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        
                    </button>
                </a>
    </td>
</tr>

<tr class="row">
    <td class="col-xs-3"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td class="col-xs-7">Add new Sensor Type </td>
    <td class="col-xs-2">
        <a href="<?php echo site_url('sensor/typeinsert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" ></span>
            </button>
        </a>
    </td>
</tr>

        <tr class="row active">
            <td class="col-xs-3">  
                <span>st_id&nbsp;&nbsp;<?php echo $result[0]['st_id']; ?></span>
            </td>
            <td class="col-xs-7">
                <input type="text" name="sensortyp" autofocus value="<?php echo $result[0]['sensortyp'] ?>" />
            </td>
            <td class="col-xs-2">
                <input type="submit" value="edit" class="btn btn-default"  
                name="edit"/>
            </td>
        </tr>

    </table>
</form>
</div>
<script src="<?php echo base_url('style/js/klasse_ajax.js') ?>" type="text/javascript" ></script>
    
</body>
</html>