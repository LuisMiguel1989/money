<div class="row">
	<div class="col-xs-12">
		<blockquote>
		  <h3>Listado de cuentas</h3>
		</blockquote>
	</div>
</div>

<div class="row">
	<ul class="nav nav-pills" role="tablist">
	  
	  <li role="presentation"><a href="#">Número de cuentas <span class="badge"><?php echo $accountsCount; ?></span></a>
	  </li>
	  <li role="presentation" class="active">
	  	<a class="btn btn-primary" href="accounts/add"><span class="glyphicon glyphicon-user"></span>  Agregar cuenta</a>
	  </li>
	</ul>
</div>
<br>
<br>
<div class="row">
<div class="col-xs-12">
<div class="table-responsive">
<?php if(!empty($accounts)): ?>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th class="text-center">No</th>
		<th>Usuario</th>
		<th>Nombre</th>
		<th class="text-center">Opciones</th>
	</tr>
	<?php
		foreach ($accounts as $account): 
	?>
	<tr>
		<td class="text-center"><?php echo $account["accounts"]["id"]; ?></td>
		<td><?php echo $account["users"]["username"]; ?></td>
		<td><?php echo $account["accounts"]["name"]; ?></td>
		<td class="text-center">
		<span class="btn btn-default glyphicon glyphicon-edit">
            <?php
            echo $this->Html->link("Edit", array(
                "controller"=>"accounts",
                "method"=>"edit",
                "arg"=>$account["accounts"]["id"]
));?></span> | 
		<span class="btn btn-default glyphicon glyphicon-trash">
            <?php
           echo $this->Html->link("Delete", array(
                "controller"=>"accounts",
                "method"=>"delete",
                "arg"=>$account["accounts"]["id"]
            ));?>
            </span>
        </td>
			<!--<a href="<?php echo APP_URL."/accounts/edit/".$account["accounts"]["id"]; ?>">Edit</a>-->
			<!--<a href="<?php echo APP_URL."/accounts/delete/".$account["accounts"]["id"]; ?>">Delete</a>-->
		</td>
	</tr>
	<?php 
		endforeach; 
	?>
</table>
<?php endif; ?>
</div><!--cierre de tabla responsiva-->
</div><!--cierre de col-xs-12-->
</div><!--Cierre de row-->