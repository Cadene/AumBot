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


    public function addGirl($id){
        $sql = "INSERT INTO Girls (id) VALUES ($id)";
        $insert = $this->bdd->prepare($sql);
        $insert->execute();
        return $this->bdd->lastInsertId();
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
		$sql = "INSERT INTO Members ($keys) VALUES ($values)";
		$insert = $this->bdd->prepare($sql);
		$insert->execute();
		return $this->bdd->lastInsertId();
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
        $sql = "INSERT INTO Profils ($keys) VALUES ($values)";
        //print_r($sql);
        $insert = $this->bdd->prepare($sql);
        $insert->execute();
        return $this->bdd->lastInsertId();
    }


	public function indexMembers(){
		$select = $this->bdd->prepare("SELECT id FROM Members");
		$select->execute();
		while($fetch = $select->fetch(PDO::FETCH_ASSOC)){
			$rslt[] = $fetch;
		}
		return $rslt;
	}


	
	
		
	
}