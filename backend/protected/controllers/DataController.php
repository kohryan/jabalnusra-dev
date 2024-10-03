<?php

class DataController extends Controller
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
		$model=new Data;
		$data=$model->list(10,0); //limit,page
		$this->render('list',array('data'=>$data));
	}

	public function actionCreate(){
		$model=new Data;
		$subjek=$model->subjek();
		
		$optionSubjek=array();
		if($subjek){
			$datasubjek=json_decode($subjek);
			foreach($datasubjek->list as $data){
				$optionSubjek[$data->Id]=CHtml::decode($data->nama);
			}
		}

		if(isset($_POST['Data'])){
			$model->attributes=$_POST['Data'];
			$judul=$_POST['Data']['judul'];
			$subjek=$_POST['Data']['subjek'];

			$data=array(
				"judul"   => $judul,
				"file"     => "",
				"satker_id" => 1,
				"user_id"   => 1,
				"subjek"     => $subjek
			);

			$uploadedFile = CUploadedFile::getInstance($model, 'file');
			$filepath="";
			if($uploadedFile){
				if ($model->validate()) {
					$filePath = YiiBase::getPathOfAlias("webroot").'/assets/data/' . strtolower( preg_replace('/[^a-zA-Z0-9]/', '-', $judul)).".".$uploadedFile->extensionName; // tuliskan '/../assets/data/' jika ingin diupload pada asset
					if ($uploadedFile->saveAs($filePath)) {
						$data['path']=$filePath;
					}
				} 
			}

			$responses=$model->create($data);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			return $this->redirect(array('create'));
		}
		$this->render('create',array('model'=>$model,'optionSubjek'=>$optionSubjek));
	}

	public function actionUpdate($id){
		$model=new Data;
		if(isset($_POST['Data'])){
			$model->attributes=$_POST['Data'];
			$judul=$_POST['Data']['judul'];
			$subjek=$_POST['Data']['subjek'];
			$data=array(
				"Id"	=> $id,
				"judul"   => $judul,
				"file"     => "",
				"satker_id" => 1,
				"user_id"   => 1,
				"subjek"     => $subjek
			);
			$uploadedFile = CUploadedFile::getInstance($model, 'file');
			$filepath="";
			if($uploadedFile){
				if ($model->validate()) {
					$filePath = YiiBase::getPathOfAlias("webroot").'/assets/data/' . strtolower( preg_replace('/[^a-zA-Z0-9]/', '-', $judul)).".".$uploadedFile->extensionName; // tuliskan '/../assets/data/' jika ingin diupload pada asset
					if ($uploadedFile->saveAs($filePath)) {
						$data['path']=$filePath;
					}
				} 
			}

			$responses=$model->update($data);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			return $this->redirect(array('index'));
		}

		$data_data=$model->findById($id);
		if($data_data){
			$data=json_decode($data_data);
			$oldFile=( isset($data->file) ? $data->file[0]->signedUrl : null);
			$model->judul=$data->judul;
			$model->file=$oldFile;
		}
		$this->render('create',array('model'=>$model));
	}

	public function actionDelete(){
		if(Yii::app()->request->isPostRequest){
			$id = Yii::app()->request->getPost('id');

			$model=new Data;
			$responses=$model->delete($id);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			echo json_encode($responses);
			// return $this->redirect(array('index'));
		} else {
			throw new CHttpException(403,'Anda tidak diizinkan untuk melakukan action ini.');
		}
	}

	public function actionView($id){
		$model=new Data;
		$data_data=$model->findById($id);
		if($data_data){
			$data=json_decode($data_data);
	
			$this->render('view',array('data'=>$data));
		}
	}

}