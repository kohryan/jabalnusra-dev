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
                    <h4 class="card-title">Tambah Subjek Baru</h4>
                </div>
            </div>
			<div class="card-body p-3 h-screen">
				<?php
					foreach(Yii::app()->user->getFlashes() as $key => $message) {
						echo '<div class="bg-'.$key.'/10 text-'.$key.'   border border-'.$key.'/20 text-sm rounded-md py-3 px-5 mb-4" role="alert">'.$message.'</div>';
					}
					
				$form = $this->beginWidget('CActiveForm', [
					'id' => 'form-Subjek',
					'htmlOptions' => ['enctype' => 'multipart/form-data'], // Important for file uploads
				]);
				?>
					<div class="mb-3">
						<?php echo $form->labelEx($model, 'nama'); ?>
						<?php echo $form->TextField($model, 'nama',array("class"=>"form-input")); ?>
						<?php echo $form->error($model, 'nama'); ?>
					</div>
					<div class="mb-3" >
						<?php echo $form->labelEx($model, 'icon'); ?>
						<?php echo $form->fileField($model, 'icon',array("class"=>"form-input border")); ?>
						<?php echo $form->error($model, 'icon'); ?>
						<?php
							echo ( isset($model->icon) ? '<span class="help-block text-success">File Icon : <a href="'.$model->icon.'" target="_blank">'.$model->nama.'</a></span>' : '');
						?>
                    </div>
					<div class="mb-3">
						<?php echo CHtml::submitButton('Tambah Subjek',array("class"=>"btn w-full bg-primary text-white")); ?>
                    </div>
				<?php $this->endWidget(); ?>
			</div>
		</div>
    </div>
</main>