<?php
    $uri = $_SERVER['REQUEST_URI'];
    $params="";
    if(isset($_GET)){
        foreach($_GET as $k=>$v){
            $params.=$k."_".$v."_";
        }
    }
    
    $fileCache=findFilename($uri) ? findFilename($uri) : "index";
    $cache_file = 'cached/'.$fileCache."_".$params.'.html';
    $cache_time = 4 * 3600; // Cache for 4 hour

    // Check if the cache file exists and is still fresh
    if (file_exists($cache_file) && (time() - filemtime($cache_file) < $cache_time)) {
        // Serve the cached file
        readfile($cache_file);
        exit;
    }

    // Start output buffering
    ob_start();

    function getDataPublikasi($page=1,$limit=3){
        $offset=($page - 1) * $limit;
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/mfco5l9qyf8fzvs/records?sort=-CreatedAt&offset=".$offset."&limit=".$limit,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"xc-token: zfzit5j0r0nIGO_QTwhhTEktdzk9RabhNgmI5yn3"
			],
		]);
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			return null;
		} else {
			return $response;
		}
	}

    function getDataAnalisis($page=1,$limit=10){
        $offset=($page - 1) * $limit;
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/mv3a6vki2zw6byo/records?sort=-CreatedAt&offset=".$offset."&limit=".$limit,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"xc-token: zfzit5j0r0nIGO_QTwhhTEktdzk9RabhNgmI5yn3"
			],
		]);
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			return null;
		} else {
			return $response;
		}
	}

    function getDataBerita($page=1,$limit=10){
        $offset=($page - 1) * $limit;
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/mws4ccim69pi1gy/records?sort=-CreatedAt&offset=".$offset."&limit=".$limit,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"xc-token: zfzit5j0r0nIGO_QTwhhTEktdzk9RabhNgmI5yn3"
			],
		]);
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			return null;
		} else {
			return $response;
		}
	}

    function getDataSubjek($page=1,$limit=10){
        $offset=($page - 1) * $limit;
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/m70olwd2gvc9u4k/records?offset=".$offset."&limit=".$limit,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"xc-token: zfzit5j0r0nIGO_QTwhhTEktdzk9RabhNgmI5yn3"
			],
		]);
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			return null;
		} else {
			return $response;
		}
	}

    function getDataIndikator($reffId,$page=1,$limit=10){
        $offset=($page - 1) * $limit;
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/m70olwd2gvc9u4k/links/cjldvbirwzgqqyf/records/".$reffId."?sort=-CreatedAt&fields=Id,judul,UpdatedAt,CreatedAt&limit=".$limit."&offset=".$offset,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"xc-token: zfzit5j0r0nIGO_QTwhhTEktdzk9RabhNgmI5yn3"
			],
		]);
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			return null;
		} else {
			return $response;
		}
    }

    function getById($konten,$id){
        $table_id ="";
        if($konten == "publikasi"){
            $table_id = 'mfco5l9qyf8fzvs';
        } else if($konten == "analisis"){
            $table_id = 'mv3a6vki2zw6byo';
        } else if($konten == "berita"){
            $table_id = 'mws4ccim69pi1gy';
        } else if($konten == "data"){
            $table_id='mpjp828ddcoy45l';
        }
        $curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/{$table_id}/records/".$id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"xc-token: zfzit5j0r0nIGO_QTwhhTEktdzk9RabhNgmI5yn3"
			],
		]);
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			return null;
		} else {
			return $response;
		}
	}

    function searchByKeyword($konten,$keyword){
        $table_id ="";
        if($konten == "publikasi"){
            $table_id = 'mfco5l9qyf8fzvs';
        } else if($konten == "analisis"){
            $table_id = 'mv3a6vki2zw6byo';
        } else if($konten == "berita"){
            $table_id = 'mws4ccim69pi1gy';
        } else if($konten == "indikator"){
            $table_id='mpjp828ddcoy45l';
        }

        $curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://app.nocodb.com/api/v2/tables/{$table_id}/records?sort=-CreatedAt&where=(judul,like,%".$keyword."%)&limit=25&shuffle=0&offset=0",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"xc-token: zfzit5j0r0nIGO_QTwhhTEktdzk9RabhNgmI5yn3"
			],
		]);
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			return null;
		} else {
			return $response;
		}
    }

    function getFullUrl() {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] === 443 ? 'https://' : 'http://';
        $host = $_SERVER['HTTP_HOST'];
        $uri = $_SERVER['REQUEST_URI'];
   
        return $protocol . $host . $uri;
    }

    function findFilename($uri) {
        // Pola regex untuk mencari kata sebelum '-detail.php'
        $pattern = '/\/([^\/]+)\.php/';
    
        if (preg_match($pattern, $uri, $matches)) {
            return $matches[1]; // Mengembalikan kata yang ditemukan
        }
    
        return null; // Jika tidak ditemukan
    }

    function findFunction($url) {
        // Pola regex untuk mencari kata sebelum '-detail.php'
        $pattern = '/\/([^\/]+)-detail\.php/';
    
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1]; // Mengembalikan kata yang ditemukan
        }
    
        return null; // Jika tidak ditemukan
    }

    function searching($keyword){
        $tables= array("publikasi","analisis","berita","indikator");
        $results=array();
        foreach($tables as $name){
            $result=searchByKeyword($name,$keyword);
            if($result){
                $results[$name]=$result;
            } else {
                $results[$name]=null;
            }
        }
        return $results;
    }
?>
<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Konsultasi Regional PDRB Jabalnusra</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- select 2 -->
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <!-- Slick -->
    <link rel="stylesheet" href="assets/css/slick.css">
    <!-- Wow -->
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <?php if(isset($is_data)) { ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.5/dist/bootstrap-table.min.css">
    <?php } ?>
    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <?php if(isset($is_data)) {?>
        <link rel="stylesheet" href="assets/css/owl.css">
        <link rel="stylesheet" href="assets/css/animate.css">
    <?php } ?>

</head> 
<body>
    
<!--==================== Preloader Start ====================-->
  <div class="preloader">
    <img src="assets/images/icon/preloader.gif" alt="">
    <!-- <div class="loader"></div> -->
  </div>
<!--==================== Preloader End ====================-->

<!--==================== Overlay Start ====================-->
<div class="overlay"></div>
<!--==================== Overlay End ====================-->

<!--==================== Sidebar Overlay End ====================-->
<div class="side-overlay"></div>
<!--==================== Sidebar Overlay End ====================-->

<!-- ==================== Scroll to Top End Here ==================== -->
<div class="progress-wrap">
  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
  </svg>
</div>
<!-- ==================== Scroll to Top End Here ==================== -->

<!-- ==================== Search Box Start Here ==================== -->
<form action="searching.php" method="get" class="search-box">
  <button type="button" class="search-box__close position-absolute inset-block-start-0 inset-inline-end-0 m-16 w-48 h-48 border border-gray-100 rounded-circle flex-center text-white hover-text-gray-800 hover-bg-white text-2xl transition-1">
    <i class="ph ph-x"></i>
  </button>
  <div class="container">
    <div class="position-relative">
        
            <input name="keyword" type="text" class="form-control py-16 px-24 text-xl rounded-pill pe-64" placeholder="Cari topik penelusuran">
            <button type="submit" class="w-48 h-48 bg-main-two-600 rounded-circle flex-center text-xl text-white position-absolute top-50 translate-middle-y inset-inline-end-0 me-8">
                <i class="ph ph-magnifying-glass"></i>
            </button>
    </div>
  </div>
 </form>
<!-- ==================== Search Box End Here ==================== -->

<!-- ==================== Mobile Menu Start Here ==================== -->
<div class="mobile-menu scroll-sm d-lg-none d-block">
    <button type="button" class="close-button"> <i class="ph ph-x"></i> </button>
    <div class="mobile-menu__inner">
        <a href="index.php" class="mobile-menu__logo">
            <img src="assets/images/logo/logo.png" alt="Logo">
        </a>
        <div class="mobile-menu__menu">
            <!-- Nav Menu Start -->
            <ul class="nav-menu flex-align nav-menu--mobile">
                <li class="nav-menu__item">
                    <a href="index.php" class="nav-menu__link">Beranda</a>
                </li>
                <li class="nav-menu__item">
                    <a href="indikator.php" class="nav-menu__link">Indikator Statistik</a>
                </li>
                <li class="nav-menu__item">
                    <a href="publikasi.php" class="nav-menu__link">Publikasi</a>
                </li>
                <li class="nav-menu__item">
                    <a href="pojok-analisis.php" class="nav-menu__link">Pojok Analisis</a>
                </li>
                <li class="nav-menu__item">
                    <a href="berita.php" class="nav-menu__link">Berita</a>
                </li>
            </ul>
            <!-- Nav Menu End -->
        </div>
    </div>
</div>
<!-- ==================== Mobile Menu End Here ==================== -->


    <!-- ======================= Middle Top Start ========================= -->
<div class="header-top flex-between" style="background-color: #13328e;">
    <div class="container container-lg">
        <div class="flex-between flex-wrap gap-8">
            <ul class="flex-align flex-wrap d-none d-md-flex">
                <li class="border-right-item"><a href="#" class="text-white text-sm hover-text-decoration-underline">Tentang</a></li>
                <li class="border-right-item"><a href="#" class="text-white text-sm hover-text-decoration-underline">Hubungi</a></li>
                <li class="border-right-item"><a href="#" class="text-white text-sm hover-text-decoration-underline">Kebijakan Mutu</a></li>
            </ul>
        <ul class="header-top__right flex-align flex-wrap">
                <li class="border-right-item">
                    <a href="backend" class="text-white text-sm py-8 flex-align gap-6"> 
                        <span class="icon text-md d-flex"> <i class="ph ph-user-circle"></i> </span> 
                        <span class="hover-text-decoration-underline">Login</span>
                     </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- ======================= Middle Top End ========================= -->

    <!-- ======================= Middle Header Start ========================= -->
<header class="header-middle border-bottom border-gray-100" style="background: #001861;">
    <div class="container container-lg">
        <nav class="header-inner flex-between">
            <!-- Logo Start -->
            <div class="logo">
                <a href="index.php" class="link">
                    <img src="assets/images/logo/logo.png" alt="Logo">
                </a>
            </div>
            <!-- Logo End  -->

            <!-- form location Start -->
            <form action="searching.php" method="get" class="flex-align flex-wrap form-location-wrapper ">
                <div class="search-category d-flex h-48 rounded-pill bg-white d-sm-flex d-none">
                    <div class="search-form__wrapper position-relative">
                        <input name="keyword" type="text" class="search-form__input common-input py-13 ps-16 pe-18 rounded-pill pe-44" placeholder="Cari topik penelusuran">
                        <button type="submit" class="w-32 h-32 bg-main-two-600 rounded-circle flex-center text-xl text-white position-absolute top-50 translate-middle-y inset-inline-end-0 me-8"><i class="ph ph-magnifying-glass"></i></button>
                    </div>
                </div>

                <div class="location-box bg-white flex-align gap-8 py-6 px-16 rounded-pill border border-gray-100">
                    <span class="text-gray-900 text-xl d-xs-flex d-none"><i class="ph ph-map-pin"></i></span>
                    <div class="line-height-1">
                        <span class="text-gray-600 text-xs">Pilih Wilayah</span>
                        <div class="line-height-1">
                            <select class="js-example-basic-single border border-gray-200 border-end-0" name="state">
                                <option value="0">Jabalnusra</option>
                                <option value="1">DKI Jakarta</option>
                                <option value="2">Jawa Barat</option>
                                <option value="3">Jawa Tengah</option>
                                <option value="4">DI Yogyakarta</option>
                                <option value="5">Jawa Timur</option>
                                <option value="6">Banten</option>
                                <option value="7">Bali</option>
                                <option value="8">Nusa Tenggara Barat</option>
                                <option value="9">Nusa Tenggara Timur</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <!-- form location start -->
             
            <!-- Header Middle Right start -->
            <div class="header-right flex-align d-lg-block d-none">
            </div>
            <!-- Header Middle Right End  -->
        </nav>
    </div>
</header>
<!-- ======================= Middle Header End ========================= -->

    <!-- ==================== Header Start Here ==================== -->
<header class="header bg-white border-bottom border-gray-100">
    <div class="container container-lg">
        <nav class="header-inner d-flex justify-content-between gap-8">
            <div class="flex-align menu-category-wrapper">

                <!-- Category Dropdown Start -->
                <div class="category on-hover-item">
                    <button type="button" class="category__button flex-align gap-8 fw-medium p-16 border-end border-start border-gray-100 text-heading">
                        <span class="icon text-2xl d-xs-flex d-none"><i class="ph ph-dots-nine"></i></span>
                        <span class="d-sm-flex d-none">Daftar Website
                        <span class="arrow-icon text-xl d-flex"><i class="ph ph-caret-down"></i></span>
                    </button>

                    <div class="responsive-dropdown on-hover-dropdown common-dropdown nav-submenu p-0 submenus-submenu-wrapper">

                        <button type="button" class="close-responsive-dropdown rounded-circle text-xl position-absolute inset-inline-end-0 inset-block-start-0 mt-4 me-8 d-lg-none d-flex"> <i class="ph ph-x"></i> </button>

                        <!-- Logo Start -->
                        <div class="logo px-16 d-lg-none d-block">
                            <a href="index.php" class="link">
                                <img src="assets/images/logo/logo-two.png" alt="Logo">
                            </a>
                        </div>
                        <!-- Logo End -->

                        <ul class="scroll-sm p-0 py-8 w-300 max-h-400 overflow-y-auto">
                            <li class="has-submenus-submenu">
                                <a href="javascript:void(0)" class="text-gray-500 text-15 py-12 px-16 flex-align gap-8 rounded-0">
                                    <span class="text-xl d-flex"><i class="ph ph-buildings"></i></span>
                                    <span>Badan Pusat Statistik</span>
                                    <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                                </a>
    
                                <div class="submenus-submenu py-16">
                                    <h6 class="text-lg px-16 submenus-submenu__title">Badan Pusat Statistik</h6>
                                    <ul class="submenus-submenu__list max-h-450 overflow-y-auto scroll-sm">
                                        <li>
                                            <a href="https://bps.go.id">Republik Indonesia</a>
                                        </li>
                                        <li>
                                            <a href="https://jakarta.bps.go.id">Provinsi DKI Jakarta</a>
                                        </li>
                                        <li>
                                            <a href="https://jakarta.bps.go.id">Provinsi Jawa Barat</a>
                                        </li>
                                        <li>
                                            <a href="https://jateng.bps.go.id">Provinsi Jawa Tengah</a>
                                        </li>
                                        <li>
                                            <a href="https://yogyakarta.bps.go.id">Provinsi DI Yogyakarta</a>
                                        </li>
                                        <li>
                                            <a href="https://jatim.bps.go.id">Provinsi Jawa Timur</a>
                                        </li>
                                        <li>
                                            <a href="https://banten.bps.go.id">Provinsi Banten</a>
                                        </li>
                                        <li>
                                            <a href="https://bali.bps.go.id">Provinsi Bali</a>
                                        </li>
                                        <li>
                                            <a href="https://ntb.bps.go.id">Provinsi Nusa Tenggara Barat</a>
                                        </li>
                                        <li>
                                            <a href="https://ntt.bps.go.id">Provinsi Nusa Tenggara Timur</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="has-submenus-submenu">
                                <a href="javascript:void(0)" class="text-gray-500 text-15 py-12 px-16 flex-align gap-8 rounded-0">
                                    <span class="text-xl d-flex"><i class="ph ph-buildings"></i></span>
                                    <span>Bappeda</span>
                                    <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                                </a>
                                <div class="submenus-submenu py-16">
                                    <h6 class="text-lg px-16 submenus-submenu__title">Bappeda</h6>
                                    <ul class="submenus-submenu__list max-h-450 overflow-y-auto scroll-sm">
                                        <li>
                                            <a href="https://www.bappenas.go.id/">Bappenas RI</a>
                                        </li>
                                        <li>
                                            <a href="https://bappeda.jakarta.go.id">Provinsi DKI Jakarta</a>
                                        </li>
                                        <li>
                                            <a href="https://bappeda.jabarprov.go.id">Provinsi Jawa Barat</a>
                                        </li>
                                        <li>
                                            <a href="https://bappeda.jatengprov.go.id">Provinsi Jawa Tengah</a>
                                        </li>
                                        <li>
                                            <a href="https://bappeda.jogjaprov.go.id">Provinsi DI Yogyakarta</a>
                                        </li>
                                        <li>
                                            <a href="https://bappeda.jatimprov.go.id">Provinsi Jawa Timur</a>
                                        </li>
                                        <li>
                                            <a href="https://bappeda.bantenprov.go.id">Provinsi Banten</a>
                                        </li>
                                        <li>
                                            <a href="https://bappeda.baliprov.go.id">Provinsi Bali</a>
                                        </li>
                                        <li>
                                            <a href="https://bappeda.ntbprov.go.id">Provinsi Nusa Tenggara Barat</a>
                                        </li>
                                        <li>
                                            <a href="https://bappelitbangda.nttprov.go.id/">Provinsi Nusa Tenggara Timur</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="has-submenus-submenu">
                                <a href="javascript:void(0)" class="text-gray-500 text-15 py-12 px-16 flex-align gap-8 rounded-0">
                                    <span class="text-xl d-flex"><i class="ph ph-buildings"></i></span>
                                    <span>Kominfo</span>
                                    <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                                </a>
                                <div class="submenus-submenu py-16">
                                    <h6 class="text-lg px-16 submenus-submenu__title">Kominfo</h6>
                                    <ul class="submenus-submenu__list max-h-450 overflow-y-auto scroll-sm">
                                        <li>
                                            <a href="https://kominfo.go.id/">Kominfo RI</a>
                                        </li>
                                        <li>
                                            <a href="https://kominfo.jakarta.go.id">Provinsi DKI Jakarta</a>
                                        </li>
                                        <li>
                                            <a href="https://kominfo.jabarprov.go.id">Provinsi Jawa Barat</a>
                                        </li>
                                        <li>
                                            <a href="https://kominfo.jatengprov.go.id">Provinsi Jawa Tengah</a>
                                        </li>
                                        <li>
                                            <a href="https://kominfo.jogjaprov.go.id">Provinsi DI Yogyakarta</a>
                                        </li>
                                        <li>
                                            <a href="https://kominfo.jatimprov.go.id">Provinsi Jawa Timur</a>
                                        </li>
                                        <li>
                                            <a href="https://kominfo.bantenprov.go.id">Provinsi Banten</a>
                                        </li>
                                        <li>
                                            <a href="https://kominfo.baliprov.go.id">Provinsi Bali</a>
                                        </li>
                                        <li>
                                            <a href="https://kominfo.ntbprov.go.id">Provinsi Nusa Tenggara Barat</a>
                                        </li>
                                        <li>
                                            <a href="https://kominfo.nttprov.go.id/">Provinsi Nusa Tenggara Timur</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-submenu">
                                <a href="https://www.bi.go.id/id/default.aspx" class="text-gray-500 text-15 py-12 px-16 flex-align gap-8 rounded-0">
                                    <span class="text-xl d-flex"><i class="ph ph-buildings"></i></span>
                                    <span>Bank Indonesia</span>
                                </a>
                            </li>
                            
                            <li class="has-submenus-submenu">
                                <a href="javascript:void(0)" class="text-gray-500 text-15 py-12 px-16 flex-align gap-8 rounded-0">
                                    <span class="text-xl d-flex"><i class="ph ph-buildings"></i></span>
                                    <span>Kolaborasi Satu Data</span>
                                    <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                                </a>
                                <div class="submenus-submenu py-16">
                                    <h6 class="text-lg px-16 submenus-submenu__title">Kolaborasi Satu Data</h6>
                                    <ul class="submenus-submenu__list max-h-450 overflow-y-auto scroll-sm">
                                        <li>
                                            <a href="https://data.go.id/">Satu Data Indonesia</a>
                                        </li>
                                        <li>
                                            <a href="https://satudata.jakarta.go.id/">Provinsi DKI Jakarta</a>
                                        </li>
                                        <li>
                                            <a href="https://opendata.jabarprov.go.id">Provinsi Jawa Barat</a>
                                        </li>
                                        <li>
                                            <a href="https://data.jatengprov.go.id/id/">Provinsi Jawa Tengah</a>
                                        </li>
                                        <li>
                                            <a href="https://bappeda.jogjaprov.go.id/dataku/">Provinsi DI Yogyakarta</a>
                                        </li>
                                        <li>
                                            <a href="http://opendata.jatimprov.go.id">Provinsi Jawa Timur</a>
                                        </li>
                                        <li>
                                            <a href="https://satudata.bantenprov.go.id/beranda/">Provinsi Banten</a>
                                        </li>
                                        <li>
                                            <a href="https://balisatudata.baliprov.go.id/">Provinsi Bali</a>
                                        </li>
                                        <li>
                                            <a href="https://data.ntbprov.go.id/">Provinsi Nusa Tenggara Barat</a>
                                        </li>
                                        <li>
                                            <a href="https://satudatasektoral.nttprov.go.id/">Provinsi Nusa Tenggara Timur</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> 
                <!-- Category Dropdown End  -->
    
                <!-- Menu Start  -->
                <div class="header-menu d-lg-block d-none">
                    <!-- Nav Menu Start -->
                    <ul class="nav-menu flex-align ">
                        <li class="nav-menu__item">
                            <a href="index.php" class="nav-menu__link">Beranda</a>
                        </li>
                        <li class="nav-menu__item">
                            <a href="indikator.php" class="nav-menu__link">Indikator Statistik</a>
                        </li>
                        <li class="nav-menu__item">
                            <a href="publikasi.php" class="nav-menu__link">Publikasi</a>
                        </li>
                        <li class="nav-menu__item">
                            <a href="pojok-analisis.php" class="nav-menu__link">Pojok Analisis</a>
                        </li>
                        <li class="nav-menu__item">
                            <a href="berita.php" class="nav-menu__link">Berita</a>
                        </li>
                    </ul>
                    <!-- Nav Menu End -->
                </div>
                <!-- Menu End  -->
            </div>

            <!-- Header Right start -->
            <div class="header-right flex-align">
                <div class="me-16 d-lg-none d-block">
                    <div class="flex-align flex-wrap gap-12">
                    <button type="button" class="search-icon flex-align d-lg-none d-flex gap-4 item-hover">
                        <span class="text-2xl text-gray-700 d-flex position-relative item-hover__text">
                            <i class="ph ph-magnifying-glass"></i>
                        </span>
                    </button>
                </div>
                </div>
                <button type="button" class="toggle-mobileMenu d-lg-none ms-3n text-gray-800 text-4xl d-flex"> <i class="ph ph-list"></i> </button>
            </div>
            <!-- Header Right End  -->
        </nav>
    </div>
</header>
<!-- ==================== Header End Here ==================== -->
