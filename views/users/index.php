<div class="row">
	<div class="col-xs-12">
		<blockquote>
		  <h3>Listado de usuarios</h3>
		</blockquote>
	</div>
</div>

<div class="row">
	<ul class="nav nav-pills" role="tablist">
	  
	  <li role="presentation"><a href="#">Número de usuarios <span class="badge"><?php echo $usersCount; ?></span></a>
	  </li>
	  <li role="presentation" class="active">
	  	<a class="btn btn-primary" href="users/add"><span class="glyphicon glyphicon-user"></span>  Agregar usuario</a>
	  </li>
	</ul>
</div>
<br>
<br>
<div class="row">
<div class="col-xs-12">
<div class="table-responsive">
<?php if(!empty($users)): ?>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th class="text-center">No</th>
		<th class="text-center">Usuario</th>
		<th class="text-center">Contraseña</th>
		<th class="text-center">Tipo</th>
		<th class="text-center">Opciones</th>
	</tr>
	<?php
		foreach ($users as $user): 
	?>
	<tr>
		<td class="text-center"><?php echo $user["users"]["id"]; ?></td>
		<td><?php echo $user["users"]["username"]; ?></td>
		<td><?php echo $user["users"]["password"]; ?></td>
		<td><?php echo $user["types"]["name"]; ?></td>
		<td class="text-center">
		<span class="btn btn-default glyphicon glyphicon-edit">
            <?php
            echo $this->Html->link("Editar", array(
                "controller"=>"users",
                "method"=>"edit",
                "arg"=>$user["users"]["id"]
));?></span> |
		<span class="btn btn-default glyphicon glyphicon-trash">
            <?php
           echo $this->Html->link("Eliminar", array(
                "controller"=>"users",
                "method"=>"delete",
                "arg"=>$user["users"]["id"]
            ));?>
        </span>
        </td>
			<!--<a href="<?php echo APP_URL."/users/edit/".$user["users"]["id"]; ?>">Edit</a>-->
			<!--<a href="<?php echo APP_URL."/users/delete/".$user["users"]["id"]; ?>">Delete</a>-->
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

