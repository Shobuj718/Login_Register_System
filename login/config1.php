<?php
	
	class DatabaseConnection{
		public function __construct(){
		global $pdo;
		try{
		$pdo = new PDO('mysql:host=localhost;dbname=oopreg','root','');
		}
		catch(PDOExceptin $e){
			exit('Database error');
		}

  	}

}

?>