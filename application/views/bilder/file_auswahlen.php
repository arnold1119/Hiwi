<?php

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<?php $this->load->view("header"); ?>

<div id="search" class="w900">
<h4>Dokument auf dem Server auswählen</h4>
<br>	
<table class="table table-striped">

<!--<tr class="active">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>

    <td>Hochladen neues Dokument </td>
    <form action="<?php echo site_url('bilder/file_upload'); ?>" method="post"  enctype="multipart/form-data">

            <td>
            	
            	
            	
            	<input type="file" name="thumb_bilder" size="20"/>
            </td>
    
    <td>
    	
    	
           
            
        	<input type="submit" value="upload"/>
    		
    	
        
    </td>
    </form>

</tr>-->


<!--!modal end-->
<tr class="success"></tr>
    <td>Type</td>
    <td>Name</td>
    <td>Wo</td>
    <td>&nbsp;</td>
</tr>

<?php foreach(glob($dirs."/*") as $key => $value): ?>
	<?php 
		$result = preg_split("/www/",$value);
						$test = $result[1];
						$data['fname'] = dirname($test);
						$data['pfname'] = basename($test);
						$info = pathinfo($data['pfname']);  
//					p(pathinfo($value));
	?>
    <?php if(is_dir($value)): ?>
    <tr> 
        <td>
        	
        		<span class="glyphicon glyphicon-folder-close" aria-hidden="true" style="">
        		</span>
        		
        </td>
        <td><span><?php echo basename($value); ?></span></td>
        <td><span><?php echo dirname($value); ?></span></td>
         <!--<td><span><?php echo $value['datum']; ?></span></td>-->
        <td>
        	

            <a href='<?php echo site_url("bilder/dir_open?dirOpen="."$value".'&u='.$url) ?>'>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                </button>
            </a>
            <a href="<?php echo site_url("bilder/dir_delete?dirDelete="."$value") ?>">
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </a>
        </td>
<?php 
			      		
			      		   
elseif(pathinfo($value)['extension']=='jpg'||pathinfo($value)['extension']=='jpeg'||pathinfo($value)['extension']=='png'||pathinfo($value)['extension']=='gif'): ?>
    <tr>
       
        <td>
        	<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#<?php echo $key; ?>">
				<span class="glyphicon glyphicon-picture" aria-hidden="true" style=""></span>
			</button>
			
			<!-- Modal -->
			<div class="modal fade" id="<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel">Content</h4>
			      </div>
			      <div class="modal-body">
			      	
			      	<?php 
			      		
			      		
			      			echo "<img style='width: 500px;border-radius: 5px;margin:0 auto;' src='$test' />";
			      		
			      	
			      	?>
			      
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>   	
        </td>
        <td>
        	<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#<?php echo $key; ?>">
				<span><?php echo basename($value); ?></span>
			</button>
        	
        </td>
        <td><span><?php echo dirname($value); ?></span></td>
         <!--<td><span><?php echo $value['datum']; ?></span></td>-->
        <td>
        	
			
            <a href='<?php echo site_url("bilder/link?link=".urlencode($value).'&u='.$url) ?>'>
            
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-link" aria-hidden="true"></span>
                </button>
            </a>
              <a href="<?php echo site_url("bilder/file_delete?fileDelete="."$value") ?>">
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </a>
        </td>
<?php elseif(pathinfo($value)['extension']=='txt'): ?>
    <tr class="ajax_text">
       
        <td>
        	<input type="hidden" name="text1" value="<?php echo $value;?>" />
            <a href='' onclick="text1(this)">
			
				<span class="glyphicon glyphicon-file" aria-hidden="true" style=""></span></span></a>  	
        </td>
        <td>
            <a href='' onclick="text1(this)">
        	
				<span><?php echo basename($value); ?></span>
			</a> 
        	
        </td>
        <td><span><?php echo dirname($value); ?></span></td>
         <!--<td><span><?php echo $value['datum']; ?></span></td>-->
        <td>
        	
			
            <a href='<?php echo site_url("bilder/link?link=".urlencode($value)) ?>'>
            
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-link" aria-hidden="true"></span>
                </button>
            </a>
              <a href="<?php echo site_url("bilder/file_delete?fileDelete="."$value") ?>">
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </a>
        </td>
<?php elseif(pathinfo($value)['extension']=='pdf'): ?>
    <tr class="ajax_text">
       
        <td>
            <a href='<?php echo site_url("bilder/file_open?fileOpen="."$value") ?>' target="_blank">
				<span class="glyphicon glyphicon-file" aria-hidden="true" style=""></span>
			</a>  	
        </td>
        <td>
            <a href='<?php echo site_url("bilder/file_open?fileOpen="."$value") ?>' target="_blank">
				<span><?php echo basename($value); ?></span>
			</a> 
        	
        </td>
        <td><span><?php echo dirname($value); ?></span></td>
         <!--<td><span><?php echo $value['datum']; ?></span></td>-->
        <td>
        	
			
            <a href='<?php echo site_url("bilder/file_link?link=".urlencode($value).'&u='.$url) ?>'>
            
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-link" aria-hidden="true"></span>
                </button>
            </a>
              <a href="<?php echo site_url("bilder/file_delete?fileDelete="."$value") ?>">
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </a>
        </td>
<?php elseif(pathinfo($value)['extension']=='mp4'||pathinfo($value)['extension']=='wmf'): ?>
    <tr class="ajax_text">
      
        <td>
            <a href='<?php echo site_url("bilder/file_open?fileOpen=".urlencode($value)); ?>'>
				<span class="glyphicon glyphicon-facetime-video" aria-hidden="true" style=""></span>
			</a>  	
        </td>
        <td>
            <a href='<?php echo site_url("bilder/file_open?fileOpen=".urlencode($value)) ?>'>
				<span><?php echo basename($value); ?></span>
			</a> 
        	
        </td>
        <td><span><?php echo dirname($value); ?></span></td>
         <!--<td><span><?php echo $value['datum']; ?></span></td>-->
        <td>
        	
            <a href='<?php echo site_url("bilder/videos_link?link=".urlencode($value).'&u='.$url) ?>'>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-link" aria-hidden="true"></span>
                </button>
            </a>
            <a href="<?php echo site_url("bilder/file_delete?fileDelete="."$value") ?>">
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </a>
        </td>
<?php endif; ?>
        
    </tr>
    
    
<?php endforeach; ?>
</table>



<script type="text/javascript">
	function text1(obj) {
		var url = $(obj).parents('.ajax_text').find(":input").val();
//		alert(url);
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('bilder/txt_file_open_ajax'); ?>",
        	data:{url:url},
        	dataType:'json',
        	success:function(data) {
				alert(data.content);
        		
        	},
		});
	}
</script>


</body>
</html>