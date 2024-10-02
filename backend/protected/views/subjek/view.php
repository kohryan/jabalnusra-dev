<main class="p-6">
    <div class="flex flex-col gap-6">
        <div class="card">
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title"><?php echo $data->nama." [".$data->data." Data]";?></h4>
                </div>
            </div>

            <div class="card-body">
                <div class="flex justify-between mb-6 gap-4">
					<div class="p-3 w-1/4">
						<?php echo ( isset($data->icon) ? "<img src='".$data->icon[0]->signedUrl."' alt='".$data->nama."' />" : "<image src='".Yii::app()->request->baseUrl."/images/no-images.jpg' alt='no-image' />");?>
					</div>
                    <div class="w-3/4 p-3">
						<?php 
                            if($dataIndikator){
                                $jsonListData=json_decode($dataIndikator);
                                $table="<table class='p-2 border-collapse min-w-full border border-slate-300 dark:border-slate-600  divide-y divide-gray-200 dark:divide-gray-700'><thead><tr><th class='p-2 border border-slate-300 dark:border-slate-600'>No</th><th class='p-2 border border-slate-300 dark:border-slate-600'>Indikator</th><th class='p-2 border border-slate-300 dark:border-slate-600'>Tanggal Update</th></tr></thead><tbody>";
                                foreach($jsonListData->list as $k=>$data_indikator){
                                    $table.='<tr>
                                        <td class="p-2 border border-slate-300 dark:border-slate-600">'.($k+1).'</td>
                                        <td class="p-2 border border-slate-300 dark:border-slate-600">'.$data_indikator->judul.'</td>
                                        <td class="p-2 border border-slate-300 dark:border-slate-600">'.( $data->UpdatedAt ? date('d F Y', strtotime($data->UpdatedAt)) : "-").'</td>
                                    </tr>';
                                }
                                $table.="</tbody></table>";

                                echo $table;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>