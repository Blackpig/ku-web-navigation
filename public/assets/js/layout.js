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
	wall.find('.draggable').each(function(i, tile){
		var dragTile = new Draggabilly( tile );
		wall.packery('bindDraggabillyEvents', dragTile)
	});


	$('#save-layout').click(function(e) {
		e.preventDefault();

		var layout = new Array();
		var tiles = wall.packery('getItemElements');
		
		$.each(tiles,function(i, tile){

			layout.push($(tile).data('guid'));

		})

		var url = 'layout/' + $('#currentGUID').val();
		var data = {'layout': layout};

		$.post(url, data)
			.done(function(){
				$('#layoutDone').foundation('reveal', 'open');
			})

			.fail(function(){
				$('#layoutFail').foundation('reveal', 'open');
			})
	});


	// Initialise Foundation
	$(document).foundation();

})