<?php
namespace frontend\controllers\erp;

use yii\base\Action;
use yii\data\ActiveDataProvider;
use common\models\AccountAnalyticLine;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use yii\db\Expression;
use yii\data\Pagination;

class TimesheetsAction extends Action{
    public function run(){
    
        $weekNumberQuery = 'to_char(date, \'YYYY-WW\') AS week';
        $weekNumberExpression = new Expression('to_char(date, \'YYYY-WW\')');
        
        $weeksQuery = AccountAnalyticLine::find()->select(["distinct $weekNumberQuery"]);
        
        # Calculate the number of navigation buttons
        $firstDate = AccountAnalyticLine::find()->select('date')->orderBy('date ASC')->one();
        $lastDate = AccountAnalyticLine::find()->select(['date'])->orderBy('date DESC')->one();
        
        $firstDate = empty($firstDate) ? date('Y-m-d') : $firstDate->date;
        $lastDate = empty($lastDate) ? $lastDate : $lastDate->date;
        
        $diff = time() - strtotime($firstDate);
        $weeks = intval( ceil( $diff / (60*60*24*7) ) );

        # Pagination
        $pages = [];

        $round = 0;
        while($weeks > 0){
            $weeks--;
            $weekNumber = date('Y-W', strtotime("+{$round} week", strtotime($firstDate) ));
            $round++;
            
            $pages[] = ['label' => substr($weekNumber, 5), 'url' => ['timesheets', 'week' => $weekNumber]];
        }
        
        
        $thisWeek = isset($_GET['week']) ? $_GET['week'] : date('Y-W');
        $viewWeek = substr($thisWeek, 5, 2) . " / " . substr($thisWeek, 0, 4);
        
        $provider = New ActiveDataProvider([
            'query' =>
                AccountAnalyticLine::find()
                ->select(['user_id', "$weekNumberExpression AS week", 'SUM(unit_amount) AS hours_sum'])
                ->where(['to_char(date, \'YYYY-WW\')' => $thisWeek])
                ->groupBy(['week', 'user_id']),
            'pagination' => false
        ]);
            
        return $this->controller->render('timesheets', [
            'provider' => $provider,
            'pages' => $pages,
            'viewWeek' => $viewWeek,
        ]);
    }
}
