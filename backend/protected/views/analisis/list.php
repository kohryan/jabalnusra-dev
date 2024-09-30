<?php
	/* @var $this SiteController */
	$this->pageTitle=Yii::app()->name;

	function getData($offset){
		if(isset($_GET['page'])){
			$offset=(($_GET['page'])- 1 ) * 10;
		}

		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/mv3a6vki2zw6byo/records?offset=".$offset."&limit=10",
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
			// exit();
			return $response;
		}
	}

	$listSatker=getData(0);
	$jsondata=json_decode($listSatker);
	
	$totalData=$jsondata->pageInfo->totalRows;
	$page=( isset($jsondata->pageInfo->page) ? $jsondata->pageInfo->page : (isset($jsondata->pageInfo->offset) ? $jsondata->pageInfo->offset : 1) );
	$itemPerPages=$jsondata->pageInfo->pageSize;
	$pages=ceil($totalData/$itemPerPages);
	$offset=$page * $itemPerPages;
	
	$table="<table class='border-collapse min-w-full border border-primary dark:border-slate-600 bg-white dark:bg-slate-800 text-sm shadow-sm'>
	<thead class='bg-slate-50 dark:bg-slate-700'>
	<tr>
		<th class='border border-primary dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-start'>No</th>
		<th class='border border-primary dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-start'>Judul</th>
		<th class='border border-primary dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-start'>Deskripsi</th>
		<th class='border border-primary dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-start'>File Analisis</th>
		<th class='border border-primary dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-start'>Satker</th>
		<th class='border border-primary dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-start'>Aksi</th>
	</tr>
	</thead> <tbody>";
	if($jsondata->list){

		foreach($jsondata->list as $i=>$data){
			$table.="<tr>
				<td class='border border-primary dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400'>".($i + 1)."</td>
				<td class='border border-primary dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400'>".$data->judul."</td>
				<td class='border border-primary dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400'>".implode(' ', array_slice(explode(' ', strip_tags($data->deskripsi)),0,100))." ....</td>
				<td class='border border-primary dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400'>".( isset($data->file) ? "<a href='".$data->file[0]->signedUrl."' target='_blank'>".( isset($data->cover) ? "<img src='".$data->cover[0]->thumbnails->card_cover->signedUrl."' alt='".$data->judul."' />" : '-')."</a>" : '-')."</td>
				<td class='border border-primary dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400'>".( $data->satker_id ? $data->satker->nama : "-")."</td>
				<td class='border border-primary dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400'>".CHtml::link('<i class="ri-eye-line"></i>',Yii::app()->createUrl('analisis/view',array("id"=>$data->Id)))."&nbsp;&nbsp;&nbsp;".CHtml::link('<i class="ri-edit-2-line"></i>',Yii::app()->createUrl('analisis/update',array('id'=>$data->Id)))."&nbsp;&nbsp;&nbsp;<span style='cursor: pointer;' onClick='del(".$data->Id.");'><i class=' ri-delete-bin-line'></i></span></td>
			</tr>";
		}
	}
	$table.="</tbody></table>";
	
	$firstPage=1;
	$lastPage=$pages;
	
?>

<main class="p-6">
	<div class="flex flex-col gap-6">
        <div class="card">
        	<div class="card-header">
            	<div class="flex justify-between items-center">
                	<h4 class="card-title">Daftar Analisis</h4>
                	<div class='btn rounded border border-success text-success hover:bg-success hover:text-white' ><a href='<?php echo Yii::app()->createUrl('analisis/create');?>'><i class='ri-add-box-line'></i>&nbsp;&nbsp;Tambah Analisis</a></div>
                </div>
            </div>
            
			<div class="p-6">
            	<div id="table-gridjs" class="relative overflow-auto">
					<?php echo $table;?>
				</div>
				<div class="row mt-3">
					<div class="flex justify-end items-center">
						<?php
							$pagination="";
							if($lastPage <=10 ){
								for($i=1;$i<=$lastPage;$i++){
									$pagination.="<a href='?page=".($i)."' class='btn btn-sm bg-light text-dark rounded-none'>".$i."</a>";
								}
							} 

							echo $pagination;
						?>
                    </div>
				</div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
	function del(id){
		alert("Delete "+id);
		$.ajax({
			url: '<?php echo Yii::app()->createUrl('analisis/delete');?>',
			data: {'id':id},
			dataType: 'json',
			type : 'post',
			success : function(response) {
				// console.log(response.status);
				alert(response.message);
				location.reload();
			}
		});
	}
</script>