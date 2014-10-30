<?php

namespace frontend\controllers;

use Yii;
use common\models\BankAccount;
use common\models\search\BankAccountSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\BankUser;
use common\models\Company;
use common\models\search\BankAccountTransactionSearch;
use common\controllers\MainController;

/**
 * BankaccountController implements the CRUD actions for BankAccount model.
 */
class BankAccountController extends MainController
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
                            'instructor',
                            'manager'
                        ]
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => [
                        'post'
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all BankAccount models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BankAccountSearch();
        $id = \Yii::$app->session['selected_company_id'];
        $company = Company::find()->where(['id'=>$id])->one();
        $bankUser = BankUser::find()->where(['username' => $company->tag])->one();
        
        $dataProvider = $searchModel->search(['BankAccountSearch'=>['bank_user_id'=>$bankUser->id]]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BankAccount model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $id = \Yii::$app->session['selected_company_id'];
        $company = Company::find()->where(['id'=>$id])->one();
        $bankUser = BankUser::find()->where(['username' => $company->tag])->one();

        $bankAccountSearch = new BankAccountSearch();
        $bankAccountTransactionsSearch = new BankAccountTransactionSearch();
        
        $bankAccountDataProvider = $bankAccountSearch->search(['BankAccountSearch'=>['bank_user_id' => $bankUser->id]]);
        $bankAccount = $bankAccountDataProvider->getModels()[0];
        
        $bankAccountTransactions = $bankAccountTransactionsSearch->search(Yii::$app->request->queryParams, $bankAccount->iban);
        
        return $this->render('view', [
            'bankAccount' => $bankAccount,
            'bankAccountTransactionsSearch' => $bankAccountTransactionsSearch,
            'bankAccountTransactions' => $bankAccountTransactions,
        ]);
    }

    /**
     * Finds the BankAccount model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BankAccount the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BankAccount::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
