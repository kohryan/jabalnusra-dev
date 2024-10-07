<?php
    $is_flipbook=false;
    include("header.php");
    $data="";
    $konten="";
    if(isset($_GET['keyword'])){
        if(isset($_GET['konten'])){
            $konten=strtolower( preg_replace('/[^a-zA-Z0-9 ]/', '', $_GET['konten']));
        }
        $keyword=strtolower( preg_replace('/[^a-zA-Z0-9 ]/', '', $_GET['keyword']));
        $result=searchByKeyword($konten,$keyword);
        if( $result){
            $data=json_decode( $result);
        } 
    }
?>
<!-- ========================= Breadcrumb Start =============================== -->
<div class="breadcrumb py-26 bg-color-two">
    <div class="container container-lg">
        <div class="breadcrumb-wrapper flex-between flex-wrap gap-16">
            <h6 class="mb-0">Hasil Pencarian</h6>
            <ul class="flex-align gap-8 flex-wrap">
                <li class="text-sm">
                    <a href="index.php" class="text-main-two-600 flex-align gap-8">
                        <i class="ph ph-house"></i>
                        Beranda
                    </a>
                </li>
                <li class="flex-align text-gray-500">
                    <i class="ph ph-caret-right"></i>
                </li>
                <li class="text-sm">
                    <a href="#" class="text-main-two-600 flex-align gap-8">
                        Hasil Pencarian
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- ========================= Breadcrumb End =============================== -->

    <!-- =============================== Blog Details Section Start =========================== -->
<section class="berita-detail py-80">
    <div class="container container-lg">
        <div class="row gy-5">
            <div class="col-lg-12 pe-xl-4">
                <?php
                    if($data){
                        $listBerita="";
                        foreach($data->list as $i=>$data){
                            $listBerita.='<div class="border-top border-bottom d-flex align-items-center flex-sm-nowrap flex-wrap gap-24 mb-16">
                                <div class="flex-grow-1 p-7">
                                    <h6 class="text-lg">
                                        <a href="'.$konten.'-detail.php?id='.$data->Id.'" class="text-line-3">'.$data->judul.'</a>
                                    </h6>
                                    <div class="flex-align flex-wrap gap-8">
                                        <span class="text-lg text-main-two-600"><i class="ph ph-calendar-dots"></i></span>
                                        <span class="text-sm text-gray-500">
                                            <a href="'.$konten.'-detail.php?id='.$data->Id.'" class="text-gray-500 hover-text-main-two-600">'.( $data->CreatedAt ? date('d F Y', strtotime($data->CreatedAt)) : "-").'</a>
                                        </span>
                                    </div>
                                </div>
                            </div>';
                        }
                        echo $listBerita;
                    } else {
                        echo "<em>Tidak menemukan hasil pencarian dengan kata kunci ".$keyword."</em>";
                    }
                ?>
            </div>
        </div>
    </div>
 </section>
<!-- =============================== Blog Details Section End =========================== -->

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
            </div>
        </div>
    </div>
</div>
<!-- ============================== Brand Section End =============================== -->
<?php
    include("footer.php");
?>