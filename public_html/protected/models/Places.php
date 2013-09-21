<?php

/**
 * This is the model class for table "pm_places".
 *
 * The followings are the available columns in table 'pm_places':
 * @property integer $id
 * @property string $p_title
 * @property string $p_description
 * @property float $p_lat
 * @property float $p_lng
 * @property integer $p_user_id
 *
 * The followings are the available model relations:
 * @property Users $pUser
 */
class Places extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Places the static model class
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
		return 'pm_places';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('p_title, p_lat, p_lng', 'required'),
			array('p_title', 'length', 'max'=>255),
			array('p_lng', 'numerical', 'max'=>180, 'min'=>-180),
			array('p_lat', 'numerical', 'max'=>90, 'min'=>-90),
			array('p_description', 'length', 'max'=>1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, p_title, p_description, p_coords', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'p_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'p_title' => 'Title',
			'p_description' => 'Description',
			'p_lat' => 'Latitude',
			'p_lng' => 'Longitude',
			'p_user_id' => 'User',
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
		$criteria->compare('p_title',$this->p_title,true);
		$criteria->compare('p_description',$this->p_description,true);
		$criteria->compare('p_coords',$this->p_coords,true);
		$criteria->compare('p_user_id',$this->p_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function defaultScope()
    {
        return array(
            'condition'=>"p_user_id=".Yii::app()->user->getId(),
        );
    }

    public function beforeSave() {
        $this->p_user_id = Yii::app()->user->getId();
        if (null == $this->p_description) {
            $this->p_description = '';
        }
        return parent::beforeSave();
    }
}