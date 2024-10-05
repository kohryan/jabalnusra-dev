<?php

class AnalisisController extends Controller
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
		$model=new Analisis;
		$page=1;
		if(isset($_GET['page'])){
			$page=(int)$_GET['page'];
		}
		$analisis=$model->list(10,$page); //limit,page
		$this->render('list',array('analisis'=>$analisis,'page'=>$page));
	}

	public function actionCreate(){
		$model=new Analisis;
		if(isset($_POST['Analisis'])){
			$model->attributes=$_POST['Analisis'];
			$judul=$_POST['Analisis']['judul'];
			$deskripsi=$_POST['Analisis']['deskripsi'];

			$data=array(
				"judul"     => $judul,
				"deskripsi" => $deskripsi,
				"satker_id" => Yii::app()->user->satker_id,
				"user_id"   => Yii::app()->user->id,
				"file"     => "",
				"namafile"	=> "",
        		"cover"     => ""
			);

			$uploadedFile = CUploadedFile::getInstance($model, 'file');
			$filepath="";
			if($uploadedFile){
				if ($model->validate()) {
					$filePath = YiiBase::getPathOfAlias("webroot").'/../assets/analisis/' . strtolower( preg_replace('/[^a-zA-Z0-9]/', '-', $judul)).".".$uploadedFile->extensionName; // tuliskan '/../assets/publikasi/' jika ingin diupload pada asset
					if ($uploadedFile->saveAs($filePath)) {
						$data['path_file']=$filePath;
						$data['namafile']=strtolower( preg_replace('/[^a-zA-Z0-9]/', '-', $judul)).".".$uploadedFile->extensionName;
					}
				} 
			}

			$uploadedCover = CUploadedFile::getInstance($model, 'cover');
			$coverpath="";
			if($uploadedCover){
				if ($model->validate()) {
					$coverPath = YiiBase::getPathOfAlias("webroot").'/assets/publikasi/cover_' . strtolower( preg_replace('/[^a-zA-Z0-9]/', '-', $judul)).".".$uploadedCover->extensionName; // tuliskan '/../assets/publikasi/' jika ingin diupload pada asset
					if ($uploadedCover->saveAs($coverPath)) {
						$data['path_cover']=$coverPath;
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
		$model=new Analisis;
		if(isset($_POST['Analisis'])){
			$model->attributes=$_POST['Analisis'];
			$judul=$_POST['Analisis']['judul'];
			$deskripsi=$_POST['Analisis']['deskripsi'];

			$data=array(
				"Id"		=> $id,
				"judul"     => $judul,
				"deskripsi" => $deskripsi,
				"satker_id" => Yii::app()->user->satker_id,
				"user_id"   => Yii::app()->user->id,
				"file"     => "",
        		"cover"     => ""
			);

			$uploadedFile = CUploadedFile::getInstance($model, 'file');
			$filepath="";
			if($uploadedFile){
				if ($model->validate()) {
					$filePath = YiiBase::getPathOfAlias("webroot").'/assets/publikasi/file_' . strtolower( preg_replace('/[^a-zA-Z0-9]/', '-', $judul)).".".$uploadedFile->extensionName; // tuliskan '/../assets/publikasi/' jika ingin diupload pada asset
					if ($uploadedFile->saveAs($filePath)) {
						$data['path_file']=$filePath;
						$data['namafile']=strtolower( preg_replace('/[^a-zA-Z0-9]/', '-', $judul)).".".$uploadedFile->extensionName;
					}
				}
			} 

			$uploadedCover = CUploadedFile::getInstance($model, 'cover');
			$coverpath="";
			if($uploadedCover){
				if ($model->validate()) {
					$coverPath = YiiBase::getPathOfAlias("webroot").'/assets/publikasi/cover_' . strtolower( preg_replace('/[^a-zA-Z0-9]/', '-', $judul)).".".$uploadedCover->extensionName; // tuliskan '/../assets/publikasi/' jika ingin diupload pada asset
					if ($uploadedCover->saveAs($coverPath)) {
						$data['path_cover']=$coverPath;
					}
				} 
			} 

			$responses=$model->update($data);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			return $this->redirect(array('index'));
		}

		$data_analisis=$model->findById($id);
		if($data_analisis){
			$data=json_decode($data_analisis);
			$oldFile=( isset($data->file) ? $data->file[0]->signedUrl : null);
			$oldCover=( isset($data->cover) ? $data->cover[0]->signedUrl : null);
			$model->judul= $data->judul;
			$model->deskripsi=$data->deskripsi;
			$model->file=$oldFile;
			$model->cover=$oldCover;
		}
		$this->render('create',array('model'=>$model));
	}

	public function actionDelete(){
		if(Yii::app()->request->isPostRequest){
			$id = Yii::app()->request->getPost('id');

			$model=new Analisis;
			$responses=$model->delete($id);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			echo json_encode($responses);
			// return $this->redirect(array('index'));
		} else {
			throw new CHttpException(403,'Anda tidak diizinkan untuk melakukan action ini.');
		}
	}

	public function actionView($id){
		$model=new Analisis;
		$data_analisis=$model->findById($id);
		if($data_analisis){
			$data=json_decode($data_analisis);
	
			$this->render('view',array('data'=>$data));
		}
	}

}