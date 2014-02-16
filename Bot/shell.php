<?php
$subject = shell_exec("chrome-cli list tabs");
$pattern = '/([0-9]{1,4})] Rencontre au supermarché des femmes/';
preg_match($pattern, $subject, $matches);
$tab_id = $matches[1];

if(empty($matches))
{
	shell_exec("chrome-cli open http://adopteunmec.com");

	sleep(1);

	$subject = shell_exec("chrome-cli list tabs");
	$pattern = '/([0-9]{1,4})] Rencontre au supermarché des femmes - Inscription gratuite !/';
	preg_match($pattern, $subject, $matches);
	$tab_id = $matches[1];

	shell_exec('chrome-cli execute \'
		document.getElementById("mail").value = "tamazy-linkedin@laposte.net";
		document.getElementById("password").value = "philvirg";
	\' -t '.$tab_id.';');

	sleep(1);

	shell_exec('chrome-cli execute \'
		document.getElementById("login").submit();
	\' -t '.$tab_id.';');

	sleep(1);
}

shell_exec('chrome-cli execute \'
	location.href = "http://www.adopteunmec.com/mySearch";
\' -t '.$tab_id.';');

sleep(1);

shell_exec('chrome-cli execute \'
	document.getElementById("search-form").submit();
\' -t '.$tab_id.';');

sleep(2);

$subject = shell_exec('chrome-cli source -t '.$tab_id.';');
$pattern = '/var members = (\{.+\})/';
preg_match($pattern, $subject, $matches);
$members = $matches[1];

print_r(json_decode($members));


