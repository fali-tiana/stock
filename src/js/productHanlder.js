$(document).ready(function () {
	// ADD a new product via AJAX
	$("#addProductForm").submit(function (e) {
		// Preventing the form from submitting traditionally
		e.preventDefault();

		$.ajax({
			type: "POST",
			url: "/product/add_product",
			data: $(this).serialize(), // Serialize the form data
			success: function (response) {
				// Handle a successful response (e.g., show a success message)
				console.log("Product added successfully.");
				// You can also reload the product list or perform any other action here
			},
			error: function (xhr, status, error) {
				// Handle errors (e.g., display an error message)
				console.error("Error adding product:", error);
			},
		});
	});

	// UPDATE a product via AJAX
	$("#editProductForm").submit(function (e) {
		// Preventing the form from submitting traditionally
		e.preventDefault();

		// Get the product ID
		var productId = $("#product_id").val();

		$.ajax({
			type: "POST",
			url: "/products/update_product/" + productId, // URL to the controller method that handles product updates
			data: $(this).serialize(), // Serialize the form data
			success: function (response) {
				// Handle a successful response (e.g., show a success message)
				console.log("Product updated successfully.");
				// You can also reload the product list or perform any other action here
			},
			error: function (xhr, status, error) {
				// Handle errors (e.g., display an error message)
				console.error("Error updating product:", error);
			},
		});
	});

	// DELETE a product via AJAX
	$(".delete-product-btn").click(function () {
		var productId = $(this).data("product-id");

		if (confirm("Are you sure you want to delete this product?")) {
			$.ajax({
				type: "DELETE",
				url: "/products/delete_product/" + productId, // URL to the controller method that handles product deletion
				success: function (response) {
					// Handle a successful response (e.g., remove the product from the list)
					console.log("Product deleted successfully.");
					// You can also update the product list or perform any other action here
				},
				error: function (xhr, status, error) {
					// Handle errors (e.g., display an error message)
					console.error("Error deleting product:", error);
				},
			});
		}
	});
});
