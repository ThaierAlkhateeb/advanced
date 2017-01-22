<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $title_en
 * @property string $description_en
 * @property string $pic
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','title_en','description_en','pic'],'safe'],
            [['description_en'], 'string'],
            [['description_en','title_en'] ,'unique'],
            [['title_en'],'required'],
            [['pic'], 'file'],//, 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['title_en'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_en' => 'Title',
            'description_en' => 'Description',
            'pic' => 'Photo',
        ];
    }

}
