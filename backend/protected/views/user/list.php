<?php
	/* @var $this SiteController */
	$this->pageTitle=Yii::app()->name;

	$jsondata=json_decode($user);
	
	$totalData=$jsondata->pageInfo->totalRows;
	$page=( isset($jsondata->pageInfo->page) ? $jsondata->pageInfo->page : (isset($jsondata->pageInfo->offset) ? $jsondata->pageInfo->offset : 1) );
	$itemPerPages=$jsondata->pageInfo->pageSize;
	$pages=ceil($totalData/$itemPerPages);
	$offset=$page * $itemPerPages;
	
	$table="<table class='border-collapse min-w-full border border-primary dark:border-slate-600 bg-white dark:bg-slate-800 text-sm shadow-sm'>
	<thead class='bg-slate-50 dark:bg-slate-700'>
	<tr>
		<th class='border border-primary dark:border-slate-600 font-semibold p-2 text-slate-900 dark:text-slate-200 text-start'>No</th>
		<th class='border border-primary dark:border-slate-600 font-semibold p-2 text-slate-900 dark:text-slate-200 text-start'>Username</th>
		<th class='border border-primary dark:border-slate-600 font-semibold p-2 text-slate-900 dark:text-slate-200 text-start'>Role</th>
		<th class='border border-primary dark:border-slate-600 font-semibold p-2 text-slate-900 dark:text-slate-200 text-start'>Instansi</th>
		<th class='border border-primary dark:border-slate-600 font-semibold p-2 text-slate-900 dark:text-slate-200 text-start'>Aksi</th>
	</tr>
	</thead> <tbody>";
	if($jsondata->list){

		foreach($jsondata->list as $i=>$data){
			
			$table.="<tr>
				<td class='border border-primary dark:border-slate-700 p-2 text-slate-500 dark:text-slate-400'>".($i + 1)."</td>
				<td class='border border-primary dark:border-slate-700 p-2 text-slate-500 dark:text-slate-400'>".$data->username."</td>
				<td class='border border-primary dark:border-slate-700 p-2 text-slate-500 dark:text-slate-400'>".$data->role."</td>
				<td class='border border-primary dark:border-slate-700 p-2 text-slate-500 dark:text-slate-400'>".( $data->satker ? $data->satker->nama : "" )."</td>
				<td class='border border-primary dark:border-slate-700 p-2 text-slate-500 dark:text-slate-400'>".CHtml::link('<i class="text-primary ri-edit-2-line"></i>',Yii::app()->createUrl('user/update',array('id'=>$data->Id)))."&nbsp;&nbsp;&nbsp;<span style='cursor: pointer;' onClick='del(".$data->Id.");'><i class='text-primary ri-delete-bin-line'></i></span></td>
			</tr>";
		}
	}
	$table.="</tbody></table>";
	
	$firstPage=1;
	$lastPage=$pages;
	
?>

<main class="p-6">
	<!-- Page Title Start -->
	<div class="flex justify-between items-center mb-6">
		<h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Pengguna</h4>

		<div class="md:flex hidden items-center gap-2.5 font-semibold">
			<div class="flex items-center gap-2">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>" class="text-sm font-medium text-slate-700 dark:text-slate-400">Beranda</a>
			</div>

			<div class="flex items-center gap-2">
				<i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
				<a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">Pengguna</a>
			</div>
		</div>
	</div>
	<!-- Page Title End -->

	<div class="flex flex-col gap-6">
        <div class="card">
        	<div class="card-header">
            	<div class="flex justify-between items-center">
                	<h4 class="card-title">Daftar User</h4>
                	<div class='btn rounded border border-success text-success hover:bg-success hover:text-white' ><a href='<?php echo Yii::app()->createUrl('user/create');?>'><i class='ri-add-box-line'></i>&nbsp;&nbsp;Tambah User</a></div>
                </div>
            </div>
            
			<div class="p-6">
				<?php
					foreach(Yii::app()->user->getFlashes() as $key => $message) {
						echo '<div class="bg-'.$key.'/10 text-'.$key.'   border border-'.$key.'/20 text-sm rounded-md py-3 px-5 mb-4" role="alert">'.$message.'</div>';
					}
				?>
            	<div id="table-gridjs" class="relative overflow-auto">
					<?php echo $table;?>
				</div>
				<div class="row mt-3">
					<div class="flex justify-end items-center">
						<?php
							$pagination="";
							if($lastPage <=10 ){
								for($i=1;$i<=$lastPage;$i++){
									$pagination.="<a href='?page=".($i)."' class='me-1 btn btn-sm ".( ($page==$i) ? 'bg-primary text-white' : 'bg-light text-dark' )." rounded-none'>".$i."</a>";
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

<?php
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.min.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/libs/loading-overlay/loadingoverlay.js', CClientScript::POS_END);
?>
<script type="text/javascript">
	function del(id){
		$.ajax({
			url: '<?php echo Yii::app()->createUrl('user/delete');?>',
			data: {'id':id},
			dataType: 'json',
			type : 'post',
			beforeSend : function (){
                $.LoadingOverlay("show", {
                    background  : "rgba(0, 0, 0, 0.5)",
                    image       : "",
                    text        : "Loading..."
                });
            },
			success : function(response) {
				location.reload();
				$.LoadingOverlay("hide");
			}
		});
	}
</script>