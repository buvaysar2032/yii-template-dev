<?php

namespace common\models;

use common\components\helpers\SearchQueryHelper;
use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * FeedbackSearch represents the model behind the search form of `common\models\Feedback`.
 */
final class FeedbackSearch extends Feedback
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id', 'moderation_status'], 'integer'],
            [['name', 'email', 'message', 'created_at', 'updated_at', 'comment'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios(): array
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with a search query applied
     *
     * @throws InvalidConfigException
     */
    public function search(array $params): ActiveDataProvider
    {
        $query = Feedback::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'moderation_status' => $this->moderation_status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        // date filtering helper
        SearchQueryHelper::filterDataRange(['created_at', 'updated_at'], $this, $query);

        return $dataProvider;
    }
}
