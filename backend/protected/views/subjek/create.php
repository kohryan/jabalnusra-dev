<main class="p-6">
	<!-- Page Title Start -->
	<div class="flex justify-between items-center mb-6">
		<h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Tambah Subjek Baru</h4>

		<div class="md:flex hidden items-center gap-2.5 font-semibold">
			<div class="flex items-center gap-2">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>" class="text-sm font-medium text-slate-700 dark:text-slate-400">Beranda</a>
			</div>

			<div class="flex items-center gap-2">
				<i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
				<a href="<?php echo Yii::app()->createUrl('subjek/index');?>" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">Subjek</a>
			</div>

			<div class="flex items-center gap-2">
				<i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
				<a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">Tambah Subjek Baru</a>
			</div>
		</div>
	</div>
	<!-- Page Title End -->

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