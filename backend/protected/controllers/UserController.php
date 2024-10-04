<?php

class UserController extends Controller
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
		$model=new User;
		$page=1;
		if(isset($_GET['page'])){
			$page=(int)$_GET['page'];
		}
		$user=$model->list(10,$page); //limit,page
		$this->render('list',array('user'=>$user,'page'=>$page));
	}

	public function actionCreate(){
		$model=new User;
		$satker=$model->satker();

		$optionSatker=array();
		if($satker){
			$datasatker=json_decode($satker);
			foreach($datasatker->list as $data){
				$optionSatker[$data->Id]=CHtml::decode($data->nama);
			}
		}

		if(isset($_POST['User'])){
			$model->attributes=$_POST['User'];
			$username=$_POST['User']['username'];			
			$role=$_POST['User']['role'];
			$satker_id=$_POST['User']['satker'];

			$data=array(
				'username'=>$username,
				'role'=>$role,
				'satker_id'=>$satker_id
			);

			$responses=$model->create($data);
			
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			return $this->redirect(array('create'));
		}
		$this->render('create',array('model'=>$model,'optionSatker'=>$optionSatker));
	}

	public function actionUpdate($id){
		$model=new User;
		$satker=$model->satker();

		$optionSatker=array();
		if($satker){
			$datasatker=json_decode($satker);
			foreach($datasatker->list as $data){
				$optionSatker[$data->Id]=CHtml::decode($data->nama);
			}
		}

		if(isset($_POST['User'])){
			$model->attributes=$_POST['User'];
			$username=$_POST['User']['username'];		
			$role=$_POST['User']['role'];
			$satker_id=$_POST['User']['satker'];

			$data=array(
				"Id"	=> $id,
				'username'=>$username,
				'role'=>$role,
				'satker_id'=>$satker_id
			);

			$responses=$model->update($data);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			return $this->redirect(array('index'));
		}

		$data_user=$model->findById($id);
		if($data_user){
			$data=json_decode($data_user);
			
			$model->username=$data->username;
			$model->role=$data->role;
			$model->satker=$data->satker_id;
		}

		$this->render('create',array('model'=>$model,'optionSatker'=>$optionSatker));
	}

	public function actionDelete(){
		if(Yii::app()->request->isPostRequest){
			$id = Yii::app()->request->getPost('id');

			$model=new User;
			$responses=$model->delete($id);
			Yii::app()->user->setFlash( ( ($responses["status"]==1) ? 'success' : 'danger'), $responses['message']);
			echo json_encode($responses);
			// return $this->redirect(array('index'));
		} else {
			throw new CHttpException(403,'Anda tidak diizinkan untuk melakukan action ini.');
		}
	}

	public function actionView($id){
		$model=new User;
		$data_user=$model->findById($id);
		if($data_user){
			$data=json_decode($data_user);
			$this->render('view',array('data'=>$data));
		}
	}

}