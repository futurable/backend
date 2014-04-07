<?php
namespace common\commands;

use Yii;

class ConsoleDebug{
	
	public function message($message = false, $debugLevel = 1){
		if($debugLevel == 0) exit;
		
		if($message===false) $debugMessage = "\n";
	
		else $debugMessage = date('d-m-Y H:i:s')." ".$message."\n";
	
		echo $debugMessage;
	}

}