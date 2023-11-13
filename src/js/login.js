$(document).ready(function () {
	feather.replace();

	const passwordInput = $("#password");
	const PasswordBtn = $("#passwordBtn");
	const eyeIcon = $("#eye");
	const eyeOffIcon = $("#eyeOff");

	// Toggle icons and password visibility when the "show-password" element is clicked
	PasswordBtn.click(function (event) {
		event.preventDefault(); // Prevent the link from scrolling to the top

		if (eyeIcon.hasClass("hidden")) {
			eyeIcon.removeClass("hidden");
			eyeOffIcon.addClass("hidden");
			passwordInput.attr("type", "text"); // Show the password
		} else {
			eyeIcon.addClass("hidden");
			eyeOffIcon.removeClass("hidden");
			passwordInput.attr("type", "password"); // Hide the password
		}
	});
});
