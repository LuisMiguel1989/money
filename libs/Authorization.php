<?php
/**
 * Class Authorization
 *
 * Clase que permite la autorizacion de acceder a los usuarios
 */
class Authorization
{
/**
 * [logged Funcion para crear la sesion]
 * 
 */
	static function logged(){
		session_start();
		if (!$_SESSION["logged"]) {
			header("Location: ".APP_URL."/users/login");
			exit;
		}
	}
/**
 * [login funcion para el inicio de sesion]
 * @param  [String] $user [Nombre del usuario]
 * @return [type]       [description]
 */
	public function login($user){
		session_start();
		$_SESSION["logged"] = true;
		$_SESSION["username"] = $user["username"]; 
		$_SESSION["type_name"] = $user["type_name"];
		$_SESSION["start"] = time(); 
		$_SESSION["expire"] = $_SESSION["start"] + (5 * 60); 
	}
/**
 * [logout Funcion para cerrar sesion]
 * @return [type] [description]
 */
	public function logout(){
		session_unset();

		session_destroy();

		echo "
			<script type='text/javascript'>
			alert('Ha salido correctamente');
			window.location='http://localhost/money/users/login';
			</script>
		";
	}
}