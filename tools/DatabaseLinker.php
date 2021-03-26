<?php 

class DatabaseLinker {



	private static $url = ("mysql:host=localhost;dbname=prestachope_bdd3;");
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