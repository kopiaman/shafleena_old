$(document).ready(function (){
			if(screen.width < 1280){
				 //$("#contentContainer2 #Worldlogo").addClass("WorldLogo1");
				  $("#contentContainer2 .Worldlogo").css("left","70%");
			}
			else{
				$("#contentContainer2 .Worldlogo").css("left", "66%");
			}
		$("#scroller").simplyScroll({
			autoMode: 'loop'
		});
	  $("#slider").easySlider({
		  controlsBefore:	'<p id="controls">',
		  controlsAfter:	'</p>',
		  prevId: 'prevBtn',
		  nextId: 'nextBtn',		  
		  auto: true, 
		  continuous: true,
		                  speed: 800,
                pause: 5000
	  });
	  $("#slider2").easySlider({
		  controlsBefore:	'<p id="controls2">',
		  controlsAfter:	'</p>',	
		  prevId: 'prevBtn2',
		  nextId: 'nextBtn2',	
			  auto: true, 
		  continuous: true
	  });		
	$('div.accordionButton').click(function() {
		$('div.accordionContent').slideUp('normal');	
		$(this).next().slideDown('normal');
	});
 
	//HIDE THE DIVS ON PAGE LOAD	
	$("div.accordionContent").hide()	
	$("#open").trigger('click');  
	
	LatestNews();
});