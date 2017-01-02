<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
<div id="search" class="w900">
<br>
<form action="<?php site_url('sensor/position_insert') ?>" method="post">
    <table class="table table-striped">
<tr>
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle Sensor Position</h5></td>
    <td>
        <a href="<?php echo site_url('sensor/position_index'); ?>">
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
                <span><h4>Add neu Sensor Position</h4></span>
            </td>
            <td>
                <input type="text" name="position" placeholder="neue Sensor Position" autofocus required/>
            </td>
            <td>
                <input type="submit" value="add" class="btn btn-default"
                name="add"/>
            </td>
        </tr>

<?php foreach($position as $value): ?>
    <?php if($count == $value['sp_id']): ?>
        <tr class="success">
    <?php else: ?>
        <tr>
    <?php endif; ?>
    
        <td><span><?php echo $value['sp_id']; ?></span></td>
        <td><span><?php echo $value['position']; ?></span></td>
        <td>
            <a href="<?php echo site_url('sensor/position_edit/'.$value['sp_id']); ?>">
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