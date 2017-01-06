<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<style type="text/css" media="screen">
    /*select{width:500px;}*/
</style>
<?php echo  $this->load->view("header"); ?>
<div id="search" class="w900">
	<h4>Update FAS Hersteller</h4>
	
<br>
<form action="<?php echo site_url('fas/fas_hersteller_edit/'.$result[0]['fash_id']); ?>" method="post">
   <table class="table table-striped">
    <tr class="row active">
    <td class="col-xs-3"> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td class="col-xs-7"> <h5>Zeigen Alle FAS_Hersteller </h5></td>
    <td class="col-xs-2"> 
        <a href="<?php echo site_url('fas/fas_hersteller_index'); ?>">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        
                    </button>
                </a>
    </td>
    </tr>

    <tr class="row">
         <td class="col-xs-3"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
         <td class="col-xs-7">HerstellerLand List</td>
         <td class="col-xs-2">
            <a href="<?php echo site_url('Land/index'); ?>">
                <!-- <button type="btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button> -->
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-list" aria-hidden="true" style=""></span>
                </button>
            </a>
        </td>
    </tr>
</table>
<hr>
<!-- <h4 style="text-align: center">Add new Hersteller</h4> -->



<div class="row text">
    <div class="col-xs-3">
        <label for="fahrzeugname"><span>land</span></label>
    </div>
    <div class="col-xs-7">
        <select class="form-control" id="exampleInputEmail2" name="land_id">
            <?php foreach($land as $value): ?>
            <?php if($value['land'] == $result[0]['land']): ?>
                <option value="<?php echo $value['land_id'] ?>" selected="selected">
            <?php else: ?>
                <option value="<?php echo $value['land_id'] ?>">
            <?php endif; ?>
                    <span><?php echo $value['land'] ?></span>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-xs-2">
        <a href="<?php echo site_url('land/index'); ?>">
                    <!-- <button type="btn">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button> -->
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        
                    </button>
        </a>
    </div>
</div>
<br>
<div class="row text">
    <div class="col-xs-3">
        <label for="fahrzeugname"><span>herstellername</span></label>
    </div>
    <div class="col-xs-7">
        <input type="text" class="form-control" name="herstellername" value="<?php echo $result[0]['herstellername'];  ?>" required>
        <!-- <select class="form-control" >
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select> -->
    </div>
    <!--<div >-->
        <input type="submit" value="update" name="update" class="btn btn-default" style="width: 70px;"/>
    <!--</div>-->
</div>



    </table>
</form>
</div>
<script src="<?php echo base_url('style/js/klasse_ajax.js') ?>" type="text/javascript" ></script>
    
</body>
</html>