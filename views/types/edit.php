<div class="row">
    <div class="col-xs-12">
        <blockquote>
          <h3>Editar tipo de usuario</h3>
        </blockquote>
    </div>
</div>

<form class="form-horizontal" action="<?php echo APP_URL."/types/edit"; ?>" method="POST">
	<input type="hidden" name="id" value="<?php echo $type["id"]; ?>">

    <div class="form-group">
        <label for="name" class="col-xs-12">Nombre:</label>
        <div class="col-xs-12">
        	<input class="form-control" type="text" name="name" value="<?php echo $type["name"]; ?>">
        </div>
    </div>

    <div class="form-group">
    <div class="col-xs-12">
      <input class="btn btn-success" type="submit" value="Guardar">
    </div> 
</div> 

</form>
