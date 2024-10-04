<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<main class="p-6">

<!-- Page Title Start -->
<div class="flex justify-between items-center mb-6">
	<h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Dashboard</h4>

	<div class="md:flex hidden items-center gap-2.5 font-semibold">
		<div class="flex items-center gap-2">
			<a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">Dashboard</a>
		</div>
	</div>
</div>
<!-- Page Title End -->
<?php $superadmin=( Yii::app()->user->role=='SUPERADMIN' ? true : false); ?>
<div class="grid 2xl:grid-cols-<?php echo($superadmin ? '5' : '4');?> lg:grid-cols-<?php echo($superadmin ? '5' : '4');?> md:grid-cols-2 gap-6 mb-6">
	<div class="2xl:col-span-1 lg:col-span-2">
		<div class="card">
			<div class="p-6">
				<div class="flex justify-between">
					<div class="grow overflow-hidden">
						<h5 class="text-base/3 text-gray-400 font-normal mt-0" title="Number of Customers">Berita</h5>
						<h3 class="text-2xl my-6"><?php echo $berita;?></h3>
					</div>
				</div>
			</div> <!-- end p-6-->
		</div> <!-- end card-->
	</div>

	<div class="2xl:col-span-1 lg:col-span-2">
		<div class="card">
			<div class="p-6">
				<div class="flex justify-between">
					<div class="grow overflow-hidden">
						<h5 class="text-base/3 text-gray-400 font-normal mt-0" title="Number of Orders">Publikasi</h5>
						<h3 class="text-2xl my-6"><?php echo $publikasi;?></h3>
					</div>
				</div>
			</div> <!-- end p-6-->
		</div> <!-- end card-->
	</div>

	<div class="2xl:col-span-1 lg:col-span-2">
		<div class="card">
			<div class="p-6">
				<div class="flex justify-between">
					<div class="grow overflow-hidden">
						<h5 class="text-base/3 text-gray-400 font-normal mt-0" title="Average Revenue">Pojok Analisis</h5>
						<h3 class="text-2xl my-6"><?php echo $analisis;?></h3>
					</div>
				</div>

			</div> <!-- end p-6-->
		</div> <!-- end card-->
	</div>

	<div class="2xl:col-span-1 lg:col-span-3">
		<div class="card">
			<div class="p-6">
				<div class="flex justify-between">
					<div class="grow overflow-hidden">
						<h5 class="text-base/3 text-gray-400 font-normal mt-0" title="Growth">Data Tabular</h5>
						<h3 class="text-2xl my-6"><?php echo $data;?></h3>
					</div>
				</div>

			</div> <!-- end p-6-->
		</div> <!-- end card-->
	</div>

	<?php if(Yii::app()->user->role=='SUPERADMIN') { ?>
	<div class="2xl:col-span-1 lg:col-span-3 md:col-span-2">
		<div class="card">
			<div class="p-6">
				<div class="flex justify-between">
					<div class="grow overflow-hidden">
						<h5 class="text-base/3 text-gray-400 font-normal mt-0" title="Conversation Ration">User</h5>
						<h3 class="text-2xl my-6"><?php echo $user;?></h3>
					</div>
				</div>

			</div> <!-- end p-6-->
		</div> <!-- end card-->
	</div>
	<?php } ?>
</div>

</main>