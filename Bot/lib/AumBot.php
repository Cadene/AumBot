<?php


include_once('lib/BDD.php');
include_once('lib/ChromeCli.php');

include_once('config/aum.php');

/*
 * Bot Adopte Un mec
 *
 */

class AumBot{
	
	protected $db;
	protected $tab_id;

	protected $email;
	protected $password;
	
	public function __construct($email=AUM_email,$password=AUM_password) {
		$this->email = $email;
		$this->password = $password;
	}

	public function setDB($db) {
		$this->db = $db;
	}

	public function closeAllOpen(){
		$subject = ChromeCli::listTabs();
		$tabs_id = $this->recoverTabsId();
		if($tabs_id){
			ChromeCli::close($tabs_id);
		}
	}

	public function login(){
		$url = AUM_url;
		ChromeCli::open($url);
		sleep(1);
		$this->tab_id = $this->recoverTabsId();
		if(!$this->isLogged()){
			$js='document.getElementById("mail").value = "'.$this->email.'";
				 document.getElementById("password").value = "'.$this->password.'";
				 document.getElementById("login").submit();';
			ChromeCli::execute($this->tab_id,$js);
		}
	}

	private function isLogged(){
		$subject = ChromeCli::source($this->tab_id);
		$pattern = '/<form action="http:\/\/www.adopteunmec.com\/\/auth\/login"/';
		preg_match($pattern, $subject, $matches);
		if(empty($matches)){
			return true;
		}
		return false;
	}

	private function recoverTabsId(){
		$subject = ChromeCli::listTabs();
		$pattern = '/([0-9]{1,4})] Rencontre au supermarché des femmes/';
		preg_match_all($pattern, $subject, $matches);
		print_r($matches);
		if(empty($matches) || empty($matches[1])){
			return null;
		}
		if(count($matches[1]) == 1){
			return $matches[1][0];
		}
		return $matches[1];
	}
	
		
	
}