<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<?php $this->load->view("header"); ?>
<div id="klasse" class="w900">
<br>
<table class="table table-striped">
<tr class="info">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new Bilder </td>
    <td>&nbsp;</td>
    <td>
        <a href="<?php echo site_url('bilder/insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-info">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:white"></span>
            </button>
        </a>
    </td>
</tr>

<tr class="info"></tr>
    <td>sb_id</span></td>
    <td>linkbild</td>
    <td>Pfad</td>
    <td>&nbsp;</td>
</tr>
<?php foreach($bild as $value): ?>
    <?php if($value['sb_id'] == $bilder_index): ?>
    <tr class="success"> 
        <td>
            <span><?php echo $value['sb_id']; ?></span>
            <span class="glyphicon glyphicon-saved" aria-hidden="true" style="color:green">
            
        </td>
<?php else: ?>
    <tr>
        <td><span><?php echo $value['sb_id']; ?></span></td>
<?php endif; ?>
        <td><span><?php echo $value['bild']; ?></span></td>
        <td><span><?php echo $value['pfad']; ?></span></td>
         <!--<td><span><?php echo $value['datum']; ?></span></td>-->
        <td>
            <a href="<?php echo site_url('bilder/edit/'.$value['sb_id']) ?>">
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
</table>

</body>
</html>