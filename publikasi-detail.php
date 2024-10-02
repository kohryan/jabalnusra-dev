<?php
    $is_flipbook=true;
    include("header.php");
    $data="";
    if(isset($_GET['id'])){
        $id=(int)$_GET['id'];
        $publikasi=getById("publikasi",$id);
        if($publikasi){
            $data=json_decode($publikasi);
        } else {
            include("not-found.php");
            exit();
        }
    }
?>

<!-- ========================= Breadcrumb Start =============================== -->
<div class="breadcrumb py-26 bg-color-two">
    <div class="container container-lg">
        <div class="breadcrumb-wrapper flex-between flex-wrap gap-16">
            <h6 class="mb-0">Publikasi</h6>
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
                    <a href="publikasi.html" class="text-main-two-600 flex-align gap-8">
                        Publikasi
                    </a>
                </li>
                <li class="flex-align text-gray-500">
                    <i class="ph ph-caret-right"></i>
                </li>
                <li class="text-sm text-neutral-600">
                    <?php echo $data->judul;?>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- ========================= Breadcrumb End =============================== -->

    <section class="product-details py-40">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-xl-4">
                        <div class="product-details__left">
                            
                            <div class="product-details__thumb-slider border border-gray-100 rounded-16">
                                <div class="">
                                    <div class="product-details__thumb flex-center">
                                        <?php echo ( isset($data->image) ? "<img src='".$data->image[0]->signedUrl."' alt='".$data->judul."' />" : "<image src='assets/images/no-images.jpg' alt='no-image' />");?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="product-details__content">
                            <h5 class="mb-12"><?php echo $data->judul;?></h5>
                            <div class="flex-align flex-wrap gap-12">
                                <div class="flex-align"></div>
                                    <span class="text-main-two-600 text-md d-flex"><i class="ph-fill ph-buildings"></i></span>
                                    <span class="text-gray-500 text-s"><?php echo ($data->user_id ? $data->user->username." - " : '').( $data->satker_id ? $data->satker->nama : "-");?></span>
                                </div>
                            </div>
                            <span class="mt-32 pt-32 text-gray-700 border-top border-gray-100 d-block"></span>
                            <div class="flex-between gap-16 flex-wrap">
                                <div class="flex-align flex-wrap gap-16">
                                    <div class="button">
                                        <a id="read" class="btn btn-main rounded-8 flex-align d-inline-flex gap-8 px-24"> Baca Publikasi <i class="ph-fill ph-book"></i></a> 
                                    </div>
                                    <div class="button">
                                        <?php echo ( isset($data->file) ? "<a href='".$data->file[0]->signedUrl."' target='_blank' class='btn btn-main rounded-8 flex-align d-inline-flex gap-8 px-24 download'>Unduh Analisis <i class='ph-fill ph-download'></i></a>" : '-');?>
                                    </div>
                                </div>
                            </div>
                            <span class="mt-32 pt-32 text-gray-700 border-top border-gray-100 d-block"></span>
                            <div class="text-gray-700">
                                <?php echo $data->abstraksi;?>
                            </div>
                            <span class="mt-32 pt-32 text-gray-700 border-top border-gray-100 d-block"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 </section>

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