<?php /* @var $this Controller */ ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard | Attex - Responsive Tailwind CSS 3 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc., Tailwind, TailwindCSS, Tailwind CSS 3" name="description">
    <meta content="coderthemes" name="author">

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png">

    <!-- plugin css -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/app.min.css" rel="stylesheet" type="text/css">

    <!-- Icons css -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/icons.min.css" rel="stylesheet" type="text/css">

    <!-- Theme Config Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/config.js"></script>
</head>

<body>

    <div class="flex wrapper">

        <!-- Sidenav Menu -->
        <div class="app-menu">

            <!-- App Logo -->
            <a href="index.html" class="logo-box">
                <!-- Light Logo -->
                <div class="logo-light">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" class="logo-lg " alt="Light logo">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-sm.png" class="logo-sm h-[22px]" alt="Small logo">
                </div>

                <!-- Dark Logo -->
                <div class="logo-dark">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-dark.png" class="logo-lg " alt="Dark logo">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-sm.png" class="logo-sm h-[22px]" alt="Small logo">
                </div>
            </a>

            <!-- Sidenav Menu Toggle Button -->
            <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5 z-50">
                <span class="sr-only">Menu Toggle Button</span>
                <i class="ri-checkbox-blank-circle-line text-xl"></i>
            </button>

            <!--- Menu -->
            <div class="scrollbar" data-simplebar>
                <ul class="menu" data-fc-type="accordion">
					<li class="menu-item">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>" class="menu-link">
							<span class="menu-icon"><i class="ri-home-office-line"></i></span>
							<span class="menu-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="menu-title">Berita</li>
					<li class="menu-item">
                        <a href="<?php echo Yii::app()->createUrl('berita/create'); ?>" class="menu-link">
							<span class="menu-icon"><i class=" ri-article-line"></i></span>
							<span class="menu-text">Tambah Berita</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo Yii::app()->createUrl('berita/index'); ?>" class="menu-link">
							<span class="menu-icon"><i class="ri-newspaper-line"></i></span>
                            <span class="menu-text">Daftar Berita</span>
                        </a>
                    </li>

                    <li class="menu-title">Publikasi</li>
					<li class="menu-item">
                        <a href="<?php echo Yii::app()->createUrl('publikasi/create'); ?>" class="menu-link">
							<span class="menu-icon"><i class="ri-book-mark-line"></i></span>
							<span class="menu-text">Tambah Publikasi</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo Yii::app()->createUrl('publikasi/index'); ?>" class="menu-link">
							<span class="menu-icon"><i class="ri-book-2-line"></i></span>
                            <span class="menu-text">Daftar Publikasi</span>
                        </a>
                    </li>

                    <li class="menu-title">Pojok Analisis</li>
					<li class="menu-item">
                        <a href="<?php echo Yii::app()->createUrl('analisis/create'); ?>" class="menu-link">
							<span class="menu-icon"><i class="ri-file-chart-2-line"></i></span>
							<span class="menu-text">Tambah Analisis</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo Yii::app()->createUrl('analisis/index'); ?>" class="menu-link">
							<span class="menu-icon"><i class=" ri-file-chart-line"></i></span>
                            <span class="menu-text">Daftar Analisis</span>
                        </a>
                    </li>

					<li class="menu-title">Master</li>
					<li class="menu-item">
                        <a href="<?php echo Yii::app()->createUrl('satker/index'); ?>" class="menu-link">
							<span class="menu-icon"><i class="ri-government-line"></i></span>
							<span class="menu-text">Satker</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo Yii::app()->createUrl('pengguna/index'); ?>" class="menu-link">
							<span class="menu-icon"><i class=" ri-customer-service-2-line"></i></span>
                            <span class="menu-text">Pengguna</span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
        <!-- Sidenav Menu End  -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- Topbar Start -->
            <header class="app-header flex items-center px-4 gap-3.5">

                <!-- App Logo -->
                <a href="index.html" class="logo-box">
                    <!-- Light Logo -->
                    <div class="logo-light">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" class="logo-lg " alt="Light logo">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-sm.png" class="logo-sm h-[22px]" alt="Small logo">
                    </div>

                    <!-- Dark Logo -->
                    <div class="logo-dark">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-dark.png" class="logo-lg " alt="Dark logo">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-sm.png" class="logo-sm h-[22px]" alt="Small logo">
                    </div>
                </a>

                <!-- Sidenav Menu Toggle Button -->
                <button id="button-toggle-menu" class="nav-link p-2">
                    <span class="sr-only">Menu Toggle Button</span>
                    <span class="flex items-center justify-center">
                        <i class="ri-menu-2-fill text-2xl"></i>
                    </span>
                </button>

                <!-- Theme Setting Button -->
                <div class="relative ms-auto">
                    <button data-fc-type="offcanvas" data-fc-target="theme-customization" type="button" class="nav-link p-2">
                        <span class="sr-only">Customization</span>
                        <span class="flex items-center justify-center">
                            <i class="ri-settings-3-line text-2xl"></i>
                        </span>
                    </button>
                </div>

                <!-- Light/Dark Toggle Button -->
                <div class="lg:flex hidden">
                    <button id="light-dark-mode" type="button" class="nav-link p-2">
                        <span class="sr-only">Light/Dark Mode</span>
                        <span class="flex items-center justify-center">
                            <i class="ri-moon-line text-2xl block dark:hidden"></i>
                            <i class="ri-sun-line text-2xl hidden dark:block"></i>
                        </span>
                    </button>
                </div>

                <!-- Fullscreen Toggle Button -->
                <div class="md:flex hidden">
                    <button data-toggle="fullscreen" type="button" class="nav-link p-2">
                        <span class="sr-only">Fullscreen Mode</span>
                        <span class="flex items-center justify-center">
                            <i class="ri-fullscreen-line text-2xl"></i>
                        </span>
                    </button>
                </div>

                <!-- Profile Dropdown Button -->
                <div class="relative">
                    <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link flex items-center gap-2.5 px-3 bg-black/5 border-x border-black/10">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/users/avatar-1.jpg" alt="user-image" class="rounded-full h-8">
                        <span class="md:flex flex-col gap-0.5 text-start hidden">
                            <h5 class="text-sm">Tosha Minner</h5>
                            <span class="text-xs">Founder</span>
                        </span>
                    </button>

                    <div class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-44 z-50 transition-all duration-300 bg-white shadow-lg border rounded-lg py-2 border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                        <!-- item-->
                        <a href="<?php echo Yii::app()->createUrl('user/profile',array('id'=>5));?>" class="flex items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                            <i class="ri-account-circle-line text-lg align-middle"></i>
                            <span>My Account</span>
                        </a>
                        <!-- item-->
                        <a href="<?php echo Yii::app()->createUrl('site/logout');?>" class="flex items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                            <i class="ri-logout-box-line text-lg align-middle"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </header>
            <!-- Topbar End -->

			<?php echo $content; ?>

            <!-- Footer Start -->
            <footer class="footer h-16 flex items-center px-6 bg-white shadow dark:bg-gray-800 mt-auto">
                <div class="flex md:justify-end justify-center w-full gap-4">
                    <div >
                        <script>document.write(new Date().getFullYear())</script> - Tim Pengembang Website Konreg Wilayah Jabalnusra
                    </div>
                    <!-- <div class="md:flex hidden gap-4 item-center md:justify-end">
                        <a href="javascript: void(0);" class="text-sm leading-5 text-zinc-600 transition hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">About</a>
                        <a href="javascript: void(0);" class="text-sm leading-5 text-zinc-600 transition hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">Support</a>
                        <a href="javascript: void(0);" class="text-sm leading-5 text-zinc-600 transition hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">Contact Us</a>
                    </div> -->
                </div>
            </footer>
            <!-- Footer End -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>

    <!-- Theme Settings Offcanvas -->
    <div>
        <div id="theme-customization" class="fc-offcanvas-open:translate-x-0 hidden translate-x-full rtl:-translate-x-full fixed inset-y-0 end-0 transition-all duration-300 transform max-w-72 w-full z-50 bg-white dark:bg-gray-800" tabindex="-1">
            <div class="h-16 flex items-center text-white bg-primary px-6 gap-3">
                <h5 class="text-base flex-grow">Theme Settings</h5>
                <button type="button" data-fc-dismiss><i class="ri-close-line text-xl"></i></button>
            </div>

            <div class="h-[calc(100vh-128px)]" data-simplebar>
                <div class="p-6">
                    <div class="mb-6">
                        <h5 class="font-semibold text-sm mb-3">Theme</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-mode" id="layout-color-light" value="light">
                                <label class="ms-1.5" for="layout-color-light"> Light </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-mode" id="layout-color-dark" value="dark">
                                <label class="ms-1.5" for="layout-color-dark"> Dark </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h5 class="font-semibold text-sm mb-3">Direction</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="dir" id="direction-ltr" value="ltr">
                                <label class="ms-1.5" for="direction-ltr"> LTR </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="dir" id="direction-rtl" value="rtl">
                                <label class="ms-1.5" for="direction-rtl"> RTL </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6 2xl:block hidden">
                        <h5 class="font-semibold text-sm mb-3">Content Width</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-layout-width" id="layout-mode-default" value="default">
                                <label class="ms-1.5" for="layout-mode-default"> Fluid </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-layout-width" id="layout-mode-boxed" value="boxed">
                                <label class="ms-1.5" for="layout-mode-boxed"> Boxed </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h5 class="font-semibold text-sm mb-3">Sidenav View</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view" id="sidenav-view-default" value="default">
                                </label>
                                <label class="ms-1.5" for="sidenav-view-default"> Default </label>
                            </div>                       

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view" id="sidenav-view-sm" value="sm">
                                <label class="ms-1.5" for="sidenav-view-sm"> Small </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view" id="sidenav-view-md" value="md">
                                <label class="ms-1.5" for="sidenav-view-md"> Compact </label>
                            </div>                      

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view" id="sidenav-view-mobile" value="mobile">
                                <label class="ms-1.5" for="sidenav-view-mobile"> Mobile </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view" id="sidenav-view-hidden" value="hidden">
                                <label class="ms-1.5" for="sidenav-view-hidden"> Hidden </label>
                            </div>
                        
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view" id="sidenav-view-hover" value="hover">
                                <label class="ms-1.5" for="sidenav-view-hover"> Hover </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view" id="sidenav-view-hover-active" value="hover-active">
                                <label class="ms-1.5" for="sidenav-view-hover-active"> Hover Active </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h5 class="font-semibold text-sm mb-3">Menu Color</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-menu-color" id="menu-color-light" value="light">
                                <label class="ms-1.5" for="menu-color-light"> Light </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-menu-color" id="menu-color-dark" value="dark">
                                <label class="ms-1.5" for="menu-color-dark"> Dark </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-menu-color" id="menu-color-brand" value="brand">
                                <label class="ms-1.5" for="menu-color-brand"> Brand </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h5 class="font-semibold text-sm mb-3">Topbar Color</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-topbar-color" id="topbar-color-light" value="light">
                                <label class="ms-1.5" for="topbar-color-light"> Light </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-topbar-color" id="topbar-color-dark" value="dark">
                                <label class="ms-1.5" for="topbar-color-dark"> Dark </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-topbar-color" id="topbar-color-brand" value="brand">
                                <label class="ms-1.5" for="topbar-color-brand"> Brand </label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h5 class="font-semibold text-sm mb-3">Layout Position</h5>

                        <div class="flex btn-radio">
                            <input type="radio" class="form-radio hidden" name="data-layout-position" id="layout-position-fixed" value="fixed">
                            <label class="btn rounded-e-none bg-gray-100 dark:bg-gray-700" for="layout-position-fixed">Fixed</label>
                            <input type="radio" class="form-radio hidden" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                            <label class="btn rounded-s-none bg-gray-100 dark:bg-gray-700" for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-16 p-4 flex items-center gap-4 border-t border-gray-300 dark:border-gray-600 px-6">
                <button type="button" class="btn bg-primary text-white w-1/2" id="reset-layout">Reset</button>
                <button type="button" class="btn bg-light text-dark dark:text-light dark:bg-opacity-10 w-1/2">Buy Now</button>
            </div>
        </div>
    </div>

    <!-- Plugin Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/libs/lucide/umd/lucide.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/libs/@frostui/tailwindcss/frostui.js"></script>

    <!-- App Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.js"></script>

    <!-- Apex Charts js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector Map Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/libs/jsvectormap/maps/world-merc.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/libs/jsvectormap/maps/world.js"></script>

    <!-- Dashboard App js -->
    <!-- <script src="<?php //echo Yii::app()->request->baseUrl; ?>/js/pages/dashboard.js"></script> -->

</body>

</html>