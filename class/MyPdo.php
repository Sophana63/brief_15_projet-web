<?php

class MyPDO {
	private $db;
	private $login;
	private $pass;
	private $connec;
	private $header;

	public function __construct(string $header = null, $db = 'exam_PDO', $login ='root', $pass=''){
		$this->login = $login;
		$this->pass = $pass;
		$this->db = $db;
		$this->header = $header;
		$this->connexion();
	}

	private function connexion(){
		try
		{
	         $bdd = new PDO(
                            'mysql:host=localhost;dbname='.$this->db.';charset=utf8mb4', 
                             $this->login, 
                             $this->pass
                 );
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			$this->connec = $bdd;
		}
		catch (PDOException $e)
		{
			$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
			die($msg);
		}
	}

	public function reqFetchAll($sql,Array $cond = null){
		$stmt = $this->connec->prepare($sql);

		if($cond){
			foreach ($cond as $v) {
				$stmt->bindParam($v[0],$v[1],$v[2]);
			}
		}

		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->closeCursor();
		$stmt=NULL;
	}

	public function reqFetch($sql,Array $cond = null){
		$stmt = $this->connec->prepare($sql);

		if($cond){
			foreach ($cond as $v) {
				$stmt->bindParam($v[0],$v[1],$v[2]);
			}
		}

		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
		$stmt->closeCursor();
		$stmt=NULL;
	}

	public function reqExe($sql,Array $cond = null){
		$stmt = $this->connec->prepare($sql);

		if($cond){
			foreach ($cond as $v) {
				$stmt->bindParam($v[0],$v[1],$v[2]);
			}
		}

		$stmt->execute();
		$stmt->closeCursor();
		$stmt=NULL;
		header("Location: " .$this->header);
	}


}

?>