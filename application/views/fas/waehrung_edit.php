<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
<div id="search" class="w900">
<h4>Update FAS Waehrung</h4>	
<br>
<form action="<?php echo site_url('fas/waehrung_edit/'.$result[0]['w_id']); ?>" method="post">

    <table class="table table-striped">
<tr class="row">
    <td class="col-xs-3"> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td class="col-xs-7"> <h5>Zeigen Alle Waehrung Name </h5></td>
    <td class="col-xs-2"> 
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

<tr class="row active">
    <td class="col-xs-3"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td class="col-xs-7">Add new FAS_Waehrung </td>
    <td class="col-xs-2">
        <a href="<?php echo site_url('fas/waehrung_insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </a>
    </td>
</tr>

        <tr class="row">
            <td class="col-xs-3">   
                <span>w_id&nbsp;&nbsp;<?php echo $result[0]['w_id']; ?></span>
            </td>
            <td class="col-xs-7">
                <input type="text" name="waehrung" autofocus value="<?php echo $result[0]['waehrung'] ?>" />
            </td>
            <td class="col-xs-2">
                <input type="submit" value="edit" class="btn btn-default"  style="width: 80px;"
                name="edit"/>
            </td>
        </tr>

    </table>
</form>
</div>
<script src="<?php echo base_url('style/js/klasse_ajax.js') ?>" type="text/javascript" ></script>
    
</body>
</html>