<?php

namespace frontend\controllers;

use Yii;
use common\models\search\BankAccountTransactionSearch;
use common\models\BankAccountTransaction;
use common\models\BankProfile;
use common\models\BankAccount;
class BankAccountTransactionController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'ruleConfig' => [
                    'class' => 'common\components\AccessRule'
                ],
                'rules' => [
                    [
                        'actions' => [
                            'index',
                            'view',
                        ],
                        'allow' => true,
                        'roles' => [
                            'manager',
                            'admin',
                        ]
                    ],
                ]
            ],
        ];
    }
    
    public function actionIndex()
    {
        $bankAccountTransaction = new BankAccountTransaction();
        $bankAccountTransactionsSearch = new BankAccountTransactionSearch();
        $bankAccountTransactions = $bankAccountTransactionsSearch->search(Yii::$app->request->getQueryParams());
        
        if($bankAccountTransaction->load(Yii::$app->request->post())){
            $payer_id = $bankAccountTransaction->payer_name;
            $recipient_id = $bankAccountTransaction->recipient_name;
            
            $bankAccountTransaction->payer_name = BankProfile::find()->where(['user_id' => $payer_id])->one()->company;
            $bankAccountTransaction->payer_iban = BankAccount::find()->where(['bank_user_id'=> $payer_id, 'bank_account_type_id' => 1])->one()->iban;
            $bankAccountTransaction->payer_bic = BankAccount::find()->where(['bank_user_id'=> $payer_id, 'bank_account_type_id' => 1])->one()->bankBic->bic;
            
            $bankAccountTransaction->recipient_name = BankProfile::find()->where(['user_id' => $recipient_id])->one()->company;
            $bankAccountTransaction->recipient_iban = BankAccount::find()->where(['bank_user_id'=> $recipient_id, 'bank_account_type_id' => 1])->one()->iban;
            $bankAccountTransaction->recipient_bic = BankAccount::find()->where(['bank_user_id'=> $recipient_id, 'bank_account_type_id' => 1])->one()->bankBic->bic;
            
            $bankAccountTransaction->create_date = date('Y-m-d H:i:s');
            
            if($bankAccountTransaction->save()){
                return $this->redirect([
                    'index',
                    'bankAccountTransactions' => $bankAccountTransactions,
                    'bankAccountTransactionsSearch' => $bankAccountTransactionsSearch,
                ]);
            }
        }
        
        $bankAccountTransaction->event_date = date('Y-m-d');
        
        return $this->render('index', [
            'bankAccountTransaction' => $bankAccountTransaction,
            'bankAccountTransactions' => $bankAccountTransactions,
            'bankAccountTransactionsSearch' => $bankAccountTransactionsSearch,
        ]);
    }

}
