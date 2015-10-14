$( document ).ready(function() {
    $( "#deelnemenBtn" ).click(function() {
	  $( "#registerForm" ).slideToggle( "slow", function() {
	    // Animation complete.
	  });
	});
});