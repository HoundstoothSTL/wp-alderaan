var Embed = {
    config : {
        elementId : 'embed',
        trigger: document.querySelectorAll('[data-js="embedTrigger"]'),
        videoId : 7100569,
        autoplay : true,
        vidWidth: 640,
        vidHeight: 400
    },

    trigger : function() {
        // Move trigger here
    },

    put : function(video) {
        var el = document.getElementById(this.config.elementId);

        el.innerHTML = unescape(video.html);
    },

    init : function(options) {
        if( typeof options === "object" ) {
            this.config = options;
        }
        
        var js = document.createElement('script'),
            callback = 'Embed.put',
            endpoint = 'http://www.vimeo.com/api/oembed.json',
            videoUrl = encodeURIComponent("http://www.vimeo.com/" + this.config.videoId),
            w = this.config.vidWidth,
            h = this.config.vidHeight,
            autoplay = this.config.autoplay,
            url = endpoint 
                + '?url=' + videoUrl 
                + '&width=' + w 
                + '&autoplay=' + autoplay 
                + '&callback=' + callback;

            js.setAttribute('type', 'text/javascript');
            js.setAttribute('src', url);
            js.setAttribute('async', true);
            document.getElementsByTagName('head').item(0).appendChild(js);
    }
};