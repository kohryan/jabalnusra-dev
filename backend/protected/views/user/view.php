<?php
	function getData($id){
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/mw4b79m61mgt01s/records/".$id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"xc-token: zfzit5j0r0nIGO_QTwhhTEktdzk9RabhNgmI5yn3"
			],
		]);
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			return null;
		} else {
			// echo json_encode($response)."<br>";
			return $response;
		}
	}

	if(isset($_GET['id'])){
		$id=$_GET['id'];

		$response=getData($id);
		if($response){
			$data=json_decode($response);

			echo $data->username."<br>";
			echo ( $data->satker_id ? $data->satker->nama : "-")."<br>";
		}
	} else {
		echo 'tidak ada data untuk dilihat';
		exit();
	}	
?>