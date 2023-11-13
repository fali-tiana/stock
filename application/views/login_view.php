<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- link for the css -->

	<link rel="stylesheet" href="<?php echo base_url() . 'public/output.css' ?>">

	<!-- link for the font -->

	<link href="https://api.fontshare.com/v2/css?f[]=boska@500,400,700,300&f[]=general-sans@200,500,300,600,400,700&display=swap" rel="stylesheet">

	<!-- link for the icons -->

	<script src="https://unpkg.com/feather-icons"></script>

	<!-- link for the jquery -->

	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

	<!-- link for the favicon -->

	<link rel="shortcut icon" href="<?php echo base_url() . 'public/img/favicon.ico' ?>" type="image/x-icon">

	<!-- link for toastr notifications  -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	<title>login</title>
</head>
<body>

	<div class="flex w-full h-screen overflow-hidden max-lg:justify-center max-lg:items-center">

		<!-- LEFT SECTION  -->

		<section class="left-section flex flex-col w-[45%] h-screen items-center justify-center max-lg:hidden">
			<h1 class="text-6xl text-white my-6"> Gérez votre stock</h1>
			<p class="text-xl text-white my-4"> Améliorez votre productivité</p>
		</section>

		<!-- RIGHT SECTION  -->

		<section class="flex w-[55%] h-screen items-center justify-center">

			<!-- the opening of the form -->

			<?php echo form_open('Login_handler', 'class="block w-[350px]" '); ?>
				
				<div class="flex flex-col items-center">

					<!-- the title section -->

					<div class="w-full h-auto my-3 text-center">
						<h2 class="font-semibold">Se connecter</h2>
					</div>

					<!-- input for the email section -->

					<div class="my-4">

						<label for="email" class="input-label"> Email </label>
						<input type="email" name="email" id="email" placeholder="antoniodelacruz@gmail.com" value="<?php echo set_value("email"); ?>" autocomplete="off" size="50" class="input-container max-sm:placeholder:overflow-hidden max-sm:placeholder:whitespace-nowrap max-sm:placeholder:text-ellipsis" required>

						<!-- the errors for the email input are shown here -->

						<?php echo form_error('email'); ?>

					</div>

					<!-- input for the password section -->

					<div class="relative my-4">

						<div class="mb-5">

							<label for="password" class="input-label"> Mot de passe </label>
							<input type="password" name="password" id="password" placeholder="Doit contenir au moins 6 caractères" value="<?php echo set_value("password"); ?>" autocomplete="off" size="50" class="input-container max-sm:placeholder:overflow-hidden max-sm:placeholder:whitespace-nowrap max-sm:placeholder:text-ellipsis" required>

							<!-- the errors for the password input are shown here -->

							<?php echo form_error('password'); ?>

						</div>

						<!-- the icon to toggle between show and hide password -->

						<a href="#0" class="absolute top-[43px] right-4 grid h-5 w-5 place-items-center text-gray-300 cursor-pointer" id="passwordBtn">
							<i id="eye" data-feather="eye" class="hidden"></i>
							<i id="eyeOff" data-feather="eye-off"></i>
						</a>

						<!-- a remember me checkbox -->

						<div class="flex gap-2 w-full items-center">
							<input type="checkbox" name="rememberMe" id="rememberMe" value="yes" class="checkbox-container">
							<label for="rememberMe" class="input-label w-auto mb-0"> Garder ma session active</label>
						</div>

					</div>

					<!-- the submit button -->

					<div class="w-full mb-5">
						<button type="submit" class="btn-primary"> Se connecter</button>
					</div>

					<!-- the legal mention section  -->

					<div class="font-medium text-center">
						<span>
							En continuant, vous acceptez notre <br />
							<a href="#" class="text-primary-500">Politique de confidentialité</a> &amp;
							<a href="#" class="text-primary-500">Conditions d'utilisation</a> 
						</span>.
					</div>
					
				</div>
			
			<?php form_close(); ?>

		</section>
		
	</div>

<!-- script source for all the login  -->

<script src="<?php echo base_url() . 'src/js/login.js' ?>"></script>
</body>
</html>