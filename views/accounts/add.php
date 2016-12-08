<div class="row">
    <div class="col-xs-12">
        <blockquote>
          <h3>Agregar cuenta</h3>
        </blockquote>
    </div>
</div>

<form class="form-horizontal" action="<?php echo APP_URL."/accounts/add"; ?>" method="POST">
    <div class="form-group" >
        <label for="user_id" class="col-xs-12">Usuario</label>
        <div class="col-xs-12">
        <select class="form-control" name="user_id" id="user_id">
            <?php
            foreach ($users as $user):?>
            <option value="<?php echo $user["users"]["id"];?>">
                <?php echo $user ["users"] ["username"];?>
            </option>
            <?php endforeach;?>
        </select>
        </div>
    </div>

    <div class="form-group" >
        <label for="name" class="col-xs-12">Nombre:</label>
        <div class="col-xs-12">
        <input class="form-control" type="text" name="name">
        </div>
    </div>
    
    <div class="form-group">
    <div class="col-xs-12">
      <input class="btn btn-success" type="submit" value="Guardar">
    </div> 
    </div>

</form>
