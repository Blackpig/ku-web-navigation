$(document).ready(function(){
	
	// Apply Masonry to the tiles
	var $tiler = $('.wall');
	// initialize
	$tiler.packery({
	  	itemSelector: '.tile',
	  	animate: true,
          animationOptions: {
            duration: 100,
            queue: true
          }
	});

	/* Add flip functionality to the info icon for the tiles */
	$(".fa-info").hover(
  		function() {
  			$(this).parents('.tile-footer').siblings('.tile-body').addClass("flip");
  		}, 
  		function() {
    		$(this).parents('.tile-footer').siblings('.tile-body').removeClass("flip");
  		}
	);

	$(".tile-content").hover(
  		function() {
		    $(this).find("a").addClass('hover');
		}, 
		function() {
		    $(this).find("a").removeClass('hover');
		}
	);

	$(".tile-front").click(function() {
  		window.location = $(this).find("a").attr("href"); 
  		return false;
	});

	$(document).foundation();
})