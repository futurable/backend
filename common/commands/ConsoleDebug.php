<?php
namespace common\commands;

use Yii;
use yii\helpers\Console;

class ConsoleDebug
{

    public function init()
    {
        date_default_timezone_set('Europe/Helsinki');
    }

    public function message($message = false, $debugLevel = 1)
    {
        if ($debugLevel == 0)
            exit();
        
        $date = Console::ansiFormat(date('Y-m-d H:i:s '), [
            Console::BOLD
        ]);
        $debugMessage = Console::ansiFormat($message, []);
        
        $output = null;
        if ($message !== false)
            $output .= $date . $debugMessage;
        $output .= "\n";
        
        Console::stdout($output);
    }
}