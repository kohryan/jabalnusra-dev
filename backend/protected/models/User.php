<?php

class User extends CFormModel
{
    public $username; // Attribute for the uploaded file
    public $password; // Attribute for the uploaded file
    public $salt; // Attribute for the uploaded file
    public $role; // Attribute for the uploaded file
    public $satker; // Attribute for the uploaded file

    private $project_id = 'pb4s8zh6oda0g65';
    private $table_id = 'mw4b79m61mgt01s';
    private $xc_token = 'zfzit5j0r0nIGO_QTwhhTEktdzk9RabhNgmI5yn3';
    private $urlStorage='https://app.nocodb.com/api/v2/storage/upload';
    // private $urlTable="https://app.nocodb.com/api/v2/tables/".$table_id."/records";

    public $field=array(
        "username"  => "",
        "password"  => "",
        "salt"      => "",
        "role"      => "",
        "satker"    => "",
    );

    public function rules()
    {
        return [
            ['username,password,salt,role,satker','required'],
        ];
    }

    public function list($limit=10,$page=1){
        $offset=($page - 1 ) * $limit;
        $curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/{$this->table_id}/records?offset=".$offset."&limit=".$limit,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				'xc-token: ' . $this->xc_token
			],
		]);
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			return null;
		} else {
			return $response;
		}
    }

    public function findById($id){
        $curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/{$this->table_id}/records/".$id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				'xc-token: ' . $this->xc_token
			],
		]);
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			return null;
		} else {
			return $response;
		}
    }

    public function create($data){
        foreach($this->field as $k=>$v){
            $this->field[$k]=$data[$k];
        }

        $url = "https://app.nocodb.com/api/v2/tables/{$this->table_id}/records";

        // Initialize cURL for inserting the record
        $ch = curl_init();
        
        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'xc-token: ' . $this->xc_token
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->field));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Execute the request
        $response = curl_exec($ch);
        curl_close($ch);
        
        $respon=json_decode($response);
		if(isset($respon->error)){
			return array("status"=>0,"message"=>"user gagal disimpan, ".str_replace("'","",$respon->message));
		} 
        return array("status"=>1,"message"=>"user berhasil disimpan");
    }

    public function update($data){
        $this->field["Id"]=$data["Id"];
        foreach($this->field as $k=>$v){
            $this->field[$k]=$data[$k];
        }

        $url = "https://app.nocodb.com/api/v2/tables/{$this->table_id}/records";

        // Initialize cURL for inserting the record
        $ch = curl_init();
        
        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'xc-token: ' . $this->xc_token
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->field));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Execute the request
        $response = curl_exec($ch);
        curl_close($ch);
        
        $respon=json_decode($response);
		if(isset($respon->error)){
			return array("status"=>0,"message"=>"user gagal diupdate, ".str_replace("'","",$respon->message));
		} 
        return array("status"=>1,"message"=>"user berhasil diupdate");
    }

    public function delete($id){
        $url = "https://app.nocodb.com/api/v2/tables/{$this->table_id}/records";

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
			'xc-token: '.$this->xc_token, // API token
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
			$respon=json_decode($response);
            if(isset($respon->error)){
                return array("status"=>0,"message"=>"user gagal dihapus, ".str_replace("'","",$respon->message));
            } 
            return array("status"=>1,"message"=>"user berhasil dihapus");
		}

		// Close cURL session
		curl_close($ch);
    }
}
?>