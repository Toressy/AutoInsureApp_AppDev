<?php
/*
  Author : Mohamed Aimane Skhairi
  Email : skhairimedaimane@gmail.com
  Repo : https://github.com/medaimane/crud-php-pdo-bootstrap-mysql
*/

/*
	Table tbl_articles : 

	@var id  primary key
	@var title varchar
	@var content text

*/

	

class ArticlesCrud{

	private $connection;

	private $host = 'localhost';
	private $db = 'cake';
	private $user = 'root';
	private $pass = '';

	public function __construct(){
		$this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db);

		if ($this->connection->connect_error) {
			die("Connection failed: " . $this->connection->connect_error);
		}
	}

	public function getConnection(){
		return $this->connection;
	}

	public function add(){
		$sql = "INSERT INTO tbl_articles (title, content) VALUES (?, ?)";
		$stmt = $this->connection->prepare($sql);
		$stmt->bind_param("ss", $title, $content);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function view($id = null){

	}

	public function edit($id = null){

	}

	public function delete($id = null){

	}


}





?>