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
					<?php echo ( $data->CreatedAt ? date('d F Y H:i', strtotime($data->CreatedAt)) : "-");?>
                    </div>
                </div>
                <div class="flex justify-between mb-6 gap-4">
					<div class="p-3 w-1/4">
						<?php echo ( isset($data->image) ? "<img src='".$data->image[0]->signedUrl."' alt='".$data->judul."' />" : "<image src='".Yii::app()->request->baseUrl."/images/no-image.jpg' alt='no-image' />");?>
					</div>
                    <div class="w-3/4 p-3">
						<?php echo $data->deskripsi;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>