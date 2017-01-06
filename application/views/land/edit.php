<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
<div id="search"   class="w80">

	
	<h4>Add Neue Hersteller Land</h4>
<br>
<form action="<?php echo site_url('land/edit/'.$land[0]['land_id']); ?>" method="post">
    <table class="table table-striped">
<tr  class="row text" >
    <td class="col-xs-3">  <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td class="col-xs-7"> <h5>Zeigen Alle HerstellerLand </h5></td>
    <td class="col-xs-2"> 
        <a href="<?php echo site_url('land/index'); ?>">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        
                    </button>
                </a>
    </td>
</tr>

<tr  class="row text active">
    <td class="col-xs-3"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td class="col-xs-7"> Add new HerstellerLand </td>
    <td class="col-xs-2"> 
        <a href="<?php echo site_url('land/insert'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </a>
    </td>
</tr>

        <tr  class="row text active">
            <td class="col-xs-3">    
                <span>land_id&nbsp;&nbsp;<?php echo $land[0]['land_id']; ?></span>
            </td>
            <td class="col-xs-7"> 
                <input type="text" name="land" autofocus value="<?php echo $land[0]['land'] ?>" required/>
            </td>
            <td class="col-xs-2"> 
                <input type="submit" value="edit" class="btn btn-default"  style="width: 80px;"
                name="edit"/>
            </td>
        </tr>

    </table>
</form>
</div>
    
</body>
</html>