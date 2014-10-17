<?php
namespace backend\controllers\module;

use Yii;
use yii\base;
use yii\web\Response;
use yii\base\Action;
use common\models\search\ModuleSearch;
use backend\controllers\ModuleController;

class IndexAction extends Action{
    
    /**
     * Lists all IrModuleModule models.
     * @return mixed
     */
    public function run(){
        $searchModel = new ModuleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $categories = $this->controller->getCategories();
        $states = $this->controller->getStates();
        $names = $this->controller->getNames();

        return $this->controller->render('index', [
            'names' => $names,
            'categories' => $categories,
            'states' => $states,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
}