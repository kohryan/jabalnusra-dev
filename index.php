<?php
    $is_flipbook=false;
    include("header.php");
?>
<!-- ============================ Banner Section start =============================== -->
<div class="banner">
    <div class="container container-lg">
        <div class="banner-item rounded-24 overflow-hidden position-relative arrow-center">
            <a href="#featureSection" class="scroll-down w-84 h-84 text-center flex-center bg-main-two-600 rounded-circle border border-5 text-white border-white position-absolute start-50 translate-middle-x bottom-0 hover-bg-main-two-700">
                <span class="icon line-height-0"><i class="ph ph-caret-double-down"></i></span> 
            </a>
            
            <img src="assets/images/bg/banner-bg.png" alt="" class="banner-img position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 z-n1 object-fit-cover rounded-24">

            <div class="flex-align">
                <button type="button" id="banner-prev" class="slick-prev slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-two-700 hover-text-white transition-1">
                    <i class="ph ph-caret-left"></i>
                </button>
                <button type="button" id="banner-next" class="slick-next slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-two-700 hover-text-white transition-1">
                    <i class="ph ph-caret-right"></i>
                </button>
            </div>

            <div class="banner-slider">
                <div class="banner-slider__item">   
                    <div class="banner-slider__inner flex-between position-relative">
                        <div class="banner-item__content">
                            <h1 class="banner-item__title bounce text-white">Konsultasi Regional PDRB Wilayah Jabalnusra</h1>
                            <a href="publikasi.php" class="btn btn-main-two d-inline-flex align-items-center rounded-pill gap-8">
                                Lihat Publikasi <span class="icon text-xl d-flex"><i class="ph ph-book"></i></span> 
                            </a>
                        </div>
                        <div class="banner-item__thumb">
                            <img src="assets/images/thumbs/banner-img1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
<!-- ============================ Banner Section End =============================== -->

<!-- ============================ Feature Section start =============================== -->
<div class="feature" id="featureSection">
    <div class="container container-lg">
        <div class="section-heading">
            <div class="flex-between flex-wrap gap-8">
                <h5 class="mb-0">Indikator Statistik</h5>
                <div class="flex-align gap-16">
                    <a href="publikasi.php" class="text-sm fw-medium text-gray-700 hover-text-main-two-600 hover-text-decoration-underline"> Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="position-relative arrow-center">
            <div class="flex-align">
                <button type="button" id="feature-item-wrapper-prev" class="slick-prev slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-two-700 hover-text-white transition-1" >
                    <i class="ph ph-caret-left"></i>
                </button>
                <button type="button" id="feature-item-wrapper-next" class="slick-next slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-two-700 hover-text-white transition-1" >
                    <i class="ph ph-caret-right"></i>
                </button>
            </div>
            <div class="feature-item-wrapper">
                <?php
                    $listSubjek=getDataSubjek();
                    $jsondata=json_decode($listSubjek);
                    if($jsondata->list){
                        $subjek="";
                        foreach($jsondata->list as $i=>$data){
                            $subjek.='<div class="feature-item text-center">
                                <div class="feature-item__thumb rounded-circle">
                                    <a href="indikator.php?id='.$data->Id.'" class="w-100 h-100 flex-center">
                                        <img src="'.( isset($data->icon) ? $data->icon[0]->signedUrl : "assets/images/no-images.jpg").'" alt="">
                                    </a>
                                </div>
                                <div class="feature-item__content mt-16">
                                    <h6 class="text-lg mb-8"><a href="indikator.php?id='.$data->Id.'" class="text-inherit">'.$data->nama.'</a></h6>
                                    <span class="text-sm text-gray-400">'.$data->data.' Tabel</span>
                                </div>
                            </div>';
                        }
                        echo $subjek;
                    }  else {
                        echo '<span><em>Belum ada indikator yang dirilis.</em></span>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Feature Section End =============================== -->

<!-- ========================= publikasi Start ================================ -->
<section class="publikasi pt-80">
    <div class="container container-lg">
        <div class="section-heading flex-between flex-wrap gap-16">
            <h5 class="mb-0">Publikasi</h5>
            <div class="flex-align gap-16">
                <a href="publikasi.php" class="text-sm fw-medium text-gray-700 hover-text-main-two-600 hover-text-decoration-underline"> Lihat Selengkapnya</a>
            </div>
        </div>
        
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-jawa" role="tabpanel" aria-labelledby="pills-jawa-tab" tabindex="0">
                 <div class="row g-12">
                    <?php
                        $listPublikasi=getDataPublikasi();
                        $jsondata=json_decode($listPublikasi);
                        if($jsondata->list){
                            $listPub="";
                            foreach($jsondata->list as $i=>$data){
                                $listPub.='<div class="col-xxl-3 col-lg-4 col-sm-6 col-6">
                                    <div class="product-card h-100 p-8 border border-gray-100 hover-border-main-two-600 rounded-16 position-relative transition-2">
                                        <a href="publikasi-detail.php?id='.$data->Id.'" class="product-card__thumb flex-center">
                                            <img src="'.( isset($data->cover) ? $data->cover[0]->signedUrl : "/assets/images/no-images.jpg").'" alt="" width="120" height="160">
                                        </a>
                                        <div class="product-card__content p-sm-2">
                                            <h6 class="title text-lg fw-semibold mt-2 mb-8">
                                                <a href="publikasi-detail.php?id='.$data->Id.'" class="">'.$data->judul.'</a>
                                            </h6>
                                            <div class="flex-align gap-4">
                                                <span class="text-main-two-600 text-md d-flex"><i class="ph-fill ph-buildings"></i></span>
                                                <span class="text-gray-500 text-xs">'.( $data->satker_id ? $data->satker->nama : "-").'</span>
                                            </div>
                    
                                            <div class="product-card__content mt-12">
                                                <a href="publikasi-detail.php?id='.$data->Id.'" class="product-card__cart btn bg-main-two-600 text-white hover-bg-main-two-700 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 mt-24 w-100 justify-content-center">
                                                    Lihat Publikasi <i class="ph ph-book"></i> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            }
                            echo $listPub;
                        } else {
                            echo '<span><em>Belum ada publikasi yang dirilis.</em></span>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================= publikasi End ================================ -->

<!-- ========================= pojok analisis Start ================================ -->
<section class="organic-food py-80">
    <div class="container container-lg">
        <div class="section-heading">
            <div class="flex-between flex-wrap gap-8">
                <h5 class="mb-0">Pojok Analisis</h5>
                <div class="flex-align gap-16">
                    <a href="pojok-analisis.php" class="text-sm fw-medium text-gray-700 hover-text-main-two-600 hover-text-decoration-underline">Lihat Selengkapnya</a>
                    <div class="flex-align gap-8">
                        <button type="button" id="organic-prev" class="slick-prev slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-two-600 text-xl hover-bg-main-two-700 hover-text-white transition-1">
                            <i class="ph ph-caret-left"></i>
                        </button>
                        <button type="button" id="organic-next" class="slick-next slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-two-600 text-xl hover-bg-main-two-700 hover-text-white transition-1">
                            <i class="ph ph-caret-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="organic-food__slider arrow-style-two">
            <?php
                $listAnalisis=getDataAnalisis();
                $jsondata=json_decode($listAnalisis);

                if($jsondata->list){
                    $analisis="";
                    foreach($jsondata->list as $i=>$data){
                        $analisis.='<div>
                            <div class="product-card h-100 p-8 border border-gray-100 hover-border-main-two-600 rounded-16 position-relative transition-2">
                                <a href="analisis-detail.php?id='.$data->Id.'" class="product-card__thumb flex-center">
                                    <img src="'.( isset($data->cover) ? $data->cover[0]->signedUrl : "assets/images/analisis-no-images.png").'" alt="" width="120" height="160">
                                </a>
                                <div class="product-card__content p-sm-2">
                                    <h6 class="title text-lg fw-semibold mt-2 mb-8">
                                        <a href="analisis-detail.php?id='.$data->Id.'" class="">'.$data->judul.'</a>
                                    </h6>
                                    <div class="flex-align gap-4">
                                        <span class="text-main-two-600 text-md d-flex"><i class="ph-fill ph-user"></i></span>
                                        <span class="text-gray-500 text-xs">'.( $data->satker_id ? $data->satker->nama : "-").'</span>
                                    </div>
                        
                                    <div class="product-card__content mt-12">
                                        <a href="analisis-detail.php?id='.$data->Id.'" class="product-card__cart btn bg-main-two-600 text-white hover-bg-main-two-700 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 mt-24 w-100 justify-content-center">
                                            Lihat Analisis <i class="ph ph-book"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                    echo $analisis;
                } else {
                    echo '<span><em>Belum ada analisis yang dirilis.</em></span>';
                }
            ?>
        </div>
    </div>
</section>
<!-- ========================= pojok analisis End ================================ -->

<!-- ========================= hot-deals Start ================================ -->
<section class="hot-deals pb-80">
    <div class="container container-lg">
        <div class="section-heading">
            <div class="flex-between flex-wrap gap-8">
                <h5 class="mb-0">Berita</h5>
                <div class="flex-align gap-16">
                    <a href="berita.php" class="text-sm fw-medium text-gray-700 hover-text-main-two-600 hover-text-decoration-underline">Lihat Semua Berita</a>
                    <div class="flex-align gap-8">
                        <button type="button" id="deals-prev" class="slick-prev slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-two-600 text-xl hover-bg-main-two-700 hover-text-white transition-1">
                            <i class="ph ph-caret-left"></i>
                        </button>
                        <button type="button" id="deals-next" class="slick-next slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-two-600 text-xl hover-bg-main-two-700 hover-text-white transition-1">
                            <i class="ph ph-caret-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-12">
            <div class="col-md-4">
                <div class="hot-deals position-relative rounded-16 overflow-hidden p-28 z-1 text-center" style="background-color: #001861;">
                    <img src="assets/images/shape/offer-shape.png" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100 opacity-6">
                    <div class="hot-deals__thumb">
                        <img src="assets/images/thumbs/hot-deals-img.png" alt="">
                    </div>
                    <div class="py-xl-4">
                        <h4 class="text-white mb-8">Konsultasi Regional PDRB Jabalnusra 2024</h4>
                        <div class="countdown my-32" id="countdown1">
                            <ul class="countdown-list flex-center flex-wrap">
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium colon-white"><span class="days"></span>Hari</li>
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium colon-white"><span class="hours"></span>Jam</li>
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium colon-white"><span class="minutes"></span>Menit</li>
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium colon-white"><span class="seconds"></span>Detik</li>
                            </ul>
                        </div>
                        <a href="#" class="mt-16 btn btn-main-two fw-medium d-inline-flex align-items-center rounded-pill gap-8" tabindex="0">
                            Kota Malang, 9-11 Oktober 2024
                            <span class="icon text-xl d-flex"><i class="ph ph-arrow-right"></i></span> 
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="hot-deals-slider arrow-style-two">
                    <?php
                        $listBerita=getDataBerita();
                        $jsondata=json_decode($listBerita);

                        if($jsondata->list){
                            $berita="";
                            foreach($jsondata->list as $i=>$data){
                                $tanggal=new DateTime($data->CreatedAt);
                                $berita.='<div>
                                    <div class="product-card h-100 p-8 border border-gray-100 hover-border-main-two-600 rounded-16 position-relative transition-2">
                                        <a href="berita-detail.php?id='.$data->Id.'" class="product-card__thumb flex-center">
                                            <img src="'.( isset($data->image) ? $data->image[0]->signedUrl : "assets/images/berita-no-images.png").'" alt="'.$data->judul.'">
                                        </a>
                                        <div class="product-card__content p-sm-2">
                                            <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                                <a href="berita-detail.php?id='.$data->Id.'" class="link">'.$data->judul.'</a>
                                            </h6>
                                            <div class="flex-align gap-4">
                                                <span class="text-main-two-600 text-md d-flex"><i class="ph-fill ph-calendar-dots"></i></span>
                                                <span class="text-gray-500 text-xs">'.($tanggal->format('d F Y')).'</span>
                                            </div>
                    
                                            <div class="product-card__content mt-12">
                                                <a href="berita-detail.php?id='.$data->Id.'" class="product-card__cart btn bg-main-two-600 text-white hover-bg-main-two-700 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 mt-24 w-100 justify-content-center">
                                                    Lihat Berita <i class="ph ph-file"></i> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            }
                            echo $berita;
                        } else {
                            echo '<span><em>Belum ada berita yang dirilis.</em></span>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================= hot-deals End ================================ -->

<!-- ============================== Brand Section Start =============================== -->
<div class="brand pb-80">
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