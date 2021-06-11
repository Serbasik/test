<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "links".
 *
 * @property int $id
 * @property string $real_link
 * @property string $short_link
 */
class Links extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'links';
    }

    /**
     * {@inheritdoc}
     */
//    public function rules()
//    {
//        return [
//            [['id', 'real_link', 'short_link'], 'required'],
//            [['id'], 'integer'],
//            [['real_link'], 'string', 'max' => 500],
//            [['short_link'], 'string', 'max' => 200],
//        ];
//    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'real_link' => 'Real Link',
            'short_link' => 'Short Link',
        ];
    }
}
