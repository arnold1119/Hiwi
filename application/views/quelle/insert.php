<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<?php echo  $this->load->view("header"); ?>
<div id="search"  class="w80 hersteller">
	
	<h4>Add new Quelle</h4>
<br>
<form action="<?php echo site_url('quelle/insert/'); ?>" method="post">
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
    <div class="col-xs-3">
        <label><span>quellenname</span></label>
    </div>
    <div class="col-xs-7">
        <!-- <input type="text" class="form-control" value="" name="quellenname"> -->
        <textarea class="form-control" rows="3" name="quellenname" cols="50"><?php if($file_status): ?><?php echo $session_value; ?><?php endif; ?></textarea>
        
    </div>
    <div class="col-xs-2">
    
    </div>
</div>
<br>
	
	
	
<div class="row text">
    <div class="col-xs-3">
        <label><span>Link</span></label>
    </div>
    <div class="col-xs-7">
        <!-- <input type="text" class="form-control" value=""> -->
        <textarea class="form-control" rows="3" name="link" cols="50"><?php if($file_status): ?>http://fasdb.iffhz.ing.tu-bs.de/edit/quelle/Dokumente<?php endif; ?></textarea>
    </div>
    <div class="col-xs-2">
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
        

    <input type="text" id="datepicker" class="form-control" value="" name="datum">
    </div>
    <div class="col-xs-2">
        <input type="submit" value="add" name="add"  style="width: 100px;" class="btn btn-default"/>
          
    </div>

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