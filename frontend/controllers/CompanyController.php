<?php
namespace frontend\controllers;

use Yii;
use common\models\Company;
use common\models\search\CompanySearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\commands\CompanyAccess;
use common\controllers\MainController;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends MainController
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
                            'view',
                            'index'
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
                            'create',
                            'update'
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
     * Lists all Company models.
     * 
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        
        // Only one company, show the view
        if (count($dataProvider->getModels()) == 1) {
            $id = yii::$app->user->identity->company->id;
            return $this->render('view', [
                'model' => $this->findModel($id)
            ]);
        }
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * Displays a single Company model.
     * 
     * @param integer $id            
     * @return mixed
     */
    public function actionView()
    {
        $id = \Yii::$app->session['selected_company_id'];
        
        return $this->render('view', [
            'model' => $this->findModel($id)
        ]);
    }

    /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * 
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Company();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([
                'view',
                'id' => $model->id
            ]);
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * 
     * @param integer $id            
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([
                'view',
                'id' => $model->id
            ]);
        } else {
            return $this->render('update', [
                'model' => $model
            ]);
        }
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * 
     * @param integer $id            
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        return $this->redirect([
            'index'
        ]);
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * 
     * @param integer $id            
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $companyAccess = new CompanyAccess();
        $condition = $companyAccess->getQueryConditions();
        $model = Company::find()->where(['id' => $id])->andWhere($condition)->one();
        
        if ( $model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
