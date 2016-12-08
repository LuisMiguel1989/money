<div class="row">
    <div class="col-xs-12">
        <blockquote>
          <h3>Agregar Usuario</h3>
        </blockquote>
    </div>
</div>

<form class="form-horizontal" action="<?php echo APP_URL."/users/add"; ?>" method="POST">
  <div class="form-group">
        <label for="username" class="col-xs-12">Nombre de usuario:</label>
        <div class="col-xs-12">
            <input type="text" class="form-control" id="username" name="username">
        </div>
  </div>
  <div class="form-group" >
      <label for="password" class="col-xs-12">Password:</label>
      <div class="col-xs-12">
        <input type="password" class="form-control" name="password" id="password">
    </div>
  </div>
    <div class="form-group" >
        <label for="type_id" class="col-xs-12">Types</label>
        <div class="col-xs-12">
        <select class="form-control" name="type_id" id="type_id">
            <?php
            foreach ($types as $type):?>
            <option value="<?php echo $type["types"]["id"];?>">
                <?php echo $type ["types"] ["name"];?>
            </option>
            <?php endforeach;?>
        </select>
        </div>
    </div>
    <div class="form-group">
    <div class="col-xs-12">
      <input class="btn btn-success" type="submit" value="Guardar">
    </div> 
    </div>
</form>
