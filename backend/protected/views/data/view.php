<main class="p-6">
    <div class="flex flex-col gap-6">
        <div class="card">
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title"><?php echo $data->judul;?></h4>
                </div>
            </div>

            <div class="card-body">
                <div class="flex justify-between mb-6 gap-4">
					<div class="p-3 w-1/4">
						<?php echo ( isset($data->file) ? "<a href='".$data->file[0]->signedUrl."'>Download Data</a>" : "File tidak tersedia");?>
					</div>
                    <div class="w-full p-3">
						<?php 
                            $table="<table class='p-1 border-collapse min-w-full border border-slate-300 dark:border-slate-600  divide-y divide-gray-200 dark:divide-gray-700'><thead><tr>
                                <th class='border border-primary dark:border-slate-600 font-semibold p-1 text-slate-900 dark:text-slate-200 text-start'>Judul</th>
                                <th class='border border-primary dark:border-slate-600 font-semibold p-1 text-slate-900 dark:text-slate-200 text-start'>Subjek</th>
                                <th class='border border-primary dark:border-slate-600 font-semibold p-1 text-slate-900 dark:text-slate-200 text-start'>Update Terakhir</th>
                                <th class='border border-primary dark:border-slate-600 font-semibold p-1 text-slate-900 dark:text-slate-200 text-start'>Pengampu</th>
                                </tr></thead><tbody>";
                            $table.="<tr>
                                <td class='border border-primary dark:border-slate-700 p-1 text-slate-500 dark:text-slate-400'>".( isset($data->file) ? "<a class='text-primary' href='".$data->file[0]->signedUrl."'>".$data->judul."</a>" : $data->judul)."</td>
                                <td class='border border-primary dark:border-slate-700 p-1 text-slate-500 dark:text-slate-400'>".( $data->subjek ? $data->subjek->nama : '-')."</td>
                                <td class='border border-primary dark:border-slate-700 p-1 text-slate-500 dark:text-slate-400'>".( $data->CreatedAt ? date('d F Y H:i', strtotime($data->CreatedAt)) : "-")."</td>
                                <td class='border border-primary dark:border-slate-700 p-1 text-slate-500 dark:text-slate-400'>".( $data->satker ? $data->satker->nama : "-")."</td>
                                </tr>";
                            $table.="</tbody></table>";
                            echo $table;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>