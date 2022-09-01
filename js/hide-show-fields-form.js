$("#seeAnotherField").change(function() {
			if ($(this).val() == "yes") {
				$('#otherFieldDiv').show();
				$('#otherField').attr('required','');
				$('#otherField').attr('data-error', 'This field is required.');
			} else {
				$('#otherFieldDiv').hide();
				$('#otherField').removeAttr('required');
				$('#otherField').removeAttr('data-error');				
			}
		});
		$("#seeAnotherField").trigger("change");
		
		
		
$("#seeAnotherFieldGroup").change(function() {
			if ($(this).val() == "1") {
				$('#otherFieldGroupDiv').show();
				$('#otherField1').attr('required','');
				$('#otherField1').attr('data-error', 'This field is required.');
				$('#otherField2').attr('required','');
				$('#otherField2').attr('data-error', 'This field is required.');
			} else {
				$('#otherFieldGroupDiv').hide();
				$('#otherField1').removeAttr('required');
				$('#otherField1').removeAttr('data-error');
				$('#otherField2').removeAttr('required');
				$('#otherField2').removeAttr('data-error');	
			}
		});
		$("#seeAnotherFieldGroup").trigger("change");
		
		
$("#seeAnotherFieldGroup").change(function() {
			if ($(this).val() == "2") {
				$('#otherFieldGroupDiv2').show();
				$('#otherField3').attr('required','');
				$('#otherField3').attr('data-error', 'This field is required.');
				$('#otherField4').attr('required','');
				$('#otherField4').attr('data-error', 'This field is required.');
			} else {
				$('#otherFieldGroupDiv2').hide();
				$('#otherField3').removeAttr('required');
				$('#otherField3').removeAttr('data-error');
				$('#otherField4').removeAttr('required');
				$('#otherField4').removeAttr('data-error');	
			}
		});
		$("#seeAnotherFieldGroup").trigger("change");
		