<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<?php echo  $this->load->view("header"); ?>
<div id="klasse"  class="w80">
<br>
<form action="<?php echo site_url('quelle/edit/'.$result[0]['quelle_id']); ?>" method="post">
<table class="table table-striped">
    <tr class="active">
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle Quelle </h5></td>
    <td>
        <a href="<?php echo site_url('quelle/index'); ?>">
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
<h4 style="text-align: center">Update new Quelle</h4>
<div class="row text">
    <div class="col-xs-3">
        <label><span>Link</span></label>
    </div>
    <div class="col-xs-7">
        <textarea class="form-control" rows="3" name="link" cols="50"><?php echo $result[0]['link'] ?></textarea>
    </div>
    <div class="col-xs-2">
    
    </div>
</div>
<br>


<div class="row text">
    <div class="col-xs-3">
        <label><span>quellenname</span></label>
    </div>
    <div class="col-xs-7">
        <textarea class="form-control" rows="3" name="quellenname" cols="50" ><?php echo $result[0]['quellenname'] ?></textarea>
    </div>
    <div class="col-xs-2">
    
    </div>
</div>
<br>

<div class="row text">
    <div class="col-xs-3">
        <label><span>Datum</span></label>
    </div>
    <div class="col-xs-7">
        

    <input type="text" id="datepicker" class="form-control" value="<?php echo $result[0]['datum'] ?>" name="datum">
    </div>
    <div>
        <input type="submit" value="update" name="update" style="width: 100px;" class="btn btn-default"/>
    </div>
</div>
<script src="http://c.cnzz.com/core.php"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>


</form>
</div>
    
</body>
</html>