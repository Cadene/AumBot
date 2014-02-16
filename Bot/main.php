<?php

include_once('lib/AumBot.php');

$aumBot = new AumBot();

$aumBot->closeAllOpen();

$aumBot->init();

$aumBot->setDB(new BDD());

//$aumBot->recoverAllGirls();

$aumBot->queryAllGirls();