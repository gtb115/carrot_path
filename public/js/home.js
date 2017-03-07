



$(document).ready(function(){
	$('#dropbtn').click(function(){
		$(this).toggleClass('open');
		$( ".dropdown-content" ).slideToggle('open');
	});
});

// $( "#dropbtn" ).click(function() {
//   $( ".dropdown-content" ).slideToggle('slow');
//     // Animation complete.
//   });
