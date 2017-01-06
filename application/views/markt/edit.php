<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
<div id="search"  class="w80">
	<h4>Update Marktland</h4><br>
<form action="<?php echo site_url('markt/edit/'.$result[0]['markt_id']); ?>" method="post">
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

<tr class="">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new Marktland </td>
    <td>
        <a href="<?php echo site_url('markt/insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" ></span>
            </button>
        </a>
    </td>
</tr>

        <tr class="rox text active">
            <td class="col-xs-3">    
                <span>markt_id&nbsp;&nbsp;<?php echo $result[0]['markt_id']; ?></span>
            </td>
            <td class="col-xs-7">
                <input type="text" name="marktname" autofocus value="<?php echo $result[0]['marktname'] ?>" />
            </td>
            <td class="col-xs-2">
                <input type="submit" value="edit" class="btn btn-default"
                name="edit"/>
            </td>
        </re>

    </table>
</form>
</div>
    
</body>
</html>