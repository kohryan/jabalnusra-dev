<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login | Backend Konsultasi Regional PDRB Jabalnusra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc., Tailwind, TailwindCSS, Tailwind CSS 3" name="description">
    <meta content="coderthemes" name="author">

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">

    <!--Swiper slider css-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/app.min.css" rel="stylesheet" type="text/css">

    <!-- Icons css -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/icons.min.css" rel="stylesheet" type="text/css">

    <!-- Theme Config Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/config.js"></script>
</head>

<body class="">

    <div class="flex items-stretch h-screen bg-cover bg-center relative bg-no-repeat  bg-[url('../images/bg-auth.jpg')]">
        <?php echo $content;?>

        <div class="bg-black/30 w-full h-full relative hidden lg:block">
            <div class="absolute start-0 end-0 bottom-0 flex mt-auto justify-center text-center">
                <div class="xl:w-1/2 w-full mx-auto">
                    <div class="swiper mt-auto cursor-col-resize" id="swiper_one">
                        <div class="swiper-wrapper mb-12">
                            <div class="swiper-slide">
                                <div class="swiper-slide-content">
                                    <h2 class="text-3xl text-white mb-6">I love the color!</h2>
                                    <p class="text-lg text-white mb-5"><i class="ri-double-quotes-l"></i> Everything you need is in this template. Love the overall look and feel. Not too flashy, and still very professional and smart.</p>
                                    <p class="text-white mx-auto">
                                        - Admin User
                                    </p>
                                </div>
                            </div>
                            <!-- swiper-slide End -->

                            <div class="swiper-slide">
                                <div class="swiper-slide-content">
                                    <h2 class="text-3xl text-white mb-6">Flexibility !</h2>
                                    <p class="text-lg text-white mb-5"><i class="ri-double-quotes-l"></i> Pretty nice theme, hoping you guys could add more features to this. Keep up the good work.</p>
                                    <p class="text-white mx-auto">
                                        - Admin User
                                    </p>
                                </div>
                            </div>
                            <!-- swiper-slide End -->

                            <div class="swiper-slide">
                                <div class="swiper-slide-content">
                                    <h2 class="text-3xl text-white mb-6">Feature Availability!</h2>
                                    <p class="text-lg text-white mb-5"><i class="ri-double-quotes-l"></i> This is a great product, helped us a lot and very quick to work with and implement.</p>
                                    <p class="text-white mx-auto">
                                        - Admin User
                                    </p>
                                </div>
                            </div>
                            <!-- swiper-slide End -->
                        </div>
                        <!-- swiper-wrapper End -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Plugin Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/libs/lucide/umd/lucide.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/libs/@frostui/tailwindcss/frostui.js"></script>

    <!-- App Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.js"></script>

    <!-- Swiper Plugin Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Swiper Auth Demo Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/pages/auth-swiper.js"></script>

</body>

</html>