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
	
<br>
<form action="<?php echo site_url('fas/fas_hersteller_insert/'); ?>" method="post">
<table class="table table-striped">
    <tr class="warning">
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle FAS_Hersteller </h5></td>
    <td>
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

    <tr class="success">
        <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
        <td>HerstellerLand List</td>
        <td>
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


<div class="row text">
    <div class="col-xs-3">
        <label for="fahrzeugname"><span>land</span></label>
    </div>
    <div class="col-xs-7">
        <select class="form-control" id="exampleInputEmail2" name="land_id">
            <?php foreach($land as $value): ?>
                <option value="<?php echo $value['land_id'] ?>">
                    <span><?php echo $value['land'] ?></span>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-xs-2">
    
    </div>
</div>
<br>
<div class="row text">
    <div class="col-xs-3">
        <label for="fahrzeugname"><span>herstellername</span></label>
    </div>
    <div class="col-xs-7">
        <input type="text" class="form-control" placeholder="herstellername" name="herstellername" required>
        <!-- <select class="form-control" >
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select> -->
    </div>
    <!--<div class="col-xs-1">-->
        <input type="submit" value="add" name="add" class="btn btn-default" style="width: 70px;"/>
    <!--</div>-->
</div>



    </table>
</form>
</div>
<script src="<?php echo base_url('style/js/klasse_ajax.js') ?>" type="text/javascript" ></script>
    
</body>
</html>