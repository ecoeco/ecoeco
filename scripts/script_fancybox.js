$(document).ready(function() {
	/* This is basic - uses default settings */
	$("a.single_image").fancybox({
		'padding'			: 0,
		'autoScale'			: false,
		'transitionIn'		: 'elastic',
		'transitionOut'		: 'elastic',
		'titlePosition' 	: 'inside',
		/*'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
			return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
		}*/	
	});
	/* Using custom settings */
	$("a#inline").fancybox({
		'hideOnContentClick': true
	});
	/* Apply fancybox to multiple items */	
	$("a.group").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false,
		'titlePosition' 	: 'inside',
		/*'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
			return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
		}*/
	});
	
});