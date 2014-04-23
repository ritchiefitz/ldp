	//resize the videos for mobile if needed on ready and resize
jQuery(document).ready(function(){
	resizeBrightcove();
});

jQuery(window).resize(function(){
	resizeBrightcove();
});
window.addEventListener("orientationchange", function() {
	resizeBrightcove();
});
function resizeBrightcove(){
	var players = jQuery('.BrightcoveExperience');
	jQuery(players).each(function(){
		var ratio = 349/620;
		// this looks confusing, but all it's doing is setting the player to the width of its parent div
		jQuery(this).width(jQuery(this).parent().width());
		jQuery(this).height(jQuery(this).width() * ratio);
	});
}