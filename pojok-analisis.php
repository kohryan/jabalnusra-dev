<?php
    $is_flipbook=false;
    include("header.php");
    $listAnalisis=getDataAnalisis(1,12);
    $jsondata=json_decode($listAnalisis);

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
            <h6 class="mb-0">Pojok Analisis</h6>
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
                <li class="text-sm text-neutral-600"> Pojok Analisis </li>
            </ul>
        </div>
    </div>
</div>
<!-- ========================= Breadcrumb End =============================== -->

<!-- =============================== Shop Section Start ======================================== -->
 <section class="shop py-80">
    <div class="container container-lg">
        <div class="row">
                <!-- Top Start -->
                <div class="flex-between gap-16 flex-wrap mb-40 ">
                    <span class="text-gray-900"><?php echo "Menampilkan ".( ($offset+1)." - ".( ($totalData>=$itemPerPages) ? ($offset+$itemPerPages) : $totalData) )." dari ".$totalData." analisis";?></span>
                    <div class="position-relative flex-align gap-16 flex-wrap">
                        <!-- <div class="list-grid-btns flex-align gap-16">
                            <button type="button" class="w-44 h-44 flex-center border border-main-600 text-white bg-main-600 rounded-6 text-2xl grid-btn">
                                <i class="ph ph-squares-four"></i>
                            </button>
                        </div>   -->
                        <div class="position-relative text-gray-500 flex-align gap-4 text-14">
                            <label for="sorting" class="text-inherit flex-shrink-0">Urutkan berdasarkan: </label>
                            <select class="form-control common-input px-14 py-14 text-inherit rounded-6 w-auto" id="sorting">
                                <option value="1" selected>Terbaru</option>
                                <option value="1">Terlama</option>
                                <option value="1">A-Z</option>
                            </select>
                        </div>
                        <button type="button" class="w-44 h-44 d-lg-none d-flex flex-center border border-gray-100 rounded-6 text-2xl sidebar-btn"><i class="ph-bold ph-funnel"></i></button>
                    </div>
                </div>
                <!-- Top End -->

                <div class="list-grid-wrapper">
                    <?php
                        if($jsondata->list){
                            $listPub="";
                            foreach($jsondata->list as $i=>$data){
                                $listPub.='<div class="product-card h-100 p-8 border border-gray-100 hover-border-main-two-600 rounded-16 position-relative transition-2">
                                    <a href="analisis-detail.php?id='.$data->Id.'" class="product-card__thumb flex-center">
                                        <img src="'.( isset($data->cover) ? $data->cover[0]->signedUrl : "assets/images/analisis-no-images.png").'" alt="" width="120" height="160">
                                    </a>
                                    <div class="product-card__content p-sm-2">
                                        <h6 class="title text-lg fw-semibold mt-2 mb-8">
                                            <a href="analisis-detail.php?id='.$data->Id.'" class="">'.$data->judul.'</a>
                                        </h6>
                                        <div class="flex-align gap-4">
                                            <span class="text-main-two-600 text-md d-flex"><i class="ph-fill ph-buildings"></i></span>
                                            <span class="text-gray-500 text-xs">'.( $data->satker_id ? $data->satker->nama : "-").'</span>
                                        </div>
                
                                        <div class="product-card__content mt-12">
                                            <a href="analisis-detail.php?id='.$data->Id.'" class="product-card__cart btn bg-main-two-600 text-white hover-bg-main-two-700 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 mt-24 w-100 justify-content-center">
                                                Lihat Analisis <i class="ph ph-book"></i> 
                                            </a>
                                        </div>
                                    </div>
                                </div>';
                            }
                            echo $listPub;
                        } 
                    ?>
                </div>

                <!-- Pagination Start -->
                <ul class="pagination flex-center flex-wrap gap-16">
                    <li class="page-item">
                        <a class="page-link h-48 w-48 flex-center text-xxl rounded-8 fw-medium text-neutral-600 border border-gray-100" href="#">
                            <i class="ph-bold ph-arrow-left"></i>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link h-48 w-48 flex-center text-md rounded-8 fw-medium text-neutral-600 border border-gray-100" href="#">01</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link h-48 w-48 flex-center text-md rounded-8 fw-medium text-neutral-600 border border-gray-100" href="#">02</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link h-48 w-48 flex-center text-md rounded-8 fw-medium text-neutral-600 border border-gray-100" href="#">03</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link h-48 w-48 flex-center text-md rounded-8 fw-medium text-neutral-600 border border-gray-100" href="#">04</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link h-48 w-48 flex-center text-md rounded-8 fw-medium text-neutral-600 border border-gray-100" href="#">05</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link h-48 w-48 flex-center text-md rounded-8 fw-medium text-neutral-600 border border-gray-100" href="#">06</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link h-48 w-48 flex-center text-md rounded-8 fw-medium text-neutral-600 border border-gray-100" href="#">07</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link h-48 w-48 flex-center text-xxl rounded-8 fw-medium text-neutral-600 border border-gray-100" href="#">
                            <i class="ph-bold ph-arrow-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- Pagination End -->
            </div>
            <!-- Content End -->

        </div>
    </div>
 </section>
<!-- =============================== Shop Section End ======================================== -->

<!-- ============================== Brand Section Start =============================== -->
<div class="brand pb-40">
    <div class="container container-lg">
        <div class="brand-inner bg-color-one p-24 rounded-16">
            <div class="section-heading">
                <div class="flex-between flex-wrap gap-8">
                    <h5 class="mb-0">Didukung oleh</h5>
                    <div class="flex-align gap-16">
                        <div class="flex-align gap-8">
                            <button type="button" id="brand-prev" class="slick-prev slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-two-600 text-xl hover-bg-main-two-700 hover-text-white transition-1" >
                                <i class="ph ph-caret-left"></i>
                            </button>
                            <button type="button" id="brand-next" class="slick-next slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-two-600 text-xl hover-bg-main-two-700 hover-text-white transition-1" >
                                <i class="ph ph-caret-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="brand-slider arrow-style-two">
                <div class="brand-item">    
                    <img src="assets/images/thumbs/top-brand-img1.png" alt="">
                </div>
                <div class="brand-item">    
                    <img src="assets/images/thumbs/top-brand-img2.png" alt="">
                </div>
                <div class="brand-item">    
                    <img src="assets/images/thumbs/top-brand-img3.png" alt="">
                </div>
                <div class="brand-item">    
                    <img src="assets/images/thumbs/top-brand-img4.png" alt="">
                </div>
                <div class="brand-item">    
                    <img src="assets/images/thumbs/top-brand-img5.png" alt="">
                </div>
                <div class="brand-item">    
                    <img src="assets/images/thumbs/top-brand-img6.png" alt="">
                </div>
                <div class="brand-item">    
                    <img src="assets/images/thumbs/top-brand-img7.png" alt="">
                </div>
                <div class="brand-item">    
                    <img src="assets/images/thumbs/top-brand-img8.png" alt="">
                </div>
                <div class="brand-item">    
                    <img src="assets/images/thumbs/top-brand-img9.png" alt="">
                </div>
                <div class="brand-item">    
                    <img src="assets/images/thumbs/top-brand-img10.png" alt="">
                </div>
                <div class="brand-item">    
                    <img src="assets/images/thumbs/top-brand-img11.png" alt="">
                </div>
                <div class="brand-item">    
                    <img src="assets/images/thumbs/top-brand-img12.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================== Brand Section End =============================== -->
<?php
    include("footer.php");
?>