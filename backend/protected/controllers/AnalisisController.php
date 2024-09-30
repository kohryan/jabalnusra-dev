<?php

class AnalisisController extends Controller
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
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('list');
	}

	public function actionCreate(){
		if(isset($_POST['judul'])){
			echo json_encode($_POST['judul']);
			exit();
		}
		$this->render('create');
	}

	public function actionUpdate(){
		$this->render('update');
	}

	public function actionDelete(){
		if(isset($_POST['id'])){
			$id=(int)$_POST['id'];
			try {
				$response=$this->delete($id);
				$respon=json_decode($response);
				if(isset($respon->error)){
					echo json_encode(array("status"=>0,"message"=>"data gagal dihapus, ".str_replace("'","",$respon->message)));
				} else {
					echo json_encode(array("status"=>1,"message"=>"data berhasil dihapus"));
				}
			} catch( Exception $e){
				echo json_encode(array("status"=>0,"message"=>"data gagal dihapus, ".str_replace("'","",$respon->message)));
			}
		}
	}

	protected function delete($id){
		$url = 'https://app.nocodb.com/api/v2/tables/mv3a6vki2zw6byo/records';

		// Data to be sent in the DELETE request
		$data = array(
			'Id' => $id
		);

		// Initialize cURL
		$ch = curl_init($url);

		// Set cURL options
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");  // Set HTTP method to DELETE
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);      // Return response as a string
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'accept: */*',                                   // Accept header
			'xc-token: zfzit5j0r0nIGO_QTwhhTEktdzk9RabhNgmI5yn3', // API token
			'Content-Type: application/json'                 // Content type
		));
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  // Attach data in JSON format

		// Execute the request
		$response = curl_exec($ch);

		// Check for errors
		if (curl_errno($ch)) {
			return null;
		} else {
			// Output response from the server
			// echo json_encode($response)."<br>";
			return $response;
		}

		// Close cURL session
		curl_close($ch);
	}

	protected function add($data){

	}
	
	public function actionView(){
		$this->render('view');
	}

}