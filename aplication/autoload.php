
<?php
/**
 * __autoload Este archivo sirve para cargar las clases
 * @param  array $className Nombre de la clase
 * @return String            Ruta de la 
 */
function __autoload($className){
    require_once(ROOT."libs".DS.$className.".PHP");
}