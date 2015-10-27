<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\commands\ConsoleDebug;
use common\models\OrderAutomation;
use common\models\Company;
use common\models\search\CompanySearch;
use common\models\CostbenefitCalculation;
use common\models\CostbenefitItem;
use common\commands\OrderValueMultiplier;
use common\models\OrderSetup;

class CreateordersController extends Controller
{

    public $defaultAction = 'create';
    public $debugLevel = 1;
    public $debugger = false;

    public function init(){
        $this->debugger = new ConsoleDebug();
    }
    
    public function actionCreate()
    {
        $this->debugger->message('Create automated orders action started', $this->debugLevel);
        
        # 1. Check if this weeks automation has been done
        $automationRunCreated = $this->automationRunCreated();
        if( $automationRunCreated ){
            $Debug->message("Automation run created on {$automationRunCreated}. Nothing to do", $this->debugLevel);
            die();
        }
        
        $this->debugger->message("No automation run found", $this->debugLevel);
            
        # 2. Get all suppliers
        $companySearch = new CompanySearch();
        $suppliers = $companySearch->search([], false)->getModels();
        $this->debugger->message( count($suppliers) . " suppliers found", $this->debugLevel);
        
        # 3. Go through all companies
        $this->createOrders($suppliers);
        
        $this->debugger->message("Done!", $this->debugLevel);
        $this->debugger->message(false, $this->debugLevel);
    }
    
    private function automationRunCreated($week = false, $year = false){
        if($week === false) $week = date('W');
        if($year === false) $year = date('Y');
        
        $orderAutomation = OrderAutomation::find()
        ->where(['year'=>$year, 'week'=>$week])
        ->one();

        $result = $orderAutomation ? $orderAutomation->create_date : false;
        
        return $result;
    }
    
    private function createOrders($suppliers){
        foreach($suppliers as $supplier){
            $this->createOrder($supplier);
            $this->debugger->message(false, $this->debugLevel);
        }
    }
    
    private function createOrder($supplier){
        $this->debugger->message("Using supplier {$supplier->name}", $this->debugLevel);
        
        # x.1 Get the turnover from latest CBC
        $CBC = CostbenefitCalculation::find()->where(['company_id'=>$supplier->id])->orderBy('create_date DESC')->one();
        $turnover = CostbenefitItem::find()->where(['costbenefit_calculation_id' => $CBC->id, 'costbenefit_item_type_id' => 1])->one();
        $turnover->value = 70000;
        
        $this->debugger->message("Turnover {$turnover->value}", $this->debugLevel);
        
        # x.2 Get the order value
        $orderValueMultiplier = new OrderValueMultiplier();
        $valueMultiplier = $orderValueMultiplier->get($supplier);
        
        $this->debugger->message("Value multiplier {$valueMultiplier}", $this->debugLevel);
        $orderValue = round( $turnover->value * $valueMultiplier );
        
        $this->debugger->message("Orders value {$orderValue}", $this->debugLevel);
        
        $orderSetup = OrderSetup::find()->one();
        $this->debugger->message("Creating {$orderSetup->amount} orders", $this->debugLevel);
        
        for($i = 0; $i < $orderSetup->amount; $i++){
            $rowsMin = ($orderSetup->rows - 1) > 0 ? $rowsMin = $orderSetup->rows -1 : 1;
            $rowsMax = $orderSetup->rows + 1;
            $rows = mt_rand ($rowsMin,$rowsMax);
        }
        
        $this->debugger->message("Created {$i} orders for {$supplier->name}", $this->debugLevel);
    }
    
}