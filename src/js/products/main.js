// $(document).ready(function () {
  
//   	// AJAX to GET ALL the products
  
//  	$.ajax({
// 		url: "/stock/Product/get_products", // Replace with the actual URL
// 		type: "GET",
// 		dataType: "json",
// 		success: function (orders) {
// 			if (orders.success) {
				
// 				// Display the list of coffee orders
// 				toastr.success("The product has been successfully added");
				
// 			} else {
				
// 				// Handle errors, if any
// 				toastr.error("Failed to add the product. Please try again.");
				
// 			}
// 		},

// 		error: function (error) {
// 			console.error("Error fetching products: " + error);
// 			toastr.error("An error occurred. Please try again later.");
// 		},

// 	});

// 	// AJAX to POST (add) a product

// 	$("#coffeeForm").submit(function (event) {

// 		// Prevent the default form submission
// 		event.preventDefault(); 
	
// 		var formData = {
// 			coffeeName: $("#coffeeName").val(),
// 			coffeeDescription: $("#coffeeDescription").val(),
// 		};
	
// 		$.ajax({
// 			url: "/stock/Products/add_product",
// 			type: "POST",
// 			data: formData,
// 			dataType: "json",
// 			success: function (response) {
// 				if (response.success) {

// 					// Clear the form fields
// 					$("#coffeeName").val("");
// 					$("#coffeeDescription").val("");
	
// 					// Fetch and display orders again after a successful submission
// 					toastr.success("The product added successfully.");
// 					fetchAndDisplayOrders();

// 				} else {

// 					// Handle submission errors, if any
// 					setTimeout(function () {
// 						toastr.error("Failed to add the product. Please try again.");
// 					}, 500);
// 				}
// 			},
// 			error: function (error) {
// 				console.error("Error submitting the product: " + error);
// 				toastr.error("An error occurred. Please try again later.");
// 			},
// 		});
// 	});

// });
