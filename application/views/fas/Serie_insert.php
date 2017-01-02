<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
<div id="search" class="w900">
<br>
<form action="<?php site_url('fas/serie_insert') ?>" method="post">
    <table class="table table-striped">
<tr>
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle FAS_Serie </h5></td>
    <td>
        <a href="<?php echo site_url('fas/serie'); ?>">
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
                <span><h4>Ddd neu FAS_Serie Name</h4></span>
            </td>
            <td>
                <input type="text" name="serie" placeholder="neue FAS_Serie Name" autofocus required/>
            </td>
            <td>
                <input type="submit" value="add" class="btn btn-danger"  style="width: 80px;"
                name="add"/>
            </td>
        </tr>

<?php foreach($fasserie as $value): ?>
    <?php if($count == $value['fass_id']): ?>
        <tr class="success">
    <?php else: ?>
        <tr>
    <?php endif; ?>
    
        <td><span><?php echo $value['fass_id']; ?></span></td>
        <td><span><?php echo $value['serie']; ?></span></td>
        <td>
            <a href="<?php echo site_url('fas/serie_edit/'.$value['fass_id']); ?>">
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