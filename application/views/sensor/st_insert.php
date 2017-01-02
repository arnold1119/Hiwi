<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
	
	

<div id="klasse" class="w900">
<br>
<form action="<?php site_url('fas/typeinsert') ?>" method="post">
    <table class="table table-striped">
<tr>
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle Sensor Type </h5></td>
    <td>
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
        <tr class="danger">
            <td>    
                <span><h4>Add neu Sensor Name</h4></span>
            </td>
            <td>
                <input type="text" name="sensortyp" placeholder="neue FAS_Type Name" autofocus required/>
            </td>
            <td>
                <input type="submit" value="add" class="btn btn-danger"  style="width: 80px;"
                name="add"/>
            </td>
        </tr>

<?php foreach($sensortype as $value): ?>
    <?php if($count == $value['st_id']): ?>
        <tr class="success">
    <?php else: ?>
        <tr>
    <?php endif; ?>
    
        <td><span><?php echo $value['st_id']; ?></span></td>
        <td><span><?php echo $value['sensortyp']; ?></span></td>
        <td>
            <a href="<?php echo site_url('sensor/typeedit/'.$value['st_id']); ?>">
                <!-- <button type="btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button> -->
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
    </table>
</form>
</div>
<script src="<?php echo base_url('style/js/klasse_ajax.js') ?>" type="text/javascript" ></script>
    
</body>
</html>