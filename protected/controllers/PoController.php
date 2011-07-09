<?php

class PoController extends Controller
{
	public $layout = '//layouts/extjs';

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionList()
	{
		$criteria  = new CDbCriteria;
		$criteria->limit = $_GET['limit'];
		$criteria->offset = $_GET['start'];

		$data = CJSON::encode(Po::model()->findAll($criteria));
		$total = Po::model()->count();
		echo "{\"po\": $data,\"total\" : $total}";
		Yii::app()->end();
	}

	public function actionCreate()
	{
		$input = $this->getDataInput();
		$data = $input['data'];
		$po = new Po();
		$po->attributes = $input['data'];
		if($po->save()){
			echo json_encode(array(
				'success' => true,
				'message' => 'Sukses membuat data baru',
				'data' => $po->attributes,
			));
		} else {
			echo json_encode(array(
				'success' => false,
				'message' => 'Gagal membuat data baru',
				'data' => $po->attributes,
			));
		}
		Yii::app()->end();
	}

	public function actionDestroy()
	{
		$input = $this->getDataInput();
		$po = Po::model()->findByPk($input['data']['id']);
		if($po->delete()) {
			echo CJSON::encode(array(
				'success' => true,
			));
		}
		Yii::app()->end();

	}

	public function actionUpdate()
	{
		$input = $this->getDataInput();
		$po = Po::model()->findByPk($input['data']['id']);
		$po->attributes = $input['data'];
		if($po->save()) {
			echo CJSON::encode(array(
				'success' => true,
				'data' => $po->attributes,
			));
		}
		Yii::app()->end();
	}


	protected function getDataInput()
	{
		$handle = fopen('php://input','r');
		$json = fgets($handle);
		return CJSON::decode($json);
	}

	protected function create($data)
	{

	}





}
