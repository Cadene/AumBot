<?php


/*
 * Chrome Command Line
 *
 * https://github.com/prasmussen/chrome-cli
 */

class ChromeCli{
	
	public static function listTabs(){
		return shell_exec("chrome-cli list tabs");
	}

	public static function open($url){
		shell_exec('chrome-cli open '.$url);
	}

	public static function execute($tab_id,$js){
		shell_exec('chrome-cli execute \''.$js.'\' -t '.$tab_id.';');
	}

	public static function source($tab_id){
		return shell_exec('chrome-cli source -t '.$tab_id.';');
	}

	public static function close($tab_id){
		if(is_array($tab_id)){
			foreach($tab_id as $t){
				shell_exec('chrome-cli close -t '.$t.';');
			}
		}else{
			shell_exec('chrome-cli close -t '.$tab_id.';');
		}
	}
	
		
	
}