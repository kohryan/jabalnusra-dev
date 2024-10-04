<div
    class="bg-white lg:max-w-[480px] z-10 p-12 relative w-full h-full border-t-[3px] border-primary dark:bg-gray-800">
    <div class="flex flex-col h-full gap-4">
        <div class="my-auto">
			<div class="mb-8 text-center lg:text-start bg-black">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>" class="flex justify-center lg:justify-start">
					<img
						src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-konreg-jabalnusra.png"
						alt="logo"
						class="hidden dark:block">
					<img
						src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-dark.png"
						alt="logo"
						class="block dark:hidden">
				</a>
			</div>

            <!-- title-->
            <div class=" text-center mb-5">
                <a href="<?php echo $loginUrl;?>"  class="btn bg-danger text-white w-full" type="submit"><i class="ri-login-box-line me-1"></i>Masuk dengan Google</a>
            </div>
        </div>
    </div>
</div>