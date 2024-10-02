<?php
	function delete($id){
		$url = 'https://app.nocodb.com/api/v2/tables/m70olwd2gvc9u4k/records';

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

	if(isset($_POST['id'])){
		$id=$_POST['id'];

		$response=delete($id);
		$respon=json_decode($response);
		if(isset($respon->error)){
			echo json_encode(array("status"=>0,"message"=>"data gagal dihapus, ".str_replace("'","",$respon->message)));
		} else {
			echo json_encode(array("status"=>1,"message"=>"data berhasil dihapus"));
		}
	} else {
		echo 'tidak ada data untuk dilihat';
		exit();
	}	
?>