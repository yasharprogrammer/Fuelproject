<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "load_rating_distance".
 *
 * @property integer $id
 * @property string $matrix
 * @property integer $low_miles
 * @property integer $high_miles
 * @property string $rate
 * @property string $description
 * @property integer $created_at
 *
 * @property \common\models\LoadRatingMatrix $matrix0
 * @property string $aliasModel
 */
abstract class LoadRatingDistance extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'load_rating_distance';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matrix', 'low_miles', 'high_miles'], 'required'],
            [['low_miles', 'high_miles'], 'default', 'value' => null],
            [['low_miles', 'high_miles'], 'integer'],
            [['rate'], 'number'],
            [['matrix'], 'string', 'max' => 5],
            [['description'], 'string', 'max' => 255],
            [['matrix'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\LoadRatingMatrix::className(), 'targetAttribute' => ['matrix' => 'number']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'matrix' => Yii::t('app', 'Matrix'),
            'low_miles' => Yii::t('app', 'Low Miles'),
            'high_miles' => Yii::t('app', 'High Miles'),
            'rate' => Yii::t('app', 'Rate'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'rate' => Yii::t('app', 'FLAT,MILES,TON'),
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatrix0()
    {
        return $this->hasOne(\common\models\LoadRatingMatrix::className(), ['number' => 'matrix']);
    }




}