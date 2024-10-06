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
              <div id="tabel" class="table-responsive">
               
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
  $file=( isset($data->file) ? $data->file[0]->signedUrl : null);
  if($file){
    echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js'></script>"; 
    echo " <script>
        // Ganti URL di bawah ini dengan URL file Excel Anda
        const url = 'assets/data/1.xlsx'; // Path ke file Excel

        fetch(url)
          .then(response => response.arrayBuffer())
          .then(data => {
                const workbook = XLSX.read(data, { type: 'array' });
                const firstSheetName = workbook.SheetNames[0];
                const worksheet = workbook.Sheets[firstSheetName];
                let htmlTable = XLSX.utils.sheet_to_html(worksheet);
                
                /*
                const parser = new DOMParser();

                // Step 3: Parse the HTML string
                const doc = parser.parseFromString(html, 'text/html');
                const table = doc.querySelector('table');

                // Select the first row of the tbody
                const firstRow = table.querySelector('tbody tr tr');

                // Create a new thead element
                const thead = document.createElement('thead');
                
                // Move the first row into the thead
                thead.appendChild(firstRow);

                // Append the thead to the table
                table.insertBefore(thead, table.querySelector('tbody'));

                // Optional: You may want to ensure tbody remains below thead
                const tbody = table.querySelector('tbody');
                table.appendChild(tbody);

                htmlTable=table.outerHTML;
                */
                htmlTable=htmlTable.replaceAll('<table>','<table class=\'border-collapse w-100 border border-black dark:border-slate-600 bg-white dark:bg-slate-800 text-sm shadow-sm\'>');
                htmlTable=htmlTable.replaceAll('<td ','<td class=\'border border-black dark:border-slate-700 px-4 py-4 text-black dark:text-white\' ');
                document.getElementById('tabel').innerHTML = htmlTable;
          })
          .catch(error => console.error('Error loading the Excel file:', error));
    </script>"; 
  }
?>

<?php
  include("footer.php");
?>