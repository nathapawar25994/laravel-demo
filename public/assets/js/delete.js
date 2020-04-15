var gymie = (function ($) {
	"use strict";
	return {
		/* --------------------------------- */
		/* TokenInput
		/* --------------------------------- */
		loadBsTokenInput: function () {
			$('.tokenfield').tokenfield();
		},

	

		/* --------------------------------- */
		/* Member delete sweetalert
		/* --------------------------------- */
		deleterecord: function () {
			$('.delete-record').click(function () {
				var recordId = $(this).attr("data-record-id");
				var deleteUrl = $(this).attr("data-delete-url");

				if ($(this).attr("data-dependency") === 'true') {
					var dependency = $(this).attr("data-dependency");
					var dependencyMessage = $(this).attr("data-dependency-message");
				}
				else {
					var dependency = false;
					var dependencyMessage = "Data dependency";
				}

				recordDelete(recordId, deleteUrl, dependency, dependencyMessage);
			}); 

			function recordDelete(recordId, deleteUrl, dependency, dependencyMessage) {
				if (dependency) {
					swal("Warning!", dependencyMessage, "warning");
				}
				else {
					swal({
						title: "Are you sure?",
						text: "Deleting this will also delete all its related records , do you still want to delete this record?",
						type: "warning",
						showCancelButton: true,
						showLoaderOnConfirm: true,
						closeOnConfirm: false,
						confirmButtonText: "Yes, delete it!",
						confirmButtonColor: "#ec6c62"
					}, function () {
						$.ajax({
							url: deleteUrl,
							type: "POST"
						})
							.done(function (data) {
								swal({
									title: "Deleted",
									text: "Record has been successfully deleted",
									type: "success"
								}, function () {
									location.reload();
								});
							})
							.error(function (data) {
								swal("Oops", "We couldn't connect to the server!", "error");
							});
					});
				};

			}
		},

	};
})(jQuery);
