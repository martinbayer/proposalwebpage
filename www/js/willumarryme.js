(function($) {
	var noPressed = 0;
	var modalContent = [];
	modalContent[0] = "Zkus to ještě jednou..."
	modalContent[1] = "Netřepe se ti ruka?"
	modalContent[2] = "To bude asi nějaká mejlka..."
	modalContent[3] = "Začínám být smutný :("
	modalContent[4] = "Ach jo, tak nic no...už nebudu obtěžovat :("

	var displayModalDialog = function() {
		var modalText;
		if (noPressed > 4)
			modalText = modalContent[4]
		else
			modalText = modalContent[noPressed]

		$("#unbelievableModalTextId").html(modalText)
		$("#unbelievableModal").modal()
	}

	var displayCongratsDialog = function() {
		$("#congratsModal").modal()
	}

	var sendEmail = function(type) {
		if ("no" === type) {
			$.ajax({
				type : "POST",
				url : BASEURL+"/sendRejectionEmail",
				data : {
					'_token': $('meta[name=csrf-token]').attr('content'),
				}
			});
		}
		if ("yes" === type) {
			$.ajax({
				type : "POST",
				url : BASEURL+"/sendConfirmationEmail",
				data : {
					'_token': $('meta[name=csrf-token]').attr('content'),
				}
			});
		}
	}

	var getAnswers = function() {
		return $("#answerButtons")
	}

	var displayAnswers = function() {
		getAnswers().show();
	}

	var createNewYesButton = function($noBtn) {
		var yesButton = $(".decision-button-yes").first().clone()
		yesButton.bind('click', function() {
			displayCongratsDialog()
			sendEmail("yes")
		})
		yesButton.insertBefore($noBtn)
	}

	getAnswers().hide()
	"use strict"; // Start of use strict
	$("#decision-button-id").bind('click', function() {
		displayAnswers()
	})

	$(".decision-button-yes").bind('click', function() {
		displayCongratsDialog()
		sendEmail("yes")
	})

	$("#decision-button-no").bind('click', function() {
		if (noPressed <= 4) {
			noPressed++
			createNewYesButton($(this))
		}else{
			sendEmail("no")	
		}
		displayModalDialog()
		
	})

})(jQuery); // End of use strict
