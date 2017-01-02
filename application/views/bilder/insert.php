<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<?php echo  $this->load->view("header"); ?>
<div id="hersteller" class="w900">
<br>
<form action="<?php echo site_url('bilder/insert/'); ?>" method="post">
<table class="table table-striped">
    <tr class="warning">
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
<h4 style="text-align: center">Add new Bidler Quelle</h4>
<div class="row text">
    <div class="col-xs-3">
        <label><span>Linkbilder</span></label>
    </div>
    <div class="col-xs-7">
        <!-- <input type="text" class="form-control" value=""> -->
        <textarea class="form-control" rows="3" name="bild" cols="50" style="resize:none;"></textarea>
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
        <!-- <input type="text" class="form-control" value="" name="quellenname"> -->
        <textarea class="form-control" rows="3" name="pfad" cols="50" style="resize:none;"></textarea>
        
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
        <input type="submit" value="add" name="add" />
    </div>
</div>



</form>
</div>
    
</body>
</html>