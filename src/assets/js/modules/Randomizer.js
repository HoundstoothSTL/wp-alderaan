var Randomizer = {
	config: {
		images : [
			"1.jpg",
			"2.jpg",
			"3.jpg"
		],
		imgPath : "assets/img/"
	},

	init : function(options) {
		if( typeof options === "object" ) {
            this.config = options;
        }

		var randomIndex = Math.floor(Math.random() * options.images.length),
			imgPath = options.imgPath,
			img = options.images[randomIndex]
			anchors = document.querySelectorAll('[data-js="random"]');

	    [].forEach.call( anchors, function(element) {
	    	var contextPath = element.getAttribute('data-path');
	        element.setAttribute('style', 'background-image:url(' + imgPath + contextPath + "/" + img + ')');
	    });

	}

};