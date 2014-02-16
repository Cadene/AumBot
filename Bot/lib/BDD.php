<?php

date_default_timezone_set('UTC');

include_once('config/database.php');

/*
 * Base de donnée MySQL
 *
 */

class BDD{
	
	protected $bdd;
	
	public function __construct(
		$hote=DATABASE_hote,
		$port=DATABASE_port,
		$name=DATABASE_nom_bd,
		$user=DATABASE_utilisateur,
		$pass=DATABASE_mot_passe
	){
		try {
			$bdd = new PDO('mysql:host='.$hote.';dbname='.$name, $user, $pass);
			$bdd->exec("set names utf8");
			$this->bdd = $bdd;
		}
		catch(Exception $e){
			echo 'Erreur : '.$e->getMessage().'<br />';
			echo 'N�� : '.$e->getCode();
		}
	}
	
	
	public function addMember($member){
		$keys = '';
		$values = '';
		$isFirst = true;
		foreach($member as $k=>$v){
			if($isFirst){
				$keys .= '`datetime`';
				$date = new DateTime();
				$values .= '\''.$date->getTimestamp().'\'';
				$isFirst = false;
			}
			$keys .= ',`'.$k.'`';
			$values .= ',\''.$v.'\'';
		}
		$sql = "INSERT INTO `Members` ($keys) VALUES ($values)";
		$insert = $this->bdd->prepare($sql);
		return $insert->execute();
		//return $this->bdd->lastInsertId();
	}

	public function indexMembers(){
		$select = $this->bdd->prepare("SELECT id FROM `Members`");
		$select->execute();
		while($fetch = $select->fetch(PDO::FETCH_ASSOC)){
			$rslt[] = $fetch;
		}
		return $rslt;
	}

	public function addProfil($profil){
		$keys = '';
		$values = '';
		$isFirst = true;
		foreach($profil as $k=>$v){
			if($isFirst){
				$keys .= '`datetime`';
				$date = new DateTime();
				$values .= '\''.$date->getTimestamp().'\'';
				$isFirst = false;
			}
			$keys .= ',`'.$k.'`';
			$values .= ',\''.$v.'\'';
		}
		$sql = "INSERT INTO `Profils` ($keys) VALUES ($values)";

		echo $sql;

		$insert = $this->bdd->prepare($sql);
		return $insert->execute();
		//return $this->bdd->lastInsertId();
	}
	
	public function enregistrerUser($name,$pass,$mail,$ip,$cle){
		$insert = $this->bdd->prepare("INSERT INTO `User` (`name`,`pass`,`mail`,`ip`,`cle`) VALUES (:name,:pass,:mail,:ip,:cle)");
		$insert->bindParam(':name', $name);
		$insert->bindParam(':pass', $pass);
		$insert->bindParam(':mail', $mail);
		$insert->bindParam(':ip', $ip);
		$insert->bindParam(':cle', $cle);
		$insert->execute();
		return $this->bdd->lastInsertId();
	}
	
	/** validation.php **/
	
	public function selectKeyAndValid($id){
		$select = $this->bdd->prepare("SELECT cle,is_valid FROM `User` WHERE id = :id");
		$select->bindParam(':id', $id);
		$select->execute();
		return $select->fetch(PDO::FETCH_ASSOC);
	}
	
	public function updateValid($id){
		$update = $this->bdd->prepare("UPDATE `User` SET is_valid = 1 WHERE id = :id");
		$update->bindParam(':id', $id);
		$update->execute();
	}
	
	/** loginvalid.php **/
	
	public function selectIdNamePassFromUserWhereNameEqual($name){
		$select = $this->bdd->prepare("SELECT id,name,pass FROM `User` WHERE name = :name");
		$select->bindParam(':name', $name);
		$select->execute();
		return $select->fetch(PDO::FETCH_ASSOC);	
	}
	
	/** RaidlistBDD.php **/
	
	public function insertVillagesNames($string){
		$insert = $this->bdd->prepare("
				INSERT INTO CmpRaidlist (name)
				VALUES $string
			");
		$insert->execute();
	}
	
	public function selectVillagesNames(){
		$select = $this->bdd->prepare("
				SELECT name
				FROM CmpRaidlist
			");
		$select->execute();
		return $select->fetchAll(PDO::FETCH_ASSOC);
	}
	
	
		
	
}