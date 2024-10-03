<?php

class BeritaController extends Controller
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
		$model=new Berita;
		$page=1;
		if(isset($_GET['page'])){
			$page=(int)$_GET['page'];
		}
		$berita=$model->list(10,$page); //limit,page
		$this->render('list',array('berita'=>$berita,'page'=>$page));
	}

	public function actionCreate(){
		$model=new Berita;
		if(isset($_POST['Berita'])){
			$model->attributes=$_POST['Berita'];
			$judul=$_POST['Berita']['judul'];
			$deskripsi=$_POST['Berita']['deskripsi'];

			$data=array(
				"judul"     => $judul,
				"deskripsi" => $deskripsi,
				"satker_id" => Yii::app()->user->satker_id,
				"user_id"   => Yii::app()->user->id,
				"image"     => ""
			);

			$uploadedFile = CUploadedFile::getInstance($model, 'file');
			$filepath="";
			if($uploadedFile){
				if ($model->validate()) {
					$filePath = YiiBase::getPathOfAlias("webroot").'/assets/berita/' . strtolower( preg_replace('/[^a-zA-Z0-9]/', '-', $judul)).".".$uploadedFile->extensionName; // tuliskan '/../assets/berita/' jika ingin diupload pada asset
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
		$model=new Berita;
		if(isset($_POST['Berita'])){
			$model->attributes=$_POST['Berita'];
			$judul=$_POST['Berita']['judul'];
			$deskripsi=$_POST['Berita']['deskripsi'];

			$data=array(
				"Id"		=> $id,
				"judul"     => $judul,
				"deskripsi" => $deskripsi,
				"satker_id" => Yii::app()->user->satker_id,
				"user_id"   => Yii::app()->user->id,
				"image"     => ""
			);

			$uploadedFile = CUploadedFile::getInstance($model, 'file');
			$filepath="";
			if($uploadedFile){
				if ($model->validate()) {
					$filePath = YiiBase::getPathOfAlias("webroot").'/assets/berita/' . strtolower( preg_replace('/[^a-zA-Z0-9]/', '-', $judul)).".".$uploadedFile->extensionName; // tuliskan '/../assets/berita/' jika ingin diupload pada asset
					if ($uploadedFile->saveAs($filePath)) {
						$data['path']=$filePath;
					}
				} 
			}

			$responses=$model->update($data);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			return $this->redirect(array('index'));
		}

		$data_berita=$model->findById($id);
		if($data_berita){
			$data=json_decode($data_berita);
			$oldFile=( isset($data->image) ? $data->image[0]->signedUrl : null);
			$model->judul= $data->judul;
			$model->deskripsi=$data->deskripsi;
			$model->file=$oldFile;
		}
		$this->render('create',array('model'=>$model));
	}

	public function actionDelete(){
		if(Yii::app()->request->isPostRequest){
			$id = Yii::app()->request->getPost('id');

			$model=new Berita;
			$responses=$model->delete($id);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			echo json_encode($responses);
			// return $this->redirect(array('index'));
		} else {
			throw new CHttpException(403,'Anda tidak diizinkan untuk melakukan action ini.');
		}
	}

	public function actionView($id){
		$model=new Berita;
		$data_berita=$model->findById($id);
		if($data_berita){
			$data=json_decode($data_berita);
	
			$this->render('view',array('data'=>$data));
		}
	}

}