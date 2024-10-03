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

<div class="grid 2xl:grid-cols-5 lg:grid-cols-6 md:grid-cols-2 gap-6 mb-6">
	<div class="2xl:col-span-1 lg:col-span-2">
		<div class="card">
			<div class="p-6">
				<div class="flex justify-between">
					<div class="grow overflow-hidden">
						<h5 class="text-base/3 text-gray-400 font-normal mt-0" title="Number of Customers">Berita</h5>
						<h3 class="text-2xl my-6">54,214</h3>
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
						<h3 class="text-2xl my-6">7,543</h3>
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
						<h3 class="text-2xl my-6">$9,254</h3>
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
						<h3 class="text-2xl my-6">+ 20.6%</h3>
					</div>
				</div>

			</div> <!-- end p-6-->
		</div> <!-- end card-->
	</div>

	<div class="2xl:col-span-1 lg:col-span-3 md:col-span-2">
		<div class="card">
			<div class="p-6">
				<div class="flex justify-between">
					<div class="grow overflow-hidden">
						<h5 class="text-base/3 text-gray-400 font-normal mt-0" title="Conversation Ration">User</h5>
						<h3 class="text-2xl my-6">9.62%</h3>
					</div>
				</div>

			</div> <!-- end p-6-->
		</div> <!-- end card-->
	</div>
</div>

</main>