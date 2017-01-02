<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

<?php echo  $this->load->view("header"); ?>
<div id="klasse"   class="w80">
<br>
<form action="<?php site_url('land/insert') ?>" method="post">
    <table class="table table-striped">
<tr>
    <td> <h5><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h5></td>
    <td><h5>Zeigen Alle HerstellerLand </h5></td>
    <td>
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
        <tr class="active">
            <td>    
                <span><h4>Add neu HerstellerLand Name</h4></span>
            </td>
            <td>
                <input type="text" name="land" placeholder="neue HerstellerLand Name" autofocus required/>
            </td>
            <td>
                <input type="submit" value="add" class="btn btn-default"  style="width: 80px;"
                name="add"/>
            </td>
        </tr>


    </table>
</form>
</div>
</body>
</html>