<div class="row">
	<div class="col-xs-12">
		<blockquote>
		  <h3>Lista de categorias</h3>
		</blockquote>
	</div>
</div>

<div class="row">
	<ul class="nav nav-pills" role="tablist">
	  
	  <li role="presentation"><a href="#">Número de categorias <span class="badge"><?php echo $categoryCount; ?></span></a>
	  </li>
	  <li role="presentation" class="active">
	  	<a class="btn btn-primary" href="categories/add"><span class="glyphicon glyphicon-user"></span>  Agregar categoria</a>
	  </li>
	</ul>
</div>
<br>
<br>
<div class="row">
<div class="col-xs-12">
<div class="table-responsive">
<?php if(!empty($categories)): ?>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th class="text-center">No</th>
		<th class="text-center">Nombre</th>
		<th class="text-center">Opciones</th>
	</tr>
	<?php
		foreach ($categories as $category): 
	?>
	<tr>
		<td class="text-center"><?php echo $category["categories"]["id"]; ?></td>
		<td><?php echo $category["categories"]["name"]; ?></td>
		
		<td class="text-center">
		<span class="btn btn-default glyphicon glyphicon-edit">
            <?php
            echo $this->Html->link("Edit", array(
                "controller"=>"categories",
                "method"=>"edit",
                "arg"=>$category["categories"]["id"]
));?></span> | 
			<span class="btn btn-default glyphicon glyphicon-trash">
            <?php
           echo $this->Html->link("Delete", array(
                "controller"=>"categories",
                "method"=>"delete",
                "arg"=>$category["categories"]["id"]
            ));?>
            </span>
        </td>
			<!--<a href="<?php echo APP_URL."/categories/edit/".$category["categories"]["id"]; ?>">Edit</a>-->
			<!--<a href="<?php echo APP_URL."/categories/delete/".$category["categories"]["id"]; ?>">Delete</a>-->
		</td>
	</tr>
	<?php 
		endforeach; 
	?>
</table>
<?php endif; ?>