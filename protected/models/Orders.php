<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $order_no
 * @property string $employee
 * @property string $country
 * @property string $customer
 * @property double $order2005
 * @property double $order2006
 * @property double $order2007
 * @property double $order2008
 * @property string $delivery_date
 */
class Orders extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Orders the static model class
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
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee, country, customer, order2005, order2006, order2007, order2008, delivery_date', 'required'),
			array('order2005, order2006, order2007, order2008', 'numerical'),
			array('employee, customer', 'length', 'max'=>31),
			array('country', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('order_no, employee, country, customer, order2005, order2006, order2007, order2008, delivery_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'order_no' => 'Order No',
			'employee' => 'Employee',
			'country' => 'Country',
			'customer' => 'Customer',
			'order2005' => 'Order2005',
			'order2006' => 'Order2006',
			'order2007' => 'Order2007',
			'order2008' => 'Order2008',
			'delivery_date' => 'Delivery Date',
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

		$criteria->compare('order_no',$this->order_no);
		$criteria->compare('employee',$this->employee,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('customer',$this->customer,true);
		$criteria->compare('order2005',$this->order2005);
		$criteria->compare('order2006',$this->order2006);
		$criteria->compare('order2007',$this->order2007);
		$criteria->compare('order2008',$this->order2008);
		$criteria->compare('delivery_date',$this->delivery_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}