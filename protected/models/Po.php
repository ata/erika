<?php

/**
 * This is the model class for table "po".
 *
 * The followings are the available columns in table 'po':
 * @property string $id
 * @property string $po_number
 * @property string $wp_id
 * @property string $line_item
 * @property string $po_date
 * @property string $customer_po_no
 * @property string $area
 * @property string $po_received_date
 * @property string $po_status
 * @property string $qc_status
 * @property string $wcc_area
 * @property string $wcc_jakarta
 * @property string $tanda_terima_wcc
 * @property string $wcc_no
 * @property string $invoice
 * @property string $po_open
 * @property string $site_based_on_epm
 * @property string $site_name
 * @property string $po_description
 * @property string $po_tsel
 * @property string $remark
 */
class Po extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Po the static model class
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
		return 'po';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('po_number, wp_id', 'required'),
			array('po_number','required'),
			array('po_number, wp_id, line_item, customer_po_no, area, po_status, qc_status, wcc_no, po_open, site_based_on_epm, site_name, po_description, po_tsel, remark', 'length', 'max'=>255),
			array('po_number, wp_id, line_item, po_date, customer_po_no, area, po_received_date, po_status, qc_status, wcc_area, wcc_jakarta, tanda_terima_wcc, wcc_no, invoice, po_open, site_based_on_epm, site_name, po_description, po_tsel, remark', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, po_number, wp_id, line_item, po_date, customer_po_no, area, po_received_date, po_status, qc_status, wcc_area, wcc_jakarta, tanda_terima_wcc, wcc_no, invoice, po_open, site_based_on_epm, site_name, po_description, po_tsel, remark', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'po_number' => 'Po Number',
			'wp_id' => 'Wp',
			'line_item' => 'Line Item',
			'po_date' => 'Po Date',
			'customer_po_no' => 'Customer Po No',
			'area' => 'Area',
			'po_received_date' => 'Po Received Date',
			'po_status' => 'Po Status',
			'qc_status' => 'Qc Status',
			'wcc_area' => 'Wcc Area',
			'wcc_jakarta' => 'Wcc Jakarta',
			'tanda_terima_wcc' => 'Tanda Terima Wcc',
			'wcc_no' => 'Wcc No',
			'invoice' => 'Invoice',
			'po_open' => 'Po Open',
			'site_based_on_epm' => 'Site Based On Epm',
			'site_name' => 'Site Name',
			'po_description' => 'Po Description',
			'po_tsel' => 'Po Tsel',
			'remark' => 'Remark',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('po_number',$this->po_number,true);
		$criteria->compare('wp_id',$this->wp_id,true);
		$criteria->compare('line_item',$this->line_item,true);
		$criteria->compare('po_date',$this->po_date,true);
		$criteria->compare('customer_po_no',$this->customer_po_no,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('po_received_date',$this->po_received_date,true);
		$criteria->compare('po_status',$this->po_status,true);
		$criteria->compare('qc_status',$this->qc_status,true);
		$criteria->compare('wcc_area',$this->wcc_area,true);
		$criteria->compare('wcc_jakarta',$this->wcc_jakarta,true);
		$criteria->compare('tanda_terima_wcc',$this->tanda_terima_wcc,true);
		$criteria->compare('wcc_no',$this->wcc_no,true);
		$criteria->compare('invoice',$this->invoice,true);
		$criteria->compare('po_open',$this->po_open,true);
		$criteria->compare('site_based_on_epm',$this->site_based_on_epm,true);
		$criteria->compare('site_name',$this->site_name,true);
		$criteria->compare('po_description',$this->po_description,true);
		$criteria->compare('po_tsel',$this->po_tsel,true);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => 20,
			)
		));
	}
}
