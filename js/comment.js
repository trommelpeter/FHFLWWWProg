/* 	Author:			Daniel Swiatek
	Matrikel-Nr.	530805
 */
$(window).on('load', function(){
	
		//NextButtonListener
				
		var _singleImage = $('#singleImage');
		var _singleImageCount = 1;
		
		$('.next' ).click(function() {
			window.location = $(this).attr('href');
		});
		
		//Toogle InputForm
		$('.commentinput').hide();
		$('.comment .button' ).click(function() {
			
			$('.commentinput' ).toggle();
			if($('.commentinput').is(':visible')){
				logausgabe('Geöffnet');
				$( '.comment .button' ).attr({value: 'Hide Form'});
			}
			if($('.commentinput').is(':hidden')){
				logausgabe('Geschlossen');
				$( '.comment .button' ).attr({value: 'Write Comment'});
			}
		});
		
	//Dom Elemente aus dem Document
	var div = $('.commentinput');
	var divn = $('<div><ul></ul></div>');
	divn.insertAfter(div);
		
	//Funktion die die Logausgabe erzeugt und ein Li anhängt. Ruft außerdem die functino addZero() auf
	function logausgabe(ausgabe){
			var d = new Date();
			var textNode = $('<li>' + addZero(d.getDay()) + '.' + addZero(d.getMonth()) + '.' + d.getFullYear() + ' ' + addZero(d.getHours()) + ':' + addZero(d.getMinutes()) + ' '+ 					ausgabe + '</li>');
			$('ul', divn).append(textNode);
	}
	
	//wird von der function logausgabe aufgerufen, setzt vor einstelligen Zahlen eine 0
	function addZero(i) {
		return (i <10) ? '0'+i : i;
	}
	
});