<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\commands\ConsoleDebug;
use common\models\BankInterest;

class EuriborController extends Controller
{
    
    public $defaultAction = 'update';
    public $debugLevel = 1;
    private $euriborRates;

    public function actionUpdate()
    {
        $Debug = new ConsoleDebug();
        $Debug->message('Euribor Update action started', $this->debugLevel);
        
        if($this->fetchEuriborRates() and $this->updateEuribors()){
            $Debug->message("Euribor rates updated", $this->debugLevel);
        }
        else {
            $Debug->message("Couldn't update euribor rates", $this->debugLevel);
        }
        
        $Debug->message("Done!", $this->debugLevel, [Console::FG_GREEN]);
        $Debug->message(false, $this->debugLevel);
    }
    
    private function fetchEuriborRates(){
        $feed_url = "http://www.suomenpankki.fi/fi/_layouts/BOF/RSS.ashx/Tilastot/Korot/en";
    
        $content = file_get_contents($feed_url);
        $xml = new \SimpleXmlElement($content);
        $euriborRates = array();
    
        foreach($xml->channel->item as $item){
            $title = $item->title;
            $parts = explode(" ", $title);
    
            $act = filter_var($parts[3], FILTER_SANITIZE_NUMBER_INT); // The act part (360 or 365)
            $span = trim($parts[2]); // Month or week
            $number = trim($parts[1]); // The number of months / weeks
            $rate = trim($parts[7]); // The actual euribor rate
    
            $euriborRates[$act][$span][$number] = $rate;
        }
    
        $this->euriborRates = $euriborRates;
        
        return true;
    }
    
    private function updateEuribors(){
        $euriborRates = $this->euriborRates;
        // Use act 360 monthly rates
        $AMR = $euriborRates[360]['month'];
    
        // Update 1 month euribor
        $euribor1m = BankInterest::find()->where(['name'=>'loanEuribor1'])->one();
        $euribor1m->rate = $AMR[1];
        
        // Update 3 month euribor
        $euribor3m = BankInterest::find()->where(['name'=>'loanEuribor3'])->one();
        $euribor3m->rate = $AMR[3];
        
        // Update 6 month euribor
        $euribor6m = BankInterest::find()->where(['name'=>'loanEuribor6'])->one();
        $euribor6m->rate = $AMR[6];
        
        // Update 12 month euribor
        $euribor12m = BankInterest::find()->where(['name'=>'loanEuribor12'])->one();
        $euribor12m->rate = $AMR[12];
        
        $result = false;
        if($euribor1m->save() and $euribor3m->save() and $euribor6m->save() and $euribor12m->save()) $result = true;
        
        return $result;
    }
}