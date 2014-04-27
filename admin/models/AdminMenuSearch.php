<?php

namespace admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use admin\models\AdminMenu;

/**
 * AdminMenuSearch represents the model behind the search form about `admin\models\AdminMenu`.
 */
class AdminMenuSearch extends AdminMenu
{
    public function rules()
    {
        return [
            [['id', 'root', 'lft', 'rgt', 'level', 'is_visible', 'uid'], 'integer'],
            [['label', 'url', 'params', 'ajaxoptions', 'htmloptions', 'group_code'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = AdminMenu::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'root' => $this->root,
            'lft' => $this->lft,
            'rgt' => $this->rgt,
            'level' => $this->level,
            'is_visible' => $this->is_visible,
            'uid' => $this->uid,
        ]);

        $query->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'params', $this->params])
            ->andFilterWhere(['like', 'ajaxoptions', $this->ajaxoptions])
            ->andFilterWhere(['like', 'htmloptions', $this->htmloptions])
            ->andFilterWhere(['like', 'group_code', $this->group_code]);

        return $dataProvider;
    }
}
