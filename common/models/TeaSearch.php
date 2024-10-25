<?php

namespace common\models;

use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TeaSearch represents the model behind the search form of `common\models\Tea`.
 */
final class TeaSearch extends Tea
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id', 'tea_collection_id', 'buy_available', 'priority'], 'integer'],
            [['title', 'title_en', 'subtitle', 'subtitle_en', 'description', 'description_en', 'background_image', 'stack_image', 'stack_image_en', 'weight', 'weight_en', 'brewing_temperature', 'brewing_temperature_en', 'brewing_time', 'brewing_time_en', 'link', 'link_en'], 'safe']
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
        $query = Tea::find()->orderBy(['priority' => SORT_ASC]);

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
            'tea_collection_id' => $this->tea_collection_id,
            'buy_available' => $this->buy_available,
            'priority' => $this->priority,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'subtitle', $this->subtitle])
            ->andFilterWhere(['like', 'subtitle_en', $this->subtitle_en])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'description_en', $this->description_en])
            ->andFilterWhere(['like', 'background_image', $this->background_image])
            ->andFilterWhere(['like', 'stack_image', $this->stack_image])
            ->andFilterWhere(['like', 'stack_image_en', $this->stack_image_en])
            ->andFilterWhere(['like', 'weight', $this->weight])
            ->andFilterWhere(['like', 'weight_en', $this->weight_en])
            ->andFilterWhere(['like', 'brewing_temperature', $this->brewing_temperature])
            ->andFilterWhere(['like', 'brewing_temperature_en', $this->brewing_temperature_en])
            ->andFilterWhere(['like', 'brewing_time', $this->brewing_time])
            ->andFilterWhere(['like', 'brewing_time_en', $this->brewing_time_en])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'link_en', $this->link_en]);

        return $dataProvider;
    }
}
