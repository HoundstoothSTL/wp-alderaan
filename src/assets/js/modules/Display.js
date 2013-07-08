var Display = {

	config: {
		displayTrigger: document.querySelectorAll('[data-js="displayTrigger"]')
	},

	init: function(options) {
		if( typeof options === "object" ) {
			this.config = options;
		}

		var	$this = this;

		[].forEach.call( $this.config.displayTrigger, function(element) {
			element.addEventListener('click', function(event) {
				event.returnValue = false;
				Helpers.toggleClass(this, 'rotate');
				$this.slide(this.parentNode.parentNode);
			}, false);
		});
	},

	slide: function(content) {
		var wrapper = content.parentNode,	// display-container
			contentHeight = content.offsetHeight,	// display height
			wrapperHeight = wrapper.clientHeight;	// display-container height
			initialHeight = content.querySelector(".display-initial").offsetHeight;

		Helpers.toggleClass(wrapper,'open');

		if (Helpers.hasClass(wrapper,'open'))
		{
			requestAnimationFrame(function() {
				Helpers.addClass(wrapper,'transition');
				wrapper.setAttribute('style', "height:"+contentHeight+"px");
			}, 10);
		}
		else
		{
			requestAnimationFrame(function()
			{
				wrapper.setAttribute('style', "height:"+wrapperHeight+"px");
				requestAnimationFrame(function()
				{
					Helpers.addClass(wrapper,'transition');
					wrapper.setAttribute('style', "height:"+initialHeight/16+"em");
				}, 10);
			}, 10);
		}

		wrapper.addEventListener('transitionEnd webkitTransitionEnd transitionend oTransitionEnd msTransitionEnd', function()
		{
			if(Helpers.hasClass(wrapper,'open'))
			{
				Helpers.removeClass(wrapper,'transition');
				wrapper.setAttribute('style', "height:auto");
			}
		});
	}
};