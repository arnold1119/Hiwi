<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
<div id="klasse"  class="w80">
<br>
<form action="<?php site_url('klasse/insert') ?>" method="post">
    <table class="table table-striped">
<tr>
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle MarktLand </h5></td>
    <td>
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
        <tr class="danger">
            <td>    
                <span><h4>Ddd neu MarktLand Name</h4></span>
            </td>
            <td>
                <input type="text" name="marktname" placeholder="neue Marktland Name" autofocus required/>
            </td>
            <td>
                <input type="submit" value="add" class="btn btn-danger"  style="width: 80px;"
                name="add"/>
            </td>
        </tr>

<?php foreach($mland as $value): ?>
    <?php if($count == $value['markt_id']): ?>
        <tr class="success">
    <?php else: ?>
        <tr>
    <?php endif; ?>
    
        <td><span><?php echo $value['markt_id']; ?></span></td>
        <td><span><?php echo $value['marktname']; ?></span></td>
        <td>
            <?php if($value['marktname']!="null"): ?>

            <a href="<?php echo site_url('markt/edit/'.$value['markt_id']) ?>">
                <!-- <button type="btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button> -->
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
            </a>
        <?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>
    </table>
</form>
</div>
<script src="<?php echo base_url('style/js/klasse_ajax.js') ?>" type="text/javascript" ></script>
    
</body>
</html>