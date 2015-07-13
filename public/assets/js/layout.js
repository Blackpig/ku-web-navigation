$(document).ready(function(){


	// PREVENT ICONS AND OTHER LINKS FROM FIRING	
	$('.nolink').click(function(e){
		e.preventDefault();
	})
	
	
	var wall = $('#wall').packery({
				itemSelector: '.pack',
			    stamp: '.stamp',
			    animate: true,
          		animationOptions: {
            		duration: 100,
            		queue: true
          			},
          		"columnWidth": 70,
          		"rowHeight": 70,
          		"gutter": 5
          		}
		);

	
	// Add drag and drop functionality to adjustable tiles
	wall.find('.draggable').each(function(i, item){
		var dragTile = new Draggabilly( item );
		wall.packery('bindDraggabillyEvents', dragTile)
	});


	$('#save-layout').click(function(e) {
		e.preventDefault();

		var layout = new Array();
		$('.draggable').each(function(i, item){
			console.log(item);
			layout.push(item.data('guid'));

		})

		console.log(layout);

	});


	// Initialise Foundation
	$(document).foundation();

})