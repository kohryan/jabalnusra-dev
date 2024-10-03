<?php

class SatkerController extends Controller
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
		$model=new Satker;
		$page=1;
		if(isset($_GET['page'])){
			$page=(int)$_GET['page'];
		}
		$satker=$model->list(10,$page); //limit,page
		$this->render('list',array('satker'=>$satker,'page'=>$page));
	}

	public function actionCreate(){
		$model=new Satker;
		if(isset($_POST['Satker'])){
			$model->attributes=$_POST['Satker'];
			$nama=$_POST['Satker']['nama'];
			$satker=$_POST['Satker']['satker'];
			$url=$_POST['Satker']['url'];

			$data=array(
				"nama"   => $nama,
				"satker"   => $satker,
				"url"   => $url,
			);

			$responses=$model->create($data);
			
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			return $this->redirect(array('create'));
		}
		$this->render('create',array('model'=>$model));
	}

	public function actionUpdate($id){
		$model=new Satker;
		if(isset($_POST['Satker'])){
			$model->attributes=$_POST['Satker'];
			$nama=$_POST['Satker']['nama'];
			$satker=$_POST['Satker']['satker'];
			$url=$_POST['Satker']['url'];

			$data=array(
				"Id"	=> $id,
				"nama"   => $nama,
				"satker"   => $satker,
				"url"   => $url,
			);

			$responses=$model->update($data);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			return $this->redirect(array('index'));
		}

		$data_satker=$model->findById($id);
		if($data_satker){
			$data=json_decode($data_satker);
			
			$model->nama=$data->nama;
			$model->satker=$data->satker;
			$model->url=$data->url;
		}

		$this->render('create',array('model'=>$model));
	}

	public function actionDelete(){
		if(Yii::app()->request->isPostRequest){
			$id = Yii::app()->request->getPost('id');

			$model=new Satker;
			$responses=$model->delete($id);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			echo json_encode($responses);
			// return $this->redirect(array('index'));
		} else {
			throw new CHttpException(403,'Anda tidak diizinkan untuk melakukan action ini.');
		}
	}

	public function actionView($id){
		$model=new Satker;
		$data_satker=$model->findById($id);
		if($data_satker){
			$data=json_decode($data_satker);
			$this->render('view',array('data'=>$data));
		}
	}

}