<main class="p-6">
    <div class="flex flex-col gap-6">
		<div class="card">
			<div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title">Tambah User</h4>
                </div>
            </div>
			<div class="card-body p-3 h-screen">
				<?php
					foreach(Yii::app()->user->getFlashes() as $key => $message) {
						echo '<div class="bg-'.$key.'/10 text-'.$key.'   border border-'.$key.'/20 text-sm rounded-md py-3 px-5 mb-4" role="alert">'.$message.'</div>';
					}
					
				$form = $this->beginWidget('CActiveForm', [
					'id' => 'form-user',
				]);
				?>
					<div class="mb-3">
						<?php echo $form->labelEx($model, 'username'); ?>
						<?php echo $form->TextField($model, 'username',array("class"=>"form-input")); ?>
						<?php echo $form->error($model, 'username'); ?>
					</div>

					<div class="mb-3">
						<?php echo $form->labelEx($model, 'password'); ?>
						<?php echo $form->TextField($model, 'password',array("class"=>"form-input")); ?>
						<?php echo $form->error($model, 'password'); ?>
					</div>

					<div class="mb-3">
						<?php echo $form->labelEx($model, 'satker'); ?>
						<?php echo $form->dropDownList($model, 'satker',$optionSatker,array("empty"=>":: Pilih Instansi ::","class"=>"form-input")); ?>
						<?php echo $form->error($model, 'satker'); ?>
					</div>

					<div class="mb-3">
						<?php echo $form->labelEx($model, 'role'); ?>
						<?php echo $form->dropDownList($model, 'role',array('ADMIN'=>'ADMIN','SUPERADMIN'=>'SUPERADMIN'),array("empty"=>":: Pilih Role ::","class"=>"form-input")); ?>
						<?php echo $form->error($model, 'role'); ?>
					</div>
					<div class="mb-3">
						<?php echo CHtml::submitButton('Tambah User',array("class"=>"btn w-full bg-primary text-white")); ?>
                    </div>
				<?php $this->endWidget(); ?>
			</div>
		</div>
    </div>
</main>