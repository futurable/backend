<?php

namespace backend\controllers;

use Yii;
use common\models\IrModuleModule;
use common\models\search\ModuleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\IrModuleCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\db\Query;
use common\controllers\MainController;

/**
 * ModuleController implements the CRUD actions for IrModuleModule model.
 */
class ModuleController extends MainController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'index' => ['class' => 'backend\controllers\module\IndexAction'],
        ];
    }

    /**
     * Displays a single IrModuleModule model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new IrModuleModule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IrModuleModule();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IrModuleModule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IrModuleModule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IrModuleModule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IrModuleModule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IrModuleModule::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function getCategories(){
        $categories = IrModuleCategory::find()
            ->select(['id', 'name'])
            ->distinct()
            ->orderBy('name')
            ->all();
        
        $categoryArray = [];
        
        foreach ($categories as $category){
            $categoryArray[ $category->id ] = $category->name;
        }
        
        return $categoryArray;
    }
    
    public function getNames(){
        return [];
        
        $names = IrModuleCategory::find()
        ->select(['id', 'name'])
        ->distinct()
        ->orderBy('name')
        ->all();
    
        $nameArray = [];
    
        foreach ($names as $name){
            $nameArray[ $name->name ] = $name->name;
        }
    
        return $nameArray;
    }
    
    public function getStates(){
        $states = [
        'uninstallable' => Yii::t('Backend', 'Not Installable'),
        'uninstalled' => Yii::t('Backend', 'Not Installed'),
        'installed' => Yii::t('Backend', 'Installed'),
        'to upgrade' => Yii::t('Backend', 'To be upgraded'),
        'to remove' => Yii::t('Backend', 'To be removed'),
        'to install' => Yii::t('Backend', 'To be installed')];
        
        return $states;
    }
    
    public function actionNames($search = null, $id = null, $name=null) {
        $out = ['more' => false];

        if (!is_null($search)) {
            $result = IrModuleModule::find()
                ->select(['id', 'name'])
                ->where(['like', 'name', $search])
                ->limit(20)
                ->orderBy('name')
                ->all();
            
            $out['results'] = array_values($result);
        }
        elseif ($name > 0) {
            $out['results'] = ['id' => $name, 'text' => IrModuleModule::find()->where(['id'=>$name])->one()->name];
        }
        else {
            $out['results'] = ['id' => 0, 'text' => Yii::t('Backend', 'No matching records found')];
        }

        $out = preg_replace( "/\"name\"/i", '"text"', Json::encode($out) );
        echo $out;
    }
}
