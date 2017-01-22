<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sub_category".
 *
 * @property integer $id
 * @property string $title_en
 * @property string $description_en
 * @property integer $category_id
 * @property string $pic
 */
class SubCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'title_en', 'description_en', 'category_id','id','pic'], 'safe'],
            [[ 'title_en',  'category_id'], 'required'],
            [['id', 'category_id'], 'integer'],
            [['description_en'], 'string'],
            [['pic'],'file'],
            [['title_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_en' => 'Title En',
            'description_en' => 'Description En',
            'category_id' => 'Category ID',
            'pic' => 'Pic',
        ];
    }
}
