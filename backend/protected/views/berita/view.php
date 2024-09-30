<?php
	function getData($id){
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/mws4ccim69pi1gy/records/".$id,
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


			// echo $data->judul."<br>";
			// echo $data->deskripsi."<br>";
			// echo ( isset($data->image) ? "<img src='".$data->image[0]->thumbnails->card_cover->signedUrl."' alt='".$data->judul."' />" : '-')."<br>";
			// echo ( $data->satker_id ? $data->satker->nama : "-")."<br>";
		}
	} else {
		echo 'tidak ada data untuk dilihat';
		exit();
	}	
?>
<main class="p-6">
    <div class="flex flex-col gap-6">
        <div class="card">
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title"><?php echo $data->judul;?></h4>
                </div>
            </div>

            <div class="card-body">
				<div class="flex justify-between items-center p-3">
                    <div class="">
                    	<?php echo ($data->user_id ? $data->user->username : '-')." - ".( $data->satker_id ? $data->satker->nama : "-");?>
                    </div>
                    <div class="">
						<?php echo ( $data->CreatedAt ? $data->CreatedAt : "-");?>
                    </div>
                </div>
                <div class="flex justify-between mb-6 gap-4">
					<div class="p-3">
						<?php echo ( isset($data->image) ? "<img src='".$data->image[0]->thumbnails->card_cover->signedUrl."' alt='".$data->judul."' />" : "<image src='".Yii::app()->request->baseUrl."/images/no-image.png' alt='no-image' />");?>
					</div>
                    <div class="w-full p-3">
						<?php echo $data->deskripsi;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>