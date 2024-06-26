<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%specification_variant_values}}".
 *
 * @property int $id
 * @property string $enc_id
 * @property string $variant_id
 * @property string $specification_id
 * @property string $pool_id
 * @property int $is_highlighted 0 false,1 true
 * @property string $created_by
 * @property string $created_on
 *
 * @property Variants $variant
 * @property Specifications $specification
 * @property PoolSpecificationValues $pool
 * @property User $createdBy
 */
class SpecificationVariantValues extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%specification_variant_values}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enc_id', 'variant_id', 'specification_id', 'pool_id', 'created_by'], 'required'],
            [['is_highlighted'], 'integer'],
            [['created_on'], 'safe'],
            [['enc_id', 'variant_id', 'specification_id', 'pool_id', 'created_by'], 'string', 'max' => 50],
            [['enc_id'], 'unique'],
            [['variant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variants::className(), 'targetAttribute' => ['variant_id' => 'enc_id']],
            [['specification_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specifications::className(), 'targetAttribute' => ['specification_id' => 'enc_id']],
            [['pool_id'], 'exist', 'skipOnError' => true, 'targetClass' => PoolSpecificationValues::className(), 'targetAttribute' => ['pool_id' => 'enc_id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'enc_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'enc_id' => Yii::t('app', 'Enc ID'),
            'variant_id' => Yii::t('app', 'Variant ID'),
            'specification_id' => Yii::t('app', 'Specification ID'),
            'pool_id' => Yii::t('app', 'Pool ID'),
            'is_highlighted' => Yii::t('app', 'Is Highlighted'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_on' => Yii::t('app', 'Created On'),
        ];
    }

    /**
     * Gets query for [[Variant]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVariant()
    {
        return $this->hasOne(Variants::className(), ['enc_id' => 'variant_id']);
    }

    /**
     * Gets query for [[Specification]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpecification()
    {
        return $this->hasOne(Specifications::className(), ['enc_id' => 'specification_id']);
    }

    /**
     * Gets query for [[Pool]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPool()
    {
        return $this->hasOne(PoolSpecificationValues::className(), ['enc_id' => 'pool_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['enc_id' => 'created_by']);
    }
}
