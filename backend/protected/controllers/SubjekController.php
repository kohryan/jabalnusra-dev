<?php

class SubjekController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}


	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$model=new Subjek;
		$page=1;
		if(isset($_GET['page'])){
			$page=(int)$_GET['page'];
		}
		$subjek=$model->list(10,$page); //limit,page
		$this->render('list',array('subjek'=>$subjek,'page'=>$page));
	}

	public function actionCreate(){
		$model=new Subjek;
		if(isset($_POST['Subjek'])){
			$model->attributes=$_POST['Subjek'];
			$nama=$_POST['Subjek']['nama'];

			$data=array(
				"nama"   => $nama,
				"icon"     => ""
			);

			$uploadedFile = CUploadedFile::getInstance($model, 'icon');
			$filepath="";
			if($uploadedFile){
				if ($model->validate()) {
					$filePath = YiiBase::getPathOfAlias("webroot").'/assets/subjek/' . strtolower( preg_replace('/[^a-zA-Z0-9]/', '-', $nama)).".".$uploadedFile->extensionName; // tuliskan '/../assets/subjek/' jika ingin diupload pada asset
					if ($uploadedFile->saveAs($filePath)) {
						$data['path']=$filePath;
					}
				} 
			}

			$responses=$model->create($data);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			return $this->redirect(array('create'));
		}
		$this->render('create',array('model'=>$model));
	}

	public function actionUpdate($id){
		$model=new Subjek;
		if(isset($_POST['Subjek'])){
			$model->attributes=$_POST['Subjek'];
			$nama=$_POST['Subjek']['nama'];

			$data=array(
				"Id"	=> $id,
				"nama"   => $nama,
				"icon"     => ""
			);
			$uploadedFile = CUploadedFile::getInstance($model, 'icon');
			$filepath="";
			if($uploadedFile){
				if ($model->validate()) {
					$filePath = YiiBase::getPathOfAlias("webroot").'/assets/subjek/' . strtolower( preg_replace('/[^a-zA-Z0-9]/', '-', $nama)).".".$uploadedFile->extensionName; // tuliskan '/../assets/subjek/' jika ingin diupload pada asset
					if ($uploadedFile->saveAs($filePath)) {
						$data['path']=$filePath;
					}
				} 
			}

			$responses=$model->update($data);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			return $this->redirect(array('index'));
		}

		$data_subjek=$model->findById($id);
		if($data_subjek){
			$data=json_decode($data_subjek);
			$oldFile=( isset($data->icon) ? $data->icon[0]->signedUrl : null);
			$model->nama=$data->nama;
			$model->icon=$oldFile;
		}
		$this->render('create',array('model'=>$model));
	}

	public function actionDelete(){
		if(Yii::app()->request->isPostRequest){
			$id = Yii::app()->request->getPost('id');

			$model=new Subjek;
			$responses=$model->delete($id);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			echo json_encode($responses);
			// return $this->redirect(array('index'));
		} else {
			throw new CHttpException(403,'Anda tidak diizinkan untuk melakukan action ini.');
		}
	}

	public function actionView($id){
		$model=new Subjek;
		$data_subjek=$model->findById($id);
		if($data_subjek){
			$data=json_decode($data_subjek);
			$dataIndikator=$model->dataIndikator($id,1,50);
			$this->render('view',array('data'=>$data,'dataIndikator'=>$dataIndikator));
		}
	}

}