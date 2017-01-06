<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
    <div class="col-xs-3">
        <label><span>quellenname</span></label>
    </div>
    <div class="col-xs-7">
        <textarea class="form-control" rows="3" name="quellenname" cols="50" ><?php if($result[0]['quellenname'] != 'null'): ?><?php echo $result[0]['quellenname']; ?><?php elseif($sessions['vorfile']!='null'): ?><?php echo $sessions['vorfile']; ?><?php else:?><?php endif;?></textarea>
    </div>
    <div class="col-xs-2">
    	
    	
    	<?php if($result[0]['quellenname'] != 'null'): ?>
	   		
	        <a href="<?php echo site_url('bilder/file_auswahlen?u='.$url.'&quelle_id='.$result[0]['quelle_id'].'&quellenname='.$result[0]['quellenname']); ?>">
	       
	            <button type="button" class="btn btn-default">
	                auf dem Server auswählen
	            </button>
	     
	    </a>
	   
	   	<?php else: ?>
	   		
	   		<a href="<?php echo site_url('bilder/file_auswahlen?u='.$url); ?>">
	            <!-- <button type="btn">
	                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	            </button> -->
	            <button type="button" class="btn btn-default">
	                auf dem Server auswählen
	            </button>
	             
	       </a>
	        
	    <?php endif; ?>
	        
	        
	        
    </div>
</div>
<br>
	
	
	
	
<div class="row text">
    <div class="col-xs-3">
        <label><span>Link</span></label>
    </div>
    <div class="col-xs-7">
        <textarea class="form-control" rows="3" name="link" cols="50"><?php if($result[0]['quellenname'] != 'null'): ?><?php echo $result[0]['link'] ?><?php elseif($sessions['vorfile']!='null'): ?><?php echo $sessions['vorlink']; ?><?php else:?><?php endif;?></textarea>
    </div>
    <div class="col-xs-2">
    	<a href="<?php echo site_url('bilder/mysql_delete?q_id='.$result[0]['quelle_id']);?>">
    		<button type="button" class="btn btn-default">
	    		<span class="glyphicon glyphicon-remove"></span>	
	       	</button>
    	</a>
    	<a href="<?php echo site_url('bilder/reset?q_id='.$result[0]['quelle_id']);?>">
    		<button type="button" class="btn btn-default btn-sm">
	    		<span>reset</span>
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
        

    <input type="text" id="datepicker" class="form-control" value="<?php if($result[0]['quellenname'] != 'null'): ?><?php echo $result[0]['datum']; ?><?php elseif($sessions['vorfile']!='null'): ?><?php echo $sessions['vordatum']; ?><?php else:?><?php endif;?>" name="datum">
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