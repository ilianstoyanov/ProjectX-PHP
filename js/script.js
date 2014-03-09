jQuery(document).ready(function () {
    
	/***   Show/Hide Forms   ***/
    ShowHideForms();
    
	/***	Form validation		***/
	$('.reg-form .submit').click(function(){
		UserPassValidation($('.reg-form'), $('.reg-form .firstName'), $('.reg-form .lastName'), $('.reg-form .phone'), $('.reg-form .email'), $('.reg-form .password'), $('.reg-form .repassword'));
		
    });
	
	$('.log-form .submit').click(function(){
		UserPassValidation($('.log-form'), $('.log-form .email'), $('.log-form .password'));
    });
	
	/***	Profile Options	***/
	var availableOptions = $('.options ul > li').length,
		showOptions = 0;
		
	$('.options .up').click(function(){
		showOptions -= 1;
		if(showOptions < 0) {
			showOptions = 0;
		}
		
		ProfileSettings(showOptions);
	});
	$('.options .down').click(function(){
		showOptions += 1;
		if(showOptions >= (availableOptions - 5)) {
			showOptions = availableOptions - 5;
		}
		
		ProfileSettings(showOptions);
	});
		
	/***   Paging   ***/
	var allResult = $('.contentTable tr').length,
		showResult = 1,
		constUser = 5;
	$('.jsPrevious').hide();
	if (allResult > 0) {
		$('.jsText').val('1');
		Paging(showResult);
	} else {
		$('.jsText').val('0');
		$('.jsNext').hide();
	}
	
	$('.jsNext').click(function() {
		showResult += constUser;
		$('.jsText').val(parseInt($('.jsText').val()) + 1);
		if(showResult >= (allResult - constUser)) {
			showResult = allResult - constUser;
			$('.jsNext').hide();
		} else {
			$('.jsNext').show();
			$('.jsPrevious').show();
		}
		Paging(showResult);
	});
	$('.jsPrevious').click(function() {
		showResult -= constUser;
		$('.jsText').val(parseInt($('.jsText').val()) - 1);
		if(showResult <= 1 ) {
			showResult = 1;
			$('.jsPrevious').hide();
			$('.jsNext').show();
		} else {
			$('.jsPrevious').show();
			$('.jsNext').show();
		}
		Paging(showResult);
	});
	$('.jsText').blur(function() {
		showResult = parseInt($('.jsText').val()) * constUser;
		
		if(showResult <= 1 ) {
			showResult = 1;
			$('.jsPrevious').hide();
			$('.jsNext').show();
		} else if (showResult >= (allResult - constUser)) {
			showResult = allResult - constUser;
			$('.jsText').val(Math.round(allResult/constUser));
			$('.jsPrevious').show();
			$('.jsNext').show();
		} else {
			$('.jsPrevious').show();
			$('.jsNext').show();
		}
		
		Paging(showResult);
	});
	
	/***   Paging Mouvies   ***/
	var allMouvies = $('.catalog').length,
		showMouvie = 0,
		constMouvie = 2;
	$('.allMouvies .jsPreviousMouvie').hide();
	if (allMouvies > 0) {
		$('.allMouvies .jsTextMouvie').val('1');
		$('.allMouvies .jsTotalMouvies').html(Math.round(allMouvies/constMouvie));
		PagingMouvies(showMouvie);
	} else {
		$('.allMouvies .jsTextMouvie').val('0');
		$('.allMouvies .jsTotalMouvies').html('0');
		$('.allMouvies .jsNextMouvie').hide();
	}
	
	$('.allMouvies .jsNextMouvie').click(function() {
		showMouvie += constMouvie;
		$('.allMouvies .jsTextMouvie').val(parseInt($('.jsTextMouvie').val()) + 1);
		if(showMouvie = (allMouvies - constMouvie)) {
			showMouvie = allMouvies - constMouvie;
			$('.allMouvies .jsNextMouvie').hide();
			$('.allMouvies .jsPreviousMouvie').show();
		} else {
			$('.allMouvies .jsNextMouvie').show();
			$('.allMouvies .jsPreviousMouvie').show();
		}
		PagingMouvies(showMouvie);
	});
	$('.allMouvies .jsPreviousMouvie').click(function() {
		showMouvie -= constMouvie;
		$('.allMouvies .jsTextMouvie').val(parseInt($('.jsTextMouvie').val()) - 1);
		if(showMouvie <= 1 ) {
			showMouvie = 0;
			$('.allMouvies .jsPreviousMouvie').hide();
			$('.allMouvies .jsNextMouvie').show();
		} else {
			$('.allMouvies .jsPreviousMouvie').show();
			$('.allMouvies .jsNextMouvie').show();
		}
		PagingMouvies(showMouvie);
	});
	$('.allMouvies .jsTextMouvie').blur(function() {
		reqShowMouvie = parseInt($('.jsTextMouvie').val()) * constMouvie;
		
		if(reqShowMouvie <= 0 ) {
			showMouvie = 0;
			$('.allMouvies .jsTextMouvie').val('1');
			$('.allMouvies .jsPreviousMouvie').hide();
			$('.allMouvies .jsNextMouvie').show();
		} else if (reqShowMouvie > 0 && reqShowMouvie <= (allMouvies - constMouvie)) {
			$('.allMouvies .jsTextMouvie').val($('.jsTextMouvie').val());
			showMouvie = reqShowMouvie - constMouvie;
			
			 if(showMouvie == 0) {
				$('.allMouvies .jsPreviousMouvie').hide();
				$('.allMouvies .jsNextMouvie').show();
			} else if (showMouvie == (allMouvies - constMouvie)) {
				$('.allMouvies .jsPreviousMouvie').show();
				$('.allMouvies .jsNextMouvie').hide();
			} else {
				$('.allMouvies .jsPreviousMouvie').show();
				$('.allMouvies .jsNextMouvie').show();
			 }
			 
		} else {
			showMouvie = allMouvies - constMouvie;
			$('.allMouvies .jsTextMouvie').val(allMouvies/constMouvie);
			$('.allMouvies .jsPreviousMouvie').show();
			$('.allMouvies .jsNextMouvie').hide();
		} 
		
		PagingMouvies(showMouvie);
	});
	
	/***	Settings	***/
	ShowSettings('Имена');
	
	$('.jsSelectedOption').click(function() {
		ShowSettings($(this).val());
	});
	$('.edit tr > td .btnEdit').click(function() {
			$(this).hide();
			$('.edit tr > td .btnSave').show();
			$('.edit tr>td.View').hide();
			$('.edit tr>td.Edit').show();
	});
});

/***	Paggin Mouvies	***/
var PagingMouvies = function(show) {
	$('.catalog').hide();
	$('.catalog').slice(show,(show + 2)).show();
}

/***	Settings	***/
var ShowSettings = function(show) {
	$('.edit h1').text(show);
	$('.edit tr').hide();
	$('.edit tr>td.Edit').hide();
	$('.edit tr.' + show + '').show();
	$('.edit tr.control').show();
	$('.edit tr > td .btnSave').hide();
}

/***   Paging   ***/
var Paging = function(showFrom) {
	$('.contentTable tr').hide();
	$('.contentTable tr').slice(0,1).show();
	$('.contentTable tr').slice(showFrom, (showFrom + 5)).show();
}

/***   Show/Hide Forms   ***/
var ShowHideForms = function() {
	
	// Hide all forms
	$('.jsPNLLogin').hide();
	$('.jsPNLProfile').hide();
	$('.jsPNLLogin .forgotten-form').hide();
	$('.lock-screen').hide();
	
	// Login and Registration Forms
	$( ".jsBTNShowLogin" ).click(function() {
		$(this).hide();
		$('.jsPNLLogin').slideToggle("slow");
	});
	$( ".jsBTNHideLogin" ).click(function() {
		$(".jsBTNShowLogin" ).show();
		$('.jsPNLLogin').slideToggle("slow");
	});
	
	// Login and Forgotten password forms
	$( ".jsBTNForgotten" ).click(function() {
		$('.login .reg-form').slideToggle("slow");
		$('.login .forgotten-form').slideToggle("slow");
		$('.lock-screen').slideToggle("slow");
	});
	$( ".jsBTNHideForgotten" ).click(function() {
		$('.login .forgotten-form').slideToggle("slow");
		$('.login .reg-form').slideToggle("slow");
		$('.lock-screen').slideToggle("slow");
	});
	
	// Profile Form
	$( ".jsBTNShowProfile" ).click(function() {
		$(this).hide();
		$('.jsPNLProfile').slideToggle("slow");
		ProfileSettings(0);
	});
	$( ".jsBTNHideProfile" ).click(function() {
		$(".jsBTNShowProfile" ).show();
		$('.jsPNLProfile').slideToggle("slow");
	});
}

/***   FORM VALIDATION   ***/
var UserPassValidation = function(form, uName, pass) {
	var uName = uName.val().trim(),
		pass = pass.val().trim(),
		errorFlag = 0;
	
	if (!uName.length || !pass.length) {
		alert('Моля попълнете задължителните полета!');
		errorFlag = 1;
	};

	if ( errorFlag != 0 ) {
		form.submit(function (e) {            
			e.preventDefault();
		})
	}   else {
		form.unbind('submit').submit();
	}
	errorFlag = 0;
};

/***   Profile settings   ***/	
var ProfileSettings = function(showFrom) {
	$('.options ul > li').hide();
	$('.options ul > li').slice(showFrom, (showFrom + 5)).show();
}