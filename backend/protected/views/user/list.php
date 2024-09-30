<html>
	<head>
		<title>NOCO DB APPS</title>
	</head>
	<body>
<?php
	function getData($offset){
		if(isset($_GET['page'])){
			$offset=(($_GET['page'])- 1 ) * 25;
		}

		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/mw4b79m61mgt01s/records?offset=".$offset."&limit=25",
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

	// echo '<iframe src="https://wcxz89gr.nocodb.com/#/nc/form/7f34f46c-dd2c-45b5-9dc5-256617366fe7" width="100%" height="50%" style="border: none;"></iframe><br>';

	$listSatker=getData(0);
	$jsondata=json_decode($listSatker);
	
	$totalData=$jsondata->pageInfo->totalRows;
	$page=( isset($jsondata->pageInfo->page) ? $jsondata->pageInfo->page : (isset($jsondata->pageInfo->offset) ? $jsondata->pageInfo->offset : 1) );
	$itemPerPages=$jsondata->pageInfo->pageSize;
	$pages=ceil($totalData/$itemPerPages);
	$offset=$page * $itemPerPages;
	
	$table="<a href='create.php'>Tambah User</a><br><br><table><tr>
		<th>No</th>
		<th>Username</th>
		<th>Satker</th>
		<th>Aksi</th>
	</tr>";
	if($jsondata->list){

		foreach($jsondata->list as $i=>$data){
			$table.="<tr>
				<td>".($i + 1)."</td>
				<td>".$data->username."</td>
				<td>".( $data->satker_id ? $data->satker->nama : "-")."</td>
				<td><a href='view.php?id=".$data->Id."'>View</a>&nbsp;&nbsp;&nbsp;<a href=''>Update</a>&nbsp;&nbsp;&nbsp;<span style='cursor: pointer;' onClick='del(".$data->Id.");'>Delete</span></td>
			</tr>";
		}
	}
	$table.="</table>";
	echo $table;
	
	$firstPage=1;
	$lastPage=$pages;
	$page_list="<table><tr>";
	if($lastPage <=5 ){
		for($i=1;$i<=$lastPage;$i++){
			$page_list.="<td><a href='?page=".($i)."'>".($i)."</a></td>";
		}
	} else {
		$page_list.="<td><a href='?page=".($firstPage)."'>".($firstPage)."</a></td>";
		for($i=($page-2);$i<=($page+2);$i++){
			$page_list.="<td><a href='?page=".($i)."'>".($i)."</a></td>";
		}
		$page_list.="<td><a href='?page=".($lastPage)."'>".($lastPage)."</a></td>";
	}
	$page_list.="</tr></table>";
	echo $page_list;
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
	function del(id){
		alert("Delete "+id);
		$.ajax({
			url: 'delete.php',
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
</body>
</html>