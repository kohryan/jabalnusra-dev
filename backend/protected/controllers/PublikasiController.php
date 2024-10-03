<?php

class PublikasiController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$model=new Publikasi;
		$page=1;
		if(isset($_GET['page'])){
			$page=(int)$_GET['page'];
		}
		$publikasi=$model->list(10,$page); //limit,page
		$this->render('list',array('publikasi'=>$publikasi,'page'=>$page));
	}

	public function actionCreate(){
		$model=new Publikasi;
		if(isset($_POST['Publikasi'])){
			$model->attributes=$_POST['Publikasi'];
			$judul=$_POST['Publikasi']['judul'];
			$abstraksi=$_POST['Publikasi']['abstraksi'];

			$data=array(
				"judul"     => $judul,
				"abstraksi" => $abstraksi,
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
		$model=new Publikasi;
		if(isset($_POST['Publikasi'])){
			$model->attributes=$_POST['Publikasi'];
			$judul=$_POST['Publikasi']['judul'];
			$abstraksi=$_POST['Publikasi']['abstraksi'];

			$data=array(
				"Id"		=> $id,
				"judul"     => $judul,
				"abstraksi" => $abstraksi,
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

		$data_publikasi=$model->findById($id);
		if($data_publikasi){
			$data=json_decode($data_publikasi);
			$oldFile=( isset($data->file) ? $data->file[0]->signedUrl : null);
			$oldCover=( isset($data->cover) ? $data->cover[0]->signedUrl : null);
			$model->judul= $data->judul;
			$model->abstraksi=$data->abstraksi;
			$model->file=$oldFile;
			$model->cover=$oldCover;
		}
		$this->render('create',array('model'=>$model));
	}

	public function actionDelete(){
		if(Yii::app()->request->isPostRequest){
			$id = Yii::app()->request->getPost('id');

			$model=new Publikasi;
			$responses=$model->delete($id);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			echo json_encode($responses);
			// return $this->redirect(array('index'));
		} else {
			throw new CHttpException(403,'Anda tidak diizinkan untuk melakukan action ini.');
		}
	}

	public function actionView($id){
		$model=new Publikasi;
		$data_publikasi=$model->findById($id);
		if($data_publikasi){
			$data=json_decode($data_publikasi);
	
			$this->render('view',array('data'=>$data));
		}
	}

}