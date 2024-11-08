<?php 
    // footer page
?>
<!-- ==================== Footer Start Here ==================== -->
<footer class="footer py-40 bg-color-two">
    <div class="container container-lg">
        <div class="footer-item-wrapper d-flex align-items-center flex-center">
            <div class="footer-item">
                <div class="footer-item__logo align-items-center flex-center">
                    <a href="index.php"> <img src="assets/images/logo/logo-konreg-jabalnusra.png" alt=""></a>
                </div>
                <p class="mb-24 text-black align-items-center flex-center"><b>Sekretariat Konreg PDRB Jabalnusra</b></p>
                <div class="flex-align gap-16 mb-16">
                    <span class="w-32 h-32 flex-center rounded-circle bg-main-two-600 text-white text-md flex-shrink-0"><i class="ph-fill ph-map-pin"></i></span>
                    <span class="text-md text-gray-900 ">BPS Provinsi Jawa Timur, Jalan Raya Kendangsari Industri No. 43 - 44 Surabaya 60292</span>
                </div>
                <div class="flex-align gap-16 mb-16">
                    <span class="w-32 h-32 flex-center rounded-circle bg-main-two-600 text-white text-md flex-shrink-0"><i class="ph-fill ph-phone-call"></i></span>
                    <div class="flex-align gap-16 flex-wrap">
                        <a href="tel:+00123456789" class="text-md text-gray-900 hover-text-main-two-600">(031) 8439343</a>
                    </div>
                </div>
                <div class="flex-align gap-16 mb-16">
                    <span class="w-32 h-32 flex-center rounded-circle bg-main-two-600 text-white text-md flex-shrink-0"><i class="ph-fill ph-envelope"></i></span>
                    <a href="mailto:support24@marketpro.com" class="text-md text-gray-900 hover-text-main-two-600">bps3500@bps.go.id </a>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- bottom Footer -->
<div class="bottom-footer py-8" style="background-color: #001861;">
    <div class="container container-lg">
        <div class="bottom-footer__inner flex-center justify-content-center flex-wrap gap-16 py-16">
            <p class="bottom-footer__text text-white">Sekretariat Konreg PDRB Jabalnusra &copy; 2024. Semua Hak Dilindungi </p>
        </div>
    </div>
</div>
<!-- ==================== Footer End Here ==================== -->
  

    
    <!-- Jquery js -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="assets/js/boostrap.bundle.min.js"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="assets/js/phosphor-icon.js"></script>
    <!-- Select 2 -->
    <script src="assets/js/select2.min.js"></script>
    <!-- Slick js -->
    <script src="assets/js/slick.min.js"></script>
    <!-- Slick js -->
    <script src="assets/js/count-down.js"></script>
    <!-- wow js -->
    <script src="assets/js/jquery-ui.js"></script>

    <!-- main js -->
    <script src="assets/js/main.js"></script>
    <?php if($is_flipbook && isset($data)){ ?>
        <link rel="stylesheet" type="text/css" href="assets/css/flipbook.style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
        <!-- Main css -->
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <!-- Include JS -->
        <script src="assets/js/flipbook.min.js"></script>

        <script type="text/javascript">

            $(document).ready(function () {
                $("#read").flipBook({
                //Layout Setting
                pdfUrl:'assets/<?php echo findFunction(getFullUrl()).'/'.$data->namafile;?>',
                lightBox:true,
                layout:3,
                currentPage:{vAlign:"bottom", hAlign:"left"},
                // BTN SETTING
                btnShare : {enabled:false},
                btnPrint : {
                    hideOnMobile:true
                },
                btnDownloadPages : {
                enabled: false,
                },
                btnColor:'rgb(255,120,60)',
                sideBtnColor:'rgb(255,120,60)',
                sideBtnSize:60,
                sideBtnBackground:"rgba(0,0,0,.7)",
                sideBtnRadius:60,
                shadowOpacity: .5,
                btnSound:{vAlign:"top", hAlign:"left"},
                btnAutoplay:{vAlign:"top", hAlign:"left"},
                // SHARING
                btnShare : {
                    enabled: true,
                    title: "Bagikan",
                    icon: "fa-share-alt"
                },
                google_plus : {
                enabled: false
                },
                facebook : {
                    enabled: true,
                    url: "<?php echo getFullUrl();?>"
                },
                email : {
                    enabled: true,
                    url: "<?php echo getFullUrl();?>",
                    title: "<?php echo $data->judul;?>",
                    description: "Silahkan klik tautan di bawah ini untuk melihat/mengunduh file"
                },
                twitter : {
                    enabled: true,
                    url: "<?php echo getFullUrl();?>"
                },
                pinterest : {
                enabled: false,
                }
            });
            })
        </script>
    <?php } if(isset($is_data)) {?>
        <script src="assets/js/tabs.js"></script>
        <script src="assets/js/isotope.min.js"></script>
    <?php }?>
    </body>
</html>
<?php
// Save the output to the cache file
file_put_contents($cache_file, ob_get_contents());
ob_end_flush(); // Send output to the browser
?>