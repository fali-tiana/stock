$(document).ready(function () {
	$("#myHistoryTable").DataTable({
		"order": [[3, 'desc']],
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
});
