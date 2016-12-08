<div class="row">
    <div class="col-xs-12">
        <blockquote>
          <h3>Agregar Transaccion</h3>
        </blockquote>
    </div>
</div>

<form class="form-horizontal" action="<?php echo APP_URL."/transactions/add"; ?>" method="POST">
    <div class="form-group">
        <label class="col-xs-12" for="operation">Operation:</label>
        <div class="col-xs-12">
        <select class="form-control" name="operation" id="operation">
            <option value="egreso">Egreso</option>
            <option value="ingreso">Ingreso</option>
        </select>
        </div>
    </div>

    <div class="form-group">  
        <label class="col-xs-12" for="account_id">Cuenta</label>
        <div class="col-xs-12">
        <select class="form-control" name="account_id" id="account_id">
            <?php
            foreach ($accounts as $account):?>
            <option value="<?php echo $account["accounts"]["id"];?>">
                <?php echo $account ["accounts"] ["name"];?>
            </option>
            <?php endforeach;?>
        </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-12" for="category_id">Categoria</label>
        <div class="col-xs-12">
        <select class="form-control" name="category_id" id="category_id">
            <?php
            foreach ($categories as $category):?>
            <option value="<?php echo $category["categories"]["id"];?>">
                <?php echo $category ["categories"] ["name"];?>
            </option>
            <?php endforeach;?>
        </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-12" for="description">Descripción:</label>
        <div class="col-xs-12">
        <input class="form-control" type="text" name="description">
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-12" for="date">Fecha:</label>
        <div class="col-xs-12">
        <input class="form-control" type="date" name="date">
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-12" for="amount">Cantidad:</label>
        <div class="col-xs-12">
        <input class="form-control" type="text" name="amount">
        </div>
    </div>

    <div class="form-group">
    <div class="col-xs-12">
      <input class="btn btn-success" type="submit" value="Guardar">
    </div> 
    </div>

</form>
