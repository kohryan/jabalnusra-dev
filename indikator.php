<?php
  $is_flipbook=false;
  $is_data=true;
  include("header.php");

  $id=1;
  if(isset($_GET['id'])){
    $id=(int)$_GET['id'];
  } 
  
  $listSubjek=getDataSubjek();
  $jsondata=json_decode($listSubjek);

  $listData=getDataIndikator($id);
  $jsonListData=json_decode($listData);
?>

<!-- ========================= Breadcrumb Start =============================== -->
<div class="breadcrumb py-26 bg-color-two">
  <div class="container container-lg">
    <div class="breadcrumb-wrapper flex-between flex-wrap gap-16">
      <h6 class="mb-0">Indikator Statistik</h6>
      <ul class="flex-align gap-8 flex-wrap">
        <li class="text-sm">
          <a href="index.php" class="text-main-two-600 flex-align gap-8 hover-text-main-two-700">
          <i class="ph ph-house"></i>Beranda</a>
        </li>
        <li class="flex-align">
          <i class="ph ph-caret-right"></i>
        </li>
        <li class="text-sm text-neutral-600"> Indikator Statistik </li>
      </ul>
    </div>
  </div>
</div>
<!-- ========================= Breadcrumb End =============================== -->

<!-- ======= Statistik Section ======= -->
<section id="statistik" class="tabel pb-40">
  <div class="container" data-aos="fade-up">
    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <form action="hasil-pencarian.php" method="get">
        <div class="input-group rounded py-40">
          <input name="konten" type="hidden" value="indikator">
          <input name="keyword" type="search" class="form-control rounded" placeholder="Cari Indikator" aria-label="Search" aria-describedby="search-addon" />
          <button type="submit" class="btn btn-main flex-center input-group-text"><i class="ph ph-magnifying-glass"></i></button>
        </div>
      </form>
     <div class="col-lg-3">
      <ul class="nav nav-tabs flex-column">
        <?php
          $li="";
          $tabContent="";
          if($jsondata->list){
            $trTable="<tr><td rowspan='2'><em>belum ada data pada indikator ini.</em></td></tr>";
            if($jsonListData->list){
              $trTable="";
              foreach($jsonListData->list as $k=>$data_indikator){
                $trTable.='<tr>
                        <td><a href="indikator-detail.php?id='.$data_indikator->Id.'">'.$data_indikator->judul.'</a></td>
                        <td><a href="#">'.( $data_indikator->UpdatedAt ? date('d F Y', strtotime($data_indikator->UpdatedAt)) : date('d F Y', strtotime($data_indikator->CreatedAt))).'</a></td>
                      </tr>';
              }
            }

            foreach($jsondata->list as $i=>$data){
                $li.='<li class="nav-item">
                  <a href="indikator.php?id='.$data->Id.'" class="nav-link '.( ($id=="" && $i==0) ? 'active show' : (($id==($i+1))? 'active show' : '' )).'" ">'.$data->nama.'</a>
                </li>';
            }
            echo $li;
            $tabContent.='<div class="row">
                    <div class="col-lg-12 details order-2 order-lg-1">
                      <div class="table-responsive">
                      <table class="table">
                        <thead class="text-md" style="background-color: #001861; color: #fff; padding: 12px 15px; font-weight: 600;">
                          <tr>
                            <th scope="col">Indikator</th>
                            <th scope="col">Terakhir Diperbarui</th>
                          </tr>
                        </thead>
                        <tbody class="text-black">
                          '.$trTable.'
                        </tbody>
                      </table>
                    </div>
                    </div>
                  </div>';
          }
        ?>
      </ul>
     </div>
    
     <div class="col-lg-9 mt-4 mt-lg-0">
      <div class="tab-content">
        <?php echo $tabContent;?>
      </div>
     </div>
    </div>
   </div>
  </section><!-- End Statistik Section -->

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