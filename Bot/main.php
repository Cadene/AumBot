<?php

include_once('src/AumBot.php');

$aumBot = new AumBot();


//$aumBot->login();

$aumBot->setDB(new BDD());

//$d = $aumBot->addProfil(19318577);

$aumBot->getSearchedProfils();

//$aumBot->evalGirl(19318577);