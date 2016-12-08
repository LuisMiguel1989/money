<div id="login">
    <form class="form-horizontal jumbotron" action="<?php echo APP_URL."/users/login"; ?>" method="post">
    <div class="row">
    <div class="col-xs-6">
        <h3 class="text-center">Money Tracking</h3>
    </div>
    <div class="col-xs-6">
        <img src="<?php echo $_layoutParams["route_img"]; ?>/r61.png" class="img-responsive" alt="Responsive image">
    </div>
    </div>
    
        <div class="form-group">
            <label for="username" class="col-xs-12">Usuario:</label>
            <div class="col-xs-12">
                <input class="form-control" type="text" name="username">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-xs-12">Contraseña:</label>
            <div class="col-xs-12">
                <input class="form-control" type="password" name="password">
            </div>
        </div>
        <div class="form-group">
        <div class="col-xs-12">
          <input class="btn btn-success" type="submit" value="Entrar">
        </div> 
        </div>
    </form>
</div>
