<?php

include_once('src/AumBot.php');

$aumBot = new AumBot();


//$aumBot->login();

$aumBot->setDB(new BDD());

//$d = $aumBot->addProfil(19246905);

$aumBot->getSearchedProfils();
