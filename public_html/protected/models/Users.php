<?php

/**
 * This is the model class for table "pm_users".
 *
 * The followings are the available columns in table 'pm_users':
 * @property integer $id
 * @property string $u_name
 * @property string $u_email
 * @property string $u_pass
 * @property string $u_role
 *
 * The followings are the available model relations:
 * @property Places[] $places
 */
class Users extends CActiveRecord
{
    public $u_pass_repeat;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pm_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('u_name, u_email, u_pass, u_role', 'required'),
			array('u_name, u_email, u_pass', 'length', 'max'=>255),
            array('u_pass_repeat', 'compare', 'compareAttribute'=>'u_pass', 'on'=>'create, update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, u_name, u_email', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'places' => array(self::HAS_MANY, 'Places', 'p_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'u_name' => Yii::t('app', 'NAME'),
			'u_email' => Yii::t('app', 'EMAIL'),
			'u_pass' => Yii::t('app', 'PASSWORD'),
            'u_pass_repeat' => Yii::t('app', 'REPEAT_PASSWORD'),
            'u_role' => Yii::t('app', 'ROLE'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('u_name',$this->u_name,true);
		$criteria->compare('u_email',$this->u_email,true);
		$criteria->compare('u_pass',$this->u_pass,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function beforeSave() {
        $this->u_pass = crypt($this->u_pass, UserIdentity::blowfishSalt());
        return parent::beforeSave();
    }

    public function afterSave() {
        $assignments = Yii::app()->authManager->getAuthAssignments($this->id);
        if (!empty($assignments)) {
            foreach ($assignments as $key => $assignment) {
                Yii::app()->authManager->revoke($key, $this->id);
            }
        }
        Yii::app()->authManager->assign($this->u_role, $this->id);
        return parent::afterSave();
    }
}