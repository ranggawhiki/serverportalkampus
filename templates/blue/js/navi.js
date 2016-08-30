
	jQuery.noConflict();
	jQuery(function($) {
		$("#slider-pixeden").nivoSlider({
		effect: 'boxRain',
		effectPrevious: 'boxRainReverse',
		effectNext: 'boxRain',
		effectControl: 'boxRain',
        slices:15, // For slice animations
        boxCols: 5, // For box animations
        boxRows: 4, // For box animations
        animSpeed:400, // Slide transition speed
        pauseTime:4000 // How long each slide will show
			
		 });
});
	
