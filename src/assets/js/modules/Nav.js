var StickyNav = {

	config: {
		viewportHeight : Helpers.windowHeight(),
		navSelector : document.querySelector('[data-js="nav"]')
	},

	init: function(options) {
		if( typeof options === "object" ) {
			this.config = options;
		}

		var $this = this;

		window.addEventListener( 'scroll' , function()
		{
			var topOffset = this.pageYOffset;

			if(topOffset >= $this.config.viewportHeight)
			{
				$this.config.navSelector.classList.add('nav-anchor-top');
			}

			if(topOffset <= $this.config.viewportHeight)
			{
				$this.config.navSelector.classList.remove('nav-anchor-top');
			}
		}, false );

	}
};