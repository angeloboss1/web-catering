<?php
// used to get mysql database connection
class Database{

	// specify your own database credentials
	private $host = "localhost:3306";
	private $db_name = "catering_admin";
	private $username = "catering_logins";
	private $password = "Drew2019@";
	public $conn;

	// get the database connection
	public function getConnection(){

		$this->conn = null;

		try{
			$this->conn = new PDO($this->db_name, $this->username, $this->password);
		}catch(PDOException $exception){
			echo "Connection error: " . $exception->getMessage();
		}

		return $this->conn;
	}

}
?>
