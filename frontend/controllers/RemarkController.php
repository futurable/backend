<?php
namespace frontend\controllers;

use Yii;
use common\models\Remark;
use common\models\search\RemarkSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\commands\CompanyAccess;
use common\commands\DateFormatter;

/**
 * RemarkController implements the CRUD actions for Remark model.
 */
class RemarkController extends MainController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\web\AccessControl::className(),
                'ruleConfig' => [
                    'class' => 'frontend\components\AccessRule'
                ],
                'rules' => [
                    [
                        'actions' => [
                            'view',
                            'index',
                            'update',
                            'create',
                        ],
                        'allow' => true,
                        'roles' => [
                            'user',
                            'instructor',
                            'manager'
                        ]
                    ],
                    [
                        'actions' => [
                            'index'
                        ],
                        'allow' => true,
                        'roles' => [
                            'instructor',
                            'manager'
                        ]
                    ],
                    [
                        'actions' => [
                            'delete',
                        ],
                        'allow' => true,
                        'roles' => [
                            'manager'
                        ]
                    ]
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
     * Lists all Remark models.
     * 
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RemarkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * Displays a single Remark model.
     * 
     * @param integer $id            
     * @param integer $company_id            
     * @return mixed
     */
    public function actionView($id, $company_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $company_id)
        ]);
    }

    /**
     * Creates a new Remark model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * 
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Remark();
        
        $model->create_date = date('Y-m-d H:i:s');
        
        if(!isset($model->company_id)) $model->company_id = \Yii::$app->session['selected_company_id'];
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([
                'view',
                'id' => $model->id,
                'company_id' => $model->company_id
            ]);
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing Remark model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * 
     * @param integer $id            
     * @param integer $company_id            
     * @return mixed
     */
    public function actionUpdate($id, $company_id)
    {
        $model = $this->findModel($id, $company_id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([
                'view',
                'id' => $model->id,
                'company_id' => $model->company_id
            ]);
        } else {
            return $this->render('update', [
                'model' => $model
            ]);
        }
    }

    /**
     * Deletes an existing Remark model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * 
     * @param integer $id            
     * @param integer $company_id            
     * @return mixed
     */
    public function actionDelete($id, $company_id)
    {
        $this->findModel($id, $company_id)->delete();
        
        return $this->redirect([
            'index'
        ]);
    }

    /**
     * Finds the Remark model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * 
     * @param integer $id            
     * @param integer $company_id            
     * @return Remark the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $company_id)
    {
        $companyAccess = new CompanyAccess();
        $condition = $companyAccess->getQueryConditions();
        $model = Remark::find()->joinWith('company')
            ->where([
            'remark.id' => $id
        ])
            ->andWhere($condition)
            ->one();
        
        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
