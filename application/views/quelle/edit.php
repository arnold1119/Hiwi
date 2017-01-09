<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/jquery-ui.css'); ?>">
<?php echo  $this->load->view("header"); ?>
<div id="search"  class="w80">
	<h4>Update new Quelle</h4>
<br>
<form action="<?php echo site_url('quelle/edit/'.$result[0]['quelle_id']); ?>" method="post">
<table class="table table-striped">
        <tr class="row text active">
	    <td class="col-xs-3"> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
	    <td class="col-xs-7"><h5>Zeigen Alle Quelle </h5></td>
	    <td class="col-xs-2">
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


<div class="row text">
    <div class="col-xs-2">
        <label><span>quellenname</span></label>
    </div>
    <div class="col-xs-6">
        <textarea class="form-control" rows="3" name="quellenname" cols="50" ><?php if($status): ?><?php echo $_SESSION['quellenname']; ?><?php endif;?></textarea>
    </div>
    <div class="col-xs-4">
    	
    	
    	
	        
	        
	        
    </div>
</div>
<br>
	
	
	
	
<div class="row text">
    <div class="col-xs-2">
        <label><span>Link</span></label>
    </div>
    <div class="col-xs-6">
        <textarea class="form-control" rows="3" name="link" cols="50"><?php if($status): ?><?php echo $_SESSION['link']; ?><?php endif;?></textarea>
    </div>
    <div class="col-xs-4">
    	<a href="<?php echo site_url('bilder/file_auswahlen?u='.$url); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                auf dem Server auswählen
            </button>  
        </a>
    </div>
</div>
<br>




<div class="row text">
    <div class="col-xs-3">
        <label><span>Datum</span></label>
    </div>
    <div class="col-xs-7">
        

    <input type="text" id="datepicker" class="form-control" value="<?php echo $result[0]['datum']; ?>" name="datum">
    </div>
    <div>
        <input type="submit" value="update" name="update" style="width: 100px;" class="btn btn-default"/>
    </div>
</div>

<script src="<?php echo base_url('style/js/jquery-1.12.4.js') ?>"></script>
<script src="<?php echo base_url('style/js/jquery-ui.js') ?>"></script>

<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>


</form>
</div>
    
</body>
</html>