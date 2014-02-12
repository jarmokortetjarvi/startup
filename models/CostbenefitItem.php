<?php

namespace app\models;

/**
 * This is the model class for table "costbenefit_item".
 *
 * @property integer $id
 * @property string $value
 * @property integer $costbenefit_calculation_id
 * @property integer $costbenefit_item_type_id
 *
 * @property CostbenefitCalculation $costbenefitCalculation
 * @property CostbenefitItemType $costbenefitItemType
 */
class CostbenefitItem extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'costbenefit_item';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['value', 'costbenefit_calculation_id', 'costbenefit_item_type_id'], 'required'],
			[['value'], 'number'],
			[['costbenefit_calculation_id', 'costbenefit_item_type_id'], 'integer']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'value' => 'Value',
			'costbenefit_calculation_id' => 'Costbenefit Calculation ID',
			'costbenefit_item_type_id' => 'Costbenefit Item Type ID',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getCostbenefitCalculation()
	{
		return $this->hasOne(CostbenefitCalculation::className(), ['id' => 'costbenefit_calculation_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getCostbenefitItemType()
	{
		return $this->hasOne(CostbenefitItemType::className(), ['id' => 'costbenefit_item_type_id']);
	}
}