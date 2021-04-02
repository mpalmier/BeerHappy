<?php 

class DatabaseLinker {



	private static $url = ("mysql:host=localhost;dbname=prestachopebdd4;");
	private static $username = 'root';
	private static $password = 'root';
	private static $connect ;

	public static function getConnexion(){
		if (is_null(DatabaseLinker::$connect)){
			DatabaseLinker::$connect = new PDO(DatabaseLinker::$url,DatabaseLinker:: $username,DatabaseLinker:: $password);
			
		}
		return DatabaseLinker::$connect;
	}

	
}



 ?>