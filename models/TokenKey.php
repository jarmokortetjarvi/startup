<?php

namespace app\models;

/**
 * This is the model class for table "token_key".
 *
 * @property integer $id
 * @property string $token_key
 * @property integer $lifetime
 * @property string $create_date
 * @property string $reclaim_date
 * @property string $expiration_date
 * @property integer $token_customer_id
 * @property integer $token_setup_id
 *
 * @property Company[] $companies
 * @property TokenCustomer $tokenCustomer
 * @property TokenSetup $tokenSetup
 */
class TokenKey extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'token_key';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['token_key', 'lifetime', 'token_customer_id', 'token_setup_id'], 'required'],
			[['lifetime', 'token_customer_id', 'token_setup_id'], 'integer'],
			[['create_date', 'reclaim_date', 'expiration_date'], 'safe'],
			[['token_key'], 'string', 'max' => 16],
			[['token_key'], 'unique']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('TokenKey', 'ID'),
			'token_key' => Yii::t('TokenKey', 'TokenKey'),
			'lifetime' => Yii::t('TokenKey', 'Lifetime'),
			'create_date' => Yii::t('TokenKey', 'CreateDate'),
			'reclaim_date' => Yii::t('TokenKey', 'ReclaimDate'),
			'expiration_date' => Yii::t('TokenKey', 'ExpirationDate'),
			'token_customer_id' => Yii::t('TokenKey', 'TokenCustomer'),
			'token_setup_id' => Yii::t('TokenKey', 'TokenSetup'),
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getCompanies()
	{
		return $this->hasMany(Company::className(), ['token_key_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTokenCustomer()
	{
		return $this->hasOne(TokenCustomer::className(), ['id' => 'token_customer_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTokenSetup()
	{
		return $this->hasOne(TokenSetup::className(), ['id' => 'token_setup_id']);
	}
}
