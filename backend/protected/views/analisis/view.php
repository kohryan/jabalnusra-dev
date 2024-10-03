<main class="p-6">
    <!-- Page Title Start -->
	<div class="flex justify-between items-center mb-6">
		<h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Daftar Analisis</h4>

		<div class="md:flex hidden items-center gap-2.5 font-semibold">
			<div class="flex items-center gap-2">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>" class="text-sm font-medium text-slate-700 dark:text-slate-400">Beranda</a>
			</div>

			<div class="flex items-center gap-2">
				<i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
				<a href="<?php echo Yii::app()->createUrl('analisis/index');?>" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">Daftar Analisis</a>
			</div>

            <div class="flex items-center gap-2">
				<i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
				<a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page"><?php echo $data->judul;?></a>
			</div>
		</div>
	</div>
	<!-- Page Title End -->
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
                    	<?php echo ($data->user_id ? $data->user->username." - " : '').( $data->satker_id ? $data->satker->nama : "-");?>
                    </div>
                    <div class="">
					<?php echo ( $data->CreatedAt ? date('d F Y H:i', strtotime($data->CreatedAt)) : "-");?>
                    </div>
                </div>
                <div class="flex justify-between mb-6 gap-4">
					<div class="p-3 w-1/4">
						<?php echo ( isset($data->cover) ? "<img src='".$data->cover[0]->signedUrl."' alt='".$data->judul."' />" : "<image src='".Yii::app()->request->baseUrl."/images/no-images.jpg' alt='no-image' />");?>
					</div>
                    <div class="w-3/4 p-3">
						<?php echo $data->deskripsi;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>