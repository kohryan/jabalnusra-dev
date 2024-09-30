<link href="<?php echo Yii::app()->request->baseUrl; ?>/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css">
<style>
	.dropzone{min-height:230px;border-radius:.375rem;border-width:2px;border-style:dashed;--tw-border-opacity:1;border-color:rgb(229 231 235 / var(--tw-border-opacity));background-color:transparent}:is([data-mode=dark] .dropzone){--tw-border-opacity:1;border-color:rgb(75 85 99 / var(--tw-border-opacity))}
	[type=file]{background:unset;border-color:inherit;border-width:0;border-radius:0;font-size:unset;line-height:inherit}[type=file]:focus{outline:ButtonText solid 1px;outline:-webkit-focus-ring-color auto 1px}
</style>
<main class="p-6">
    <div class="flex flex-col gap-6">
		<div class="card">
			<div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title">Tambah Publikasi Baru</h4>
                </div>
            </div>
			<div class="card-body p-3">
				<?php echo CHtml::beginForm(); ?>
					<div class="mb-3">
						<label class="mb-2" for="judul">Judul <span class="text-danger">*</span></label>
						<input type="text" name="judul" id="judul" class="form-input">
					</div>
					<div class="mb-3">
						<label class="mb-2" for="abstraksi">Abstraksi <span class="text-danger">*</span></label>
						<textarea class="form-input" id="abstraksi" id="abstraksi" rows="5"></textarea>
					</div>
					<div class="dropzone mb-3" id="cover">
						<div class="fallback">
							<input name="filecover" type="file" multiple="multiple">
						</div>
						<div class="dz-message needsclick w-full">
							<div class="mb-3">
								<i class="ri-upload-cloud-line text-4xl text-gray-300 dark:text-gray-200"></i>
							</div>
							<h5 class="text-xl text-gray-600 dark:text-gray-200">Letakkan Gambar Cover disini untuk melakukan upload</h5>
						</div>
                    </div>
                    <div class="dropzone mb-3" id="filepdf">
						<div class="fallback">
							<input name="filepdf" type="file" multiple="multiple">
						</div>
						<div class="dz-message needsclick w-full">
							<div class="mb-3">
								<i class="ri-upload-cloud-line text-4xl text-gray-300 dark:text-gray-200"></i>
							</div>
							<h5 class="text-xl text-gray-600 dark:text-gray-200">Letakkan File Publikasi disini untuk melakukan upload</h5>
						</div>
                    </div>
					<div class="mb-3">
						<?php echo CHtml::submitButton('Tambah Publikasi',array('class'=>'btn w-full bg-primary text-white')); ?>
                    </div>
				<?php echo CHtml::endForm(); ?>
			</div>
		</div>
    </div>
</main>
<!-- Dropzone js -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/libs/dropzone/min/dropzone.min.js"></script>