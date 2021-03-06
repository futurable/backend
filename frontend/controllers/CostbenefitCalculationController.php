<?php
namespace frontend\controllers;

use Yii;
use common\models\CostbenefitCalculation;
use common\models\search\CostbenefitCalculationSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\controllers\MainController;

/**
 * CostbenefitCalculationController implements the CRUD actions for CostbenefitCalculation model.
 */
class CostbenefitCalculationController extends MainController
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

    public function actions()
    {
        return [
            'view' => ['class' => 'frontend\controllers\costbenefitcalculation\ViewAction'],
        ];
    }
    
    /**
     * Lists all CostbenefitCalculation models.
     * 
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CostbenefitCalculationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * Creates a new CostbenefitCalculation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * 
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CostbenefitCalculation();
        
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
     * Updates an existing CostbenefitCalculation model.
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
     * Deletes an existing CostbenefitCalculation model.
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
     * Finds the CostbenefitCalculation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * 
     * @param integer $id            
     * @return CostbenefitCalculation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CostbenefitCalculation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
