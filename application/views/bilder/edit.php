<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<?php echo  $this->load->view("header"); ?>
<div id="search" class="w900">
	<h4>Update Bilder</h4>
<br>
<form action="<?php echo site_url('bilder/edit/'.$result[0]['sb_id']); ?>" method="post">
<table class="table table-striped">
    <tr class="active">
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle Bilder Quelle </h5></td>
    <td>
        <a href="<?php echo site_url('bilder/index'); ?>">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        
                    </button>
                </a>
    </td>
</tr>
</table>
<hr>
<h4 style="text-align: center">Update new Bilder Quelle</h4>
<div class="row text">
    <div class="col-xs-3">
        <label><span>Bild</span></label>
    </div>
    <div class="col-xs-7">
        <textarea class="form-control" rows="3" name="bild" cols="50" style="resize:none;"><?php echo $result[0]['bild'] ?></textarea>
    </div>
    <div class="col-xs-2">
    
    </div>
</div>
<br>


<div class="row text">
    <div class="col-xs-3">
        <label><span>Pfad</span></label>
    </div>
    <div class="col-xs-7">
        <textarea class="form-control" rows="3" name="pfad" cols="50" style="resize:none;"><?php echo $result[0]['pfad'] ?></textarea>
    </div>
    <div class="col-xs-2">
    
    </div>
</div>
<br>

<div class="row text">
    <div class="col-xs-3">

    </div>
    <div class="col-xs-7">
        


    </div>
    <div class="col-xs-2">
        <input type="submit" value="update" name="update" class="btn btn-default"/>
    </div>
</div>


</form>
</div>
    
</body>
</html>