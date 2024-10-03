<main class="p-6">
    <div class="flex flex-col gap-6">
		<div class="card">
			<div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title">Tambah Satker</h4>
                </div>
            </div>
			<div class="card-body p-3 h-screen">
				<?php
					foreach(Yii::app()->user->getFlashes() as $key => $message) {
						echo '<div class="bg-'.$key.'/10 text-'.$key.'   border border-'.$key.'/20 text-sm rounded-md py-3 px-5 mb-4" role="alert">'.$message.'</div>';
					}
					
				$form = $this->beginWidget('CActiveForm', [
					'id' => 'form-satker',
				]);
				?>
					<div class="mb-3">
						<?php echo $form->labelEx($model, 'nama'); ?>
						<?php echo $form->TextField($model, 'nama',array("class"=>"form-input")); ?>
						<?php echo $form->error($model, 'nama'); ?>
					</div>

					<div class="mb-3">
						<?php echo $form->labelEx($model, 'satker'); ?>
						<?php echo $form->dropDownList($model, 'satker',array('BADAN PUSAT STATISTIK'=>'BADAN PUSAT STATISTIK','BANK INDONESIA'=>'BANK INDONESIA','BAPPEDA'=>'BAPPEDA'),array("empty"=>":: Pilih Instansi ::","class"=>"form-input")); ?>
						<?php echo $form->error($model, 'satker'); ?>
					</div>

					<div class="mb-3">
						<?php echo $form->labelEx($model, 'url'); ?>
						<?php echo $form->TextField($model, 'url',array("class"=>"form-input")); ?>
						<?php echo $form->error($model, 'url'); ?>
					</div>

					<div class="mb-3">
						<?php echo CHtml::submitButton('Tambah Satker',array("class"=>"btn w-full bg-primary text-white")); ?>
                    </div>
				<?php $this->endWidget(); ?>
			</div>
		</div>
    </div>
</main>