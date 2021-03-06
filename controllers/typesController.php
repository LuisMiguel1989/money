<?php
/**
 * Class accountsController
 *
 * Clase que implementa las funciones para los tipos de usuarios
 */
cLass typesController extends AppsController
{
/**
 * [__construct constructor de la clase]
 */
  public function __construct(){
    parent::__construct();
  }
/**
 * [index Funcion para llenar registros de la vista index]
 * @return [array] [Registros de la consulta]
 */
  public function index(){
    $this->set("types", $this->types->find("types",  "all"));
    $this->set("typeCount", $this->types->find("types", "count"));
  }
/**
* [add Funcion para agregar registros a la tabla]
*/
  public function add(){
    if ($_SESSION["type_name"]=="Administradores") {
      if ($_POST) {
      include_once(ROOT."libs".DS."password.php");
      $pass = new password();
      $_POST["password"] = $pass->getPassword($_POST["password"]);
      //print_r($_POST);
      if ($this->types->save("types", $_POST)) {
        $this->redirect(array("controller"=>"types"));
      }else{
        $this->redirect(array("controller"=>"types", "method"=>"add"));
      }
    }
      
      $this->set("types", $this->types->find("types"));
      $this->_view->setView("add");
    }else{
      $this->redirect(array("controller"=>"types"));
    }
  }  
/**
* [edit Funcion para editar registros]
* @param  [int] $id [identificador del registro]
* @return [string]     [consulta]
*/
  public function edit($id){
      if ($id) {
        $options = array(
          "conditions" => "id=".$id
        );
        $type = $this->types->find("types","first", $options);
        $this->set("type", $type);
          $this->set("types", $this->types->find("types"));
      }

      if($_POST){
        if(!empty($_POST["newPassword"])){
            $pass =new Password();
            $_POST["password"] = $pass->getPassword($_POST[password]);
        }
        if ($this->types->update("types", $_POST)){
          $this->redirect(
            array(
              "controller"=>"types"
              )
          );
        }else{
          $this->redirect(
            array(
              "controller"=>"types",
              "method"=>"edit/".$_POST["id"]
            )
          );
        }
        
      }
  }

/**
 * [delete funcion para eliminar registros]
 * @param  [type] $id [identificador de la tabla]
 * 
 */ 
    public function delete($id){
        $conditions = "id=".$id;
      if(  $this->types->delete("types",$conditions)){
          $this->redirect(array("controller"=>"types"));
      }else{
          $this->redirect(array("controller"=>"types","method"=>"add"));
      }
    }
}
