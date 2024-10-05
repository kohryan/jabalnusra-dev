<?php
    $is_flipbook=false;
    $is_data=true;
    include("header.php");

    $data="";
    if(isset($_GET['id'])){
        $id=(int)$_GET['id'];
        
        $_data=getById("data",$id);
        if($_data){
            $data=json_decode($_data);
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
            <h6 class="mb-0">Indikator Statistik</h6>
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
                <li class="text-sm">
                  <a href="indikator.php" class="text-main-two-600 flex-align gap-8 hover-text-main-two-700">
                      Indikator Statistik
                  </a>
                </li>
                <li class="flex-align">
                  <i class="ph ph-caret-right"></i>
                </li>
                <li class="text-sm text-neutral-600"><?php echo $data->judul;?></li>
            </ul>
        </div>
    </div>
</div>
<!-- ========================= Breadcrumb End =============================== -->

<!-- ======= Statistik Section ======= -->
<section id="statistik" class="tabel pb-40">
    <div class="container" data-aos="fade-up">

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="row py-20">
        <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
          <div class="flex-between gap-16">
            <div class="flex-align flex-wrap gap-16">
              <div class="button">
                <div onclick="history.back()" class="btn btn-main rounded-8 flex-align d-inline-flex gap-8 px-24"> <i class="ph ph-caret-left"></i>Kembali </div> 
              </div>
              <div class="button">
                <?php echo ( isset($data->file) ? "<a href='".$data->file[0]->signedUrl."' target='_blank' class='btn btn-main-two rounded-8 flex-align d-inline-flex gap-8 px-24 download'> Unduh <i class='ph-fill ph-download'></i></a> " : '');?>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="col-lg-4 col-md-6 mt-4 mt-lg-0 flex-wrap">
          <div class="input-group rounded">
            <input type="search" class="form-control rounded" placeholder="Cari Indikator" aria-label="Search" aria-describedby="search-addon" />
          </div>
        </div> -->
      </div>
    
     <div class="col-lg-12 col-md-6 mt-4 mt-lg-0">
      <div class="tab-content">
        
        <div class="tab-pane active show" id="tab-1">
          <div class="row">
            <div class="col-lg-12 details order-2 order-lg-1">
              <div class="table-responsive">
               <table class="table">
                 <thead class="text-md" style="background-color: #001861; color: #fff; padding: 12px 15px; font-weight: 600;">
                  <tr>
                    <th scope="col">Provinsi</th>
                    <th scope="col">2021</th>
                    <th scope="col">2022</th>
                    <th scope="col">2023</th>
                  </tr>
                 </thead>
                 <tbody class="text-black">
                  <tr>
                    <td>DKI Jakarta</td>
                    <td>20</td>
                    <td>30</td>
                    <td>40</td>
                  </tr>
                  <tr>
                    <td>Jawa Barat</td>
                    <td>20</td>
                    <td>30</td>
                    <td>40</td>
                  </tr>
                  <tr>
                    <td>Jawa Tengah</td>
                    <td>20</td>
                    <td>30</td>
                    <td>40</td>
                  </tr>
                  <tr>
                    <td>DI Yogyakarta</td>
                    <td>20</td>
                    <td>30</td>
                    <td>40</td>
                  </tr>
                  <tr></tr>
                  <tr></tr>
                    <td>Jawa Timur</td>
                    <td>20</td>
                    <td>30</td>
                    <td>40</td>
                  </tr>
                    <td>Banten</td>
                    <td>20</td>
                    <td>30</td>
                    <td>40</td>
                  </tr>
                 </tbody>
              </table>
              <p class="pt-20 text-sm">Sumber Data: <span>BPS, Survei Angkatan Kerja Nasional (Sakernas)</span></p>
              <p class="py-2 text-sm">Catatan: <span>Mencakup seluruh lapangan usaha yang ada pada KBLI 2015</span></p>
             </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
   </div>
  </section><!-- End Statistik Section -->
<?php
    include("footer.php");
?>