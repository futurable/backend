<?php
namespace frontend\controllers\erp;

use yii\base\Action;
use yii\data\ActiveDataProvider;
use common\models\SaleOrder;
use common\models\AccountInvoice;

class InvoicesAction extends Action{
    public function run(){
        $provider = New ActiveDataProvider([
            'query' =>  AccountInvoice::find()->joinWith('createU.partner')->orderBy('date_invoice DESC'),
        ]);
        
        return $this->controller->render('invoices', [
            'provider' => $provider,
        ]);
    }
}
