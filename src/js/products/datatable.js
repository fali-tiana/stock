$(document).ready(function () {

	// initializing the dataTable

	$("#myTable").DataTable({
		"language": {
			sLengthMenu: 'Afficher _MENU_ enregistrements',
			sZeroRecords: 'Aucun résultat trouvé',
			sInfo: 'Affichage de _START_ à _END_ sur _TOTAL_ enregistrements',
			sInfoEmpty: 'Affichage de 0 à 0 sur 0 enregistrements',
			sInfoFiltered: '(filtré depuis _MAX_ enregistrements totaux)',
			sSearch: 'Rechercher :',
			oPaginate: {
			  sFirst: 'Premier',
			  sPrevious: 'Précédent',
			  sNext: 'Suivant',
			  sLast: 'Dernier'
			}
		}
	});

	// Add Ship button click event

    $("#addShipBtn").click(function () {

        // Clone the first input group

        var newInputGroup = $("#formSection div:first-child").clone();
        var secondInputGroup = $("#formSection div:nth-child(2)").clone();

        // Clear the values of the cloned inputs

        newInputGroup.find('input').val('');
        secondInputGroup.find('input').val('');

		// Add an `svg` element to the second input group

		secondInputGroup.append('<div class="w-[38px] h-[38px] pl-[0.4rem] pt-1.5 pb-2 rounded-xl hover:bg-gray-200 group cursor-pointer transition duration-100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-red-600 transition duration-100 feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></div>');

        // Append the cloned input group to the form
        $("#formSection").append(newInputGroup);
        $("#formSection").append(secondInputGroup);
        
    });

	//showing the modal and getting its product id

	$('.shipBtn').click(function(e) {

		e.preventDefault();
		
		$('#shipModal').toggleClass('hidden');

		let productId = $(this).data('id-product'); 

	})

	if (!$('shipModal').hasClass("hidden")) {

		// Hide modal when clicking outside of it

		$(document).mouseup(function (e) {

			var modal = $('#modalForm');
	  
			// If the target of the click isn't the modal nor a descendant of the modal

			if (!modal.is(e.target) && modal.has(e.target).length === 0) {
			   
			   modal.addClass('hidden');

			}

		});

		// hide the modal on esc key press

		$(document).keydown(function(e) {

			if (e.keyCode === 27) {

			  $("#shipModal").hide();
			}

		});

	}


});
