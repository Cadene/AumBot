<?php

include_once('config/aum.php');

include_once('lib/SimpleHtmlDom/simple_html_dom.php');

include_once('src/BDD.php');
include_once('src/ChromeCli.php');


/*
 * Bot Adopte Un mec
 *
 */

class AumBot{
	
	protected $db;
	protected $tab_id;

	protected $email;
	protected $password;

	protected static $count = 0;
	
	public function __construct($email=AUM_email,$password=AUM_password) {
		$this->email = $email;
		$this->password = $password;
	}

	public function setDB($db) {
		$this->db = $db;
	}

	public function closeAllOpen(){
		$tabs_id = $this->recoverTabsId();
		if($tabs_id){
			ChromeCli::close($tabs_id);
		}
	}

	public function login()
    {
        $this->closeAllOpen();
		$url = AUM_url;
		ChromeCli::open($url);
		$this->tab_id = $this->recoverTabsId();
		if(!$this->isLogged()){
			$js='document.getElementById("mail").value = "'.$this->email.'";'
			   .'document.getElementById("password").value = "'.$this->password.'";';
			ChromeCli::execute($this->tab_id,$js);
			$js='document.getElementById("login").submit();';
			ChromeCli::execute($this->tab_id,$js);
		}
	}

    public function getSearchedProfils()
    {
        $d = $this->getSearchedMembers();
        foreach($d as $member){
           $profil = $this->getProfil($member['girl_id']);
           $girl['id'] = $this->db->addGirl($profil['girl_id']);
           $profil['id'] = $this->db->addProfil($profil);
           $member['id'] = $this->db->addMember($member);
        }
    }

    public function addProfil($id)
    {
        $profil = $this->getProfil($id);
        $girl['id'] = $this->db->addGirl($profil['girl_id']);
        $profil['id'] = $this->db->addProfil($profil);
        $this->db->updateRatio($profil);
    }

    public function getProfil($id)
    {
        $html = new simple_html_dom();
        $d['left-content'] = null;
        while($d['left-content'] == null){
            $this->open("http://www.adopteunmec.com/profile/".$id);
            $html->load(ChromeCli::source($this->tab_id));
            $left = $html->getElementById('left-content');
            $right = $html->getElementById('right-content');
            $d['girl_id'] = $id;
            $d['left-content'] = addslashes($left);// = "test'' ";
            $d['right-content'] = addslashes($right);// = "test";
        }
        for($i=0; $i<4; $i++){
            $tr = $html->find('table tbody tr')[$i];
            $subject = $tr->find('td',0);
            $pattern = '/d>([0-9]+)/';
            preg_match($pattern, $subject, $matches);
            $m[] = $matches[1];
        }
        $d['mails'] = $m[0];
        $d['charmes'] = $m[1];
        $d['visites'] = $m[2];
        $d['panier'] = $m[3];

        return $d;
    }


/**
 * Récupère les données stockées dans la variable json members sur les pages mySearch
 *
 * @return
 */
    private function getSearchedMembers()
    {
        $this->throwSearch();
        for($i=1; $q = $this->getMembersFromSearch($i); $i++){
            foreach($q['members'] as $m) {
                $m['girl_id'] = $m['id'];
                unset($m['id']);
                echo "girl_id:".$m['girl_id']."\n";
                $d[] = $m;
            }
        }
        return $d;
    }

/**
 * Récupère les données stockées dans la variable json members sur la page mySearch/$page
 *
 * @return
 */
    private function getMembersFromSearch($page){
        echo "getMembersFromSearch($page)"."\n";
        $this->open('http://www.adopteunmec.com/mySearch/?page='.$page);
        $subject = ChromeCli::source($this->tab_id);
        $pattern = '/var members = (\{.+\})/';
        preg_match($pattern, $subject, $matches);
        if(empty($matches)){
            return null;
        }
        return json_decode($matches[1],true);
    }

/**
 * Ferme tous les onglets adopte un mec et ouvre url en initialisan this->tab_id
 *
 * @return tab_id
 */
    private function open($url){
        $this->closeAllOpen();
        ChromeCli::open($url);
        return $this->tab_id = $this->recoverTabsId();
    }

/**
 * Va dans mySearch et submit()
 *
 * @return
 */
    private function throwSearch(){
        $this->open("http://www.adopteunmec.com/mySearch");
        $this->tab_id = $this->recoverTabsId();
        $js = 'document.getElementById("search-form").submit();';
        ChromeCli::execute($this->tab_id,$js);
    }


/**
 * Vérifie si le formulaire de login existe sur la page d'acceuil
 *
 * @return boolean
 */
	private function isLogged(){
        $this->open('http://www.adopteunmec.com');
		$subject = ChromeCli::source($this->tab_id);
		$pattern = '/<form action="http:\/\/www.adopteunmec.com\/\/auth\/login"/';
		preg_match($pattern, $subject, $matches);
		if(empty($matches)){
			return true;
		}
		return false;
	}

/**
 * Récupère tous les tab_id des pages adopteunmec.com
 *
 * @return tab_id[]
 */
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


/**
 * Evalue une fille en remplissant ses attributs dans Girls
 *
 * @return tab_id[]
 */
    public function evalGirl($id){
        $this->db->evalGirl($id);
    }





    /*

    public function recoveyfrMembers()
    {
        $this->closeAllOpen();
        ChromeCli::open("http://www.adopteunmec.com/mySearch");
        $this->tab_id = $this->recoverTabsId();
        $js = 'document.getElementById("search-form").submit();';
        ChromeCli::execute($this->tab_id,$js);
        sleep(2);
        $i=1;
        while($members = $this->recoverMembers($i)) {
            $members = $members['members'];
            foreach($members as $m) {
                echo "recover:".$m['id']."\n";
                $this->db->addMember($m);
            }
            $i++;
            sleep(2);
        }
    }

	public function getSearcheddProfils()
	{
		$this->closeAllOpen();
		ChromeCli::open("http://www.adopteunmec.com/");
		$this->tab_id = $this->recoverTabsId();
		for($i=1; $members = $this->getMembers($i); $i++){
            echo "page:$i"."\n";
            $members = $members['members'];
            foreach($members as $m) {
                echo "recover:".$m['id']."\n";
                $girls_id[] = $m['id'];
            }
        }
        foreach($girls_id as $girl_id)
        $this->db->addGirl($girl_id);

        print_r($girls_id);
        foreach($girls_id as $id){
            $this->queryGirl($id);
        }/
		$js = 'location.href = "http://www.adopteunmec.com/mySearch/?page='.$i.'";';
		ChromeCli::execute($this->tab_id,$js);
		sleep(1);
		$subject = ChromeCli::source($this->tab_id);
		$pattern = '/var members = (\{.+\})/';
		preg_match($pattern, $subject, $matches);
		if(empty($matches)){
			return null;
		}
		$members = json_decode($matches[1],true);

		print_r($members);
		/*

	}

	public function queryAllGirls(){
		$members_id = $this->db->indexMembers();
		//print_r($members_id);
		foreach($members_id as $member_id){
			$this->queryGirl($member_id['id']);
		}
	}

	public function queryGirl($id){
		echo $this->count.".query:$id \n";
		$this->count++;
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
		$profil = array();
		$profil['member_id'] = $id;
		$profil['left-content'] = addslashes($left);// = "test'' ";
		$profil['right-content'] = addslashes($right);// = "test";
		$this->db->addProfil($profil);
		sleep(1);

	}*/
	
}