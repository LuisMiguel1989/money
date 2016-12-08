<div class="row">
	<div class="col-xs-12">
		<blockquote>
		  <h3>Listado de transacciones</h3>
		</blockquote>
	</div>
</div>

<div class="row">
	<ul class="nav nav-pills" role="tablist">
	  
	  <li role="presentation"><a href="#">Número de transacciones <span class="badge"><?php echo $transactionCount; ?></span></a>
	  </li>
	  <li role="presentation"><a href="#">Total: <span class="badge">$ <?php echo number_format($transactionsSuma, 2, '.',','); ?></span></a>
	  </li>
	  <li role="presentation" class="active">
	  	<a class="btn btn-primary" href="transactions/add"><span class="glyphicon glyphicon-user"></span>  Agregar transaccion</a>
	  </li>
	</ul>
</div>
<br>
<br>
<div class="row">
<div class="col-xs-12">
<div class="table-responsive">
<?php if(!empty($transactions)): ?>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th class="text-center">No</th>
		<th class="text-center">Cuenta</th>
		<th class="text-center">Categoria</th>
		<th class="text-center">Descripción</th>
		<th class="text-center">Fecha</th>
		<th class="text-center">Cantidad</th>
		<th class="text-center">Opciones</th>
	</tr>
	<?php
		foreach ($transactions as $transaction): 
			$date = date_create($transaction["transactions"]["date"]);
			$amount = $transaction["transactions"]["amount"];

			if ($transaction["transactions"]["amount"]<0){
				$s = "$"; //se puede colocar el signo de menor
				$amount = number_format($amount, 2);
				$amount = '<div style= "color:red">&nbsp;'.$s.$amount.'<div>';
			}else{
				$s = "$";
				$amount = number_format($amount, 2);
				$amount = '<div style= "color:green">&nbsp;'.$s.$amount.'<div>';
			}
			?>
	<tr>
		<td class="text-center"><?php echo $transaction["transactions"]["id"]; ?></td>
		<td><?php echo $transaction["accounts"]["name"]; ?></td>
		<td><?php echo $transaction["categories"]["name"]; ?></td>
		<td><?php echo $transaction["transactions"]["description"]; ?></td>
		<td class="text-right"><?php echo date_format($date, 'd/m/Y'); ?></td>
		<td class="text-right"><?php echo "<b>".$amount."</b>"; ?></td>
		<td class="text-right">
		<span class="btn btn-default glyphicon glyphicon-edit">
            <?php
            echo $this->Html->link("Edit", array(
                "controller"=>"transactions",
                "method"=>"edit",
                "arg"=>$transaction["transactions"]["id"]
));?></span> | 
		<span class="btn btn-default glyphicon glyphicon-trash">
            <?php
           echo $this->Html->link("Delete", array(
                "controller"=>"transactions",
                "method"=>"delete",
                "arg"=>$transaction["transactions"]["id"]
            ));?>
            </span>
        </td>
			<!--<a href="<?php echo APP_URL."/transactions/edit/".$transaction["transactions"]["id"]; ?>">Edit</a>-->
			<!--<a href="<?php echo APP_URL."/transactions/delete/".$transaction["transactions"]["id"]; ?>">Delete</a>-->
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