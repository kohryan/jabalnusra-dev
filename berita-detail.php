<?php
    $is_flipbook=false;
    include("header.php");
    $data="";
    $berita_terkini= getDataBerita(1,5);
    $bt=json_decode($berita_terkini);

    if(isset($_GET['id'])){
        $id=(int)$_GET['id'];
        $berita=getById("berita",$id);
        if($berita){
            $data=json_decode($berita);
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
            <h6 class="mb-0">Berita</h6>
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
                    <a href="berita.php" class="text-main-two-600 flex-align gap-8">
                        Berita
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

    <!-- =============================== Blog Details Section Start =========================== -->
<section class="berita-detail py-80">
    <div class="container container-lg">
        <div class="row gy-5">
            <div class="col-lg-8 pe-xl-4">
                <div class="blog-item-wrapper">
                    <div class="blog-item"> 
                        <img style="height:300px;" src="<?php echo ( isset($data->image) ? $data->image[0]->signedUrl : "assets/images/berita-no-images.png");?>" alt="" class="cover-img rounded-16">
                        <div class="blog-item__content mt-24">
                            <h4 class="mb-24"><?php echo $data->judul;?></h4>
                            
                            <?php echo str_replace('<p>','<p class="text-gray-700 mb-24">',$data->deskripsi);?>
                            
                            <div class="flex-align flex-wrap gap-24">
                                <div class="flex-align flex-wrap gap-8">
                                    <span class="text-lg text-main-two-600"><i class="ph ph-calendar-dots"></i></span>
                                    <span class="text-sm text-gray-500">
                                        <a href="#" class="text-gray-500 hover-text-main-two-600"><?php echo ( $data->CreatedAt ? date('d F Y', strtotime($data->CreatedAt)) : "-");?></a>
                                    </span>
                                </div>
                                <div class="flex-align flex-wrap gap-8">
                                    <span class="text-lg text-main-two-600"><i class="ph ph-user"></i></span>
                                    <span class="text-sm text-gray-500">
                                        <a href="#" class="text-gray-500 hover-text-main-two-600"><?php echo ($data->user_id ? $data->user->username." - " : '').( $data->satker_id ? $data->satker->nama : "-");?></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ps-xl-4">
                <!-- Search Start -->
                <div class="blog-sidebar border border-gray-100 rounded-8 p-32 mb-40">
                    <h6 class="text-xl mb-32 pb-32 border-bottom border-gray-100">Cari Berita</h6>
                    <form action="hasil-pencarian.php" method="get">
                        <div class="input-group">
                            <input name="konten" type="hidden" value="berita">
                            <input name="keyword" type="text" class="form-control common-input bg-color-three" placeholder="Searching...">
                            <button type="submit" class="btn btn-main text-2xl h-56 w-56 flex-center text-2xl input-group-text"><i class="ph ph-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                <!-- Search End -->
                
                <!-- Recent Post Start -->
                <div class="blog-sidebar border border-gray-100 rounded-8 p-32 mb-40">
                    <h6 class="text-xl mb-32 pb-32 border-bottom border-gray-100">Berita Terkini</h6>
                    <?php
    
                        if($bt->list){
                            $listBerita="";
                            foreach($bt->list as $i=>$data){
                                $listBerita.='<div class="d-flex align-items-center flex-sm-nowrap flex-wrap gap-24 mb-16">
                                    <a href="berita-detail.php?id='.$data->Id.'" class="w-100 h-100 rounded-4 overflow-hidden w-120 h-120 flex-shrink-0">
                                        <img src="'.( isset($data->image) ? $data->image[0]->signedUrl : "assets/images/berita-no-images.png").'" alt="" class="cover-img">
                                    </a>
                                    <div class="flex-grow-1">
                                        <h6 class="text-lg">
                                            <a href="berita-detail.php?id='.$data->Id.'" class="text-line-3">'.$data->judul.'</a>
                                        </h6>
                                        <div class="flex-align flex-wrap gap-8">
                                            <span class="text-lg text-main-two-600"><i class="ph ph-calendar-dots"></i></span>
                                            <span class="text-sm text-gray-500">
                                                <a href="berita-detail.php?id='.$data->Id.'" class="text-gray-500 hover-text-main-two-600">'.( $data->CreatedAt ? date('d F Y', strtotime($data->CreatedAt)) : "-").'</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>';
                            }
                            echo $listBerita;
                        }
                    ?>
                </div>
                <!-- Recent Post End -->

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