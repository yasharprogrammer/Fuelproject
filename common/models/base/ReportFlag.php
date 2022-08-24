<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "report_flag".
 *
 * @property integer $id
 * @property integer $report_id
 * @property string $flag
 *
 * @property \common\models\Report $report
 * @property string $aliasModel
 */
abstract class ReportFlag extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report_flag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_id', 'flag'], 'required'],
            [['report_id'], 'default', 'value' => null],
            [['report_id'], 'integer'],
            [['flag'], 'string', 'max' => 255],
            [['report_id', 'flag'], 'unique', 'targetAttribute' => ['report_id', 'flag']],
            [['report_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Report::className(), 'targetAttribute' => ['report_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'report_id' => Yii::t('app', 'Report ID'),
            'flag' => Yii::t('app', 'Flag'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReport()
    {
        return $this->hasOne(\common\models\Report::className(), ['id' => 'report_id']);
    }




}