<div class="row">
    <div class="col-xs-12">
        <blockquote>
          <h3>Editar cuenta</h3>
        </blockquote>
    </div>
</div>

<form class="form-horizontal" action="<?php echo APP_URL."/accounts/edit"; ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $account["id"]; ?>">
    <div class="form-group">
    	<label class="col-xs-12" for="user_id">Username:</label>
        <div class="col-xs-12">
        <select class="form-control" name="user_id" id="user_id">
            <?php 
            foreach ($users as $user):
                if ($user["users"]["id"] == $account["user_id"]) {
            ?>
                <option selected value="<?php echo $user["users"]["id"]; ?>">
                    <?php echo $user["users"]["username"]; ?>
                </option>
            <?php 
                } else {
            ?>
                <option value="<?php echo $user["users"]["id"]; ?>">
                    <?php echo $user["users"]["username"]; ?>
                </option>
            <?php
                }
                endforeach;
            ?>
        </select>
        </div>
    </div>
   
    <div class="form-group">
        <label class="col-xs-12" for="name">name:</label>
        <div class="col-xs-12">
        <input class="form-control" type="text" name="name" value="<?php echo $account["name"]; ?>">
        </div>
    </div>

    <div class="form-group">
    <div class="col-xs-12">
        <input class="btn btn-success" type="submit" value="Guardar">
    </div>
    </div>
    
</form>