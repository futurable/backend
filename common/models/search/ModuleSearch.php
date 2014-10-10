<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IrModuleModule;

/**
 * ModuleSearch represents the model behind the search form about `common\models\IrModuleModule`.
 */
class ModuleSearch extends IrModuleModule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'create_uid', 'write_uid', 'category_id', 'sequence'], 'integer'],
            [['create_date', 'write_date', 'website', 'summary', 'name', 'author', 'icon', 'state', 'latest_version', 'shortdesc', 'description', 'license', 'menus_by_module', 'maintainer', 'contributors', 'views_by_module', 'reports_by_module', 'url', 'published_version'], 'safe'],
            [['application', 'demo', 'web', 'auto_install'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = IrModuleModule::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->name,
            'create_uid' => $this->create_uid,
            'create_date' => $this->create_date,
            'write_date' => $this->write_date,
            'write_uid' => $this->write_uid,
            'category_id' => $this->category_id,
            'application' => $this->application,
            'demo' => $this->demo,
            'web' => $this->web,
            'sequence' => $this->sequence,
            'auto_install' => $this->auto_install,
        ]);

        $query
            ->andFilterWhere(['state' => $this->state]);
        
        return $dataProvider;
    }
}
