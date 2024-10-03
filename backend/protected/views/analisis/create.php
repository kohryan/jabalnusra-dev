<main class="p-6">
	<!-- Page Title Start -->
	<div class="flex justify-between items-center mb-6">
		<h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Tambah Analisis Baru</h4>

		<div class="md:flex hidden items-center gap-2.5 font-semibold">
			<div class="flex items-center gap-2">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>" class="text-sm font-medium text-slate-700 dark:text-slate-400">Beranda</a>
			</div>

			<div class="flex items-center gap-2">
				<i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
				<a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">Tambah Analisis Baru</a>
			</div>
		</div>
	</div>
	<!-- Page Title End -->

    <div class="flex flex-col gap-6">
		<div class="card">
			<div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title">Tambah Analisis Baru</h4>
                </div>
            </div>
			<div class="card-body p-3 h-screen">
			<?php
					foreach(Yii::app()->user->getFlashes() as $key => $message) {
						echo '<div class="bg-'.$key.'/10 text-'.$key.'   border border-'.$key.'/20 text-sm rounded-md py-3 px-5 mb-4" role="alert">'.$message.'</div>';
					}
					
				$form = $this->beginWidget('CActiveForm', [
					'id' => 'form-analisis',
					'htmlOptions' => ['enctype' => 'multipart/form-data'], // Important for file uploads
				]);
				?>
					<div class="mb-3">
						<?php echo $form->labelEx($model, 'judul'); ?>
						<?php echo $form->TextField($model, 'judul',array("class"=>"form-input")); ?>
						<?php echo $form->error($model, 'judul'); ?>
					</div>
					<div class="mb-3">
						<?php echo $form->labelEx($model, 'deskripsi'); ?>
						<?php echo $form->textArea($model, 'deskripsi',array("class"=>"form-input",'rows' => 6, 'cols' => 50)); ?>
						<?php echo $form->error($model, 'deskripsi'); ?>
					</div>
                    <div class="mb-3" >
						<?php echo $form->labelEx($model, 'cover'); ?>
						<?php echo $form->fileField($model, 'cover',array("class"=>"form-input border")); ?>
						<?php echo $form->error($model, 'cover'); ?>
						<?php
							echo ( isset($model->cover) ? '<span class="help-block text-success">Cover : <a href="'.$model->cover.'" target="_blank">'.$model->judul.'</a></span>' : '');
						?>
                    </div>

					<div class="mb-3" >
						<?php echo $form->labelEx($model, 'file'); ?>
						<?php echo $form->fileField($model, 'file',array("class"=>"form-input border")); ?>
						<?php echo $form->error($model, 'file'); ?>
						<?php
							echo ( isset($model->file) ? '<span class="help-block text-success">File : <a href="'.$model->file.'" target="_blank">'.$model->judul.'</a></span>' : '');
						?>
                    </div>
					<div class="mb-3">
						<?php echo CHtml::submitButton('Tambah Analisis',array('class'=>'btn w-full bg-primary text-white')); ?>
                    </div>
					<?php $this->endWidget(); ?>
			</div>
		</div>
    </div>
</main>