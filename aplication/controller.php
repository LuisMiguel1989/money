<?php
/**
 * @author Luis Miguel Arias <leoluismiguel@gmail.com>
 * 
 * Class AppsController
 *
 * Para el manejo de los diferentes controladores
 */
abstract class AppsController
{
	protected $_view;

/**
 * index función index
 * 
 */
	abstract public function index();
/**
 * [__construct Constructor de la clase]
 */
	public function __construct(){
		$this->_view = new View(new request);
		$controller = new request();
		$className = $controller->getController();
		$this->$className = new classPDO();
	}
/**
 * redirect Usado para el redireccionamiento de las paginas
 * @param  array  $url [recibe una url por medio de un array]
 * 
 */
	public function redirect($url= array())
	{
		$path = "";

		if ($url["controller"]) {
			$path .= $url["controller"];
		}
		if ($url["method"]) {
			$path .= "/".$url["method"];
		}
		header("LOCATION: ".APP_URL."/".$path);
	}
/**
 * [set Se utiliza para mostrar los valores de las tablas que se pidan]
 * @param [String] $one [primer valor a pedir, puede ser nombre de una tabla]
 * @param [String] $two [segundo valor a pedir, puede ser nombre de una tabla]
 */
	public function set($one, $two=null){
		if (is_array($one)) {
				if (is_array($two)) {
					$data = array_combine($one, $two);
			}else {
					$data = $one;
					}
			}else {
				$data = array($one=> $two);
				}
				$this->_view->setVars($data);
	}
}
