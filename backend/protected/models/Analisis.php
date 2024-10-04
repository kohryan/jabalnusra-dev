<?php

class Analisis extends CFormModel
{
    public $judul; // Attribute for the uploaded file
    public $deskripsi; // Attribute for the uploaded file
    public $file; // Attribute for the uploaded file
    public $cover; // Attribute for the uploaded file

    private $project_id = 'pb4s8zh6oda0g65';
    private $table_id = 'mv3a6vki2zw6byo';
    private $xc_token = 'zfzit5j0r0nIGO_QTwhhTEktdzk9RabhNgmI5yn3';
    private $urlStorage='https://app.nocodb.com/api/v2/storage/upload';
    // private $urlTable="https://app.nocodb.com/api/v2/tables/".$table_id."/records";

    public $field=array(
        "judul"     => "",
        "deskripsi" => "",
        "satker_id" => "",
        "user_id"   => "",
        "file"     => "",
        "cover"     => ""
    );

    public function rules()
    {
        return [
            ['file', 'file', 'types' => 'pdf', 'maxSize' => 2 * 1024 * 1024, 'allowEmpty' => false , 'on' => 'create'],
            ['file', 'file', 'types' => 'pdf', 'maxSize' => 2 * 1024 * 1024, 'allowEmpty' => true , 'on' => 'update'],
            ['cover', 'file', 'types' => 'jpg, jpeg, png, webp', 'maxSize' => 2 * 1024 * 1024, 'allowEmpty' => true],
            ['judul,deskripsi','required'],
        ];
    }

    public function list($limit=10,$page=1){
        $offset=($page - 1 ) * $limit;
        $curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/{$this->table_id}/records?sort=-CreatedAt&offset=".$offset."&limit=".$limit.( Yii::app()->user->role=="SUPERADMIN" ? "" : "&where=(satker_id,eq,".Yii::app()->user->satker_id.")"),
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
			// echo json_encode($response)."<br>";
			// exit();
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

        if(isset($data['path_cover'])){
            $response_attachment_cover = $this->uploadAttachment($data['path_cover'], $this->xc_token);
            $this->field["cover"]=$response_attachment_cover;
        }

        if(isset($data['path_file'])){
            $response_attachment_file = $this->uploadAttachment($data['path_file'], $this->xc_token);
            $this->field["file"]=$response_attachment_file;
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
			return array("status"=>0,"message"=>"analisis gagal disimpan, ".str_replace("'","",$respon->message));
		} 
        return array("status"=>1,"message"=>"analisis berhasil disimpan");
    }

    public function update($data){
        $this->field["Id"]=$data["Id"];
        foreach($this->field as $k=>$v){
            $this->field[$k]=$data[$k];
        }

        if(isset($data['path_cover'])){
            $response_attachment_cover = $this->uploadAttachment($data['path_cover'], $this->xc_token);
            $this->field["cover"]=$response_attachment_cover;
        } else {
            unset($this->field["cover"]);
        }

        if(isset($data['path_file'])){
            $response_attachment_file = $this->uploadAttachment($data['path_file'], $this->xc_token);
            $this->field["file"]=$response_attachment_file;
        } else {
            unset($this->field["file"]);
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
			return array("status"=>0,"message"=>"analisis gagal diupdate, ".str_replace("'","",$respon->message));
		} 
        return array("status"=>1,"message"=>"analisis berhasil diupdate");
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
                return array("status"=>0,"message"=>"analisis gagal dihapus, ".str_replace("'","",$respon->message));
            } 
            return array("status"=>1,"message"=>"analisis berhasil dihapus");
		}

		// Close cURL session
		curl_close($ch);
    }

    // Function to insert image
    function uploadAttachment($path, $xc_token) {
        // Initialize cURL
        $ch = curl_init();
        $file = new CURLFile($path);

        // Prepare the form data
        $postData = array('file' => $file);
        
        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $this->urlStorage);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'xc-token: ' . $xc_token
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Execute the request
        $response = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($response, true);
    }

    public function count(){
        $curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/{$this->table_id}/records/count".( Yii::app()->user->role=="SUPERADMIN" ? "" : "?where=(satker_id,eq,".Yii::app()->user->satker_id.")"),
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
			return 0;
		} else {
			$respon=json_decode($response);
            if($respon) return $respon->count;
		}
    }
}
?>