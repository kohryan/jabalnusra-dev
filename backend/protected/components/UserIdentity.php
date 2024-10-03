<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate(){
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/mw4b79m61mgt01s/records?where=(username,eq,".$this->username.")&limit=1&shuffle=0&offset=0",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				'xc-token: zfzit5j0r0nIGO_QTwhhTEktdzk9RabhNgmI5yn3'
			],
		]);
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} else {
			$jsondata=json_decode($response);
			if($jsondata->list){
				$this->_id=$jsondata->list[0]->Id;
				$this->username=$jsondata->list[0]->username;

				Yii::app()->user->setState("role", $jsondata->list[0]->role);
				Yii::app()->user->setState("satker_id", $jsondata->list[0]->satker_id);
				Yii::app()->user->setState("satker", ($jsondata->list[0]->satker ? $jsondata->list[0]->satker->nama : '-'));
				$this->errorCode=self::ERROR_NONE;
			} 
		}

		return $this->errorCode==self::ERROR_NONE; 
	}

	public function get_Username() {
		return $this->username;
	}

	public function getId()
	{
		return $this->_id;
	}
}