<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
<div id="klasse" class="w900">
<br>
<form action="<?php echo site_url('fas/entwicklung_edit/'.$result[0]['fase_id']); ?>" method="post">

    <table class="table table-striped">
<tr>
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle Entwicklung Name </h5></td>
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

<tr class="info">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new FAS_Entwicklung </td>
    <td>
        <a href="<?php echo site_url('fas/entwicklung_insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-info">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:white"></span>
            </button>
        </a>
    </td>
</tr>

        <tr class="danger">
            <td>    
                <span>fase_id&nbsp;&nbsp;<?php echo $result[0]['fase_id']; ?></span>
            </td>
            <td>
                <input type="text" name="entwicklung" autofocus value="<?php echo $result[0]['entwicklung'] ?>" />
            </td>
            <td>
                <input type="submit" value="edit" class="btn btn-danger"  style="width: 80px;"
                name="edit"/>
            </td>
        </tr>

    </table>
</form>
</div>
<script src="<?php echo base_url('style/js/klasse_ajax.js') ?>" type="text/javascript" ></script>
    
</body>
</html>