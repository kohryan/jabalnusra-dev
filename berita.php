<?php
    $is_flipbook=false;
    include("header.php");

    $listBerita=getDataBerita(1,9);
    $jsondata=json_decode($listBerita);

    $totalData=$jsondata->pageInfo->totalRows;
	$page=( isset($jsondata->pageInfo->page) ? $jsondata->pageInfo->page : (isset($jsondata->pageInfo->offset) ? $jsondata->pageInfo->offset : 1) );
	$itemPerPages=$jsondata->pageInfo->pageSize;
	$pages=ceil($totalData/$itemPerPages);
	$offset=($page - 1) * $itemPerPages;
?>
<!-- ========================= Breadcrumb Start =============================== -->
<div class="breadcrumb py-26 bg-color-two">
    <div class="container container-lg">
        <div class="breadcrumb-wrapper flex-between flex-wrap gap-16">
            <h6 class="mb-0">Berita</h6>
            <ul class="flex-align gap-8 flex-wrap">
                <li class="text-sm">
                    <a href="index.php" class="text-main-two-600 flex-align gap-8 hover-text-main-two-700">
                        <i class="ph ph-house"></i>
                        Beranda
                    </a>
                </li>
                <li class="flex-align">
                    <i class="ph ph-caret-right"></i>
                </li>
                <li class="text-sm text-neutral-600"> Berita </li>
            </ul>
        </div>
    </div>
</div>
<!-- ========================= Breadcrumb End =============================== -->

<!-- =============================== Blog Section Start =========================== -->
<section class="blog py-80">
    <div class="container container-lg">
        <div class="row gy-5">
        <?php
            if($jsondata->list){
                $listBerita="";
                foreach($jsondata->list as $i=>$data){
                    $listBerita.='<div class="col-lg-4">
                        <div class="blog-item"> 
                            <a href="berita-detail.php?id='.$data->Id.'" class="w-100 h-100 rounded-16 overflow-hidden">
                                <img src="'.( isset($data->image) ? $data->image[0]->signedUrl : "assets/images/berita-no-images.png").'" alt="" class="cover-img">
                            </a>
                            <div class="blog-item__content mt-24">
                                <h6 class="text-2xl mb-24">
                                    <a href="berita-detail.php?id='.$data->Id.'" class="">'.$data->judul.'</a>
                                </h6>
                                <p class="text-gray-700 text-line-2">'.implode(' ', array_slice(explode(' ', strip_tags($data->deskripsi)),0,400)).', ...</p>

                                <div class="flex-align flex-wrap gap-24 pt-24 mt-24 border-top border-gray-100">
                                    <div class="flex-align flex-wrap gap-8">
                                        <span class="text-lg text-main-two-600"><i class="ph ph-calendar-dots"></i></span>
                                        <span class="text-sm text-gray-500">
                                            <a href="berita-detail.php?id='.$data->Id.'" class="text-gray-500 hover-text-main-two-600">'.( $data->CreatedAt ? date('d F Y', strtotime($data->CreatedAt)) : "-").'</a>
                                        </span>
                                    </div>
                                    <div class="flex-align flex-wrap gap-8">
                                        <span class="text-lg text-main-two-600"><i class="ph ph-user"></i></span>
                                        <span class="text-sm text-gray-500">
                                            <a href="berita-detail.php?id='.$data->Id.'" class="text-gray-500 hover-text-main-two-600">'.($data->user_id ? $data->user->username." - " : '').( $data->satker_id ? $data->satker->nama : "-").'</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                echo $listBerita;
            } 
        	

            // <!-- Pagination Start -->
            $pagination="";
             if( $pages>1 && $pages <=10 ){
                $pagination.='<ul class="pagination flex-center flex-wrap gap-16">';
				for($i=1;$i<=$pages;$i++){
                    $pagination.='<li class="page-item '.( ($page==$i) ? 'active' : '' ).'">
                        <a class="page-link h-48 w-48 flex-center text-md rounded-8 fw-medium text-neutral-600 border border-gray-100" href="?page='.($i).'">'.($i).'</a>
                    </li>';
				}
                $pagination.=' </ul>';
            } 
			echo $pagination;
            // <!-- Pagination End -->
		?>
            </div>
            
            </div>
        </div>
    </div>
 </section>
<!-- =============================== Blog Section End =========================== -->
<?php
    include("footer.php");
?>