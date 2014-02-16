<?php


include_once('lib/BDD.php');
include_once('lib/ChromeCli.php');
include_once('lib/SimpleHtmlDom/simple_html_dom.php');

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

	public function init(){
		$url = AUM_url;
		ChromeCli::open($url);
		sleep(1);
		$this->tab_id = $this->recoverTabsId();
		if(!$this->isLogged()){
			$js='document.getElementById("mail").value = "'.$this->email.'";
				 document.getElementById("password").value = "'.$this->password.'";';
			ChromeCli::execute($this->tab_id,$js);
			sleep(1);
			$js='document.getElementById("login").submit();';
			ChromeCli::execute($this->tab_id,$js);
		}
		sleep(4);
	}

	public function recoverAllGirls(){
		//$js = 'document.location.href = "http://www.adopteunmec.com/mySearch";';
		//ChromeCli::execute($this->tab_id,$js);
		$this->closeAllOpen();
		ChromeCli::open("http://www.adopteunmec.com/mySearch");
		sleep(1);
		$this->tab_id = $this->recoverTabsId();
		sleep(1);
		$js = 'document.getElementById("search-form").submit();';
		ChromeCli::execute($this->tab_id,$js);
		sleep(1);
		$i=1;
		while($members = $this->recoverMembers($i)){
			print_r($members);
			$members = $members['members'];
			foreach($members as $m) {
				$this->db->addMember($m);
			}
			$i++;
			sleep(2);
		}
	}

	public function queryAllGirls(){
		$members_id = $this->db->indexMembers();
		print_r($members_id);
		foreach($members_id as $member_id){
			$this->queryGirl($member_id['id']);
		}
	}

	public function queryGirl($id){
		//$js = 'document.location.href = "http://www.adopteunmec.com/profile/"'.$id.';';
		//ChromeCli::execute($this->tab_id,$js);
		$this->closeAllOpen();
		ChromeCli::open("http://www.adopteunmec.com/profile/".$id);
		sleep(1);
		$this->tab_id = $this->recoverTabsId();
		sleep(1);
		$html = new simple_html_dom();
		$html->load(ChromeCli::source($this->tab_id));
		//$left = $html->find('#left-content');
		$left = $html->getElementById('left-content');
		$right = $html->getElementById('right-content');
		//echo $left[0]->plaintext;
		//$right = $html->find('#right-content');
		//echo $right[0]->save();
		$profil = array();
		$profil['member_id'] = $id;
		$profil['left-content'] = addslashes($left);// = "test'' ";
		$profil['right-content'] = addslashes($right);// = "test";
		$this->db->addProfil($profil);
		sleep(1);

	}

	private function recoverMembers($page){
		$js = 'location.href = "http://www.adopteunmec.com/mySearch/?page='.$page.'";';
		ChromeCli::execute($this->tab_id,$js);
		$subject = ChromeCli::source($this->tab_id);
		$pattern = '/var members = (\{.+\})/';
		preg_match($pattern, $subject, $matches);
		if(empty($matches)){
			return null;
		}
		return json_decode($matches[1],true);
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
		if(empty($matches) || empty($matches[1])){
			return null;
		}
		if(count($matches[1]) == 1){
			return $matches[1][0];
		}
		return $matches[1];
	}
	
		
	
}