<?php
/**
 * Class View
 *
 * Para el manejo de las diferentes vistas de la aplicación
 */
class View
{
  private $_controller;
  private $_method;
  private $_view;
  private $_layout = DEFAULT_LAYOUT;
  private $viewsVars;

  public function __construct(request $p){
    $this->_controller = $p->getController();
    $this->_method = $p->getMethod();
    $this->_view = $this->_method;
    $this->Html = new Html();
  }
/**
 * [setVars Para manejo de las direcciones de la vista]
 * 
 */
public function setVars($vars){
    if(empty($this->viewsVars)){
        $this->viewsVars = $vars;
    }else {
        $this->viewsVars = array_merge($this->viewsVars, $vars);
        
    }
}
/**
 * [setLayout Para determinar que vista debe mostrar]
 * @param [String] $layout [nombre de la vista]
 */
    public function setLayout($layout){
        $this->_layout=$layout;
    }
/**
 * [setView Para mostrar la vista seleccionada]
 * @param [String] $view [nombre de la vista]
 */
    public function setView($view){
        $this->_view=$view;
    }
/**
 * [render Sirve para el manejo de las vistas]
 * @param  [String] $view [nombre de la vista]
 * @return [String]       [direccion url de la vista]
 */
  public function render($view){
    if (!empty($this->viewsVars)) {
      extract($this->viewsVars, EXTR_OVERWRITE);
    }

    $_layoutParams = array(
      "route"     =>APP_URL."/views/layouts/".$this->_layout,
      "route_css" =>APP_URL."/views/layouts/".$this->_layout."/css",
      "route_img" =>APP_URL."/views/layouts/".$this->_layout."/img",
      "route_js"  =>APP_URL."/views/layouts/".$this->_layout."/js"
    );

    $routeView = ROOT."views".DS.$this->_controller.DS.$view.".php";
  	$header = ROOT."views".DS."layouts".DS.$this->_layout.DS."header.phtml";
  	$footer = ROOT."views".DS."layouts".DS.$this->_layout.DS."footer.phtml";

  	if (file_exists($routeView)) {
      require_once($header);
  		require_once($routeView);
      require_once($footer);
  	}else{
  		throw new Exception("Error de vista");
  	}
  }
/**
 * [__destruct destructor de la clase]
 */
  public function __destruct(){
    $this->render($this->_view);
  }
}
