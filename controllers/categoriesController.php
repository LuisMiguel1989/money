<?php
/**
 * Class accountsController
 *
 * Clase que implementa las funciones para las categorias
 */
cLass categoriesController extends AppsController
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
    $this->set("categories", $this->categories->find("categories",  "all"));
    $this->set("categoryCount", $this->categories->find("categories", "count"));
  }

/**
* [add Funcion para agregar registros a la tabla]
*/
  public function add(){
      if ($_POST) {
      include_once(ROOT."libs".DS."password.php");
      $pass = new password();
      $_POST["password"] = $pass->getPassword($_POST["password"]);
      //print_r($_POST);
      if ($this->categories->save("categories", $_POST)) {
        $this->redirect(array("controller"=>"categories"));
      }else{
        $this->redirect(array("controller"=>"categories", "method"=>"add"));
      }
    }
      
      $this->set("categories", $this->categories->find("categories"));
      $this->_view->setView("add");
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
        $category = $this->categories->find("categories","first", $options);
        $this->set("category", $category);
          $this->set("categories", $this->categories->find("categories"));
      }

      if($_POST){
        if(!empty($_POST["newPassword"])){
            $pass =new Password();
            $_POST["password"] = $pass->getPassword($_POST[password]);
        }
        if ($this->categories->update("categories", $_POST)){
          $this->redirect(
            array(
              "controller"=>"categories"
              )
          );
        }else{
          $this->redirect(
            array(
              "controller"=>"categories",
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
      if(  $this->categories->delete("categories",$conditions)){
          $this->redirect(array("controller"=>"categories"));
      }else{
          $this->redirect(array("controller"=>"categories","method"=>"add"));
      }
    }
}
