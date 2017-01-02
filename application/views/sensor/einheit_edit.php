<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
<div id="search" class="w900">
<br>
<form action="<?php echo site_url('sensor/einheit_edit/'.$result[0]['sme_id']); ?>" method="post">

    <table class="table table-striped">
<tr>
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle Sensor Einheit Type Namen </h5></td>
    <td>
        <a href="<?php echo site_url('sensor/einheit_index'); ?>">
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
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new Sensor Einheit Type Name </td>
    <td>
        <a href="<?php echo site_url('sensor/einheit_insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </a>
    </td>
</tr>

        <tr class="active">
            <td>    
                <span>sme_id&nbsp;&nbsp;<?php echo $result[0]['sme_id']; ?></span>
            </td>
            <td>
                <input type="text" name="einheit" autofocus value="<?php echo $result[0]['einheit'] ?>" />
            </td>
            <td>
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