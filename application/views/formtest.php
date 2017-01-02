<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
<?php $this->load->view("header"); ?>
<div class="klasse">
	<?php echo $links; ?>
<table class="table table-striped">
<tr class="info">
    <td> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td>
    <td>Add new Fahrzeug </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
    <td>
        <a href="<?php echo site_url('fahrzeug'); ?>">
            <!-- <button type="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button> -->
            <button type="button" class="btn btn-info">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:white"></span>
            </button>
        </a>
    </td>
</tr>
<tr class="success">
    <td>Fz_id
    	<a href="<?php echo site_url('fahrzeug/f_list/0/13'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list/0/14'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    
    </td>
    <td>Herstellername
    	<a href="<?php echo site_url('fahrzeug/f_list/0/1'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list/0/2'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Fahrzeug Klasse
    	<a href="<?php echo site_url('fahrzeug/f_list/0/3'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list/0/4'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Baujahr
    	<a href="<?php echo site_url('fahrzeug/f_list/0/5'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list/0/6'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Aenderung
    	<a href="<?php echo site_url('fahrzeug/f_list/0/7'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list/0/8'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Eingabe
    	<a href="<?php echo site_url('fahrzeug/f_list/0/9'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list/0/10'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
    <td>Fahrzeugname
    	<a href="<?php echo site_url('fahrzeug/f_list/0/11'); ?>">
    		<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    		
    	</a>
    	<a href="<?php echo site_url('fahrzeug/f_list/0/12'); ?>">
    		
    		<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    	</a>
    </td>
  
    <td>&nbsp;</td>
</tr>
<?php foreach($fahrzeug as $value): ?>
    
    <tr>
        <td><span><?php echo $value['fz_id']; ?></span></td>

        <td><span><?php echo $value['fzh_id']; ?></span></td>
        <td><span><?php echo $value['fzk_id']; ?></span></td>
        <td><span><?php echo $value['baujahr']; ?></span></td>
        <td><span><?php echo $value['aenderung']; ?></span></td>
        <td><span><?php echo $value['eingabe']; ?></span></td>
        <td>
        	<span>
        		<?php echo $value['fahrzeugname']; ?>
        		<?php if($value['bilder'] != null && $value['bilder'] != "null"): ?>
        			<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
        		<?php endif; ?>	
        	</span>
        </td>
        
        <td>
            <a href="<?php echo site_url('fahrzeug/fzginfo/'.$value['fz_id']) ?>">
                <!-- <button type="btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button> -->
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
            </a>
            
            <a href="javascript:" onclick="dele(this)">
                <!-- <button type="btn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button> -->
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
</table>

</div>