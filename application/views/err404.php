<!DOCTYPE html>
<html lang="en">
<head>

    <!-- meta link -->

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- link for the icons -->
    
    <script src="https://unpkg.com/feather-icons"></script>
    
    <!-- link for the favicon -->
    
	<link rel="shortcut icon" href="<?php echo base_url() . 'public/img/favicon.ico' ?>" type="image/x-icon">
    
    <!-- link for the font -->
    
    <link href="https://api.fontshare.com/v2/css?f[]=boska@500,400,700,300&f[]=general-sans@200,500,300,600,400,700&display=swap" rel="stylesheet">

    <!-- tailwind css link -->

    <link rel="stylesheet" href="<?php echo base_url() . 'public/output.css' ?>" />
    
    <!-- link for the lottie animation -->

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <!-- title -->
    
    <title>stock</title>

</head>

<body class="bg-zinc-100 w-full h-full">

    <div class="flex items-center justify-around h-screen w-full rounded-md">
        <lottie-player src="<?php echo base_url('public/anim/404Anim.json'); ?>" background="transparent" speed="1" style="width: 600px; height: 600px" loop autoplay></lottie-player>

        <div class="flex flex-col items-center min-w-max">

            <div class="w-full h-full mb-8">
                <h1 class="text-[4rem] text-neutral-600">Page introuvable</h1>
            </div>

            <div class="w-full text-lg text-neutral-700">

                <div class="mb-1">
                    <span>Oops! Nous n'avons pas pu trouver ce que vous cherchiez. </span>
                    <span>Rendez-vous sur notre </span><br>
                    <a href="<?php echo base_url('Product/main'); ?>" class="text-primary-600 underline">page d'accueil.</a>
                </div>

            </div>
        </div>
    </div>

</body>

</html>