var validator = new FormValidator('form-contact', [{
	name: 'form-email',
	display: 'Email',    
	rules: 'required|valid_email'
	}], function(errors, evt) {
		if (errors.length > 0) {
			var SELECTOR_ERRORS = jQuery('.error-box');
			//console.log( jQuery('label').each().attr('for') );
			
			if (errors.length > 0) {
				SELECTOR_ERRORS.empty();
				
				for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
					SELECTOR_ERRORS.append(errors[i].message + '<br />');
					console.log(errors[i].name);
					jQuery('input[name="' + errors[i].name + '"]').css('border-color', '#F00');
			}
			SELECTOR_ERRORS.fadeIn(1000);
		} 
	}
});