<?php
/**
 * Class PDO
 *
 * Clase Se utiliza para gestionar la conexión a la base de datos
 */
class ClassPDO
{
	public 	$connection;
	private $dsn;
	private $drive;
	private $host;
	private $database;
	private $username;
	private $password;
	public 	$result;
	public 	$lastInsertId;
	public 	$numbersRows;

	/**
	 * [__construct Asigna los valores de la base de datos, como el tipo, dirección y base de datos a utilizar]
	 * @param string $drive    [Tipo de la base de datos a utilizar]
	 * @param string $host     [la direccion del servidor]
	 * @param string $database [nombre de la base de datos a utilizar]
	 * @param string $username [nombre de usuario de la base de datos]
	 * @param string $password [contraseña de la base de datos]
	 */
	public function __construct(
		$drive = "mysql",
		$host = "127.0.0.1",
		$database = "money",
		$username = "root",
		$password = ""
	)
	{
		$this->drive = $drive;
		$this->host = $host;
		$this->database = $database;
		$this->username = $username;
		$this->password = $password;
		$this->connection();
	}

	/**
	 * [connection genera la conexion a la base de datos]
	 * 
	 */
	public function connection()
	{
		$this->dsn = $this->drive.':host='.
		$this->host.';dbname='.$this->database;

		try
		{
			$this->connection = new PDO(
				$this->dsn,
				$this->username,
				$this->password
			);
			$this->connection->setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
			);
		}
		catch(Exception $e)
		{
			echo "ERROR: ".getMessage();
			die();
		}
	}
	
	/**
	 * [find Función utilizada para buscar en las tablas de la base de datos]
	 * @param  [string] $table   [tabla]
	 * @param  [string] $query   [Es la consulta]
	 * @param  array  $options [son las opciones que se incluiran en la consulta]
	 * @return [string]          [registros de la consulta]
	 */
	public function find($table, $query=NULL, $options=array())
	{
		$fields = "*";
		$parameters = "";

		if (!empty($options["field"])) {
			$fields = $options["field"];
		}

		if (!empty($options["conditions"])) {
			$parameters = " WHERE ".$options["conditions"];
		}

		if (!empty($options["group"])) {
			$parameters .= " GROUP BY ".$options["group"];
		}

		if (!empty($options["order"])) {
			$parameters .= " ORDER BY ".$options["order"];
		}

		if (!empty($options["limit"])) {
			$parameters .= " LIMIT ".$options["limit"];
		}

		if (!empty($options["columna"])) {
			$parameters .= "amount";
		}

		switch ($query) {
			case 'all':
                all:
				$sql = "SELECT $fields FROM $table".$parameters;
				$this->result = $this->connection->query($sql);

				foreach (range(0, $this->result->columnCount() -1) as $column_index) {
					$meta[] = $this->result->getColumnMeta($column_index);
				}

				$records = $this->result->fetchAll(PDO::FETCH_NUM);

				for($i=0; $i < count($records); $i++){
					$j = 0;
					foreach ($meta as $value) {
						$rows[$i][$value["table"]][$value["name"]] = $records[$i][$j]; 
						$j++;
					}
				}
                if(!empty($rows)){
                    $this->result= $rows;
                }
				break;

			case 'first':
				$sql = "SELECT $fields FROM $table".$parameters;
				$result = $this->connection->query($sql);
				$this->result = $result->fetch();
				break;

			case "count":
				$sql = "SELECT COUNT(*) FROM $table " .$parameters;
				$result = $this->connection->query($sql);
				$this->result = $result->fetchColumn();
			break;

			case "suma":
				$sql = "SELECT SUM($parameters) FROM $table ";
				$result = $this->connection->query($sql);
				$this->result = $result->fetchColumn();
			break;
			
			default:
				goto all;
		}

		return $this->result;

	}

	/**
	 * [save Funcion para guardar los registros]
	 * @param  [string] $table [nombre de la tabla en BD]
	 * @param  array  $data  [valores a guardar]
	 * @return [string]        [consulta a guardar]
	 */
	public function save($table, $data = array())
	{
		$sql = "SELECT * FROM $table;";
		$result = $this->connection->query($sql);

		for ($i=0; $i < $result->columnCount(); $i++) { 
			$meta = $result->getColumnMeta($i);
			$fields[$meta["name"]] = NULL;
		}

		$fieldsToSave = "id";
		$valueToSave = "NULL";

		foreach ($data as $key => $value) {
			if (array_key_exists($key, $fields)) {
				$fieldsToSave .= ", ".$key;
				$valueToSave .= ", "."\"$value\"";
			}
		}
		$sql = "INSERT INTO $table ($fieldsToSave) VALUES ($valueToSave);";
		$this->result = $this->connection->query($sql);
		return $this->result;
	}

	/**
	 * [update actualizar registros en la BD]
	 * @param  [string] $table [nombre de la tabla]
	 * @param  array  $data  [datos a actualizar]
	 * @return [String]        [query para actualizar registros]
	 */
	public function update($table, $data = array())
	{
		$sql = "SELECT * FROM $table;";
		$result = $this->connection->query($sql);

		for ($i=0; $i < $result->columnCount(); $i++) { 
			$meta = $result->getColumnMeta($i);
			$fields[$meta["name"]] = NULL;
		}

		if(array_key_exists("id", $data)){
			$fieldsToSave = "";
			$id = $data["id"];
			unset($data["id"]);

			foreach ($data as $key => $value) {
				if(array_key_exists($key, $fields)){
					$fieldsToSave .= $key."="."\"$value\", ";
				}
			}
			$fieldsToSave = substr_replace($fieldsToSave, "", -2);
			$sql = "UPDATE $table SET $fieldsToSave WHERE $table.id=$id;";
		}

		$this->result = $this->connection->query($sql);
		return $this->result;
	}

	/**
	 * [delete Funcion para eliminar registros]
	 * @param  [string] $table      [nombre de la tabla]
	 * @param  [int] $conditions [identificador de la tabla]
	 * @return [String] [string de la consulta]
	 */
	public function delete($table, $conditions){
        $sql = "DELETE FROM $table WHERE $conditions";
        $this->result = $this->connection->query($sql);
        return $this->result;
	}
}