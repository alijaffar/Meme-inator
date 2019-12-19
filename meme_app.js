	$.fn.ready(function() {	
	
		var fontfam = fontfam || 'Impact'; // Blank = Impact; use fonts imported in CSS above if you want, too.
		var img = 'example.jpg';
		var $line1 = $('#top-line');		
		var $line2 = $('#bottom-line');

		Meme(img, 'canvas') // Make the default, blank meme
		
		$('#fontfam').on('change', function() {
		  var fontfam = $(this).val();
		  make();
		});	
		
		function make(){
			fontfam = $('#fontfam').val();
			Meme(img, 'canvas', $line1.val(), $line2.val(), fontfam);
		};

		function makelink(){
			var $link = '?i='+ img +'&t='+ $($line1).val() + '&b=' + $($line2).val() + '&f=' + fontfam;
			var full=$link;
			$("a").attr("href", full);
			$('#Content').text( $line1.val() );			
		}
		function makeprompt(){
			var $link = '?i='+ img +'&t='+ $($line1).val() + '&b=' + $($line2).val()+ '&f=' + fontfam;
			var full=$link;
			window.prompt("Copy link: Ctrl+C, Enter", full); 
		}
			
		$('#top-line, #bottom-line').keyup(function() {
			make();
			makelink();
		});
		
		
		$(function () {
			$('#fontfam').on('change', function() {
			  var fontfam = $(this).val();
				make();
			});
		
			$('canvas').click(function() {
				make();
			});
		
			$('input').keypress(function(e) {
				if(e.which == 13) {
					jQuery(this).blur();
					jQuery('.show').focus().click(); // initialize button to copy link in class="show"
				}
			});

			$('.show').click(function () {
				makeprompt();
			});

		}); 
		
		// Reset content area, inputs
		$(".reset").click(function() {
			$(this).closest('form').find("input[type=text], textarea").val("");
			Meme(img, 'canvas', '', '');
			$('#Content').text( '' ); //$("#Content").val('');
		});

		// Prevent form submission
		$( "form" ).submit(function( event ) {
		  event.preventDefault();
		});			

	});
