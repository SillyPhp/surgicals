<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%sub_services}}".
 *
 * @property int $id
 * @property string $_uid
 * @property string $created_at
 * @property string|null $updated_at
 * @property int $service_id
 * @property string $name
 * @property string $short_description
 * @property string|null $description
 * @property string $image
 * @property int $is_deleted 0 as false, 1 as True
 */
class SubServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sub_services}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_uid', 'created_at', 'service_id', 'name', 'short_description', 'image'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['service_id', 'is_deleted'], 'integer'],
            [['description'], 'string'],
            [['_uid'], 'string', 'max' => 36],
            [['name'], 'string', 'max' => 100],
            [['short_description'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            '_uid' => Yii::t('app', 'Uid'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'service_id' => Yii::t('app', 'Service ID'),
            'name' => Yii::t('app', 'Name'),
            'short_description' => Yii::t('app', 'Short Description'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
        ];
    }
}